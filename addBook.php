<html>
<head><title>Add page </title>
<script language="JavaScript">
		function validate() {
			var flag;
			flag = 1;
			 isbn = addBook.txtIsbn.value;
			 bname = addBook.txtName.value;
			 author = addBook.txtAuthor.value;
			 pub = addBook.txtPublication.value;
			 price = addBook.txtPrice.value;
			 Semester = addBook.Semester.value;
			 var number = /^[0-9]+$/;
			if (!(isbn==parseInt(isbn,10))) {
				flag = 0;
				document.getElementById("error").innerHTML="invalid isbn "
			}
			else{
				   document.getElementById("error").innerHTML=""
			}
			 if (bname == "") {
				
				flag = 0;
			   document.getElementById("error1").innerHTML="fill book name "
			}
			else if (/[^a-z A-Z\-]/.test(bname)) {
				flag = 0;
				document.getElementById("error1").innerHTML="invalid book name "
			}
			else{
				   document.getElementById("error1").innerHTML=""
			}
			if (author == "") {
				flag = 0;
				document.getElementById("error2").innerHTML="fill author name"
			} else if (/[^a-z A-Z\-]/.test(author)) {
				flag = 0;
				document.getElementById("error2").innerHTML="invalid author name "
			}
			else{
				   document.getElementById("error2").innerHTML=""
			}
			if (pub == "") {
				
				flag = 0;
			   document.getElementById("error3").innerHTML="fill publication "
			}
			else if (/[^a-z A-Z\-]/.test(pub)) {
				flag = 0;
				document.getElementById("error3").innerHTML="invalid publication "
			}
			else{
				   document.getElementById("error3").innerHTML=""
			}
			 var number = /^[0-9]+$/;
			if (!(price==parseInt(price,10))) {
				flag = 0;
				document.getElementById("error4").innerHTML="invalid price "
			}
			else{
				   document.getElementById("error4").innerHTML=""
			}
			if(Semester == "select"){
			flag = 0;
				document.getElementById("error5").innerHTML="select sem  "
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
			height:30px;
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
		body .buttons {
			float: right;
			margin: 20px 100px;
		}
		
		body .buttons button {
			font-size: 20px;
		}
		body form select{
			width:50%;
			margin-top:6px;
			margin-bottom:10px;
			height: 25px;
			font-size: 18px;
		
		}
	</style>
	</head>
<body>

<div class="buttons">
		<button onclick="window.location.href='first.php'">Log Out </button>
		<button onclick="window.location.href='first.php'"> Home </button>
	</div>
<form name = "addBook" onsubmit="return validate();" action = "addBookphp.php" method = "post">
<div>
	
<label>ISBN </label>
<div> 
	<input type = "text" value = "" name = "txtIsbn"/>
	<span style="color:red;" id="error" > </span>
</div>
<label>Name </label>
	<div><input type = "text" value = "" name = "txtName"/>
	<span style="color:red;" id="error1" > </span>
</div>
<label>Author</label>
<div>
	<input type = "text" value = ""name = "txtAuthor"/>
	<span style="color:red;" id="error2" > </span>
</div>
<label>Publication</label>
<div>
<input type = "text" value = ""name = "txtPublication"/>
<span style="color:red;" id="error3" > </span>
</div>
<label>Price</label>
<div>
<input type = "text" value = ""name = "txtPrice"/>
<span style="color:red;" id="error4" > </span>
</div>
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
			<label>Semester</label>
			<select name ="Semester">
				<Option value ="select">Select</option>
				<Option value ="Semester 1"> Semester 1</option>
				<Option value ="Semester 2"> Semester 2</option>
				<Option value ="Semester 3"> Semester 3</option>
				<Option value ="Semester 4"> Semester 4</option>
				<Option value ="Semester 5"> Semester 5</option>
				<Option value ="Semester 6"> Semester 6</option>
			</select>
			<span style="color:red;" id="error5" > </span>
		</div>
	<div>
		<input type = "Submit" value = "Add Book"/>
	</div>
	<div>
		<input type = "button" value = "Edit" onclick="window.location.href='showBooks.php'"/>
	
		<input type = "button" value = "Delete" onclick="window.location.href='deleteBook.php'"/>
	</div>
</div>
</form>
</body>
</html>
        