
<?php
session_start();
$link = mysqli_connect("localhost", "root", "12345678", "Book");
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 $result = mysqli_query($link, "SELECT * FROM image");

?>

<!DOCTYPE html>
<html>
<head>
<title>Login page </title>
	<script language="JavaScript">
		function validate() {
			var flag;
			flag = 1;
			 isbn =editBook1.txtIsbn.value;
			if (isbn == "") {
				flag = 0
				document.getElementById("error").innerHTML="fill isbn";
			} 
			else{
				   document.getElementById("error").innerHTML="";
			}
			if (flag == 0)
			{
				
				return false;
			}
			else
			{
				return true;
			}
		}
	</script>
<style>
/*
			common for all files.
			-------------------------------------------------------
		*/
		
		header {
			background-color: darkslateblue;
			color: azure;
			margin: 0;
			text-align: center;
			font-size: 20px;
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
			width: 900px;
			margin: 10px auto;
			font-size: 20px;
		}
		
		body form label {
			margin: 4px 0 4px 0;
			margin-top:15px;
			  display: inline-block;
		}
		
		body form input {
			width: 20%;
			height: 30px;
			text-indent: 5px;
		}
		body form button {
			width: 50%;
			margin-top: 5px;
			height: 30px;
			font-size: 20px;
		}
		
		body form input[type="Button"] {
			font-size: 18px;
			width: 15%;
			margin-top:15px;
		}
	
		body form input[type="submit"] {
			width:20%;
			margin-top:15px;
			height: 30px;
			font-size: 20px;
			
		}
		body .buttons {
			position: relative;
			top: 35px;
			left: 1150px
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
		
			
		body form  tr:nth-child(odd){
			background-color: #FFE4C4;
		}
		body form  tr:nth-child(even){
			background-color: #f2f2f2;
		}


		th {
		background-color: darkslateblue;
		color: white;
		padding: 8px;
	}

		
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
<?php
	$username = $_SESSION['username'];
	$sellerInfo = mysqli_query($link, "select sellerId from Seller where mailId = '$username'");

	while ($row = mysqli_fetch_array($sellerInfo)) {
			$sellerId = $row['sellerId'];
	} 
	$bookinfo = mysqli_query($link, "select * from bookinfo where sellerId = '$sellerId'");
?>

<form name ="editBook1" onsubmit="return validate();"action ="editBook.php"method ="post">

<table border="1" cellpadding="2" cellspacing="2">
<tr>
<th>ISBN</th>
<th>Name </th>
<th>Author</th>
<th>Publication</th>
<th>Course</th>
<th>Price</th>
</tr>

<?php
while ($bookRow = mysqli_fetch_array($bookinfo)) {
?>

<tr>
<td><?php echo $bookRow['isbn']?></td>
<td><?php echo $bookRow['bname']?></td>
<td><?php echo $bookRow['author']?></td>
<td><?php echo $bookRow['publication']?></td>
<td><?php echo $bookRow['course']?></td>
<td><?php echo $bookRow['price']?></td>
</tr>
<?php
}
?>
</table>
<div>
<div>
<label>Enert ISBN To Edit Book </label>
	<input type = "text" name = "txtIsbn"/>
	<span style="color:red;" id="error" > </span>
	<input type = "Submit" value = "Edit"/>
		<input type = "button" value = "Add Book" onclick="window.location.href='addBook.php'"/>
	
		<input type = "button" value = "Delete Book" onclick="window.location.href='deleteBook.php'"/>
	</div>
</div>
</form>

</body>
</html>