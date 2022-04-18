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


if(isset($_POST['update'])){
$book_title=$_POST['i_booktitle'];
$category_id =$_POST['i_categoryid'];
$author =$_POST['i_author'];
$book_copies =$_POST['i_bookcopies'];
$book_pub =$_POST['i_bookpub'];
$publisher_name =$_POST['i_pubname'];
$isbn =$_POST['i_isbn'];
$copyright_year =$_POST['i_copyrightyear'];
$date_added =$_POST['i_dateadded'];
$status =$_POST['i_status'];

//Simpan data dalam DB
$mysql = "UPDATE `book` SET i_booktitle='$book_title', i_categoryid='$category_id', i_author='$author', i_bookcopies='$book_copies', i_bookpub='$book_pub', i_pubname='$publisher_name', i_isbn='$isbn', i_copyrightyear='$copyright_year', i_dateadded='$date_added' , i_status='$status'";
if (mysqli_query($conn, $mysql)) {
	//papar javascript alert jika pengguna baru berjaya daftar
	echo '<script type="text/javascript">;
	alert("Updated Successfully!");
		 window.location.href="book_delete.php";</script>';
		 //selepas berjaya daftar, kembali ke login page
		 
} 
else {
	echo "Error ; " . mysqli_error($conn);
}
}
?>

<?php
$id = $_GET['updateid'];
$query = "SELECT * FROM book WHERE book_id = $id";
$mysql = $query;
$result = mysqli_query($conn, $mysql) or die(mysql_error());
$row = mysqli_fetch_assoc($result);
$book_title = $row['book_title'];
$author = $row['author'];
$book_copies = $row['book_copies'];
$book_pub = $row['book_pub'];
$publisher_name = $row['publisher_name'];
$isbn = $row['isbn'];
$copyright_year = $row['copyright_year'];
$date = $row['date_added'];

?>

<div id="title"><p>Library Read 2gether<p>Update Book Details</div>

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
<td> Book Title:</td>
<div class="search">
<td><input class = "input" type="text" placeholder="Fantastic Pets" name="i_booktitle" required value="<?php echo $book_title?>"></td>
</div>
<td></td>
</tr>

<tr>
<td></td>
<td>Author :</td>
<td><input type="text" name="i_author" required value="<?php echo $author?>"></td>
<td></td>
</tr>

<tr>
<td></td>
<td>Book Copies :</td>
<td><input type="text" name="i_bookcopies" required value="<?php echo $book_copies?>"></td>
<td></td>
</tr>
<tr>
<tr>
<td></td>
<td>Book Publisher Company :</td>
<td><input type="text" placeholder="Regency Publishing Group" name="i_bookpub" required value="<?php echo $book_pub?>"></td>
<td></td>
</tr>
<tr>
<td></td>
<td>Publisher Name :</td>
<td><input type="text" placeholder="0174371312" name="'i_pubname" required value="<?php echo $publisher_name?>"></td>
<td></td>
</tr>
<tr>
<td></td>
<td>ISBN :</td>
<td><input type="text" placeholder="0-12-345678-9" name="i_isbn" required value="<?php echo $isbn?>"></td>
<td></td>
</tr>
<tr>
<td></td>
<td>Copyright Year :</td>
<td><input type="text" name="i_copyrightyear" required value="<?php echo $copyright_year?>"></td>
<td></td>
</tr>
<tr>
<td></td>
<td>Date Added :</td>
<td><input type="date" placeholder="0174371312" name="i_dateadded" required value="<?php echo $date?>"></td>
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