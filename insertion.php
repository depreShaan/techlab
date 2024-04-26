<?php
require_once('DBconnect.php');


if (isset($_POST["submit"])) { // Assuming your submit button has name="submit"
    $brand = $_POST['brand'];
    $name = $_POST['name'];    
    $oprice = $_POST['oprice'];
    $nprice = $_POST['nprice'];
    $cat = $_POST['cat'];
    $warranty = $_POST['warranty']; 
    $details = $_POST['details'];
     // Handle image upload
     $file_name=$_FILES['image']['name'];
     $tempname=$_FILES['image']['tmp_name'];
     $folder='images/'.$file_name;   
    
        
    $sql = "INSERT INTO product(brand, model_name, old, new, cat, warranty, details,images) VALUES (?, ?, ?, ?, ?, ?, ?,?)";
    $stmt = mysqli_prepare($conn, $sql);
    
    
    if ($stmt) { // Check if the prepared statement was created successfully
        mysqli_stmt_bind_param($stmt, "ssddssss", $brand, $name, $oprice, $nprice, $cat, $warranty, $details, $file_name);
        $result_insert = mysqli_stmt_execute($stmt);
        
        if ($result_insert) {
            echo "Product added successfully.";
        } else {
            echo "Error inserting product: " . mysqli_error($conn);
        }
        
        mysqli_stmt_close($stmt); // Close the statement
    } else {
        echo "Error creating prepared statement.";
    }
    if(move_uploaded_file($tempname,$folder)){
        echo "Photo Uploaded";
    } else{
        echo "Error Uploading Photo";}

}

mysqli_close($conn); // Close the database connection
?>
