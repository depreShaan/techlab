<?php
$host = 'localhost';
$db   = 'techlab';
$user = 'root'; 
$pass = ''; 
$charset = 'utf8mb4';
session_start();
$email = $_SESSION['email'];
if(!isset($email)){
    header('location:login.php');
 };
 
 if(isset($_GET['logout'])){
    unset($email);
    session_destroy();
    header('location:login.php');
 }
$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$opt = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];
$pdo = new PDO($dsn, $user, $pass, $opt);

if (isset($_POST['add'])) {
    $sql = "UPDATE orders SET status = 'apr' WHERE order_id = :order_id AND status = 'ord'";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['order_id' => $_POST['order_id']]);
} elseif (isset($_POST['drop'])) {
    $sql = "UPDATE orders SET status = 'ord' WHERE order_id = :order_id AND status = 'apr'";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['order_id' => $_POST['order_id']]);
}

$sql = 'SELECT * FROM orders WHERE status = "ord" LIMIT 4';
$stmt = $pdo->prepare($sql);
$stmt->execute();
$orders_pending = $stmt->fetchAll();

$sql = 'SELECT * FROM orders WHERE status = "apr" LIMIT 4';
$stmt = $pdo->prepare($sql);
$stmt->execute();
$orders_approved = $stmt->fetchAll();
?>


<!DOCTYPE html>
<html>
<head>
    <title>Admin Management</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        *{
            padding: 0;
            margin: 0;
            box-sizing: border-box;
            font-family: 'Poppins',sans-serif;
        }
        body{
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            background: #e4e9f7;
            flex-direction: column;
        }
        nav{
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 60px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 0 50px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            background: white;
        }
        nav .links{
            display: flex;
            align-items: center;
        }
        nav .links a{
            text-decoration: none;
            margin-left: 20px;
            color: black;
        }
        .tables-container{
            display: flex;
            justify-content: space-between;
            width: 90%;
            margin-top: 80px;
        }
        table{
            border-collapse: collapse;
            margin-top: 20px;
            width: 400px;
            background: white;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        th, td{
            border: 0px ;
            padding: 10px;
            text-align: left;
        }
        th{
            background: #f2f2f2;
        }
        .dropdown {
            position: relative;
            display: inline-block;
            
        }
        .dropdown-content {
            display: none;
            position: absolute;
            min-width: 160px;
            border-radius: 10px;
            z-index: 1;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            background: white;
        }
        .dropdown-content a {
            color: black;
            padding: 12px 16px;
            text-decoration: none;
            display: block;
        }
        .dropdown:hover .dropdown-content {
            display: block;
        }
        .pending{
            background: #ffe6e6;
        }
        .approved{
            background: #e6ffe6;
        }
        .button-container{
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 20px 0;
        }
        .button-container button{
            font-size: 16px;
            padding: 5px 10px;
            border: none;
            border-radius: 20px;
            background: #ddd;
            cursor: pointer;
            outline: none;
            margin-left: 10px;
        }
    </style>
</head>
<body>
<nav>
        <div class="links">
          <a href="search.php" style="display: flex; align-items: center; justify-content: center; text-decoration: none;">
            <img width="30" height="30" src="https://img.icons8.com/ios-glyphs/30/search--v1.png" alt="search--v1" style="margin-right: 10px;">
            <span style="color: black;">Search</span></a>
            <a href="Admin_dashboard.php" style="display: flex; align-items: center; justify-content: center; text-decoration: none;">
            <img width="30" height="30" src="https://img.icons8.com/ios-glyphs/30/person-male.png" alt="person-male" style="margin-right: 10px;"><span style="color: black;">Dashboard</span></a>
                 </div>
    </nav>
    <div class="tables-container">
        <div>
            <h1>Pending Orders </h1>
            <form method="post">
                <table>
                    <tr>
                        <th>Order ID</th>
                        <th>User ID</th>
                        <th>Bill</th>
                        <th>Select</th>
                    </tr>
                    <?php foreach ($orders_pending as $order): ?>
                    <tr class="pending">
                        <td><?= $order['order_id'] ?></td>
                        <td><?= $order['user_id'] ?></td>
                        <td><?= $order['bill'] ?></td>
                        <td><input type="radio" name="order_id" value="<?= $order['order_id'] ?>"></td>
                    </tr>
                    <?php endforeach; ?>
                </table>
                <div class="button-container">
                    <button type="submit" name="add">Approve</button>
                </div>
            </form>
        </div>
        <div>
            <h1>Approved Orders </h1>
            <form method="post">
                <table>
                    <tr>
                        <th>Order ID</th>
                        <th>User ID</th>
                        <th>Bill</th>
                        <th>Select</th>
                    </tr>
                    <?php foreach ($orders_approved as $order): ?>
                    <tr class="approved">
                        <td><?= $order['order_id'] ?></td>
                        <td><?= $order['user_id'] ?></td>
                        <td><?= $order['bill'] ?></td>
                        <td><input type="radio" name="order_id" value="<?= $order['order_id'] ?>"></td>
                    </tr>
                    <?php endforeach; ?>
                </table>
                <div class="button-container">
                    <button type="submit" name="drop">Disapprove</button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
