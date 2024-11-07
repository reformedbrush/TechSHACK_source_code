<?php
/* session_start(); */
include("../Assets/Connection/Connection.php");
ob_start();
include("Head.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>My Booking</title>
<style>
  .booking-section {
      width: 80%;
      margin: 50px auto;
      padding: 20px;
      background-color: #f9f9f9;
      border-radius: 8px;
      box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.2);
      font-family: Arial, sans-serif;
  }
  .booking-section h2 {
      text-align: center;
      color: #333;
      margin-bottom: 20px;
  }
  .booking-section table {
      width: 100%;
      border-collapse: collapse;
  }
  .booking-section th, .booking-section td {
      padding: 12px;
      border: 1px solid #ddd;
      color: #555;
  }
  .booking-section th {
      background-color: #3b5d50;
      color: #fff;
      text-align: left;
  }
  .booking-section img {
      width: 150px;
      height: auto;
      border-radius: 5px;
  }
  .booking-section .action-links a {
      display: inline-block;
      margin: 5px 0;
      padding: 8px 12px;
      color: #fff;
      background-color: #3b5d50;
      text-decoration: none;
      border-radius: 5px;
      font-weight: bold;
      transition: background-color 0.3s ease;
  }
  .booking-section .action-links a:hover {
      background-color: #2e4a40;
  }
  .status {
      font-weight: bold;
  }
</style>
</head>

<body>
<div class="booking-section">
  <h2>My Booking</h2>
  <form id="form1" name="form1" method="post" action="">
    <table>
      <tr>
        <th>Sl.No</th>
        <th>Product</th>
        <th>Price</th>
        <th>Qty</th>
        <th>Seller</th>
        <th>Contact</th>
        <th>Photo</th>
        <th>Status</th>
        <th>Action</th>
      </tr>
      <?php
      $selQry = "SELECT * FROM tbl_booking b 
                 INNER JOIN tbl_cart c ON c.booking_id=b.booking_id 
                 INNER JOIN tbl_product p ON p.product_id=c.product_id 
                 INNER JOIN tbl_shop s ON s.shop_id=p.shop_id 
                 WHERE user_id=".$_SESSION['uid'];
      $result = $con->query($selQry);
      $i = 0;
      while ($rowpr = $result->fetch_assoc()) { $i++;
      ?>
      <tr>
        <td><?php echo $i ?></td>
        <td><?php echo $rowpr["product_name"] ?></td>
        <td><?php echo $rowpr["product_price"] ?></td>
        <td><?php echo $rowpr["cart_qty"] ?></td>
        <td><?php echo $rowpr["shop_name"] ?></td>
        <td><?php echo $rowpr["shop_address"] ?></td>
        <td><img src="../Assets/Files/Product/<?php echo $rowpr["product_photo"] ?>" alt="Product Image"/></td>
        <td class="status">
          <?php 
          if($rowpr["booking_status"] == 2 && $rowpr["cart_status"] == 1) {
              echo "Order Placed";
          } elseif($rowpr["cart_status"] == 2) {
              echo "Item Packed";
          } elseif($rowpr["cart_status"] == 3) {
              echo "Item Delivered<br>Tracking ID: ".$rowpr['tracking_id'];
          }
          ?>
        </td>
        <td class="action-links">
          <?php if($rowpr["cart_status"] == 3) { ?>
            <a href="PostComplaint.php?pid=<?php echo $rowpr['product_id'] ?>">Report</a><br>
            <a href="Rating.php?pid=<?php echo $rowpr['product_id'] ?>">Rate Now</a>
          <?php } ?>
        </td>
      </tr>
      <?php } ?>
    </table>
  </form>
</div>
</body>
</html>
<?php
include("Foot.php");
ob_flush();
?>