<?php
	session_start();
	$editIsbn1 = $_SESSION['editIsbn'];
	$isbn = $_POST["txtIsbn"];
	$name = $_POST["txtName"];
	$author = $_POST["txtAuther"];
	$publication = $_POST["txtPublication"];
	$course = $_POST["Course"];
	$price =  $_POST["txtPrice"]; 
	$link =mysqli_connect("localhost","root","12345678","Book");
	
$strSql ="UPDATE Bookinfo SET isbn='$isbn', bname='$name',author ='$author',publication='$publication',course='$course',price = '$price'WHERE isbn = $editIsbn1";
if(mysqli_query($link, $strSql)){
    header("Location:showBooks.php");
} else{
    echo "ERROR: Could not able to execute $strSql. " . mysqli_error($link);
}

?>