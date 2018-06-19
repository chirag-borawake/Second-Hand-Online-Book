
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
	<title>Sign Up</title>
	<script language="JavaScript">
		function validate() {
			var flag;
			flag = 1;
			fname = sigup.txtFName.value;
			lname = sigup.txtLName.value;
			cno = sigup.txtConNo.value;
			eid = sigup.txtEmail.value;
			password = sigup.txtPass.value;
			rpassword = sigup.txtRPass.value;
			if (fname == "") {
				
				flag = 0;
			   document.getElementById("error").innerHTML="fill name "
			}
			else if (/[^a-z A-Z\-]/.test(fname)) {
				flag = 0;
				document.getElementById("error").innerHTML="invalid name "
			}
			else{
				   document.getElementById("error").innerHTML=""
			}
			if (lname == "") {
				flag = 0;
				document.getElementById("error1").innerHTML="fill last name"
			} else if (/[^a-z A-Z\-]/.test(lname)) {
				flag = 0;
				document.getElementById("error1").innerHTML="invalid last name "
			}
			else{
				   document.getElementById("error1").innerHTML=""
			}
			var mob = /^[1-9]{1}[0-9]{9}$/;
			if (mob.test(cno) == false) {
				flag = 0;
				document.getElementById("error2").innerHTML="invalid contact number "
			}
			else{
				   document.getElementById("error2").innerHTML=""
			}
			var atpos = eid.indexOf("@");
			var dotpos = eid.lastIndexOf(".");
			if (atpos<1 || dotpos<atpos+2 || dotpos+2>=eid.length) {
				flag = 0;
				document.getElementById("error3").innerHTML="invalid email id"
			}
			else{
				   document.getElementById("error3").innerHTML=""
			}
			if (password == "") {
				flag = 0;
				document.getElementById("error4").innerHTML="fill password "
			}
			else{
				   document.getElementById("error4").innerHTML=""
			}
			if (password != rpassword) {
				flag = 0;
				document.getElementById("error5").innerHTML="password and re-password not match"
			}
			else{
				   document.getElementById("error5").innerHTML=""
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
			width: 300px;
			margin: 10px auto;
			font-size: 20px;
		}
		
		body form label {
			margin: 4px 0 4px 0;
			  display: inline-block;
		}
		
		body form input {
			width: 100%;
			height: 30px;
			text-indent: 5px;
		}
		
		body form input[type="radio"] {
			width: 25px;
		}
		
		body form button {
			width: 100%;
			margin-top: 5px;
			height: 30px;
			font-size: 20px;
		}
		body .buttons {
			float: right;
			margin: 20px 100px;
		}
		
		body .buttons button {
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
		<button onclick="window.location.href='first.php'"> Home </button>
	</div>

	<form name="sigup" onsubmit="return validate();" action="signUpPhp.php" method="post">
		<div>
			<label>First Name</label>
			<div>
				<input type="text" value ="" name="txtFName">
				<span style="color:red;" id="error" > </span>
			</div>
			<label>Last Name</label>
			<div>
				<input type="text" name="txtLName">
				<span style="color:red;" id="error1" > </span>
			</div>

			<label>Gender</label>
			<div>
				<input type="radio" name="gender" id="Male" value="Male" checked="checked" />
				<label for="Male">Male</label>

				<input type="radio" name="gender" value="Female" id="Female" />
				<label for="Female">Female</label>
			</div>

			<label>Mobile</label>

			<div>
				<input type="text" name="txtConNo">
				<span style="color:red;" id="error2" > </span>
			</div>

			<label>Email</label>
			<div>
				<input type="text" name="txtEmail">
				<span style="color:red;" id="error3" > </span>
			</div>
			<label>Password</label>
			<div>
				<input type="password" name="txtPass">
			<span style="color:red;" id="error4" > </span>
			</div>
			<label>Re-enter Password</label>
			<div>
				<input type="password" name="txtRPass">
				<span style="color:red;" id="error5" > </span>
			</div>
			<br>
			<button type="Submit">Submit</button>

		</div>
	</form>
</body>

</html>