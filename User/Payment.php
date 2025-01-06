
<?php 
session_start();
include("../Assets/Connection/connection.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        
        <title>Payment Gateway</title>
        <link rel="stylesheet" href="./style.css">
        <style>
            @import url('https://fonts.googleapis.com/css?family=Baloo+Bhaijaan|Ubuntu');
            
            *{
                margin: 0;
                padding: 0;
                box-sizing: border-box;
                font-family: 'Ubuntu', sans-serif;
            }

            body{
                background: white;
                margin: 0 10px;
            }

            .payment{
                background: #f8f8f8;
                max-width: 360px;
                margin: 80px auto;
                height: auto;
                padding: 35px;
                padding-top: 70px;
                border-radius: 5px;
                position: relative;
            }

            .payment h2{
                text-align: center;
                letter-spacing: 2px;
                margin-bottom: 40px;
                color: #0d3c61;
            }

            .form .label{
                display: block;
                color: #555555;
                margin-bottom: 6px;
            }

            .input{
                padding: 13px 0px 13px 25px;
                width: 100%;
                text-align: center;
                border: 2px solid #dddddd;
                border-radius: 5px;
                letter-spacing: 1px;
                word-spacing: 3px;
                outline: none;
                font-size: 16px;
                color: #555555;
            }

            .card-grp{
                display: flex;
                justify-content: space-between;
            }

            .card-item{
                width: 48%;
            }

            .space{
                margin-bottom: 20px;
            }

            .icon-relative{
                position: relative;
            }

            .icon-relative .fas,
            .icon-relative .far{
                position: absolute;
                bottom: 12px;
                left: 15px;
                font-size: 20px;
                color: #555555;
            }

            .btn{
                margin-top: 40px;
                padding: 12px;
                text-align: center;
            }


            .payment-logo{
                position: absolute;
                top: -50px;
                left: 50%;
                transform: translateX(-50%);
                width: 100px;
                height: 100px;
                background: #f8f8f8;
                border-radius: 50%;
                box-shadow: 0 0 5px rgba(0,0,0,0.2);
                text-align: center;
                line-height: 85px;
            }

            .payment-logo:before{
                content: "";
                position: absolute;
                top: 5px;
                left: 5px;
                width: 90px;
                height: 90px;
                background: #2196F3;
                border-radius: 50%;
            }

            .payment-logo p{
                position: relative;
                color: #f8f8f8;
                font-family: 'Baloo Bhaijaan', cursive;
                font-size: 58px;
            }

            input[type=submit] {
                background-color: black;
                border: none;
                color: #f8f8f8;
                font-size: 16px;
                padding: 12px;
                text-align: center;
                border-radius: 5px;
                cursor: pointer;
                width: 100%;
            }

            @media screen and (max-width: 420px){
                .card-grp{
                    flex-direction: column;
                }
                .card-item{
                    width: 100%;
                    margin-bottom: 20px;
                }
                .btn{
                    margin-top: 20px;
                }
            }
        </style>
    </head><?php
    if(isset($_POST["btnpay"])!="")
    {
         $UpQry="update tbl_booking set booking_status='2' where booking_id=".$_SESSION['bid'];
		 if($con->query($UpQry))
		 {
?>
            <script>
                window.location="Success.html"
                </script>
            <?php
		 }
    }?>
    <body>
                <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.2/css/all.css">

        <div class="wrapper">
            <div class="payment">
                <div class="payment-logo">
                    <p>p</p>
                </div>
                <h2>Payment Gateway</h2>
                <div class="form">
                    <form method="post">
                        <div class="card space icon-relative">
                            <label class="label">Card holder:</label>
                            <input type="text" class="input" placeholder="Card Holder">
                            <i class="fas fa-user"></i>
                        </div>
                        <div class="card space icon-relative">
                            <label class="label">Card number:</label>
                            <input type="text" class="input" data-mask="0000 0000 0000 0000" placeholder="Card Number">
                            <i class="far fa-credit-card"></i>
                        </div>
                        <div class="card-grp space">
                            <div class="card-item icon-relative">
                                <label class="label">Expiry date:</label>
                                <input type="text" name="expiry-data" class="input" data-mask="00 / 00" placeholder="00 / 00">
                                <i class="far fa-calendar-alt"></i>
                            </div>
                            <div class="card-item icon-relative">
                                <label class="label">CVV:</label>
                                <input type="text" class="input" data-mask="000" placeholder="000">
                                <i class="fas fa-lock"></i>
                            </div>
                        </div>
                        <div class="btn">
                            <input type="submit" name="btnpay" id="btnpay" value="Pay">
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- partial -->
        <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js'></script>
        <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js'></script><script  src="./script.js"></script>
        <script>
    document.querySelector("form").addEventListener("submit", function (e) {
        e.preventDefault(); // Prevent form submission
        let valid = true;
        let errorMessages = []; // Array to collect error messages

        // Clear any previous error messages
        document.querySelectorAll(".error").forEach(function (error) {
            error.remove();
        });

        // Card Holder Validation: Non-empty and letters only
        const cardHolder = document.querySelector('input[placeholder="Card Holder"]');
        if (!/^[A-Za-z ]+$/.test(cardHolder.value.trim())) {
            errorMessages.push("Card holder name must contain only letters and spaces.");
            valid = false;
        }

        // Card Number Validation: Exactly 16 digits (ignoring spaces)
        const cardNumber = document.querySelector('input[placeholder="Card Number"]');
        const sanitizedCardNumber = cardNumber.value.replace(/\s+/g, ""); // Remove spaces
        if (!/^\d{16}$/.test(sanitizedCardNumber)) {
            errorMessages.push("Card number must be exactly 16 digits.");
            valid = false;
        }

        // Expiry Date Validation: MM/YY format and future date
        const expiryDate = document.querySelector('input[name="expiry-data"]');
        const expiryValue = expiryDate.value.trim(); // Remove extra spaces
        if (!/^(0[1-9]|1[0-2])\/\d{2}$/.test(expiryValue)) {
            errorMessages.push("Expiry date must be in MM/YY format.");
            valid = false;
        } else {
            const expiryParts = expiryValue.split("/");
            const currentDate = new Date();
            const inputDate = new Date(`20${expiryParts[1]}`, expiryParts[0] - 1); // Month is zero-based
            if (inputDate < currentDate) {
                errorMessages.push("Expiry date must be in the future.");
                valid = false;
            }
        }

        // CVV Validation: Exactly 3 digits
        const cvv = document.querySelector('input[placeholder="000"]');
        if (!/^\d{3}$/.test(cvv.value.trim())) {
            errorMessages.push("CVV must be exactly 3 digits.");
            valid = false;
        }

        // If there are errors, show them in an alert
        if (!valid) {
            alert("Errors found:\n" + errorMessages.join("\n"));
        } else {
            alert("Payment details are valid. Proceeding with payment...");
            e.target.submit(); // Submit the form
        }
    });
</script>

    </body>
</html>