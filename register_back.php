<?php
//link to Database
include ('db_conn.php');

//get all inputs from user in register.php
$user_id = $_POST['i_userid'];
$username = $_POST['i_username'];
$password = md5($_POST['i_password']);
$firstname = $_POST['i_firstname'];
$lastname = $_POST['i_lastname'];

//Insert user inputs into Database
$mysql = "INSERT INTO users
(user_id, username, password, firstname, lastname)
		VALUES ('$user_id', '$username', '$password', '$firstname','$lastname')";
if (mysqli_query($conn, $mysql)) {
	//Display pop-up box that the user has register successfully 
	echo '<script type="text/javascript">
		 alert ("Sign Up Successfully!");
		 window.location.href="login.php";</script>';
		 //after succesfully register new user, wil redirect back to login.php page
		 
} 
else {
	echo "Error ; " . mysqli_error($conn);
}
?>