<html>
<head>
<style>
		table {
			margin-top:5px;
		}
		th, td {
		text-align: left;
			padding: 8px;
			font-size:17;
        }

		body .buttons {
			position: relative;
			top: 43px;
			left: 950px
		}
		body .buttons button {
			font-size: 20px;
		}
		
		body {
			background-color: #2F4F4F	;
			margin: 0;
		}
		body {
			width: 850px;
			margin: 10px auto;
			font-size: 20px;
		}
		body   tr:nth-child(even){
			background-color: #f2f2f2
			}
			
		body  tr:nth-child(odd){
				background-color: #FFE4C4
			}
		

</style>
</head>
<body>
<?php

$link = mysqli_connect("localhost", "root", "12345678", "Book");
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
$course = $_POST["Course"];
$sem = $_POST["sem"];
echo 
$result = mysqli_query($link, "select seller.name,price,contact from bookInfo,seller where course='$course' and semester='$sem' and AddBook.sellerId = seller.sellerId ");

$imgResult=mysqli_query($link, "select * from image where course='$course' and semester='$sem'");

$sellerresult=mysqli_query($link, "select DISTINCT fname,lname,contact,seller.sellerId,bookInfo.sellerId from seller,bookInfo where course='$course' and semester='$sem' and bookInfo.sellerId = seller.sellerId");

?>

<div class="buttons">
		<button onclick="window.location.href='first.php'"> Home </button>
	</div>
<table border = "0" cellpadding="10">

 <tr style ="background-color: black">		
 <?php
while ($imgRow = mysqli_fetch_array($imgResult)) {
			echo " <td> <img src='images/".$imgRow['iname']."' width= '120px' height='150px'></td>";
	}
	?>
</tr>
</table>

<?php
while ($sellRow = mysqli_fetch_array($sellerresult)) {
?>
<table style ="border-collapse: collapse;">
	<tr>
		<th style="background-color: #D2691E;color:White; font-size:20"><?php echo $sellRow['fname']?></td>
		<th style="background-color: #D2691E;color:White; font-size:20"><?php echo $sellRow['lname']?></td>
		<th style="background-color: #D2691E;color:White; font-size:20">:<?php echo $sellRow['contact']?></td>
		<?php 
		$sId = $sellRow['sellerId'];
		?>
	</tr>
</table>
<table border ="1"style ="border-collapse: collapse;width: 100%;" >
		<tr>
			<th style="background-color: darkslateblue;color: white;">Book Name</th>
			<th style="background-color: darkslateblue;color: white;">Author</th>
			<th style="background-color: darkslateblue;color: white;">Publication</th>
			<th style="background-color: darkslateblue;color: white;">Price</th>
		</tr>
		<?php
		$bookResult= mysqli_query($link,"select bname,author,publication,price from bookInfo where sellerId = $sId and  course = '$course' and semester = '$sem'");
		while ($BookRow = mysqli_fetch_array($bookResult)) {
		?>
	
	<tr>		
		<td ><?php echo $BookRow['bname']?></td>
		<td ><?php echo $BookRow['author']?></td>
		<td ><?php echo $BookRow['publication']?></td>
		<td ><?php echo $BookRow['price']?></td>
	</tr>
<?php
}
?>
	
<?php
}
?>
</table>

</body>
</html>
