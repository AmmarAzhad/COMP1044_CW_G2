<?php
//Connect to databse
include ('db_conn.php');

//if user press on the delete icon...
if (isset($_GET['deleteid']))
{
	$id = $_GET['deleteid'];
	$del = "DELETE FROM member WHERE member_id = '$id'";
	
	//Display pop-up box that the user has deleted data successfully
	if (mysqli_query($conn, $del)) {
	echo '<script type="text/javascript">;
	alert("Member Deleted Successfully!");
		 window.location.href="member.php";</script>';
	} 
}
?>