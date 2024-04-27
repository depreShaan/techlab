<?php

include 'Dbconnect.php';
session_start();
$user_id = $_SESSION['user_id'];

if(!isset($user_id)){
   header('location:login.php');
};

if(isset($_GET['logout'])){
   unset($user_id);
   session_destroy();
   header('location:login.php');
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Account Details</title>
    <link rel="stylesheet" type="text/css" href="bootstrap-4.5.3-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="profile.css">
    <style>/* profile.css */

body {
    background-color: #f0f8ff; /* Light blue background */
    font-family: Arial, sans-serif;
}

.container {
    margin-top: 50px;
}

.topbar {
    display: flex;
    justify-content: space-between;
    background-color: teal; /* Blue top bar */
    padding: 10px;
    color: white;
}

.card {
    border: none;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
}

.sidebar {
    background-color: #fff;
}

.content {
    background-color: #fff;
    margin-bottom: 20px;
}

.card-body {
    padding: 20px;
}

.topbar a {
    color: white;
    text-decoration: none;
}

.topbar a:hover {
    text-decoration: underline;
}

.card-body h5 {
    margin-bottom: 0;
}

.card-body .text-secondary {
    color: #6c757d; /* Dark grey text */
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
            background: skyblue;
        }
        nav .links{
            display: flex;
            justify-content: center;
            
        }
        nav .links a{
            text-decoration: none;
            align-items: center;
            margin-left: 20px;
            color: black;
        }
        table{
            border-collapse: collapse;
            width: 600px;
            margin-top: 80px;
            background: white;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        th, td{
            border: 0px;
            padding: 10px;
            text-align: left;
        }
        th{
            background: #a5a5a5;
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

</style>
</head>
<body>
<nav>
        <div class="links">
        <a href="home.php" style="display: flex; align-items: center; justify-content: center; text-decoration: none;">
        <img width="30" height="30" src="https://img.icons8.com/ios-glyphs/30/home.png" alt="home" style="margin-right: 10px;">
        <span style="color: black;">Home</span></a>
<div class="dropdown">
                <a href="index.php" style="display: flex; align-items: center; justify-content: center; text-decoration: none;">
                <img width="30" height="30" src="https://img.icons8.com/ios-glyphs/30/box.png" alt="box" style="margin-right: 10px;">
                <span style="color: black;">Product</span></a>
                <div class="dropdown-content">
                    <a href="cpu.php">CPU</a>
                    <a href="graphics_card.php">Graphics Card</a>
                    <a href="motherboard.php">Motherboard</a>
                    <a href="ram.php">RAM</a>
                    <a href="storage.php">Storage</a>
                    <a href="powersupply.php">Power Supply</a>
                </div>
            </div>
            <a href="search.php" style="display: flex; align-items: center; justify-content: center; text-decoration: none;">
            <img width="30" height="30" src="https://img.icons8.com/ios-glyphs/30/search--v1.png" alt="search--v1" style="margin-right: 10px;">
            <span style="color: black;">Search</span></a>
            <a href="login.php" style="display: flex; align-items: center; justify-content: center; text-decoration: none;">
            <img width="30" height="30" src="https://img.icons8.com/ios-glyphs/30/person-male.png" alt="person-male" style="margin-right: 10px;"><span style="color: black;">Login</span></a>
            <a href="signup.php" style="display: flex; align-items: center; justify-content: center; text-decoration: none;">
            <img width="30" height="30" src="https://img.icons8.com/ios/50/signing-a-document.png" alt="signing-a-document" style="margin-right: 10px;"><span style="color: black;">Sign Up</span></a>
            <a href="account.php" style="display: flex; align-items: center; justify-content: center; text-decoration: none;">
            <img width="30" height="30" src="https://img.icons8.com/ios-glyphs/30/person-male.png" alt="signing-a-document" style="margin-right: 10px;"><span style="color: black;">My Profile</span></a>
        </div>
    </nav>
    <h1>PLease</h1>
    <?php
         $select = mysqli_query($conn, "SELECT * FROM user WHERE user_id = $user_id ") or die('query failed');
         if(mysqli_num_rows($select) > 0){
            $fetch = mysqli_fetch_assoc($select);
            
         }
?>
            <div class="row mt-3">
                <div class="col-md-4">
                    <div class="card text-center sidebar">
                        
                    </div>
                </div>

                <div class="col-md-8">
                    <div class="card mb-3 content">
                    <a href="updateuser.php" style="display: flex; align-items: center; justify-content: center; text-decoration: none;">
            <img width="30" height="30" src="https://img.icons8.com/ios-glyphs/30/person-male.png" alt="signing-a-document" style="margin-right: 10px;"><span style="color: black;">Edit Profile</span></a>
                        <h1 class="m-3 pt-3">About</h1>
                        <div class="card-body">
                            <div class="row mb-3">
                                <div class="col-md-3">
                                    <h5>Username</h5>
                                </div>
                                <div class="col-md-9 text-secondary">
                                <h4 class="text-info"><?php echo $fetch['name']; ?></h4>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-3">
                                    <h5>Email</h5>
                                </div>
                                <div class="col-md-9 text-secondary">
                                <h4 class="text-info"><?php echo $fetch['email']; ?></h4>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-3">
                                    <h5>Phone</h5>
                                </div>
                                <div class="col-md-9 text-secondary">
                                <h4 class="text-info"><?php echo $fetch['phone']; ?></h4>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3">
                                    <h5>Address</h5>
                                </div>
                                <div class="col-md-9 text-secondary">
                                <h4 class="text-info"><?php echo $fetch['address']; ?></h4>
                                </div>
                            </div>
                        </div>
                    </div>
                    <form method="GET" action="Admin_dashboard.php">
        <input type="submit" name="logout" value="Logout">
<?php
$host = 'localhost';
$db   = 'techlab';
$user = 'root'; 
$pass = ''; 
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$opt = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];
$pdo = new PDO($dsn, $user, $pass, $opt);

$sql = "SELECT * FROM orders WHERE user_id = $user_id ";
if (isset($_GET['order_id'])) {

    $sql .= ' WHERE prod_id LIKE :order_id';
}
$stmt = $pdo->prepare($sql);
if (isset($_GET['order_id'])) {
  
    $stmt->execute(['order_id' => $_GET['order_id'] . '%']);
} else {
    $stmt->execute();
}
$users = $stmt->fetchAll();
?>
                    <div class="card mb-3 content">
                        <h1 class="m-3">Payment History</h1>
                        <div class="card-body">
                                <table>
        <tr><th>Order ID</th>
            <th>Details</th>
            <th>Total Bill</th>            
            
            <th>Date</th>
            <th>Status</th>
            
        </tr>
        <?php if (count($users) > 0): ?>
            <?php foreach ($users as $product): ?><tr>
                <td><?= $product['order_id'] ?></td>
            <td><?= $product['details'] ?></td>
                <td><?= $product['bill'] ?></td>
                 
                <td><?= $product['date'] ?></td>              
                <td><?= $product['status'] ?></td>
                
            </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr>
                <td colspan="4">No prodcuts found.</td>
            </tr>
        <?php endif; ?>
    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php 
    ?>  
</body>
</html>
