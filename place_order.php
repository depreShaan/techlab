<?php
session_start();
$connect = mysqli_connect("localhost", "root", "", "techlab");
$user_id = $_SESSION['user_id'];
if (!$connect) {
    die("Connection failed: " . mysqli_connect_error());
}

if (isset($_POST["submit"])) {
    
        
        //$model_name = $item["item_name"];
        $details = $_POST["details"];
        $bill=$_POST["bill"];
        $date = date("Y-m-d"); // Current date
        $status="ord";

        // SQL to insert into cart_items
        $sql = "INSERT INTO  orders(user_id, bill,details, date,status) VALUES (?, ?, ?, ?,?)";
        // Prepare statement
        $stmt = mysqli_prepare($connect, $sql);
        
        if ($stmt) {
            mysqli_stmt_bind_param($stmt, "issss", $user_id, $bill,$details, $date, $status);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_close($stmt);
            unset($_SESSION['shopping_cart']);
            $_SESSION['order_success']='Order Seccuessful !!';
            header('location:index.php');
        } else {
            echo "ERROR: Could not prepare query: $sql. " . mysqli_error($connect);
        }
    }


mysqli_close($connect);
?>
