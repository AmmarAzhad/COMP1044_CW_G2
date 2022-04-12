<html>
<head>
<title>Library Read 2gether</title>
<!-- INTERNAL CSS -->
<style>

#tajuk
{
font-size: 25px;
font-weight: bold;
text-align: center;
}
input[type=text]{
	width: 250px;
}
input[type=tel]{
	width: 250px;
}
table{
border: 2px solid #18508C;
border-collapse: collapse;
margin: auto;
color: white;
background-color: #18508C; 
}
table, td {
text-align: left;
}
</style>
</text>
<body>
<?php
include("header.html");

//include("footer.html");
?>
<div id="tajuk"><p>Library Read 2gether <p>Register New Book</div>

<form action="book_add_back.php" method="POST">
<table cellpadding=5px>
<tr>
<td style="width: 20px"></td>
<td></td>
<td></td>
<td style="width: 20px"></td>
</tr>
<tr>
<td colspan="4"></td>
</tr>
<tr>
<td></td>
<td> Book Title:</td>
<td><input type="text" placeholder="Fantastic Pets" name="i_booktitle" required></td>
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
<td colspan="4"></td>
</tr>
<tr>
<tr>
<td></td>
<td colspan="2"><input type="submit" name="loginBtn" value="Submit" class="submitbtn"></td>
<td></td>
</tr>
<tr>
<td colspan="4"></td>
</tr>
<tr>
<td colspan="4"></td>
</tr>
</table>

</form>
<?php
//include("sidemenu.php");
?></body>
</html>