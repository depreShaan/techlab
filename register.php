<?php
include("DBconnect.php");

if (isset($_POST["submit"])) {
    $name = $_POST["name"];
    $phone = $_POST["phone"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $password2 = $_POST["password2"];
    $address = $_POST["address"];


    $sql = "SELECT * FROM user WHERE name=?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "s", $name);
    mysqli_stmt_execute($stmt);
    $result_user = mysqli_stmt_get_result($stmt);
    $count_user = mysqli_num_rows($result_user);

    $sql = "SELECT * FROM user WHERE email=?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "s", $email);
    mysqli_stmt_execute($stmt);
    $result_email = mysqli_stmt_get_result($stmt);
    $count_email = mysqli_num_rows($result_email);

    if ($count_user == 0 && $count_email == 0) {
        if ($password == $password2) {
            $hash = password_hash($password, PASSWORD_DEFAULT);,
            $sql = "INSERT INTO user(name, email, password, phone,address) VALUES(??, ?, ?, ?)";
            $stmt = mysqli_prepare($conn, $sql);
            mysqli_stmt_bind_param($stmt, "sssss", $name, $email, $hash, $phone, $address);
            $result_insert = mysqli_stmt_execute($stmt);
            if ($result_insert) {
                header("Location: home.php");
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
