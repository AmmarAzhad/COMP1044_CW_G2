<?php

include ('db_conn.php');

if (isset($_GET['deleteid']))
{
	$id = $_GET['deleteid'];
	$del = "DELETE FROM book WHERE book_id = '$id'";

	if (mysqli_query($conn, $del)) {
	echo '<script type="text/javascript">;
	alert("Book Deleted Successfully!");
		 window.location.href="book_delete.php";</script>';
	} 
}
?>