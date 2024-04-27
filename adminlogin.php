
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log in and signup form</title>
    <link rel="Stylesheet" href="style.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>
    <div class=" wrapper">
        <form action="admin.php" method="post">
            <h1>Admin Login</h1>
            <div class="input-box">
                <input type="email" placeholder="Email"  name="email">
                <i class='bx bxs-user'></i>
            </div>
            <div class="input-box">
                <input type="Password" placeholder="Password"  name="pass">
                <i class='bx bxs-lock-alt'></i>
            </div>
            <div class="Remember-forgot">
                <label><input type="checkbox">Remember me</label>
                <a href="#">Forgot Password?</a>
            </div>

            <button type="Submit" class="btn">Login</button>
           
            <div class="register-link"> 
                <p> Are you an user? <a href="login.php">User</a></p>

            </div>
            
        </form>


    </div>
    
</body>
</html>

<?php
?>