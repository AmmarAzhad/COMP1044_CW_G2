<html>
<head>
<meta charset="UTF-8">
<link rel="stylesheet" href="stylesheet.css">
<title>Library Read 2gether</title>
<style>

table {
	font-size: 20px;
}
</style>

</head>

<body>
<!-- link to login_back -->
<form action="login_back.php" method="POST">
<!-- applying css -->
<div style="display: flex;justify-content: center;width: 100%; height: 100vh;align-items: center;">
<div style="display: flex;flex-flow: column; width: 300px;height: 600px;align-items: center">       
<img src="images/login-logo.png" style="width: 210px; height: 210px; margin-bottom: 13px"/>
<!-- Library Name for Group 2 -->
<h1><center>Library Read 2gether</center>

<!-- applying css for table-->
<div class="content-container-box">
<div style="display: flex">
<div style="width: 500px;">
<div class="book-contents" style="border: 1px #000 solid; border-radius: 20px;  padding: 20px">
<div style="width: 500px;">

<!-- creating table -->
<table cellpadding=3px>
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
<!-- button to register -->
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
<!-- link to register.php -->
<td><a href="register.php"><u><p style = "font-size: 16px">Register Here</p></u></a></td>
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