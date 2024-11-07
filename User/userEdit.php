<?php
include("../Assets/Connection/connection.php");
session_start();
ob_start();
include("Head.php");
$user="select * from tbl_user where user_id=".$_SESSION['uid'];
$res=$con->query($user);
$data=$res->fetch_assoc();
if (isset($_POST['update'])) {
  $name = $_POST['txt_name'];
  $address = $_POST['txt_address'];
  $email = $_POST['txt_email'];
  $number = $_POST['txt_number'];
  $upQry = "update tbl_user set user_name = '".$name."',user_address='".$address."', user_email='".$email."',user_number='".$number."' where user_id = ".$_SESSION['uid'];
  if ($con->query($upQry)) {
    echo "Updated";
  }
}
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
    }
    .user-detail-section td {
        padding: 12px;
        color: #555;
    }
    .user-detail-section td:first-child {
        font-weight: bold;
        color: #333;
        width: 30%;
    }
    .user-detail-section input[type="text"] {
        width: 100%;
        padding: 8px;
        border-radius: 4px;
        border: 1px solid #ccc;
    }
    .submit-btn {
        display: inline-block;
        padding: 10px 20px;
        color: #ffffff;
        background-color: #3b5d50;
        text-decoration: none;
        border: none;
        border-radius: 5px;
        font-weight: bold;
        transition: background-color 0.3s ease;
        cursor: pointer;
        width: 100%;
    }
    .submit-btn:hover {
        background-color: #2e4a40;
    }
  </style>
</head>
<body>

<div class="user-detail-section">
  <h2>Update Profile</h2>
  <form id="form1" name="form1" method="post" action="">
    <table>
      <tr>
        <td>Name</td>
        <td><input type="text" name="txt_name" id="txt_name" value="<?php echo $data['user_name']; ?>" /></td>
      </tr>
      <tr>
        <td>Contact</td>
        <td><input type="text" name="txt_number" id="txt_number" value="<?php echo $data['user_number']; ?>" /></td>
      </tr>
      <tr>
        <td>Email</td>
        <td><input type="text" name="txt_email" id="txt_email" value="<?php echo $data['user_email']; ?>" /></td>
      </tr>
      <tr>
        <td>Address</td>
        <td><input type="text" name="txt_address" id="txt_address" value="<?php echo $data['user_address']; ?>" /></td>
      </tr>
      <tr>
        <td colspan="2">
          <input type="submit" name="update" id="update" class="submit-btn" value="Update Profile" />
        </td>
      </tr>
    </table>
  </form>
</div>

</body>
</html>
<?php
include("Foot.php");
ob_flush();
?>