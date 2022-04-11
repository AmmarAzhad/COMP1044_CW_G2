<html>
<head>
<!-- INI IALAH INTERNAL CSS -->
<style>
#mainbody
{
position: absolute;
top: 130px;
left: 0px;
bottom: 15px;
overflow: auto;
width: 100%;
background-color: khaki;
}
#tajuk
{
font-size: 25px;
font-family: Tv Cen MT Condensed;
font-weight: bold;
text-align: center;
}
table{
border: 2px solid black;
border-collapse: collapse;
margin: auto;
background-color: palegoldenrod;
}
table, td {
text-align: right;
}
</style>
</head>
<body>

<div id="mainbody">
<!-- link to register_back -->
<form action="register_back.php" method="POST">
<div id="tajuk"><p> Group Read 2gether Library
<p>Sign Up
</div>

<table cellpadding=5px>
<tr>
<td style="width: 20px"></td>
<td></td>
<td></td> 
<td style="width: 20px"></td>
</tr>
<tr>
<td></td>
<td></td>
<td></td>
<td></td>
</tr>
<tr>
<td></td>
<td>First Name :</td>
<td><input type="text" placeholder="Jackson" name="i_firstname" required></td>
<td></td>
</tr>
<tr>
<td></td>
<td>Last Name :</td>
<td><input type="text"placeholder= "Micheal"  name="i_lastname" required></td>
<td></td>
</tr>
<tr>
<td></td>
<td>Username :</td>
<td><input type="text" placeholder="Lily" name="i_username" required></td>
<td></td>
</tr>
<tr>
<td></td>
<td>Password :</td>
<td><input type="password" placeholder="MJLilY123!" name="i_password" required></td>
<td></td>
</tr>
<tr>
<td></td>
<td></td>
<td><input type="submit" name="sign_up" value="Sign Up"></td>
<td></td>
</tr>
<tr>
<td></td>
<td></td>
<td><a href="login.php"> Back</a></td>
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

</form>
</div>
</body>
</html>