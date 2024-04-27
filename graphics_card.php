<?php 
session_start();
$connect = mysqli_connect("localhost", "root", "", "techlab");

$user_id = $_SESSION['user_id'];


if(!isset($user_id)){
   header('location:login.php');
};

if(isset($_GET['logout'])){
   unset($user_id);
   session_destroy();
   header('location:login.php');
}





if(isset($_POST["add_to_cart"]))
{
    if(isset($_SESSION["shopping_cart"]))
    {
        $item_array_id = array_column($_SESSION["shopping_cart"], "item_id");
        if(!in_array($_GET["id"], $item_array_id))
        {
            $count = count($_SESSION["shopping_cart"]);
            $item_array = array(
                'item_id'        =>  $_GET["id"],
                'item_name'      =>  $_POST["hidden_name"],
                'item_price'     =>  $_POST["hidden_price"],
                'item_quantity'  =>  $_POST["quantity"],
                'item_quantity'  =>  $_POST["quantity"],
            );
            $_SESSION["shopping_cart"][$count] = $item_array;
        }
        else
        {
            echo '<script>alert("Item Already Added")</script>';
        }
    }
    else
    {
        $item_array = array(
            'item_id'        =>  $_GET["id"],
            'item_name'      =>  $_POST["hidden_name"],
            'item_price'     =>  $_POST["hidden_price"],
            'item_quantity'  =>  $_POST["quantity"]
        );
        $_SESSION["shopping_cart"][0] = $item_array;
    }
}

if(isset($_GET["action"]))
{
    if($_GET["action"] == "delete")
    {
        foreach($_SESSION["shopping_cart"] as $keys => $values)
        {
            if($values["item_id"] == $_GET["id"])
            {
                unset($_SESSION["shopping_cart"][$keys]);
                echo '<script>alert("Item Removed")</script>';
                echo '<script>window.location="index.php"</script>';
            }
        }
    }
}

