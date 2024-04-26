<?php
session_start(); // Start session for managing user authentication

require_once('DBconnect.php');

if (isset($_POST['email']) && isset($_POST['pass'])) {
    $email = $_POST['email'];
    $password = $_POST['pass'];

    // Validate inputs (e.g., check if fields are not empty)

    // Use prepared statements to prevent SQL injection
    $sql = "SELECT * FROM user WHERE email=?"; // Assuming 'email' is the column name in your user table
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "s", $email);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if ($row = mysqli_fetch_assoc($result)) {
        $hashed_password = $row['password'];
        // Verify the password using password_verify
        if (password_verify($password, $hashed_password)) {
            // Password is correct, set session variables and redirect
            $_SESSION['user_id'] = $row['user_id']; // Adjust this according to your user table
            $_SESSION['email'] = $row['email']; // Adjust this according to your user table
            header("Location: home.php");
            exit; // Stop further execution
        } else {
            echo "Username or Password Invalid";
        }
    } else {
        echo "Username or Password Invalid";
    }
}
?>
