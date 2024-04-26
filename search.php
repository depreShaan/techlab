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

$sql = 'SELECT * FROM product';
if (isset($_GET['name'])) {

    $sql .= ' WHERE prod_id LIKE :name';
}
$stmt = $pdo->prepare($sql);
if (isset($_GET['name'])) {
  
    $stmt->execute(['name' => $_GET['name'] . '%']);
} else {
    $stmt->execute();
}
$prodcuts = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Prodcuts</title>
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
        nav .search-bar{
            flex: 1;
            margin-left: 50px;
        }
        nav .search-bar input[type="text"]{
            font-size: 16px;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 20px;
            outline: none;
            width: 20%;
        }
        nav .search-bar input[type="submit"]{
            font-size: 16px;
            padding: 5px 10px;
            border: none;
            border-radius: 20px;
            background: #ddd;
            cursor: pointer;
            outline: none;
            margin-left: 10px;
        }
        nav .links{
            display: flex;
        }
        nav .links a{
            text-decoration: none;
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
        <form class="search-bar" method="get">
            <input type="text" name="prod_id" placeholder="Search by product ID">
            <input type="submit" value="Search">
        </form>
        <div class="links">
        <a href="home.php" style="display: flex; align-items: center; justify-content: center; text-decoration: none;">
        <img width="30" height="30" src="https://img.icons8.com/ios-glyphs/30/home.png" alt="home" style="margin-right: 10px;">
        <span style="color: black;">Home</span></a>
<div class="dropdown">
                <a href="Cart.php" style="display: flex; align-items: center; justify-content: center; text-decoration: none;">
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
            <a href="login.php" style="display: flex; align-items: center; justify-content: center; text-decoration: none;">
            <img width="30" height="30" src="https://img.icons8.com/ios-glyphs/30/person-male.png" alt="person-male" style="margin-right: 10px;"><span style="color: black;">Login</span></a>
            <a href="signup.php" style="display: flex; align-items: center; justify-content: center; text-decoration: none;">
            <img width="30" height="30" src="https://img.icons8.com/ios/50/signing-a-document.png" alt="signing-a-document" style="margin-right: 10px;"><span style="color: black;">Sign Up</span></a>
            <a href="account.php" style="display: flex; align-items: center; justify-content: center; text-decoration: none;">
            <img width="30" height="30" src="https://img.icons8.com/ios-glyphs/30/person-male.png" alt="signing-a-document" style="margin-right: 10px;"><span style="color: black;">My Profile</span></a>
        </div>
    </nav>
    
    <table>
        <tr><th>Product ID</th>
            <th>Brand</th>
            <th>Product Title</th>            
            <th>Product Price</th>
            
        </tr>
        <?php if (count($prodcuts) > 0): ?>
            <?php foreach ($prodcuts as $product): ?>
            <tr><td><?= $product['product_id'] ?></td>
                <td><?= $product['brand'] ?></td>
                <td><?= $product['model_name'] ?></td>                
                <td><?= $product['new'] ?></td>
                
            </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr>
                <td colspan="4">No prodcuts found.</td>
            </tr>
        <?php endif; ?>
    </table>
</body>
</html>
