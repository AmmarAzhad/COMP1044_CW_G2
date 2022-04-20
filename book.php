<html>
<head>
<link rel="stylesheet" href="stylesheet.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<title>Library Read 2gether</title>
<!-- INTERNAL CSS -->
<style>
table {
	border: 2px solid black;
	border-collapse: collapse;
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
  width: 75%;
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

<script>
	function confirmation() {
		conf = confirm("Are you sure?");
		if(conf == false){
			document.getElementById("deletebtn").href = "book.php";
		}
	}
</script>

</head>
<body>
<?php
//Connect to database
include ('db_conn.php');

include('header.html');
?>
<div class="row">
<div class="column left">
<form action="" method="post">
<p><center>
<select name ="carian">
<option value="all">All</option>
<option value="book_id">Book ID</option>
<option value="book_title">Title</option>
<option value="author">Author</option>
<option value="book_pub">Publisher</option>
<option value="isbn">ISBN</option>
<option value="date_added">Date Added</option>
<option value="status">Status</option>

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
	case "all":
		$query = "SELECT * FROM book 
		WHERE book_id LIKE '%$_POST[i_carian]%' 
		OR book_title LIKE '$_POST[i_carian]'
		OR category_id LIKE '$_POST[i_carian]'
		OR author LIKE '$_POST[i_carian]'
		OR book_copies LIKE '$_POST[i_carian]'
		OR book_pub LIKE '$_POST[i_carian]'
		OR isbn = '$_POST[i_carian]'
		OR date_added LIKE '$_POST[i_carian]'
		OR status = '$_POST[i_carian]'";
		break;
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
	case "book_pub": //jika user pilih search by nama
		$query = "SELECT * FROM book
		WHERE book_pub LIKE '%$_POST[i_carian]%'";
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
echo "<tr style='height: 50px; background: #ddd;'>";
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
echo "<th>Edit</th>";
echo "<th>Delete</th>";
echo "</tr>";

//papar semua data dari jadual dalam DB
while($row = mysqli_fetch_assoc($result)) {
	echo "<tr>";
	echo "<td>".$row['book_id']."</td>"; //nama atribut
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
	echo "<td style='text-align:center'><a href='book_update.php? updateid=".$row['book_id']."'><img src='images/edit.png' width=20></a></td>";
echo "<td><center><a id = 'deletebtn' onclick='confirmation()' href='book_delete_back.php? deleteid=".$row['book_id']."'><img src='images/delete.png' width=20></a></center></td>";
	echo "</tr>";
}
echo "</table>";
}
else { echo "<center>No Records</center>";}
?>
</div>
<div class="column middle" >
<h3><center>Register New Book</center></h3>
<form action="book_add_back.php" method="POST">

<div class="content-container-box">
<div style="display: flex">
<div style="width: 500px;">
<div class="book-contents" style="border: 1px #000 solid; border-radius: 20px;  padding: 30px">

<table cellpadding=5px style="border: none">
<tr>
<td></td>
<td></td>
<td style="width: 30px"></td>
</tr>

<tr>
<td></td>
<td> Book Title:</td>
<td><input class = "input" type="text" placeholder="Fantastic Pets" name="i_booktitle" required></td>
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
<td>Category :</td>
<td><select name = "i_categoryid">
	<option>Select</option>
	<option value = "1">Periodical</option>
	<option value = "2">English</option>
	<option value = "3">Math</option>
	<option value = "4">Science</option>
	<option value = "5">Encyclopedia</option>
	<option value = "6">Filipiniana</option>
	<option value = "7">Newspapaer</option>
	<option value = "8">General</option>
	<option value = "9">Reference</option>
</td>
</tr>
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
	<option>Select</option>
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