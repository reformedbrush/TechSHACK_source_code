<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password</title>
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,800" rel="stylesheet">
    <style>
        * {
            box-sizing: border-box;
        }

        body {
            background: #f6f5f7;
            font-family: 'Montserrat', sans-serif;
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            background-color: #FFFFFF;
            border-radius: 20px;
            box-shadow: 0 14px 28px rgba(0, 0, 0, 0.25), 
                        0 10px 10px rgba(0, 0, 0, 0.22);
            padding: 40px;
            width: 400px;
            text-align: center;
        }

        h1 {
            margin-bottom: 10px;
            font-size: 24px;
            font-weight: bold;
        }

        p {
            font-size: 14px;
            color: #666;
            margin: 10px 0 20px;
        }

        input {
            width: 100%;
            padding: 12px;
            margin: 10px 0;
            border-radius: 20px;
            border: 1px solid #ddd;
            background-color: #f9f9f9;
            font-size: 14px;
        }

        input:focus {
            outline: none;
            border: 1px solid #3b5d50;
            background-color: #fff;
        }

        button {
            background-color: #3b5d50;
            color: #FFF;
            border: none;
            padding: 12px 20px;
            border-radius: 20px;
            font-size: 14px;
            font-weight: bold;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        button:hover {
            background-color: rgb(127, 168, 153);
        }

        a {
            display: block;
            margin-top: 20px;
            text-decoration: none;
            font-size: 14px;
            color: #333;
            transition: color 0.3s;
        }

        a:hover {
            color: rgb(127, 168, 153);
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Forgot Password</h1>
        <p>Enter your email address below, and we'll send you instructions to reset your password.</p>
        <form id="forgotPasswordForm" action="#" method="post">
            <input type="email" name="email" placeholder="Enter your email" required>
            <button type="submit">Send Reset Link</button>
        </form>
        <a href="login.php">Back to Login</a>
    </div>

    <script>
        // Add an event listener for form submission
        document.getElementById('forgotPasswordForm').addEventListener('submit', function(event) {
            // Show an alert message
            alert("An email has been sent to your email if you are registered with us.");
        });
    </script>
</body>
</html>
