<html>
<body>
<?php
$link = mysqli_connect("localhost", "root", "12345678", "Book");
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
$course1 = $_POST["Course"];
echo $course1;
$sem = $_POST["sem"];
echo $sem;
$imgResult=mysqli_query($link, "select * from image where course='$course1' and semester='$sem'");
?>
<table border = "0" cellpadding="10">

 <tr style ="background-color: black">		
 <?php
while ($imgRow = mysqli_fetch_array($imgResult)) {
			echo " <td> <img src='images/".$imgRow['iname']."' width= '120px' height='150px'></td>";
	}
	?>
</tr>
</table>
</body>
</html>