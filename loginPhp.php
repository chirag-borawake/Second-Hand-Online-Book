<?php
session_start();
$link = mysqli_connect("localhost", "root", "12345678", "Book");
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
$username = $_POST["txtUsername"];
$password = $_POST["txtPassword"];
$sql = "select * from Seller";

$result = $link->query($sql);
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        if ($row["mailId"] == $username and $row["password"] == $password ){
			$_SESSION['username'] = $username;
			 header("Location:bookfunctions.php");
		}
    }
} 

// while Not rs.EOF
// if(username=rs(5) and password = rs(6)) then
// session("username")=username
// Response.Redirect "addbook.php"
// end if 

// if(username="admin" and password = "admin") then
// Response.Redirect "addImage.php"
// end if 
// rs.Movenext()
// wend
// Response.Redirect "Login.php"	
// rs.close
?>
