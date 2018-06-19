<?php 
$link = mysqli_connect("localhost", "root", "12345678", "Book");
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
	$name = $_POST["txtFName"];
	$lastName= $_POST["txtLName"];
	$gender= $_POST["gender"];
	$contact = $_POST["txtConNo"];
	$mailId = $_POST["txtEmail"];
	$password = $_POST["txtPass"]; 
	$strSql ="INSERT INTO seller(fname,lname,gender,contact,mailId,password)VALUES ('$name','$lastName','$gender','$contact','$mailId','$password')";
if(mysqli_query($link, $strSql)){
    header("Location:login.php");
} else{
    echo "ERROR: Could not able to execute $strSql. " . mysqli_error($link);
}
?>