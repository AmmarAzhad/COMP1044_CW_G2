<html>
<head>
<link rel="stylesheet" href="design.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<title>Library Read 2gether</title>
<!-- INTERNAL CSS -->
<style>
table {
	
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
  height: 300px; /* Should be removed. Only for demonstration */
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
</head>
<body>
<?php
//Connect to database
include ('db_conn.php');

?>
<div class="row">

<p><center>
<form action="" method="post">
<p><center>
<select name ="carian">
<option>All</option>
<option value="member_id">Member ID</option>
<option value="gender">Gender</option>
<option value="firstname">First Name</option>
<option value="year_level">Year Level</option>
<option value="status">Status</option>

</select>
<input type="text" name="i_carian">
<button style="height: 30px; background: #417088; color: #fff; width: 70px; border: 1px solid" name="cari">Submit</button>
</p><center>
</form>

<?php

//jika user klik butang "Cari" dan textbox carian tidak empty
if (isset($_POST['cari']) && !empty($_POST['i_carian']) )
{
//kenalpasti dropdown list apa yang dipilih oleh user
switch ($_POST["carian"])
{
case "member_id": //jika user pilih search by nama
$query = "SELECT * FROM member
WHERE member_id LIKE '%$_POST[i_carian]%'";
break;
case "gender": //jika user pilih search by nokp
$query = "SELECT * FROM member
WHERE gender LIKE '$_POST[i_carian]'";
break;
case "firstname": //jika user pilih search by kelas
$query = "SELECT * FROM member
WHERE firstname LIKE '$_POST[i_carian]'";
break;
case "year_level": //jika user pilih search by notel
$query = "SELECT * FROM member
WHERE year_level = '$_POST[i_carian]'";
break;
case "status": //jika user pilih search by kodAJK
$query = "SELECT * FROM member
WHERE status = '$_POST[i_carian]'";
break;

}
} else{
//jika user tidak buat carian, paper senarai secara default
//Papar/Select data dari DB
$query = "SELECT * FROM member";
}

$mysql = $query;
$result = mysqli_query($conn, $mysql) or die(mysql_error());

if (mysqli_num_rows($result) > 0) {
//table untuk paparan data
echo "<table border='1'>";
echo "<col width='70'>"; //saiz column 1
echo "<col width='110'>"; //saiz column 2
echo "<col width='110'>"; //saiz column 4
echo "<col width='120'>"; //saiz column 5
echo "<col width='150'>";
echo "<col width='150'>";
echo "<col width='100'>"; //saiz column 6
echo "<col width='90'>"; //saiz column 7
echo "<tr style='height: 50px; background: #ddd;'>";
echo "<th>Member ID</th>";
echo "<th>First Name</th>";
echo "<th>Last Name</th>";
echo "<th>Gender</th>";
echo "<th>Address</th>";
echo "<th>Contact</th>";
echo "<th>Year Level</th>";
echo "<th>Status</th>";
echo "</tr>";

//papar semua data dari jadual dalam DB
while($row = mysqli_fetch_assoc($result)) {
	echo "<tr>";
	echo "<td>".$row['member_id']."</td>"; //nama atribut
	echo "<td>".$row['firstname']."</td>";
	echo "<td>".$row['lastname']."</td>";
	echo "<td>".$row['gender']."</td>";
	echo "<td>".$row['address']."</td>";
	echo "<td>".$row['contact']."</td>";
	echo "<td>".$row['year_level']."</td>";
	echo "<td>".$row['status']."</td>";
	echo "</tr>";
}
echo "</table>";
}
else { echo "<center>No Records</center>";}
?>
</div>

</div>

<div class="column middle" >
<form action="member_add_back.php" method="POST">

<div class="content-container-box">
<div style="display: flex">
<div style="width: 500px;">
<div class="book-contents" style="border: 1px #000 solid; border-radius: 20px;  padding: 30px">

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
<td><input type="text" placeholder="Roslyn Ra Vie" name="i_firstname" required></td>
<td></td>
</tr>
<tr>
<td></td>
<td>Last Name :</td>
<td><input type="text" placeholder="021213050312" name="lastname" required></td>
<td></td>
</tr>
<tr>
<td></td>
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
<td><button style="height: 30px; background: #417088; color: #fff; width: 70px; border: 1px solid" name="loginBtn">Submit</button></td>
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