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

</style>
</head>
<body>
<?php
//Connect to database
include ('db_conn.php');
?>

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
$query = "SELECT book.book_id, book.book_title, book.author, borrow.date_borrow, borrow.due_date, borrowdetails.borrow_status, borrowdetails.date_return
FROM book, borrow, borrowdetails
WHERE book.book_id = borrowdetails.book_id AND borrow.borrow_id = borrowdetails.borrow_id";
}

$mysql = $query;
$result = mysqli_query($conn, $mysql) or die(mysql_error());

if (mysqli_num_rows($result) > 0) {
//table untuk paparan data
echo "<table border='1'>";
echo "<col width='70'>"; 
echo "<col width='150'>"; 
echo "<col width='110'>"; 
echo "<col width='100'>"; 
echo "<col width='110'>"; 
echo "<col width='110'>"; 
echo "<col width='110'>"; 
echo "<tr style='height: 50px; background: #ddd;'>";
echo "<th >Book ID</th>";
echo "<th>Title</th>";
echo "<th>Author</th>";
echo "<th>Date Borrow</th>";
echo "<th>Date Due</th>";
echo "<th>Borrow Status</th>";
echo "<th>Date Return</th>";
echo "</tr>";

//papar semua data dari jadual dalam DB
while($row = mysqli_fetch_assoc($result)) {
	echo "<tr>";
	echo "<td>".$row['book_id']."</td>"; //nama atribut
	echo "<td>".$row['book_title']."</td>";
	echo "<td>".$row['author']."</td>";
	echo "<td>".$row['date_borrow']."</td>";
	echo "<td>".$row['due_date']."</td>";
	echo "<td>".$row['borrow_status']."</td>";
	echo "<td>".$row['date_return']."</td>";
	
	echo "</tr>";
}
echo "</table>";
}
else { echo "<center>No Records</center>";}
?>
</div>

</body>
</html>