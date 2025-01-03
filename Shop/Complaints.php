<?php
include("../Assets/connection/connection.php");
session_start();
ob_start();
include("Head.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<body>

<div class="container complaint-table-container">
    <h2 class="text-center mb-4">Complaints Table</h2>
    <form id="form1" name="form1" method="post" action="">
        <div class="table-responsive">
            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>Sl No.</th>
                        <th>Date</th>
                        <th>User</th>
                        <th>Product</th>
                        <th>Description</th>
                        <th>Reply</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $i=0;
                    $selQry="select * from tbl_shop m inner join tbl_product p on m.shop_id=p.shop_id inner join tbl_complaint c on c.product_id=p.product_id inner join tbl_user u on c.user_id=u.user_id where m.shop_id=".$_SESSION['sid'];
                    $result=$con->query($selQry);
                    while($row=$result->fetch_assoc()) {
                        $i++;
                    ?>
                    <tr>
                        <td><?php echo $i ?></td>
                        <td><?php echo $row['complaint_date'] ?></td>
                        <td><?php echo $row['user_name'] ?></td>
                        <td><?php echo $row['product_name'] ?></td>
                        <td><?php echo $row['complaint_content'] ?></td>
                        <td>
                        <?php
                            if($row['complaint_status']==0){
                                ?>
                                       <a href="Reply.php?cid=<?php echo $row['complaint_id'] ?>">Reply</a> 
                                <?php
                            }
                            else{
                                echo $row['complaint_reply'];  
                            }
                            ?>  </td>
                    </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </form>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
<?php
include("Foot.php");
ob_flush();
?>