




<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Add Product</title>
<style>
    body {
        background-color: #f2f2f2; /* Light gray background */
        color: #333; /* Dark gray text color */
        font-family: Arial, sans-serif;
    }

    .container {
        text-align: center;
        margin: 0 auto;
        max-width: 600px; /* Adjust the maximum width as needed */
        background-color: #fff; /* White background for container */
        padding: 20px; /* Add padding for content */
        border-radius: 10px; /* Rounded corners */
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Box shadow for container */
    }

    h2 {
        color: #008080; /* Orange heading color */
    }

    label {
        color: #666; /* Dark gray label text color */
    }

    input[type="text"],
    input[type="number"],
    select {
        width: 100%;
        padding: 8px;
        margin: 5px 0;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box;
    }

    button{
        background-color: #008080; /* Orange submit button background color */
        color: #fff; /* White submit button text color */
        padding: 10px 20px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
    }

    button:hover {
        background-color: #87CEEB; /* Darker orange hover color */
    }

    footer {
        margin-top: 20px; /* Add space between form and footer */
        color: #666; /* Dark gray footer text color */
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
        .footer {
            background-color: #333;
            color: #fff;
            text-align: center;
            padding: 10px;
            position: fixed;
            left: 0;
            bottom: 0;
            width: 100%;
        }

        h2, p {
            margin: 0;
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
            <a href="search.php" style="display: flex; align-items: center; justify-content: center; text-decoration: none;">
            <img width="30" height="30" src="https://img.icons8.com/ios-glyphs/30/search--v1.png" alt="search--v1" style="margin-right: 10px;">
            <span style="color: black;">Search</span></a>
            <a href="login.php" style="display: flex; align-items: center; justify-content: center; text-decoration: none;">
            <img width="30" height="30" src="https://img.icons8.com/ios-glyphs/30/person-male.png" alt="person-male" style="margin-right: 10px;"><span style="color: black;">Login</span></a>
            <a href="signup.php" style="display: flex; align-items: center; justify-content: center; text-decoration: none;">
            <img width="30" height="30" src="https://img.icons8.com/ios/50/signing-a-document.png" alt="signing-a-document" style="margin-right: 10px;"><span style="color: black;">Sign Up</span></a>
        </div>
    </nav>
    <div class="container">
        <h2>Add Product</h2>
        <form name="form" action="insertion.php" method="POST" enctype="multipart/form-data">
            <label for="brand">Brand:</label>
            <input type="text" id="brand" name="brand" required><br><br>
            
            <label for="name">Model Name:</label>
            <input type="text" id="name" name="name" required><br><br>

            <label for="price">Old Price:</label>
            <input type="number" id="price" name="oprice" required><br><br>
            
            <label for="price">New Price:</label>
            <input type="number" id="price" name="nprice" required><br><br>

            <label for="color">Category:</label>
            <select id="color" name="cat">
                <option value="pro">Processor</option>
                <option value="mobo">Motherboard</option>
                <option value="gpu">Graphics Card</option>
                <option value="ssd">Storage</option>
                <option value="ram">RAM</option>
                <option value="psu">Power Supply</option>
            </select><br><br>

            <label for="warranty">Warranty:</label>
            <input type="text" id="warranty" name="warranty"><br><br>

            <label for="details">Details:</label>
            <input type="text" id="details" name="details"><br><br>
            <label for="image">Product Image:</label><br><br>
            <input type="file"  name="image" accept=".jpg, .jpeg, .png" ><br><br>
            <button type="submit" name="submit">Add Product</button>
        </form>
        </div>
        <br><br><br><br>
        <!-- Footer -->
        
  
    
  
</body>
</html>
