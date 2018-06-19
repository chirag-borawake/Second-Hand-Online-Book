<%@language="VBScript"%>
<html>
<body>
<%
Dim conn,isbn
isbn= request.form("txtIsbn")
set conn = Server.CreateObject("ADODB.Connection")
conn.Open = "PROVIDER = Microsoft.Jet.OLEDB.4.0; data source ='C:\inetpub\wwwroot\Book\Book.mdb'"
dim rs 
set rs = Server.CreateObject("ADODB.RecordSet")
rs.open "delete * from AddBook where isbn = "&isbn,conn
Response.Redirect "deleteBook.asp"
%>