<?php
	session_start();
	$link = mysqli_connect("localhost", "root", "12345678", "Book");
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
	$isbn = $_POST["txtIsbn"];
	$name = $_POST["txtName"];
	$author = $_POST["txtAuthor"];
	$publication = $_POST["txtPublication"];
	$price = $_POST["txtPrice"];
	$course = $_POST["Course"]; 
	$sem= $_POST["Semester"]; 
	$username = $_SESSION['username'];
	
	$result = mysqli_query($link, "select sellerId from Seller where mailId = '$username'");

	while ($row = mysqli_fetch_array($result)) {
			$sellerId = $row['sellerId'];
	} 
	
$strSql ="INSERT INTO BookInfo(isbn,bname,author,publication,course,price,semester,sellerId) VALUES ('$isbn','$name','$author','$publication','$course','$price','$sem','$sellerId')";
if(mysqli_query($link, $strSql)){
    header("Location:addBook.php");
} else{
    echo "ERROR: Could not able to execute $strSql. " . mysqli_error($link);
}
?>
