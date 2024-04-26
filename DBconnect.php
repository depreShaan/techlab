<?php

$servername="localhost";
$username= "root";
$password="";
$dbname="techlab";

$sql="";
$conn=new mysqli($servername,$username,$password);
if($conn->connect_error){
	die("Conncetion failed:" .$conn->connect_error);
}

else{
	mysqli_select_db($conn, $dbname);
	echo "connection successful";
}

?>