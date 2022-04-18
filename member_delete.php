<?php

include ('db_conn.php');

if (isset($_GET['deleteid']))
{
	$id = $_GET['deleteid'];
	$del = "DELETE FROM member WHERE member_id = '$id'";

	if (mysqli_query($conn, $del)) {
	echo '<script type="text/javascript">;
	alert("Member Deleted Successfully!");
		 window.location.href="member.php";</script>';
	} 
}
?>