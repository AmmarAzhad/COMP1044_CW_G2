<html>
<head>
<link rel="stylesheet" href="stylesheet.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<title>Library Read 2gether</title>

<!-- INTERNAL CSS -->
<style>
button{
	height: 30px; 
	background: #417088; 
	color: white; 
	width: 70px; 
	border: 1px solid;
}

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
//link to header.html
include ('header.html');
?>

<!-- search function for borrow -->
<form action="" method="post">
<p><center>
<!-- dropdown for users to choose which opotions -->
<select name ="carian">
<option>All</option>
<option value="borrow_id">Borrow ID</option>
<option value="member_id">Member ID</option>
<option value="book_id">Book ID</option>
<option value="book_title">Title</option>
<option value="borrow_status">Borrow Status</option>
</select>

<!-- user key-in keywords they want to find -->
<input type="text" name="i_carian">
<button name="cari">Search</button>
</p><center>
</form>

<?php
//if user clicks on "Search" button and the search box is not empty...
if (isset($_POST['cari']) && !empty($_POST['i_carian']) )
{
//based on what users have choose from the dropdown options...
switch ($_POST["carian"])
{
case "borrow_id": //if users choose option borrow id
$query = "SELECT borrow.borrow_id, borrow.member_id, borrowdetails.book_id, book.book_title, borrow.date_borrow, borrow.due_date, borrowdetails.borrow_status, borrowdetails.date_return
FROM book, borrow, borrowdetails
WHERE book.book_id = borrowdetails.book_id AND borrow.borrow_id = borrowdetails.borrow_id AND borrow.borrow_id LIKE '%$_POST[i_carian]%'";
break;
case "book_id": //if users choose option book id
$query = "SELECT borrow.borrow_id, borrow.member_id, borrowdetails.book_id, book.book_title, borrow.date_borrow, borrow.due_date, borrowdetails.borrow_status, borrowdetails.date_return
FROM book, borrow, borrowdetails
WHERE book.book_id = borrowdetails.book_id AND borrow.borrow_id = borrowdetails.borrow_id AND book.book_id LIKE '%$_POST[i_carian]%'";
break;
case "member_id": //jika user pilih search by nama
$query = "SELECT borrow.borrow_id, borrow.member_id, borrowdetails.book_id, book.book_title, borrow.date_borrow, borrow.due_date, borrowdetails.borrow_status, borrowdetails.date_return
FROM book, borrow, borrowdetails
WHERE book.book_id = borrowdetails.book_id AND borrow.borrow_id = borrowdetails.borrow_id AND member.member_id LIKE '%$_POST[i_carian]%'";
break;
case "book_title"://if users choose option book title
$query = "SELECT borrow.borrow_id, borrow.member_id, borrowdetails.book_id, book.book_title, borrow.date_borrow, borrow.due_date, borrowdetails.borrow_status, borrowdetails.date_return
FROM book, borrow, borrowdetails
WHERE book.book_id = borrowdetails.book_id AND borrow.borrow_id = borrowdetails.borrow_id AND book.book_title LIKE '$_POST[i_carian]'";
break;
case "borrow_status": //if users choose option borrow status
$query = "SELECT borrow.borrow_id, borrow.member_id, borrowdetails.book_id, book.book_title, borrow.date_borrow, borrow.due_date, borrowdetails.borrow_status, borrowdetails.date_return
FROM book, borrow, borrowdetails
WHERE book.book_id = borrowdetails.book_id AND borrow.borrow_id = borrowdetails.borrow_id AND borrowdetails.borrow_status = '$_POST[i_carian]'";
break;

}
} else{
//Display whole table from database if user doesn't search
$query = "SELECT borrow.borrow_id, borrow.member_id, borrowdetails.book_id, book.book_title, borrow.date_borrow, borrow.due_date, borrowdetails.borrow_status, borrowdetails.date_return
FROM book, borrow, borrowdetails
WHERE book.book_id = borrowdetails.book_id AND borrow.borrow_id = borrowdetails.borrow_id";
}

$mysql = $query;
$result = mysqli_query($conn, $mysql) or die(mysql_error());

if (mysqli_num_rows($result) > 0) {
//table to display searching result
echo "<table border='1'>";
echo "<col width='70'>"; //Borrow ID
echo "<col width='50'>"; //Member ID
echo "<col width='70'>"; //Book ID
echo "<col width='150'>"; //Title
echo "<col width='100'>"; //Date Borrow
echo "<col width='110'>"; //Date Due
echo "<col width='110'>"; //Borrow Status
echo "<col width='110'>"; //Date Return
echo "<col width='50'>";  //Edit
echo "<tr style='height: 50px; background: #ddd;'>"; //apply style to head of columns
echo "<th >Borrow ID</th>";
echo "<th >Member ID</th>";
echo "<th >Book ID</th>";
echo "<th>Title</th>";
echo "<th>Date Borrow</th>";
echo "<th>Date Due</th>";
echo "<th>Borrow Status</th>";
echo "<th>Date Return</th>";
echo "<th>Edit</th>";
echo "</tr>";

//Display result from searching from database
while($row = mysqli_fetch_assoc($result)) {
	echo "<tr>";
	echo "<td>".$row['borrow_id']."</td>";//attribute names from database
	echo "<td>".$row['member_id']."</td>";
	echo "<td>".$row['book_id']."</td>";
	echo "<td>".$row['book_title']."</td>";
	echo "<td>".$row['date_borrow']."</td>";
	echo "<td>".$row['due_date']."</td>";
	echo "<td>".$row['borrow_status']."</td>";
	echo "<td>".$row['date_return']."</td>";
	echo "<td style='text-align:center'><a href='borrow_update.php? updateid=".$row['borrow_id']."'><img src='images/edit.png' width=20></a></td>";
	echo "</tr>";
}
echo "</table>";
}
//If user input is not found in the database
else { echo "<center>No Records</center>";}
?>
</div>

</body>
</html>