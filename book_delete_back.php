<?php
//Connect to databse
include ('db_conn.php');

//if user press on the delete icon...
if (isset($_GET['deleteid']))
{
	$id = $_GET['deleteid'];
	$del = "DELETE FROM book WHERE book_id = '$id'";

	if (mysqli_query($conn, $del)) {
		//Display pop-up box that the user has deleted data successfully
	echo '<script type="text/javascript">;
	alert("Book Deleted Successfully!");
		 window.location.href="book.php";</script>';
	} 
}
?>