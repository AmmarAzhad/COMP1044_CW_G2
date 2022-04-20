<html>
<head>
<link rel="stylesheet" href="stylesheet.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<title>Library Read 2gether</title>
<!-- INTERNAL CSS -->
<style>
table {
	border-collapse: collapse;
	margin: auto;
	font-family: Tw Cen MT;
	font-size: 19px;
}

</style>
</head>
<body>
<?php
//Connect to database
include ('db_conn.php');
include ('header.html');
?>

<form action="" method="post">
<p><center>
<select name ="carian">
<option>Choose</option>
<option value="borrow_id">Borrow ID</option>
<option value="book_id">Book ID</option>
<option value="member_id">Member ID</option>
<option value="book_title">Title</option>
<option value="borrow_status">Borrow Status</option>


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
case "borrow_id": //jika user pilih search by nama
$query = "SELECT * FROM borrow, borrowdetails
WHERE borrow_id LIKE '%$_POST[i_carian]%'";
break;
case "book_id": //jika user pilih search by nama
$query = "SELECT * FROM book, borrowdetails
WHERE book_id LIKE '%$_POST[i_carian]%'";
break;
case "member_id": //jika user pilih search by nama
$query = "SELECT * FROM member, borrow
WHERE member_id LIKE '%$_POST[i_carian]%'";
break;
case "book_title": //jika user pilih search by nokp
$query = "SELECT * FROM book
WHERE book_title LIKE '$_POST[i_carian]'";
break;
case "borrow_status": //jika user pilih search by kodAJK
$query = "SELECT * FROM book, borrowdetails
WHERE borrow_status = '$_POST[i_carian]'";
break;

}
} else{
//jika user tidak buat carian, paper senarai secara default
//Papar/Select data dari DB
$query = "SELECT borrow.borrow_id, borrow.member_id, borrowdetails.book_id, book.book_title, borrow.date_borrow, borrow.due_date, borrowdetails.borrow_status, borrowdetails.date_return
FROM book, borrow, borrowdetails
WHERE book.book_id = borrowdetails.book_id AND borrow.borrow_id = borrowdetails.borrow_id";
}

$mysql = $query;
$result = mysqli_query($conn, $mysql) or die(mysql_error());

if (mysqli_num_rows($result) > 0) {
//table untuk paparan data
echo "<table border='1'>";
echo "<col width='70'>"; 
echo "<col width='70'>"; 
echo "<col width='70'>"; 
echo "<col width='150'>"; 
echo "<col width='100'>"; 
echo "<col width='110'>"; 
echo "<col width='110'>"; 
echo "<col width='110'>"; 
echo "<tr style='height: 50px; background: #ddd;'>";
echo "<th >Borrow ID</th>";
echo "<th >Member ID</th>";
echo "<th >Book ID</th>";
echo "<th>Title</th>";
echo "<th>Date Borrow</th>";
echo "<th>Date Due</th>";
echo "<th>Borrow Status</th>";
echo "<th>Date Return</th>";
echo "</tr>";

//papar semua data dari jadual dalam DB
while($row = mysqli_fetch_assoc($result)) {
	echo "<tr>";
	echo "<td>".$row['borrow_id']."</td>";
	echo "<td>".$row['member_id']."</td>";
	echo "<td>".$row['book_id']."</td>";
	echo "<td>".$row['book_title']."</td>";
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