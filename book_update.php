<html>
<head>
<link rel = "stylesheet" href = "stylesheet.css">
<title>LIBRARY Read 2gether</title>
<style>
.button {
  background-color: #18508C;
  border: none;
  color: white;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin-right: 40px ;
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

<!--<form action="book_add_back.php" method="POST">-->


<div id="title"><p>Library Read 2gether<p>Update Book Details</div>

<div class="container center">
<div style="display: flex">
<div style="margin-left: 400px;">
<div style="width: 500px;">
<div class="book-contents" style="border: 1px #000 solid; border-radius: 20px;  padding: 30px">

<table cellpadding=6px>
<tr>
<td></td>
<td></td>
<td style="width: 30px"></td>
</tr>

<tr>
<td></td>
<td> Book ID:</td>
<td><input class = "input" type="text" name="i_bookid" required></td>
</div>
<td></td>
</tr>

<tr>
<td></td>
<td> Book Title:</td>
<div class="search">
<td><input class = "input" type="text" placeholder="Fantastic Pets" name="i_booktitle" required></td>
</div>
<td></td>
</tr>

<tr>
<td></td>
<td>Author :</td>
<td><input type="text" name="i_author" required></td>
<td></td>
</tr>

<tr>
<td></td>
<td>Book Copies :</td>
<td><input type="text" name="i_bookcopies" required></td>
<td></td>
</tr>
<tr>
<tr>
<td></td>
<td>Book Publisher Company :</td>
<td><input type="text" placeholder="Regency Publishing Group" name="i_bookpub" required></td>
<td></td>
</tr>
<tr>
<td></td>
<td>Publisher Name :</td>
<td><input type="text" placeholder="0174371312" name="'i_pubname" required></td>
<td></td>
</tr>
<tr>
<td></td>
<td>ISBN :</td>
<td><input type="text" placeholder="0-12-345678-9" name="i_isbn" required></td>
<td></td>
</tr>
<tr>
<td></td>
<td>Copyright Year :</td>
<td><input type="text" name="i_copyrightyear" required></td>
<td></td>
</tr>
<tr>
<td></td>
<td>Date Added :</td>
<td><input type="date" placeholder="0174371312" name="i_dateadded" required></td>
<td></td>
</tr>
<tr>
<td></td>
<td>Status :</td>
<td><select name = "i_status">
	<option value = "New">New</option>
	<option value = "Old">Old</option>
	<option value = "Damaged">Damaged</option>
	<option value = "Lost">Lost</option>
	<option value = "Archieved">Archieved</option>
</td>
</tr>
<tr>
<td></td>
<td></td>
<td><input type="button" class="button" value="Modify"></td>
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