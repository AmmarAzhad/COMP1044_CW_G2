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
    $id = $_GET['updateid'];
$book_id=$_POST['i_bookid'];
$borrow_id=$_POST['i_borrowid'];
$member_id = $_POST['i_memberid'];
$book_id=$_POST['i_bookid'];
$book_title=$_POST['i_booktitle'];
$date_borrow = $_POST['i_date_borrow'];
$duedate = $_POST['i_duedate'];
$borrow_status = $_POST['i_borrow_status'];
$date_return = $_POST['i_date_return'];


//Simpan data dalam DB
$mysql = "UPDATE borrowdetails, borrow SET borrow.date_borrow='$date_borrow', borrow.due_date='$duedate', borrowdetails.borrow_status='$borrow_status', borrowdetails.date_return='$date_return',  borrow.member_id='$member_id' WHERE borrowdetails.borrow_id=$id AND borrow.borrow_id=$id";
if (mysqli_query($conn, $mysql)) {
	//papar javascript alert jika pengguna baru berjaya daftar
	echo '<script type="text/javascript">;
	alert("Updated Successfully!");
		 window.location.href="borrow.php";</script>';
		 //selepas berjaya daftar, kembali ke login page
		 
} 
else {
	echo "Error ; " . mysqli_error($conn);
}
}
?>

<?php
//to display details 
if (isset($_GET['updateid'])){
  $id = $_GET['updateid'];
  $query = "SELECT borrow.borrow_id, borrow.member_id, borrowdetails.book_id, book.book_title, borrow.date_borrow, borrow.due_date, borrowdetails.borrow_status, borrowdetails.date_return
FROM book, borrow, borrowdetails
WHERE book.book_id = borrowdetails.book_id AND borrow.borrow_id = borrowdetails.borrow_id AND borrow.borrow_id= $id";
  $mysql = $query;
  $result = mysqli_query($conn, $mysql) or die(mysql_error());
  $row = mysqli_fetch_assoc($result);
  $borrow_id=$row['borrow_id'];
  $book_id=$row['book_id'];
  $book_title = $row['book_title'];
  $member_id=$row['member_id'];
  $dateborrow=$row['date_borrow'];
  $duedate=$row['due_date'];
  $borrow_status=$row['borrow_status'];
  $date_return=$row['date_return'];
}
?>





<div id="title"><p>Library Read 2gether<p>Update Borrow Details</div>

<form method="POST">
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
<td> Borrow ID:</td>
<div class="search">
<td><input class = "input" type="text" name="i_borrowid" required value="<?php echo $borrow_id?>">
</td>
</div>
<td></td>
</tr>

<tr>
<td></td>
<td> Member ID:</td>
<div class="search">
<td><input class = "input" type="text" name="i_memberid" required value="<?php echo $member_id?>">
</td>
</div>
<td></td>
</tr>

<tr>
<td></td>
<td> Book ID:</td>
<div class="search">
<td><input class = "input" type="text" name="i_bookid" required value="<?php echo $book_id?>"readonly>
</td>
</div>
<td></td>
</tr>


<tr>
<td></td>
<td> Book Title:</td>
<div class="search">
<td><input class = "input" type="text" name="i_booktitle" required value="<?php echo $book_title?>"readonly>
</td>
</div>
<td></td>
</tr>


<tr>
<td></td>
<td>Date Borrow :</td>
<td><input type="datetime-local" name="i_date_borrow" required value="<?php echo $dateborrow?>"></td>
<td></td>
</tr>

<tr>
<td></td>
<td>Date Due :</td>
<td><input type="date" name="i_duedate" required value="<?php echo $duedate?>"></td>
<td></td>
</tr>

<tr>
<td></td>
<td>Borrow Status :</td>
<td><input type="text" name="i_borrow_status" required value="<?php echo $borrow_status?>"></td>
<td></td>
</tr>

<tr>
<td></td>
<td>Date Return :</td>
<td><input type="datetime-local" name="i_date_return"required value="<?php echo $date_return?>"></td>
<td></td>
</tr>


<tr>
<td></td>
<td></td>
<td><input type="submit" value="Update" name="update" class="button1" updateid="$id"></td>
<td><button class="button2"><a href="borrow.php" style="color:white">Cancel</a></button></td>
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