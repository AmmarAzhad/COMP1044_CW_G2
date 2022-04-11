<html>
<head>
<!-- INTERNAL CSS -->
<style>
#mainbody
{
position: absolute;
top: 120px;
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

<!-- link to login_back -->
<form action="login_back.php" method="POST">
<div id="tajuk"><p> Group Read 2gether Library
<p>Login
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
<td><input type="submit" name="loginBtn" value="Login"></td>
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

</form>
</div>
</body>
</html>