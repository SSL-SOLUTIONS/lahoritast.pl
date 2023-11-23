<!DOCTYPE html> 
<html>
<head>
    <style>
        body{
           background-color:#111214;
        }
    </style>
  
    <title>Email Verification Notification</title>
</head>
<body>
    <div>
        <h1>Email Verification Notification</h1>
        <p>Thank you for registering. To activate your account On Lahori Taste, please click the following link:</p>
        <a href="{{ $verificationUrl }}">Verify Your Email Address</a>
    </div>
</body>
</html>
