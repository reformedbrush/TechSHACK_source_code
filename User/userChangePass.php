<?php
include("../Assets/Connection/connection.php");
session_start();
ob_start();
include("Head.php");
$message = "";

if (isset($_POST["btn_submit"])) {
    $currentpwd = $_POST["txtcurrent"];
    $newpwd = $_POST["txtnew"];
    $confirmpwd = $_POST["txtconfirm"];

    $selQuery = "select * from tbl_user where user_password='".$currentpwd."' and user_id='".$_SESSION["uid"]."'";
    $result = $con->query($selQuery);

    if ($data = $result->fetch_assoc()) {
        if ($newpwd == $confirmpwd) {
            $upQry = "update tbl_user set user_password='".$newpwd."' where user_id='".$_SESSION["uid"]."'";
            if ($con->query($upQry)) {
                $message = "Password Updated";
            }
        } else {
            $message = "Passwords do not match";
        }
    } else {
        $message = "Please check current password";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Change Password</title>
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
    .user-detail-section th, .user-detail-section td {
        padding: 12px;
        color: #555;
    }
    .user-detail-section th {
        font-weight: bold;
        color: #333;
        width: 40%;
        text-align: left;
    }
    .user-detail-section input[type="text"], .user-detail-section input[type="password"] {
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
    .message {
        text-align: center;
        color: #3b5d50;
        font-weight: bold;
    }
  </style>
</head>
<body>

<div class="user-detail-section">
  <h2>Change Password</h2>
  <form id="form1" name="form1" method="post" action="">
    <table>
      <tr>
        <th>Current Password</th>
        <td><input type="password" name="txtcurrent" id="txtcurrent" /></td>
      </tr>
      <tr>
        <th>New Password</th>
        <td><input type="password" name="txtnew" id="txtnew" /></td>
      </tr>
      <tr>
        <th>Confirm Password</th>
        <td><input type="password" name="txtconfirm" id="txtconfirm" /></td>
      </tr>
      <tr>
        <td colspan="2">
          <input type="submit" name="btn_submit" id="btn_submit" class="submit-btn" value="Update Password" />
        </td>
      </tr>
      <tr>
        <td colspan="2" class="message"><?php echo $message; ?></td>
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