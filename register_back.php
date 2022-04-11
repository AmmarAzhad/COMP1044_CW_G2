<?php
//link to Database
include ('db_conn.php');

/*Dapatkan data dari semua medan/textfield pada borang_penggunabaru.php*/
$user_id = $_POST['i_userid'];
$username = $_POST['i_username'];
$password = md5($_POST['i_password']);
$firstname = $_POST['i_firstname'];
$lastname = $_POST['i_lastname'];

//Simpan data dalam DB
$mysql = "INSERT INTO users
(user_id, username, password, firstname, lastname)
		VALUES ('$user_id', '$username', '$password', '$firstname','$lastname')";
if (mysqli_query($conn, $mysql)) {
	//papar javascript alert jika pengguna baru berjaya daftar
	echo '<script type="text/javascript">
		 alert ("Sign Up Successfully!");
		 window.location.href="login.php";</script>';
		 //selepas berjaya daftar, kembali ke login page
		 
} 
else {
	echo "Error ; " . mysqli_error($conn);
}
?>