?>
<!DOCTYPE html>
<html>
    <head>
        <title>Products</title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
        <style>
            body {
                padding-top: 60px; /* Added padding to prevent content from hiding behind the nav bar */
                background-color: #f4f4f9;
                color: #555;
                font-family: 'Arial', sans-serif;
            }
            .container {
                background: white;
                padding: 20px 25px;
                border-radius: 8px;
                box-shadow: 0 4px 8px rgba(0,0,0,0.1);
            }
            .title {
                color: #0066c0;
            }
            .card {
                border: 1px solid #ddd;
                background-color: #ffffff;
                border-radius: 5px;
                padding: 16px;
                margin-bottom: 20px;
            }
            .add-to-cart {
                background-color: #5cb85c;
                color: white;
                border-radius: 3px;
                border: none;
                font-size: 16px;
                padding: 10px 20px;
            }
            .add-to-cart:hover {
                background-color: #45a045;
            }
            .table {
                box-shadow: 0 2px 3px rgba(0,0,0,0.1);
            }
            .total-price {
                font-weight: bold;
                font-size: large;
                color: #de4c34;
            }
            .action-link {
                color: #de4c34;
                cursor: pointer;
            }
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
        nav {
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
            z-index: 1000; /* Ensure nav is always on top */
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
            margin-top: 0px;
            background: #f4f4f9;
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
            background: skyblue;
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
        
        h2, p {
            margin: 0;
        }
        .sticky-footer {
        position: fixed;
        bottom: 0;
        left: 0;
        width: 100%;
        background-color: #f4f4f9;
        padding: 10px;
        box-shadow: 0 -2px 5px rgba(0, 0, 0, 0.1);
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
        <div class="container m-3">
        <br><br><br><br>
            <br>
            <?php
                $query = "SELECT * FROM product where cat='gpu' ORDER BY product_id ASC";
                $result = mysqli_query($connect, $query);
                if(mysqli_num_rows($result) > 0) {
                    while($row = mysqli_fetch_array($result)) {
            ?>
            <?php if(isset($_SESSION['order_success'])){?>
            <div class="alert alert-success">
                 <?=$_SESSION['order_success']?>

            </div>

            <?php }unset($_SESSION['order_success']);?>
                               
            <div class="col-md-4">
                <form method="post" action="index.php?action=add&id=<?php echo $row["product_id"]; ?>">
                    <div class="card" allign="center">
                        <img src="images/<?php echo $row["images"]; ?>" class="img-responsive" /><br>
                        
                        <h4 class="text-info"><?php echo $row["brand"]; ?>
                              
                        <h4 class="text-info"><?php echo $row["model_name"]; ?></h4>
                        

                        <h4 class="text-info"><?php echo $row["warranty"]; ?> Year/s Warranty </h4>
                        
                        <h4 class="text-success">৳ <?php echo $row["new"]; ?></h4>
                        <?php if($row['stock']>0){ ?>

                        <input type="number" name="quantity" value="1" class="form-control" />
                        <input type="hidden" name="hidden_name" value="<?php echo $row["model_name"]; ?>" />
                        <input type="hidden" name="hidden_price" value="<?php echo $row["new"]; ?>" /><br>
                        <input type="submit" name="add_to_cart" class="btn btn-info btn-block my-2" value="Add to Cart" />
                        <?php }else{ ?>
                        <h4 class="text-info" style="color:red;">Out of stock </h4>
                            
                        <?php } ?>
                        <a href="productD.php?product_id=<?=$row['product_id']?>" class="btn btn-primary btn-block my-2"> Show Details</a>
                    </div>
                </form>
            </div>
            
            <?php
                    }
                }
            ?>
            <!-- <div><h1>TO Allign</h1>
            <h1>TO Allign</h1><h2>TO Allign</h2></div> -->
            <div style="clear:both"></div>
                <h3 class="text-center title"><b>Shopping Cart</b></h3>
                <h5>Order Details :</h5>
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <tr>
                            <th width="40%">Item Name</th>
                            <th width="10%">Quantity</th>
                            <th width="20%">Price</th>
                            <th width="15%">Total</th>
                            <th width="5%">Action</th>
                        </tr>
                        <?php
                        if(!empty($_SESSION["shopping_cart"]) and isset($_SESSION['shopping_cart'])) {
                            $total = 0;
                            $details="";
                            foreach($_SESSION["shopping_cart"] as $keys => $values) {
                        ?>
                            <tr>
                                <td><?php echo $values["item_name"]; ?></td>
                                <td><?php echo $values["item_quantity"]; ?></td>
                                <td>৳ <?php echo $values["item_price"]; ?></td>
                                <td class="total-price">৳ <?php echo number_format($values["item_quantity"] * $values["item_price"], 2); ?></td>
                                <td><a href="index.php?action=delete&id=<?php echo $values["item_id"]; ?>" class="action-link">Remove</a></td>
                            </tr>
                            <?php
                                $total = $total + ($values["item_quantity"] * $values["item_price"]);
                                $details .= $values['item_name'].':'.$values['item_quantity'].",";
                            }
                            ?>
                            <tr>
                                <td colspan="3" align="right">Total</td>
                                <td align="right" class="total-price">৳ <?php echo number_format($total, 2); ?></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td colspan="5" style="text-align:center;">
                                    <form action="place_order.php" method="post">
                                        <input type="hidden" name="bill" value="<?php echo number_format($total,2); ?>">
                                        <input type="hidden" name="details" value="<?=$details?>">
                                        <button type="submit" class="btn btn-info" name="submit">Place Order</button>
                                    </form>
                                </td>
                            </tr>
                        <?php
                        }
                        ?>
                    </table>
                </div>
        </div>
        
        
    </body>
</html>


<?php
//If you have use Older PHP Version, Please Uncomment this function for removing error 

/*function array_column($array, $column_name)
{
	$output = array();
	foreach($array as $keys => $values)
	{
		$output[] = $values[$column_name];
	}
	return $output;
}*/
?>