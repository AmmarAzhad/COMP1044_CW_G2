<html>
<head>
<title>Library Read 2gether</title>
<!-- INTERNAL CSS -->
<style>
#main
{
position: absolute;
top: 130px;
left: 163px;
bottom: 15px;
overflow: auto;
width:88.1%;
background-color: khaki;
}
#tajuk
{
font-size: 25px;
font-family: Tv Cen MT Condensed;
font-weight: bold;
text-align: center;
}
table{
border: 2px solid black;
border-collapse: collapse;
margin: auto;
background-color: palegoldenrod;
}
table, td {
text-align: center;
}
</style>
</head>
<body>
<?php
//Connect to database
include ('db_conn.php');

include ("header.html");

?>
<div id="main">
<div id="tajuk"><p>Library Read 2gether<p>Search Book</div>

<p>
<form action="" method="post">
<p><center>
<select name ="carian">
<option>All</option>
<option value="book_id">Book ID</option>
<option value="book_title">Title</option>
<option value="author">Author</option>
<option value="isbn">ISBN</option>
<option value="date_added">Date Added</option>
<option value="status">Status</option>

</select>
<input type="text" name="i_carian">
<input type="submit" value="Search" name="cari">
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
case "isbn": //jika user pilih search by notel
$query = "SELECT * FROM book
WHERE isbn = '$_POST[i_carian]'";
break;
case "date_added": //jika user pilih search by kodAJK
$query = "SELECT * FROM book
WHERE date_added LIKE '$_POST[i_carian]'";
break;
case "status": //jika user pilih search by kodAJK
$query = "SELECT * FROM book
WHERE status = '$_POST[i_carian]'";
break;

}
} else{
//jika user tidak buat carian, paper senarai secara default
//Papar/Select data dari DB
$query = "SELECT * FROM book";
}

$mysql = $query;
$result = mysqli_query($conn, $mysql) or die(mysql_error());

if (mysqli_num_rows($result) > 0) {
//table untuk paparan data
echo "<table border='1'>";
echo "<col width='70'>"; //saiz column 1
echo "<col width='150'>"; //saiz column 2
echo "<col width='110'>"; //saiz column 4
echo "<col width='120'>"; //saiz column 5
echo "<col width='150'>"; //saiz column 6
echo "<col width='90'>"; //saiz column 7
echo "<tr>";
echo "<th>Book ID</th>";
echo "<th>Title</th>";
echo "<th>Author</th>";
echo "<th>ISBN</th>";
echo "<th>Date Added</th>";
echo "<th>Status</th>";
echo "<th>Action</th>";
echo "</tr>";

//papar semua data dari jadual dalam DB
while($row = mysqli_fetch_assoc($result)) {
	echo "<tr>";
	echo "<td>".$row['book_id']."</td>"; //nama atribut
	echo "<td>".$row['book_title']."</td>";
	echo "<td>".$row['author']."</td>";
	echo "<td>".$row['isbn']."</td>";
	echo "<td>".$row['date_added']."</td>";
	echo "<td>".$row['status']."</td>";
	echo "</tr>";
}
echo "</table>";
}
else { echo "<center>No Records</center>";}
?>

</div>
<?php
include ("footer.html");
include ("sidemenu.php");
?>
</body>
</html>