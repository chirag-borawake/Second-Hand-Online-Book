
<?php
session_start();
$link = mysqli_connect("localhost", "root", "12345678", "Book");
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 $result = mysqli_query($link, "SELECT * FROM image");
if(isset($_POST['delete'])){
	$isbn = $_POST['isbn'];
	$strSql ="DELETE FROM `bookinfo` WHERE isbn = $isbn";

	if ($link->query($strSql) === TRUE) {
		header("location:deleteBook.php");
	} else {
		echo "Error deleting record: " . $conn->error;
	}
}

?>
<?php 
   if (isset($_POST["zero"]))
   {

    echo $_POST["zero"];
}
?>
<html>
<head>
<style>/*
			common for all files.
			-------------------------------------------------------
		*/
		
		header {
			background-color: darkslateblue;
			color: azure;
			margin: 0;
			text-align: center;
			font-size: 30px;
			padding: 10px;
		}
		

		body {
			background-color: powderblue;
			margin: 0;
		}
		/*
			-------------------------------------------------------
		*/
		
		body form {
			width: 1000px;
			margin: 10px auto;
			font-size: 20px;
		}
		
		body form label {
			margin: 4px 0 4px 0;
			margin-top:15px;
			  display: inline-block;
		}
		
		body form input {
			width: 30%;
			height: 30px;
			text-indent: 5px;
		}
		body form button {
			width: 100%;
			margin-top: 5px;
			height: 30px;
			font-size: 20px;
		}
		
		body form input[type="Button"] {
			font-size: 18px;
			width: 20%;
			margin-top:15px;
		}
	
		body form input[type="submit"] {
			width:100%;
			margin-top:1px;
			margin-top:1px;
			height: 30px;
			font-size: 20px;
			
		}
		body .buttons {
			position: relative;
			top: 35px;
			left: 1180px
		}
		body .buttons button {
			font-size: 20px;
		}
		body form table {
			border-collapse: collapse;
			width: 100%;
		}
		
				body form th, td {
		text-align: left;
			padding: 8px;
			font-size:20;
        }

		body form  tr:nth-child(even){
			background-color: #f2f2f2
			}
			
		body form tr:nth-child(odd){
				background-color: #FFE4C4
			}

				th {
		background-color: darkslateblue;
		color: white;
		padding: 8px;



</style>
</head>
<body>

	<header>
	
	<marquee  behavior="scroll" direction="left">
	<?php
	while ($row = mysqli_fetch_array($result)) {
			echo "  <img src='images/".$row['iname']."' width= '120px' height='150px'>";
	}
	?>
	
	
	</marquee>	
</header>
<div class="buttons">
		<button onclick="window.location.href='first.php'">Log Out </button>
	</div>
<?PHP

$username = $_SESSION["username"];
$result = mysqli_query($link, "select sellerId from Seller where mailId = '$username'");

	while ($row = mysqli_fetch_array($result)) {
			$sellerId = $row['sellerId'];
	} 
	$bookinfo=mysqli_query($link,"select * from bookinfo where sellerId = '$sellerId'");
?>

<table border = "1">
<tr>
<th>ISBN</th>
<th>Name </th>
<th>Author</th>
<th>Publication</th>
<th>Course</th>
<th>Price</th>
<th>Action</th>
</tr>
<?php
	while ($bookRow = mysqli_fetch_array($bookinfo)) {
?>
<tr>
<form name = "deleteBook" action ="" method ="post">
<td><?php echo $bookRow['isbn']?></td>
<td style="display: none;"><input type="text" value="<?php echo $bookRow['isbn']?>" name="isbn"> </input><?php echo $bookRow['isbn']?></td>
<td><?php echo $bookRow['bname']?></td>
<td><?php echo $bookRow['author']?></td>
<td><?php echo $bookRow['publication']?></td>
<td><?php echo $bookRow['course']?></td>
<td><?php echo $bookRow['price']?></td>
<td><input type="submit" name="delete" value="Delete">
</form>
</tr>
<?php
}
?>
</table>
<div>

<div>
		<input type = "button" value = "Add Book" onclick="window.location.href='addBook.php'"/>
	
		<input type = "button" value = "Edit Book" onclick="window.location.href='showBooks.php'"/>
	</div>
</div>


</body>
</html>
        