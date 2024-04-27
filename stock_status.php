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
if (isset($_GET['brand'])) {

    $sql .= ' WHERE brand LIKE :brand';
}
$stmt = $pdo->prepare($sql);
if (isset($_GET['brand'])) {
  
    $stmt->execute(['brand' => $_GET['brand'] . '%']);
} else {
    $stmt->execute();
}
$prodcuts = $stmt->fetchAll();
require_once('DBconnect.php');
if (isset($_POST['delete']) && isset($_POST['product_id'])) {
    $product_id_to_delete = $_POST['product_id'];
    $sql = "DELETE FROM product WHERE product_id = $product_id_to_delete";
    if ($conn->query($sql) === TRUE) {
        echo "Record deleted successfully";
        header("Location:drop_product.php");
    } else {
        echo "Error deleting record: " . $conn->error;
    } 
}
if(isset($_POST['update'])){
    $product_id = $_POST['product_id'];
    
       
       $update_stock = mysqli_real_escape_string($conn, $_POST['stock']);
        mysqli_query($conn, "UPDATE product SET stock='$update_stock' WHERE product_id = '$product_id'") or die('query failed');
    
       
       $message[] = 'Product Details Updated';
       header('location:stock_status.php');
       
    
     
    
    
    }
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
        <div class="links">

            <a href="search.php" style="display: flex; align-items: center; justify-content: center; text-decoration: none;">
            <img width="30" height="30" src="https://img.icons8.com/ios-glyphs/30/search--v1.png" alt="search--v1" style="margin-right: 10px;">
            <span style="color: black;">Search</span></a>
            <a href="Admin_dashboard.php" style="display: flex; align-items: center; justify-content: center; text-decoration: none;">
            <img width="30" height="30" src="https://img.icons8.com/ios-glyphs/30/person-male.png" alt="person-male" style="margin-right: 10px;"><span style="color: black;">Dashboard</span></a>
                 </div>
    </nav>
    
    <table>
        <tr><th>Product ID</th>
            <th>Brand</th>
            <th>Product Title</th>            
            <th>Product Price</th>
            <th>Current Stock</th>
            <th>Value</th>
            <th></th>
            
        </tr>
        <?php if (count($prodcuts) > 0): ?>
            <?php foreach ($prodcuts as $product): ?>
            <tr><td><?= $product['product_id'] ?></td>
                <td><?= $product['brand'] ?></td>
                <td><?= $product['model_name'] ?></td>                
                <td><?= $product['new'] ?></td>
                <td>
                <td><?= $product['stock'] ?></td>
            </td>
            
            <td>
                <form method="POST" action="stock_status.php">
                
            <input type="text" name="stock" value="" size=2> <br><br>
            
                    <input type="hidden" name="product_id" value="<?= $product['product_id'] ?>">
                    <input type="submit" name="update" value="Update">
                </form>
            </td>
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
