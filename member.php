<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="stylesheet.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<title>Library Read 2gether</title>
<!-- INTERNAL CSS -->
<style>
button{
	height: 30px; 
	background: #417088; 
	color: white; 
	width: 70px; 
	border: 1px solid;
}

.button2 {background-color: #008CBA;}
.button3 {background-color: #f44336;}

table {
	border: 2px solid black;
	border-collapse: collapse;
	font-family: Tw Cen MT;
	font-size: 19px;
}

* {
  box-sizing: border-box;
}

/* Create three unequal columns that floats next to each other */
.column {
  float: left;
  padding: 10px;
}

.left  {
  width: 75%;
}

.middle {
  width: 25%;
}

/* Clear floats after the columns */
.row:after {
  content: "";
  display: table;
  clear: both;
}

</style>

<!-- javascript for creating a pop-up box whether users confirm to delete record -->
<script>
	function confirmation() {
		conf = confirm("Are you sure to delete this record?");
		if(conf == false){
			document.getElementById("deletebtn").href = "member.php";
		}
	}
</script>

</head>
<body>
<?php
//Connect to database
include ('db_conn.php');
//link to header.html
include('header.html');
?>
<!-- splitting the page into 2 cloumns -->
<div class="row">
<div class="column left" >

<p><center>
<!-- search function for book -->
<form action="" method="post">
<p><center>
<!-- dropdown for users to choose which options -->
<select name ="carian">
<option value="all">All</option>
<option value="member_id">Member ID</option>
<option value="firstname">First Name</option>
<option value="lastname">Last Name</option>
<option value="gender">Gender</option>
<option value="address">Address</option>
<option value="contact">Contact</option>
<option value="type_id">Type ID</option>
<option value="year_level">Year Level</option>
<option value="status">Status</option>
</select>

<!-- user key-in keywords they want to find -->
<input type="text" name="i_carian">
<button name="cari">Search</button>
</p><center>
</form>

<?php

//if user clicks on "Search" button and the search box is not empty...
if (isset($_POST['cari']) && !empty($_POST['i_carian']) )
{
//based on what users have choose from the dropdown options...
switch ($_POST["carian"])
{
	case "all": //if users choose option all
		$query = "SELECT * FROM member 
		WHERE member_id LIKE '%$_POST[i_carian]%'
		OR gender LIKE '$_POST[i_carian]'
		OR firstname LIKE '$_POST[i_carian]'
		OR lastname LIKE '$_POST[i_carian]'
		OR contact LIKE '$_POST[i_carian]'
		OR type_id = '$_POST[i_carian]'
		OR year_level = '$_POST[i_carian]'
		OR status = '$_POST[i_carian]'";
		break;
	case "member_id": //if users choose option member id
		$query = "SELECT * FROM member
		WHERE member_id LIKE '%$_POST[i_carian]%'";
		break;
	case "gender":  //if users choose option gender
		$query = "SELECT * FROM member
		WHERE gender LIKE '$_POST[i_carian]'";
		break;
	case "firstname": //if users choose option firstname
		$query = "SELECT * FROM member
		WHERE firstname LIKE '$_POST[i_carian]'";
		break;
	case "lastname": //if users choose option last name
		$query = "SELECT * FROM member
		WHERE lastname LIKE '$_POST[i_carian]'";
		break;
	case "address": //if users choose option address
		$query = "SELECT * FROM member
		WHERE address LIKE '$_POST[i_carian]'";
		break;
	case "contact": //if users choose option contact
		$query = "SELECT * FROM member
		WHERE contact = '$_POST[i_carian]'";
		break;
	case "type_id": //if users choose option type id
		$query = "SELECT * FROM member
		WHERE type_id = '$_POST[i_carian]'";
		break;
	case "year_level": //if users choose option year level
		$query = "SELECT * FROM member
		WHERE year_level = '$_POST[i_carian]'";
		break;
	case "status": //if users choose option status
		$query = "SELECT * FROM member
		WHERE status = '$_POST[i_carian]'";
		break;

}
} else{
//Display whole table from database if user doesn't search
$query = "SELECT * FROM member";
}

$mysql = $query;
$result = mysqli_query($conn, $mysql) or die(mysql_error());

if (mysqli_num_rows($result) > 0) {
//table to display searching result
echo "<table border='1'>";
echo "<col width='70'>"; //Member ID
echo "<col width='110'>"; //First Name
echo "<col width='110'>"; //Last Name
echo "<col width='120'>"; //Gender
echo "<col width='150'>";//Address
echo "<col width='150'>";//Contact
echo "<col width='70'>"; //Type ID
echo "<col width='90'>"; //Year Level
echo "<col width='90'>";//Status
echo "<col width='50'>"; //Edit
echo "<col width='50'>";//Delete
echo "<tr style='height: 50px; background: #ddd;'>";
echo "<th>Member ID</th>";
echo "<th>First Name</th>";
echo "<th>Last Name</th>";
echo "<th>Gender</th>";
echo "<th>Address</th>";
echo "<th>Contact</th>";
echo "<th>Type</th>";
echo "<th>Year Level</th>";
echo "<th>Status</th>";
echo "<th>Edit</th>";
echo "<th>Delete</th>";
echo "</tr>";

//Display result from searching from database
while($row = mysqli_fetch_assoc($result)) {
	$type =  "SELECT * FROM type WHERE type_id = $row[type_id]";
	$typeResult = mysqli_query($conn, $type) or die(mysql_error());
	$typ = mysqli_fetch_assoc($typeResult);
	echo "<tr>";
	echo "<td>".$row['member_id']."</td>"; //attribute names from database
	echo "<td>".$row['firstname']."</td>";
	echo "<td>".$row['lastname']."</td>";
	echo "<td>".$row['gender']."</td>";
	echo "<td>".$row['address']."</td>";
	echo "<td>".$row['contact']."</td>";
	echo "<td>".$typ['borrowertype']."</td>";
	echo "<td>".$row['year_level']."</td>";
	echo "<td>".$row['status']."</td>";
	//edit button
	echo "<td style='text-align:center'><a href='member_update.php? updateid=".$row['member_id']."'><img src='images/edit.png' width=20></a></td>";
	//delete button
	echo "<td><center><a id = 'deletebtn' onclick='confirmation()' href='member_delete.php? deleteid=".$row['member_id']."'><img src='images/delete.png' width=20></a></center></td>";
	echo "</tr>";
}
echo "</table>";
}
//If user input is not found in the database
else { echo "<center>No Records</center>";}
?>
</div>
<!--second column of the page -->
<div class="column middle" >

<h3><center>Register New Member</center></h3>

<!-- add function of book -->
<form action="member_add_back.php" method="POST">

<!-- applying css to table -->
<div class="content-container-box">
<div style="display: flex">
<div style="width: 500px;">
<div class="book-contents" style="border: 1px #000 solid; border-radius: 20px;  padding: 30px">

<!-- creating table -->
<table cellpadding=5px style="border: none">

<tr>
<td></td>
<td></td>
<td style="width: 30px"></td>
</tr>

<tr>
<td></td>
<td></td>
<td></td>
<td></td>
</tr>

<tr>
<td></td>
<td> First Name:</td>
<td><input type="text" placeholder="Ali" name="i_firstname" required></td>
<td></td>
</tr>

<tr>
<td></td>
<td>Last Name :</td>
<td><input type="text" placeholder="Mohammad" name="lastname" required></td>
<td></td>
</tr>

<tr>
<td></td>
<!-- dropdown for user to choose gender -->
<td>Gender :</td>
<td><select name = "i_gender">
	<option value = "Male">Male</option>
	<option value = "Female">Female</option>
	</td>
<td></td>
</tr>

<tr>
<tr>
<td></td>
<td>Address :</td>
<td><input type="text" placeholder="1, Jalan Ali 123, Bandar Ali" name="i_address" required></td>
<td></td>
</tr>

<tr>
<td></td>
<td>Contact :</td>
<td><input type="tel" placeholder="012-1234567" name="i_contact" pattern="[0-9]{3}-[0-9]{7}" ></td>
<td></td>
</tr>

<tr>
<td></td>
<!-- dropdown for user to choose type -->
<td>Type :</td>
<td><select name = "i_type">
	<option value = "2">Teacher</option>
	<option value = "20">Employee</option>
	<option value = "21">Non-Teaching</option>
	<option value = "22">Student</option>
	<option value = "32">Construction</option>
</td>
<td></td>
</tr>

<tr>
<td></td>
<!-- dropdown for user to choose year level -->
<td>Year Level:</td>
<td><select name = "i_yearlevel">
	<option value = "Faculty">Faculty</option>
	<option value = "First Year">First Year</option>
	<option value = "Second Year">Second Year</option>
	<option value = "Third Year">Third Year</option>
	<option value = "Forth Year">Forth Year</option>
</td>
<td></td>
</tr>

<tr>
<td></td>
<!-- dropdown for user to choose status -->
<td>Status :</td>
<td><select name = "i_status">
	<option value = "Active">Active</option>
	<option value = "Banned">Banned</option>
</td>
<td></td>
</tr>

<tr>
<td></td>
<td></td>
<td><button name="loginBtn">Submit</button></td>
<td></td>
</tr>

<tr>
<td></td>
<td></td>
<td></td>
<td></td>
</tr>

<tr>
<td></td>
<td></td>
<td></td>
<td></td>
</tr>

</table>

</div>
</div>
</div>
</div>

</div>
</div>

</form>
</body>
</html>