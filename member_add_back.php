<?php
//Connect to Database
include ('db_conn.php');

/*Dapatkan data dari semua medan/textfield pada borang_penggunabaru.php*/
$member_id = $_POST['i_member_id'];
$firstname=$_POST['i_firstname'];
$lastname =$_POST['i_lastname'];
$gender =$_POST['i_gender'];
$address =$_POST['i_address'];
$contact =$_POST['i_contact'];
$type_id =$_POST['i_typeid'];
$year_level =$_POST['i_yearlevel'];
$status =$_POST['i_status'];

//Insert Datas into Database
$mysql = "INSERT INTO member(member_id,firstname,lastname,gender, address, contact, type_id, year_level, status)
		VALUES ('$member_id', '$firstname', '$lastname', '$gender', '$address', '$contact', '$type_id', '$year_level', '$status')";
if (mysqli_query($conn, $mysql)) {
	//show javascript alert
	echo '<script type="text/javascript">;
	alert("Member Registered Successfully!");
		 window.location.href="member.php";</script>';
		 //After successfully add data into database, immediatly redirect to member page page
		 
} 
else {
	echo "Error ; " . mysqli_error($conn);
}
?>