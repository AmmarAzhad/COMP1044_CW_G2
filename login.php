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
<!-- link to login_back -->
<form action="login_back.php" method="POST">
<div style="display: flex;justify-content: center;width: 100%; height: 100vh;align-items: center;">
<div style="display: flex;flex-flow: column; width: 300px;height: 600px;align-items: center">       
<img src="images/login-logo.png" style="width: 210px; height: 210px; margin-bottom: 13px"/>
<h1><center>Library Read 2gether</center>

<div style="width: 500px;">
<table cellpadding=5px>
<tr>
<td style="width: 50px"></td>
<td></td>
<td></td>
<td style="width: 50px"></td>
</tr>
<tr>
<td></td>
<td></td>
<td></td>
<td></td>
</tr>
<tr>
<td></td>
<td>Username :</td>
<td><input type="text" name="i_username" required></td>
<td></td>
</tr>
<tr>
<td></td>
<td>Password :</td>
<td><input type="password" name="i_password" required></td>
<td></td>
</tr>
<tr>
<td></td>
<td></td>
<td>
<button style="height: 30px; background: #417088; color: #fff; width: 180px; border: 1px solid" name="loginBtn" >Login</button></td>
<td></td>
</tr>
<tr>
<td></td>
<td></td>
<td><p>New user?</td>
<td></td>
</tr>
<tr>
<td></td>
<td></td>
<td><a href="register.php">Register Here</a></td>
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

</form>
</body>
</html>