<html>
<head>
<link rel = "stylesheet" href = "stylesheet.css">
<title>LIBRARY Read 2gether</title>
<style>

.button1 {
  background-color: #18508C;
  border: none;
  color: white;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin-left: -160px ;
  cursor: pointer;
}

.button2 {
  background-color: #FF0000;
  border: none;
  color: white;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin-left: -100px ;
  cursor: pointer;
}

#title
{
font-size: 25px;
font-family: Tv Cen MT Condensed;
font-weight: bold;
text-align: center;
}

table {
	border: none;
	margin: auto;
	font-family: Tw Cen MT;
	font-size: 20px;
}
</style>
</head>
<body>

<?php
//Connect to database
include ('db_conn.php');
include ("header.html");

if(isset($_POST['update'])){
  $id = $_GET['updateid'];
$firstname =$_POST['i_firstname'];
$lastname =$_POST['i_lastname'];
$gender =$_POST['i_gender'];
$address =$_POST['i_address'];
$contact =$_POST['i_contact'];
$type_id =$_POST['i_typeid'];
$year_level =$_POST['i_yearlevel'];
$status =$_POST['i_status'];


$mysql = "UPDATE member SET firstname='$firstname', lastname='$lastname', gender='$gender', address='$address', contact='$contact', type_id='$type_id', year_level='$year_level', status='$status' WHERE member_id= $id";
if (mysqli_query($conn, $mysql)) {
  //papar javascript alert jika pengguna baru berjaya daftar
  echo '<script type="text/javascript">;
  alert("Updated Successfully!");
     window.location.href="member.php";</script>';
     //selepas berjaya daftar, kembali ke login page
     
} 
else {
  echo "Error ; " . mysqli_error($conn);
}
}
?>

<?php
if (isset($_GET['updateid'])){
  $id = $_GET['updateid'];
  $query = "SELECT * FROM member WHERE member_id = $id";
  $mysql = $query;
  $result = mysqli_query($conn, $mysql) or die(mysql_error());
  $row = mysqli_fetch_assoc($result);
  $firstname= $row['firstname'];
  $lastname = $row['lastname'];
  $gender = $row['gender'];
  $address = $row['address'];
  $contact = $row['contact'];
  $type_id = $row['type_id'];
  $year_level = $row['year_level'];
  $status = $row['status'];
}

?>


<div id="title"><p>Library Read 2gether<p>Update Member Details</div>
<form method="POST">
<div class="container center">
<div style="display: flex">
<div style="margin-left: 400px;">
<div style="width: 600px;">
<div class="book-contents" style="border: 1px #000 solid; border-radius: 20px;  padding: 30px">

<table cellpadding=6px>
<tr>
<td></td>
<td></td>
<td style="width: 30px"></td>
</tr>


<tr>
<td></td>
<td> First Name :</td>
<div class="search">
<td><input class="input" type="text" name="i_firstname" required value="<?php echo $firstname?>"></td>
</div>
<td></td>
</tr>

<tr>
<td></td>
<td>Last Name :</td>
<td><input type="text" name="i_lastname" required value="<?php echo $lastname?>"></td>
<td></td>
</tr>

<tr>
<td></td>
<td>Gender :</td>
<td><input type="text" name="i_gender" required value="<?php echo $gender?>"></td>
<td></td>
</tr>

<tr>
<td></td>
<td> Address :</td>
<div class="search">
<td><input type="text" name="i_address" required value="<?php echo $address?>"></td>
</div>
<td></td>
</tr>

<tr>
<td></td>
<td>Contact :</td>
<td><input type="text" name="i_contact" required value="<?php echo $contact?>"></td>
<td></td>
</tr>

<tr>
<td></td>
<td> Type ID :</td>
<div class="search">
<td><input type="text" name="i_typeid" required value="<?php echo $type_id?>"></td>
</div>
<td></td>
</tr>

<tr>
<td></td>
<td>Year Level :</td>
<td><input type="text" name="i_yearlevel" required value="<?php echo $year_level?>"></td>
<td></td>
</tr>
<tr>
<td></td>
<td>Status :</td>
<td><input type="text" name="i_status" required value="<?php echo $status?>"></td>
<td></td>
</tr>


<tr>
<td></td>
<td></td>
<td><input type="submit" value="Update" name="update" class="button1" updateid="$id"></td>
<td><button class="button2"><a href="member.php" style="color:white">Cancel</a></button></td>
<td></td>
</tr>
</form>
</table>

</div>
</div>
</div>
</div>

</form>
</div>
</body>
</html>