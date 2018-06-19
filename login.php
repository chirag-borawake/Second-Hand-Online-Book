
<?php
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
			username = login.txtUsername.value;
			password = login.txtPassword.value;
			if (username == "") {
				flag = 0;
				document.getElementById("error").innerHTML = "enter username."
			} else {
				document.getElementById("error").innerHTML = "";
			}
			if (password == "") {
				flag = 0;
				document.getElementById("error1").innerHTML = "enter password."
				return false;
			} else {
				document.getElementById("error1").innerHTML = "";
				return true;
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
		header {
			background-color: darkslateblue;
			color: azure;
			margin: 0;
			text-align: center;
			font-size: 10px;
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
			 width: 300px;
			margin: 100px auto;
			font-size: 20px;
		}
		
		body form label {
			margin: 30px 0 8px 0;
			display: inline-block;
		}
		body .buttons {
			float: right;
			margin: 20px 100px;
		}
		
		body .buttons button {
			font-size: 20px;
		}
		body form input {
			width: 100%;
			height: 30px;
			text-indent: 5px;
		}
		
		body form input[type="submit"] {
			margin-top: 20px;
		}
		
		body form button {
			width: 100%;
			margin-top: 5px;
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
	?>
	</marquee>	
</header>
<div class="buttons">
		<button onclick="window.location.href='signUp.php'">Sign Up </button>
		<button onclick="window.location.href='first.php'"> Home </button>
	</div>
	
	<form name="login" onsubmit ="return validate();"action="loginPhp.php" method="post">
		<div>
			<label>Username</label>
			<div>
				<input type="text" name="txtUsername" placeholder ="mailid is your username">
			</div>
			<div>
				<span style="color:red;" id="error"> </span>
			</div>
			
			<label>Password</label>

			<div>
				<input type="password" name="txtPassword">
			</div>
				<span style="color:red;" id="error1"> </span>
			<div>
				<button type="submit">Login</button>
			</div>
		</div>
	</form>
</body>

</html>