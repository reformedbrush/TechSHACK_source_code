<?php
include("../Assets/Connection/Connection.php");
include("Head.php");
if(isset($_POST['btn_submit']))
{
    $title=$_POST['txt_title'];
    $content=$_POST['txt_content'];
    $ins="insert into tbl_complaint(complaint_date,complaint_title,complaint_content,product_id,user_id) values(curdate(),'".$title."','".$content."','".$_GET['pid']."','".$_SESSION['uid']."')";
    if($con->query($ins))
    {
        echo "<script>alert('Complaint Send'); window.location = 'MyBooking.php';</script>";
    }
    
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>

        .container1 {
            max-width: 600px;
            margin: 0 auto;
            margin-top:100px;
        }

        .card {
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 8px;
            background-color: #fff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .card h2 {
            text-align: center;
            font-size: 1.8rem;
            margin-bottom: 20px;
            color: #333;
        }

        .form-table td {
            padding: 10px;
        }

        textarea {
            width: 100%;
            height: 100px;
            padding: 8px;
            border-radius: 5px;
            border: 1px solid #ccc;
            font-size: 14px;
        }

        input[type="text"] {
            width: 100%;
            padding: 8px;
            border-radius: 5px;
            border: 1px solid #ccc;
            font-size: 14px;
        }

        .btn-submit {
            background-color: #333;
            color: white;
            border: none;
            padding: 10px 15px;
            font-size: 16px;
            cursor: pointer;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        .btn-submit:hover {
            background-color: #555;
        }
    </style>
</head>
<body>

<div class="container1">
    <div class="card">
        <h2>Submit Your Complaint</h2>
        <form action="" method="post">
            <div class="mb-3">
                <label for="txt_title" class="form-label">Title</label>
                <input type="text" name="txt_title" id="txt_title" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="txt_content" class="form-label">Content</label>
                <textarea name="txt_content" id="txt_content" class="form-control" required></textarea>
            </div>

            <div class="mb-3 text-center">
                <input type="submit" name="btn_submit" id="btn_submit" class="btn-submit" value="Submit">
            </div>
        </form>
    </div>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>

</body>
</html>