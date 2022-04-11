<?php
$db_host = "localhost";
$db_uname = "root";
$db_pwd = "";
$db_name = "library";

// Create connection
$conn = mysqli_connect($db_host, $db_uname, $db_pwd, $db_name);

// Check connection
if (!$conn) {
die(/*"Connected Failed" .*/ mysqli_connect_error());
}
//echo "Connected to Database";

// Class connection
//mysqli_close($conn);
?>