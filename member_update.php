<html>
<head>
<link rel = "stylesheet" href = "stylesheet.css">
<title>LIBRARY Read 2gether</title>
<style>

.button1 {
  background-color: #18508C;
  border: none;
  color: white;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin-left: -160px ;
  cursor: pointer;
}

.button2 {
  background-color: #FF0000;
  border: none;
  color: white;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin-left: -100px ;
  cursor: pointer;
}

#title
{
font-size: 25px;
font-family: Tv Cen MT Condensed;
font-weight: bold;
text-align: center;
}

table {
	border: none;
	margin: auto;
	font-family: Tw Cen MT;
	font-size: 20px;
}
</style>
</head>
<body>

<?php
//Connect to database
include ('db_conn.php');
include ("header.html");
?>
<div id="title"><p>Library Read 2gether<p>Update Member Details</div>

<div class="container center">
<div style="display: flex">
<div style="margin-left: 400px;">
<div style="width: 600px;">
<div class="book-contents" style="border: 1px #000 solid; border-radius: 20px;  padding: 30px">

<table cellpadding=6px>
<tr>
<td></td>
<td></td>
<td style="width: 30px"></td>
</tr>


<tr>
<td></td>
<td> First Name :</td>
<div class="search">
<td><input type="text"></td>
</div>
<td></td>
</tr>

<tr>
<td></td>
<td>Last Name :</td>
<td><input type="text"></td>
<td></td>
</tr>

<tr>
<td></td>
<td>Gender :</td>
<td><input type="text" ></td>
<td></td>
</tr>

<tr>
<td></td>
<td> Address :</td>
<div class="search">
<td><input type="text"></td>
</div>
<td></td>
</tr>

<tr>
<td></td>
<td>Contact :</td>
<td><input type="text" ></td>
<td></td>
</tr>
<tr>
<td></td>
<td>Year Level :</td>
<td><input type="text" ></td>
<td></td>
</tr>
<tr>
<td></td>
<td>Status :</td>
<td><input type="text" ></td>
<td></td>
</tr>


<tr>
<td></td>
<td></td>
<td><input type="submit" value="Update" name="update" class="button1" form method="POST" form action="book_delete.php"></td>
<td><button class="button2"><a href="book_delete.php" style="color:white">Cancel</a></button></td>
<td></td>
</tr>

</table>

</div>
</div>
</div>
</div>

</form>
</div>
</body>
</html>