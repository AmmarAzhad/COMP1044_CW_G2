<?php
//Connect to Database
include ('db_conn.php');

/*Dapatkan data dari semua medan/textfield pada borang_penggunabaru.php*/
$book_title=$_POST['i_booktitle'];
$category_id =$_POST['i_categoryid'];
$author =$_POST['i_author'];
$book_copies =$_POST['i_bookcopies'];
$book_pub =$_POST['i_bookpub'];
$publisher_name =$_POST['i_pubname'];
$isbn =$_POST['i_isbn'];
$copyright_year =$_POST['i_copyrightyear'];
$date_added =$_POST['i_dateadded'];
$status =$_POST['i_status'];

//Simpan data dalam DB
$mysql = "INSERT INTO book(book_title,category_id,author, book_copies, book_pub, publisher_name, isbn, copyright_year, date_added, status)
		VALUES ('$book_title','$category_id','$author', '$book_copies', '$book_pub', '$publisher_name', '$isbn', '$copyright_year', '$date_added', '$status')";
if (mysqli_query($conn, $mysql)) {
	//papar javascript alert jika pengguna baru berjaya daftar
	echo '<script type="text/javascript">;
	alert("Book Recorded Successfully!");
		 window.location.href="book_add.php";</script>';
		 //selepas berjaya daftar, kembali ke login page
		 
} 
else {
	echo "Error ; " . mysqli_error($conn);
}
?>