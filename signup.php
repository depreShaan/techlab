<?php
include("DBconnect.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>sign Up</title>
    <link rel="stylesheet" type="text/css" href="signup.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>
<form name="form" action="register.php" method="POST"> 
    <h1>signup</h1>
    <input type="text" name="name" placeholder="Username">
    <input type="text" name="phone" placeholder="Contact Number">
   
    <input type="email" name="email" placeholder="Email">
    
    <input type="password" name="password" placeholder="Password">
    <input type="password" name="password2" placeholder="Confirm Password">
    <input type="text" name="address" placeholder="Your Address">
    <button type="submit" name="submit">Sign Up</button>
    
</form>    
</body>
</html>