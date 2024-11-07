<?php
include("../Assets/Connection/connection.php");
session_start();
if(isset($_POST['btn_submit']))
{
    $qty=$_POST['txt_quantity'];
    $insqry="insert into tbl_stock(stock_qty,stock_date,product_id) values('".$qty."',curdate(),'".$_GET['asid']."')";
    if($con->query($insqry))
    {
        echo "<script>alert('Stock Added'); window.location = 'product.php';</script>";
    }
}

if (isset($_GET['did'])) 
{
    $delQry = "delete from tbl_stock where stock_id = '".$_GET['did']."'";
    if ($con->query($delQry)) 
    {
      header("location:product.php");
      exit();
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Stock Management</title>
    <!-- Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS (Optional) -->
    <style>
        .form-container {
            margin-top: 30px;
        }
        .table-container {
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="container form-container">
        <form action="" method="post">
            <div class="card">
                <div class="card-header text-center">
                    <?php
                        $selQry = "SELECT * from tbl_product WHERE product_id=".$_GET['asid'];
                        $i = 0;
                        $result = $con->query($selQry);
                        while($data=$result->fetch_assoc())
                        {
                            $i++;
                            echo "<h4>Manage Stock for " . $data['product_name'] . "</h4>";
                        }
                    ?>
                    
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="txt_quantity">Stock Quantity</label>
                        <input type="number" class="form-control" name="txt_quantity" id="txt_quantity" placeholder="Enter Stock" required>
                    </div>
                </div>
                <div class="card-footer text-center">
                    <button type="submit" class="btn btn-primary" name="btn_submit" id="btn_submit">Submit</button>
                </div>
            </div>
        </form>
    </div>

    <div class="container table-container">
        <table class="table table-bordered table-striped">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">Sl.No</th>
                    <th scope="col">Stock</th>
                    <th scope="col">Date</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $i=0;
                $sel="select * from tbl_stock where product_id=".$_GET['asid'];
                $res=$con->query($sel);
                while($data=$res->fetch_assoc())
                {
                    $i++;
                ?>
                <tr>
                    <td><?php echo $i; ?></td>
                    <td><?php echo $data['stock_qty']; ?></td>
                    <td><?php echo $data['stock_date']; ?></td>
                    <td>
                        <a href="Stock.php?did=<?php echo $data['stock_id']; ?>" class="btn btn-danger btn-sm">Delete</a>
                    </td>
                </tr>
                <?php
                }
                ?>
                
            </tbody>
        </table>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
