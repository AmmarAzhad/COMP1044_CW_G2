<html>
<head>
<!-- INTERNAL CSS -->
<link rel = "stylesheet" href = "stylesheet.css">
<style>
#tajuk
{
font-size: 25px;
font-weight: bold;
text-align: center;
}
table{
border: 2px solid black;
border-collapse: collapse;
margin: auto;
padding: auto;
}
table, td {
text-align: right;
}
</style>
</head>
<body>

<!-- link to login_back -->
<form action="login_back.php" method="POST">
<div style="margin-top:200px"></div>
<div class="container">
	<div id="tajuk">
		<p> Group Read 2gether Library</p>
		<p>Login</p>
	</div>
</div>


<img src="images/logo.png" id = "logo" class="center">

<div class="container">
	<table cellpadding=5px>
		<tr style="height: 20px">
			<td style="width: 20px"></td>
			<td></td>
			<td></td>
			<td></td>
			<td style="width: 20px"></td>
		</tr>
		<tr>
			<td colspan="5"></td>
		</tr>
		<tr>
			<td></td>
			<td>Username :</td>
			<td><input type="text" name="i_username" required></td>
			<td rowspan="2"><input type="submit" name="loginBtn" value="Login" class="loginbtn"></td>
		</tr>
		<tr>
			<td></td>
			<td>Password :</td>
			<td><input type="password" name="i_password" required></td>
			<td></td>
		</tr>
		<tr>
			<td colspan="5"></td>
		</tr>
		<tr>
			<td colspan="4"><p>Don't have an account? <a href="register.php">Register Here</a></td>
		</tr>
		<tr>
			<td colspan="5"></td>
		</tr>
		<tr>
			<td colspan="5"></td>
		</tr>
		<tr>
			<td colspan="5"></td>
		</tr>
	</table>
</div>



</form>
</body>
</html>