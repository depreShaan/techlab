<?php
session_start();

require_once('DBconnect.php');

if (isset($_POST['email']) && isset($_POST['pass'])) {
    $email = $_POST['email'];
    $password = $_POST['pass'];
    echo $email;

   
    $sql = "SELECT * FROM admin WHERE email=?"; 
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "s", $email);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    echo $email;

    if ($row = mysqli_fetch_assoc($result)) {
        $hashed_password = $row['password'];
      
       
        if ($password= $hashed_password) {
            
            
            $_SESSION['email'] = $row['email']; 
            header("Location:Admin_dashboard.php");
            exit; 
        } else {
            echo "Username and Password Invalid";
        }
    } else {
        echo "Username or Password Invalid";
    }
}
?>

