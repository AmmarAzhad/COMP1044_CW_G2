<?php
//Connect to Database
include ('db_conn.php');

//get user inputs from book.php page to add book
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

//insert data into database
$mysql = "INSERT INTO book(book_title,category_id,author, book_copies, book_pub, publisher_name, isbn, copyright_year, date_added, status)
		VALUES ('$book_title','$category_id','$author', '$book_copies', '$book_pub', '$publisher_name', '$isbn', '$copyright_year', '$date_added', '$status')";
if (mysqli_query($conn, $mysql)) {
	//Display pop-up box that the user has recorded successfully
	echo '<script type="text/javascript">;
	alert("Book Recorded Successfully!");
		 window.location.href="book.php";</script>';
		 //after succesfully register new user, wil redirect back to book.php page
		 
} 
else {
	echo "Error ; " . mysqli_error($conn);
}
?>