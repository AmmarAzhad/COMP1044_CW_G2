<html>
<head>
<meta charset="UTF-8">
<link rel="stylesheet" href="stylesheet.css">
<style>

table {
	font-size: 20px;
}
</style>

</head>

<body>

<!-- link to register_back -->
<form action="register_back.php" method="POST">
<div style="display: flex;justify-content: center;width: 100%; height: 100vh;align-items: center;">
<div style="display: flex;flex-flow: column; width: 300px;height: 600px;align-items: center">     
<h1><center>Group Read 2gether Library</center>
<h2><center>Sign Up</center>

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
<td><button style="height: 30px; background: #417088; color: #fff; width: 180px; border: 1px solid" name="sign_up" >Sign Up</button></td>
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
</div>
</div>
</form>
</body>
</html>