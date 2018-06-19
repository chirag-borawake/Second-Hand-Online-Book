
<?php
session_start();
$link = mysqli_connect("localhost", "root", "12345678", "Book");
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 $result = mysqli_query($link, "SELECT * FROM image");

?>

<html>
<head>
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
			font-size: 50px;
			padding: 3px;
		}
		
		body {
			background-color: powderblue;
			margin: 0;
		}
		/*
			-------------------------------------------------------
		*/
		
		body form {
			width: 250px;
			margin: 20px auto;
			font-size: 20px;
		}
		
		body form label {
			font-size: 25px;
			margin: 10px 0 4px 0;
			  display: inline-block;
		}
		
		body form input {
			width: 100%;
			height:35px;
			text-indent: 5px;
		}
		
		body form input[type="radio"] {
			width: 25px;
		}
		
		body form input[type="Button"] {
			font-size: 18px;
			width: 49%;
			margin-top:15px;
		}
		
		
		body form input[type="submit"] {
			width:100%;
			margin-top:15px;
			height: 30px;
			font-size: 20px;
			
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
	?>	</marquee>	
</header>
<?php

$isbn = $_POST["txtIsbn"];
$int=(int)$isbn;
$bookinfo = mysqli_query($link,"select * from Bookinfo where isbn =$isbn");
?>
<form name = "editBook" action ="editBookPhp.php"method ="post">
	<?php
		$_SESSION['editIsbn']= $isbn;
	?>
	
<div>
<label>ISBN </label>
<div> 
<?php
	while ($bookRow = mysqli_fetch_array($bookinfo)) {
?>
	<input type = "text" value = "<?php echo $bookRow['isbn']?>" name = "txtIsbn"/>
</div>
<label>Name </label>
	<div><input type = "text" value = "<?php echo $bookRow['bname']?>" name = "txtName"/>
</div>
<label>Author</label>
<div>
	<input type = "text" value = "<?php echo $bookRow['author']?>"name = "txtAuther"/>
</div>
<label>Publication</label>
<div>
<input type = "text" value = "<?php echo $bookRow['publication']?>"name = "txtPublication"/>
</div>
<label>Price</label>
<div>
<input type = "text" value = "<?php echo $bookRow['price']?>"name = "txtPrice"/>
</div>
	<?php 
	
	}
	?>
      <label>Course</label>
       <div>
          <input type = "radio"
                 name = "Course"
				 value = "MCA"
                 id = "MCA"
				 checked = "checked"				 
		  />
          <label for = "MCA">MCA</label>
          <input type = "radio"
                 name = "Course"
				 value = "MBA"
                 id = "MBA"
           />
          <label for = "MBA">MBA</label>
        </div>   
	<div>
		<input type = "submit" onsubmit ="return" value = "Update"/>
	</div>
</div>	
</form>

</body>
</html>
        