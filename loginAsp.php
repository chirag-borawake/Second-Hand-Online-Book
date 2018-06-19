<%@language="VBScript"%>
<html>
<body>
<%
Dim conn,username,password,flag
flag = 1
username = request.Form("txtUsername")
password = request.Form("txtPassword")
set conn = Server.CreateObject("ADODB.Connection")
conn.Open = "PROVIDER = Microsoft.Jet.OLEDB.4.0; data source ='C:\inetpub\wwwroot\Book\Book.mdb'"
dim rs 
set rs = Server.CreateObject("ADODB.RecordSet")
rs.open "select * from Seller",conn
while Not rs.EOF
if(username=rs(5) and password = rs(6)) then
session("username")=username
Response.Redirect "addbook.asp"
end if 

if(username="admin" and password = "admin") then
Response.Redirect "addImage.asp"
end if 
rs.Movenext()
wend
Response.Redirect "Login.asp"	
rs.close
%>
</body>
</html>