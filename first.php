
<?php
$link = mysqli_connect("localhost", "root", "12345678", "Book");
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 $result = mysqli_query($link, "SELECT * FROM image");

?>


<html>

<head>
	<title>Online Books</title>
		<style>
		header {
			background-color: darkslateblue;
			color: azure;
			margin: 0;
			text-align: center;
			font-size: 20px;
			padding: 5px;
		}
		
		body {
			background-color: powderblue;
			margin: 0;
		}
		/*
			-------------------------------------------------------
		*/
		
		body .buttons {
			float: right;
			margin: 20px 100px;
		}
		
		body .buttons button {
			font-size: 20px;
		}
		
		body form {
			width: 650px;
			margin: 50px auto;
			font-size: 20px;
		}
		
		body form label {
			font-size: 25px;
			margin: 20px 0 10px 0;
			display: inline-block;
		}
		
		body form input {
			width: 100%;
			height: 20px;
			text-indent: 5px;
		}
		
		body form input[type="submit"] {
			width: 50%;
			margin-top: 20px;
			height: 30px;
			font-size: 20px;
		}
		
		body form input[type="Button"] {
			width: 10%;
			margin-top: 5px;
			height: 30px;
			font-size: 20px;
		}
		
		body form h1 {
			width: 100%;
			margin-top: 10px;
			height: 30px;
			font-size: 30px;
		}
		
		body form h2 {
			width: 100%;
			margin-top: 1px;
			height: 3px;
			font-size: 30px;
		}
		
		body form input[type="radio"] {
			width: 25px;
		}
		
		body form input[type="checkbox"] {
			width: 45px;
		}
		
		body form .semester label {
			width: 150px;
		}
	</style>
		<script type="application/javascript">
		function courseSelected(course) {
			var element = document.getElementById('onlyMCA');
			if (course == 'MBA') {
				element.style.display = 'none';
			} else {
				element.style.display = 'inline-block';
			}
		}
	</script>
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
		<button onclick="window.location.href='signUp.php'">Sign Up </button>
		<button onclick="window.location.href='login.php'"> Login </button>
	</div>
	<div class="lab">
		<h1 style="margin-left: 100px;">Want to sell books...? Sign Up..!</h1>
		<div>
			<form name="books" method="post" action="result.php">
				<div>
					<h1 style="text-align: center;">Second Hand MCA & MBA Books</h1>
				</div>


				<label>Course</label>
				<div>
					<input type="radio" name="Course" value="MCA" id="MCA" checked="checked" onchange="courseSelected('MCA')" />
					<label for="MCA">MCA</label>
					<input type="radio" name="Course" value="MBA" id="MBA" onchange="courseSelected('MBA')" />
					<label for="MBA">MBA</label>
				</div>
				<div>
					<label>Semester</label>
				</div>
				<div class="semester">
					<div>
						<input id="sem1" type="radio" name="sem" value="Semester 1" checked="checked" />
						<label for="sem1">First (I)</label>
						<input id="sem2" type="radio" name="sem" value="Semester 2" />
						<label for="sem2"> Second (II)</label>
						<input id="sem3" type="radio" name="sem" value="Semester 3" />
						<label for="sem3"> Third (III)</label>
					</div>
					<div>
						<input id="sem4" type="radio" name="sem" value="Semester 4" />
						<label for="sem4"> Fourth (IV)</label>
						<span id="onlyMCA">
							<input id="sem5" type="radio" name="sem" value="Semester 5" />
							<label for="sem5"> Fifth (V)</label>
							<input id="sem6" type="radio" name="sem" value="Semester 6" />
							<label for="sem6"> Sixth (VI)</label>
							
						</span>
					</div>

				</div>
				<input type="submit" value="Search" />
	</form>
</body>

</html>