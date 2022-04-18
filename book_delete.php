<html>
<head>
<title>Library Read 2gether</title>
<link rel = "stylesheet" href = "stylesheet.css">
<!-- INTERNAL CSS -->
<style>
#tajuk
{
font-size: 25px;
font-weight: bold;
text-align: center;
}
th {
	background-color: #18508C;
	color: #fff;
}
td {
	background-color: #fff;
}
table, td,th{
	padding: 10px 30px;
	margin: auto;
	border-collapse: collapse;
	border: 2px solid black;
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
<div id="tajuk"><p>Library Read 2gether<p>Search Book</div>
<div class="container center">
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
		<input type="submit" value="Search" name="cari" class="searchbtn">
		</p></center>
	</form>
</div>


<?php
//jika user klik butang "Cari" dan textbox carian tidak empty
if (isset($_POST['cari']) && !empty($_POST['i_carian']) )
{
//kenalpasti dropdown list apa yang dipilih oleh user
switch ($_POST["carian"]){
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
$query = "SELECT * FROM book";
}

$mysql = $query;
$result = mysqli_query($conn, $mysql) or die(mysql_error());

if (mysqli_num_rows($result) > 0) {
//table untuk paparan data
echo "<table border='1'>";
echo "<col width='80'>"; //book id
echo "<col width='210'>"; //title
echo "<col width='80'>"; //category id
echo "<col width='180'>"; //author
echo "<col width='80'>"; //book copies
echo "<col width='150'>"; //book publisher company
echo "<col width='150'>"; //Publisher name
echo "<col width='180'>"; //isbn
echo "<col width='80'>"; //copyright year
echo "<col width='180'>"; //date added
echo "<col width='100'>"; //status
echo "<col width='130'>"; //action
echo "<tr>";

echo "<th>Book ID</th>";
echo "<th>Title</th>";
echo "<th>Category ID</th>";
echo "<th>Author</th>";
echo "<th>Book Copies</th>";
echo "<th>Book Publisher Company</th>";
echo "<th>Publisher Name</th>";
echo "<th>ISBN</th>";
echo "<th>Copyright Year</th>";
echo "<th>Date Added</th>";
echo "<th>Status</th>";
echo "<th>Action</th>";
echo "</tr>";

while($row = mysqli_fetch_assoc($result)) {
	echo "<tr>";
	echo "<td>".$row['book_id']."</td>"; 
	echo "<td>".$row['book_title']."</td>";
	echo "<td>".$row['category_id']."</td>";
	echo "<td>".$row['author']."</td>";
	echo "<td>".$row['book_copies']."</td>";
	echo "<td>".$row['book_pub']."</td>";
	echo "<td>".$row['publisher_name']."</td>";
	echo "<td>".$row['isbn']."</td>";
	echo "<td>".$row['copyright_year']."</td>";
	echo "<td>".$row['date_added']."</td>";
	echo "<td>".$row['status']."</td>";
	echo "<td><button><a href='book_update.php? updateid=".$row['book_id']."'>Update</a></button><button><a href='book_delete_back.php? deleteid=".$row['book_id']."'>Delete</a></button></td>";
	echo "</tr>";
}
echo "</table>";
}
else { echo "<center>No Records</center>";}
?>
<?php
//include ("footer.html");
//include ("sidemenu.php");
?>
</body>
</html>