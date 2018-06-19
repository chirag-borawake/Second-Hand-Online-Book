<%
If Request.Form("submit") = "Submit" Then

	Dim conn
	Set conn = Server.CreateObject("ADODB.Connection")
conn.Open = "PROVIDER = Microsoft.Jet.OLEDB.4.0; data source ='C:\inetpub\wwwroot\Book\Book.mdb'"
	' Accept dynamic number of image files
	Dim i,image,sem,course,ins_image
	i = 1
	course = request.form("Course") 
	sem= request.form("Semester") 
	While (Request.Form("file" & i)) <> ""

	image = Request.Form("file" & i)
	ins_image = "INSERT INTO tbl_images (img,course,semester) VALUES ('"&image&"','"&course&"','"&sem&"')"
	Response.Write(ins_image)
	conn.execute(ins_image)
	i = i + 1

	Wend

conn.Close

If Err.number = 0 Then
	Response.Redirect "addImage.asp?msg=success"
End If

End If


If Request.QueryString("action") = "delete" Then
	Dim con,id
	Set con = Server.CreateObject("ADODB.Connection")
con.Open = "PROVIDER = Microsoft.Jet.OLEDB.4.0; data source ='C:\inetpub\wwwroot\Book\Book.mdb'"
	id = Request.QueryString("id")
	delete_img = "DELETE FROM tbl_images WHERE imgId="&id&""
	con.execute(delete_img)
	con.Close
End If



Dim img_con,rs
Set img_con = Server.CreateObject("ADODB.Connection")
img_con.Open = "PROVIDER = Microsoft.Jet.OLEDB.4.0; data source ='C:\inetpub\wwwroot\Book\Book.mdb'"
Set rs=Server.CreateObject("ADODB.Recordset")
rs.Open "Select * from tbl_images",img_con
%>
<!DOCTYPE html>
<html>
<head>
	<title>Admin Login</title>
	<script language="JavaScript">
		function validate() {
			var flag;
			flag = 1;
			Semester = addImage.Semester.value;
			if(Semester == "select"){
			flag = 0;
				document.getElementById("error").innerHTML="select semester  "
			}
			else{
				   document.getElementById("error").innerHTML=""
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

</head>

<style type="text/css">
	body .upload {
		float: left;
		width: 50%;
	}
	
	body .delete {
		float: right;
		width: 50%;
	}
	
	body h2 {
		font-size: 30px;
	}
	
	body form {
		width: 100%;
		font-size: 20px;
		padding: 0 50px;
	}
	
	body {
		background-color: powderblue;
		margin: 0;
	}
	
	body form input {
		width: 100%;
		height: 20px;
		text-indent: 5px;
	}
	
	body form label {
		font-size: 25px;
		margin: 10px 0 10px 0;
		display: inline-block;
		width: 150px;
		text-align: right;
		margin-right: 30px;
	}
	
	body form span label {
		text-align: left;
		width: 100px;
	}
	
	body .buttons {
		width: 100%;
		margin-top: 50px;
	}
	
	body .buttons button {
		font-size: 20px;
		position: relative;
		left: 90%;
	}
	
	body form input[type="submit"] {
		width: 25%;
		margin-top: 6px;
		margin-bottom: 10px;
		margin-left: 185px;
		height: 27px;
		font-size: 17px;
	}
	
	body form input[type="file"] {
		width: 50%;
		margin-top: 6px;
		margin-bottom: 10px;
		font-size: 14px;
	}
	
	body form input[type="radio"] {
		width: 25px;
	}
	
	body form select {
		width: 20%;
		margin-top: 6px;
		margin-bottom: 10px;
		height: 30px;
		font-size: 14px;
	}
	
	body .delete table {
		border-collapse: collapse;
		width: 90%;
		padding: 10px 50px;
	}
	
	body table td input[type="button"] {
		width: 90%;
		height: 80%;
	}
	
	body tr:nth-child(even) {
		background-color: #f2f2f2
	}
	
	body tr:nth-child(odd) {
		background-color: #f4f4f4
	}
	
	th {
		background-color: darkslateblue;
		color: white;
		padding: 8px;
	}
	
</style>


<body>
	<div class="buttons">
		<button onclick="window.location.href='Login.asp'">Log Out</button>
	</div>
	<div class="upload">
		<form name="addImage" onsubmit="return validate();" method="POST">
			<h2>Upload Images</h2>
			<div>
				<label> Image 1 :</label>
				<input type="file" name="file1" accept="image/*">
			</div>
			<div>
				<label> Image 2 :</label>
				<input type="file" name="file2" accept="image/*">
			</div>
			<div>
				<label> Image 3 :</label>
				<input type="file" name="file3" accept="image/*">
			</div>
			<div>
				<label> Image 4 :</label>
				<input type="file" name="file4" accept="image/*">
			</div>
			<div>
				<label> Image 5 :</label>
				<input type="file" name="file5" accept="image/*">
			</div>
			<div>
				<label>Course : </label>
				<span>
				<input type="radio" name="Course" value="MCA" id="MCA" checked="checked" />
				<label for="MCA">MCA</label>
				<input type="radio" name="Course" value="MBA" id="MBA" />
				<label for="MBA">MBA</label>
			</span>
				<div>
					<label>Semester : </label>
					<select name="Semester">
						<Option value="select">Select</option>
						<Option value="Semester 1"> Semester 1</option>
						<Option value="Semester 2"> Semester 2</option>
						<Option value="Semester 3"> Semester 3</option>
						<Option value="Semester 4"> Semester 4</option>
						<Option value="Semester 5"> Semester 5</option>
						<Option value="Semester 6"> Semester 6</option>
					</select>
					<span style="color:red;" id="error"> </span>
				</div>

				<input type="submit" name="submit">
				
	<div id="info">
		<%
		If Request.QueryString("msg") = "success" Then
			Response.Write("<b>Image(s) inserted successfully</b>")
		End If 
		%>
	</div>
			</div>
		</form>
	</div>

<% If NOT rs.EOF Then %>
<div class="delete">
<h2>Delete Images</h2>
<table border="1" cellpadding="2" cellspacing="2">
	<tr align="center">
		<th>Image</th>
		<th>Image Path</th>		
		<th>Action</th>
	</tr>

<%	While Not rs.EOF %>
	
	<tr align="center">
		
		<td><img src="images/<%=rs(1)%>" width="50px" height="50px"></td>
		<td><a href="images/<%=rs(1)%>">view image</a></td>
		<td><input type="button" name="delete" onclick="window.location.href='addImage.asp?action=delete&id='+<%=rs(0)%>" value="Delete"></td>
	</tr>
<%	rs.MoveNext
 	Wend 
	rs.Close
	img_con.Close
%>

</table>
</div>
<%	End if %>
</form>
</body>
</html>