<?php
//Connect to Database
include ('db_conn.php');

/*Dapatkan data dari semua medan/textfield pada borang_penggunabaru.php*/
$book_id = $_POST['i_bookid'];
$member_id = $_POST['i_memberid'];
$borrow_status = $_POST['i_borrow_status'];
$dateborrow = $_POST['i_date_borrow'];
$duedate = $_POST['i_duedate'];

//Insert Datas into Database
$mysql = "INSERT INTO borrow(member_id, date_borrow, due_date)
		VALUES ('$member_id', '$dateborrow', '$duedate');
		INSERT INTO borrowdetails(borrow_status, book_id) 
		VALUES ('$borrow_status', '$book_id')";
if (mysqli_query($conn, $mysql)) {
	//show javascript alert
	echo '<script type="text/javascript">;
	alert("Recorded Successfully!");
		 window.location.href="borrow.php";</script>';
		 //After successfully add data into database, immediatly redirect to member page page
		 
} 
else {
	echo "Error ; " . mysqli_error($conn);
}
?>