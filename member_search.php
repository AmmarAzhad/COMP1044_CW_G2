<html>
<head>
<title>Library Read 2gether</title>
<!-- INTERNAL CSS -->
<style>
#tajuk
{
font-size: 25px;
font-weight: bold;
text-align: center;
}
th {
	background-color: #18508C;
	color: #fff;
}
td {
	background-color: #fff;
}
table, td,th{
	padding: 10px 30px;
	margin: auto;
	border-collapse: collapse;
	border: 2px solid black;
	text-align: center;
}
</style>
</head>
<body>
<?php
//Connect to database
include ('db_conn.php');

include ("header.html");

?>
<div id="tajuk"><p>Library Read 2gether<p>Search Book</div>

<p>
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
<input type="submit" value="Search" name="cari" class="searchbtn">
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
echo "<tr>";
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
<?php
//include ("footer.html");
//include ("sidemenu.php");
?>
</body>
</html>