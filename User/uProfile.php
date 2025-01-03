<?php
include("../Assets/Connection/connection.php");
ob_start();
include("Head.php");
$user="select * from tbl_user where user_id=".$_SESSION['uid'];
$res=$con->query($user);
$data=$res->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>User Profile</title>
  <style>
    .user-detail-section {
        width: 60%;
        margin: 50px auto;
        padding: 20px;
        background-color: #f9f9f9;
        border-radius: 8px;
        box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.2);
        font-family: Arial, sans-serif;
    }
    .user-detail-section h2 {
        text-align: center;
        color: #333;
        margin-bottom: 20px;
    }
    .user-detail-section table {
        width: 100%;
        border-collapse: collapse;
        margin: auto; /* Centers the table */
    }
    .user-detail-section td {
        padding: 12px;
        vertical-align: top;
        color: #555;
    }
    .user-detail-section td:first-child {
        font-weight: bold;
        color: #333;
        width: 30%;
    }
    .actions {
        text-align: center;
        padding-top: 20px;
    }
    .actions a.button {
        display: inline-block;
        padding: 10px 20px;
        margin: 5px;
        color: #ffffff;
        background-color: #3b5d50;
        text-decoration: none;
        border-radius: 5px;
        font-weight: bold;
        transition: background-color 0.3s ease;
    }
    .actions a.button:hover {
        background-color: #2e4a40;
    }
  </style>
</head>
<body>

<div class="user-detail-section">
  <h2>User Profile</h2>
  <table>
    <tr>
      <td>Name</td>
      <td><?php echo $data['user_name']; ?></td>
    </tr>
    <tr>
      <td>Contact</td>
      <td><?php echo $data['user_number']; ?></td>
    </tr>
    <tr>
      <td>Email</td>
      <td><?php echo $data['user_email']; ?></td>
    </tr>
    <tr>
      <td>Address</td>
      <td><?php echo $data['user_address']; ?></td>
    </tr>
  </table>
  <div class="actions">
    <a href="userEdit.php" class="button">Edit</a>
    <a href="userChangePass.php" class="button">Change Password</a>
    <a href="MyBooking.php" class="button">My Orders</a>
    <a href="MyComplaint.php" class="button">My Complaints</a> 
  </div>
</div>

</body>
</html>
<?php
include("Foot.php");
ob_flush();
?>