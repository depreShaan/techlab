<?php
include("DBconnect.php");

if (isset($_POST["submit"])) {
    ;
    $email = $_POST["email"];
    $password = $_POST["password"];
    $password2 = $_POST["password2"];
    ;

    $sql = "SELECT * FROM admin WHERE email=?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "s", $email);
    mysqli_stmt_execute($stmt);
    $result_email = mysqli_stmt_get_result($stmt);
    $count_email = mysqli_num_rows($result_email);

    if ($count_user == 0 && $count_email == 0) {
        if ($password == $password2) {
            
            $sql = "INSERT INTO admin( email, password) VALUES(?,?)";
            $stmt = mysqli_prepare($conn, $sql);
            mysqli_stmt_bind_param($stmt, "ss", $email, $password );
            $result_insert = mysqli_stmt_execute($stmt);
            if ($result_insert) {
                header("Location: Admin_dashboard.php");
                exit;
            } else {
                echo '<script>
                    window.location.href="signup.php";
                    alert("Error inserting user");
                </script>';
            }
        } else {
            echo '<script>
                window.location.href="signup.php";
                alert("Passwords do not match");
            </script>';
        }
    } else {
        echo '<script>
            window.location.href="signup.php";
            alert("Username or Email already exists");
        </script>';
    }
}
?>
