<html>
<head>
<link rel="stylesheet" href="design.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<title>Library Read 2gether</title>
<!-- INTERNAL CSS -->
<style>
table {
	
	font-family: Tw Cen MT;
	font-size: 19px;
}

* {
  box-sizing: border-box;
}

/* Create three unequal columns that floats next to each other */
.column {
  float: left;
  padding: 10px;
  height: 300px; /* Should be removed. Only for demonstration */
}

.left  {
  width: 50%;
}

.middle {
  width: 25%;
}

/* Clear floats after the columns */
.row:after {
  content: "";
  display: table;
  clear: both;
}

</style>
</head>
<body>
<?php
//Connect to database
include ('db_conn.php');
?>
<div class="row">
<div class="column left">
<form action="" method="post">
<p><center>
<select name ="carian">
<option>Choose</option>
<option value="book_id">Book ID</option>
<option value="book_title">Title</option>
<option value="author">Author</option>
<option value="availability">availability</option>


</select>
<input type="text" name="i_carian">
<button style="height: 30px; background: #417088; color: #fff; width: 70px; border: 1px solid" name="cari">Search</button>
</p><center>
</form>

<?php
//jika user klik butang "Cari" dan textbox carian tidak empty
if (isset($_POST['cari']) && !empty($_POST['i_carian']) )
{
//kenalpasti dropdown list apa yang dipilih oleh user
switch ($_POST["carian"])
{
case "book_id": //jika user pilih search by nama
$query = "SELECT * FROM book
WHERE book_id LIKE '%$_POST[i_carian]%'";
break;
case "book_title": //jika user pilih search by nokp
$query = "SELECT * FROM book
WHERE book_title LIKE '$_POST[i_carian]'";
break;
case "author": //jika user pilih search by kelas
$query = "SELECT * FROM book
WHERE author LIKE '$_POST[i_carian]'";
break;
case "availability": //jika user pilih search by kodAJK
$query = "SELECT * FROM book, borrowdetails, borrow
WHERE borrow_status = '$_POST[i_carian]'";
break;

}
} else{
//jika user tidak buat carian, paper senarai secara default
//Papar/Select data dari DB
$query = "SELECT book.book_id, book.book_title, book.author, borrowdetails.borrow_status, IF(borrowdetails.date_return>0, 'YES', 'NO') AS test 
FROM book, borrow, borrowdetails
WHERE book.book_id = borrowdetails.book_id AND borrow.borrow_id = borrowdetails.borrow_id";
}

$mysql = $query;
$result = mysqli_query($conn, $mysql) or die(mysql_error());

if (mysqli_num_rows($result) > 0) {
//table untuk paparan data
echo "<table border='1'>";
echo "<col width='70'>"; //saiz column 1
echo "<col width='150'>"; //saiz column 2
echo "<col width='110'>"; //saiz column 4
echo "<col width='50'>"; //saiz column 5
echo "<tr style='height: 50px; background: #ddd;'>";
echo "<th >Book ID</th>";
echo "<th>Title</th>";
echo "<th>Author</th>";
echo "<th>Availability</th>";
echo "</tr>";

//papar semua data dari jadual dalam DB
while($row = mysqli_fetch_assoc($result)) {
	echo "<tr>";
	echo "<td>".$row['book_id']."</td>"; //nama atribut
	echo "<td>".$row['book_title']."</td>";
	echo "<td>".$row['author']."</td>";
	echo "<td>".$row['test']."</td>";
	
	echo "</tr>";
}
echo "</table>";
}
else { echo "<center>No Records</center>";}
?>
</div>
<div class="column middle" >
<form action="borrow_add_back.php" method="POST">

<div class="content-container-box">
<div style="display: flex">
<div style="width: 350px;">
<div class="book-contents" style="border: 1px #000 solid; border-radius: 20px;  padding: 30px">

<table cellpadding=5px style="border: none">
<tr>
<td></td>
<td></td>
<td style="width: 30px"></td>
</tr>

<tr>
<td></td>
<td> Book ID:</td>
<td><input class = "input" type="text" name="i_bookid" required></td>
<td></td>
</tr>

<tr>
<td></td>
<td>Member ID :</td>
<td><input type="text" name="i_memberid" required></td>
<td></td>
</tr>

<tr>
<td></td>
<td>Borrow Status :</td>
<td><select name = "i_borrow_status">
	<option>Select</option>
	<option value = "pending">Borrow</option>
	<option value = "returned">Return</option>
	</td>
<td></td>
</tr>

<tr>
<td></td>
<td>Date Borrow :</td>
<td><input type="datetime-local"  name="i_date_borrow" required></td>
<td></td>
</tr>

<tr>
<td></td>
<td>Due Date :</td>
<td><input type="date"  name="i_duedate" required></td>
<td></td>
</tr>

<tr>
<td></td>
<td></td>
<td><button style="height: 30px; background: #417088; color: #fff; width: 70px; border: 1px solid" name="loginBtn">Submit</button></td>
<td></td>
</tr>

</table>

</div>
</div>
</div>
</div>

</form>
</div>
</div>

</div>
</body>
</html>