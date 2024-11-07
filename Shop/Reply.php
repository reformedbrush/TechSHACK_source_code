<?php
include("../Assets/connection/connection.php");
ob_start();
include("Head.php");
if(isset($_POST['btn_reply']))
{
	$reply=$_POST['txt_reply'];
	$insQry="update tbl_complaint set complaint_reply='$reply',complaint_status='1' where complaint_id=".$_GET['cid'];
	if($con->query($insQry))
	{
        ?>
<script>
    alert("Reply Send");
    window.location="homepage.php";
</script>
        <?php
	}
	else
	{
		echo "Error";
	}
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<body>
<div class="reply-container">
    <div class="text-center mb-4">
        <h5>Reply</h5>
    </div>
    <form id="form1" name="form1" method="post" action="">
        <div class="mb-3">
            <label for="txt_reply" class="form-label">Your Reply</label>
            <input required type="text" class="form-control" name="txt_reply" id="txt_reply" />
        </div>
        <div class="text-center">
            <button type="submit" name="btn_reply" id="btn_reply" class="btn">Reply</button>
        </div>
    </form>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<br>

</body>
</html>
<?php
include("Foot.php");
ob_flush();
?>