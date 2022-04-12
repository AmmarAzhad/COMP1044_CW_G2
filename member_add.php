<html>
<head>
<title>Library Read 2gether</title>
<!-- INTERNAL CSS -->
<style>
#tajuk
{
font-size: 25px;
color: #18508C;
font-weight: bold;
text-align: center;
}
input[type=text]{
	width: 250px;
}
input[type=tel]{
	width: 250px;
}
table{
border: 2px solid #18508C;
border-collapse: collapse;
margin: auto;
color: white;
background-color: #18508C; 
}
table, td {
text-align: left;
}
</style>
</text>
<body>
<?php
include("header.html");

//include("footer.html");
?>
<div id="tajuk"><p>Library Read 2gether <p>Register New Member</div>

<form action="member_add_back.php" method="POST">
<table cellpadding=5px>
<tr>
<td style="width: 20px"></td>
<td></td>
<td></td>
<td style="width: 20px"></td>
</tr>
<tr>
<td colspan="4"></td>
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
<td colspan="4"></td>
</tr>
<tr>
<tr>
<td></td>
<td colspan="2"><input type="submit" name="loginBtn" value="Submit" class="submitbtn"></td>
<td></td>
</tr>
<tr>
<td colspan="4"></td>
</tr>
<tr>
<td colspan="4"></td>
</tr>
</table>

</form>
<?php
//include("sidemenu.php");
?></body>
</html>