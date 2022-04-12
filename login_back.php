<?php
//Connect to database
include ('db_conn.php');

//get userID and password from login page
$username = $_POST['i_username'];
$password = md5($_POST['i_password']);

//When User clicks 'Login' button
if (isset($_POST['loginBtn']))
{
  //If userID or password left blank
  if (empty($username) || empty($password))
  {
    //output the following line:
	echo '<script>alert("Username and password cannot be left empty!");
		window.location.href="login.php";</script>';
		//will direct user to login page
	}
	else
	{
	//check userID and password from database 
	$mysql = "SELECT * FROM users
			  WHERE username= '$username' AND password ='$password'";
	$result = mysqli_query($conn, $mysql);
	$row = mysqli_fetch_array($result);
	
	//if userID and password are correct
	if(mysqli_num_rows($result) > 0)
	{
		$username = $row['username'];
		$firstname = $row['firstname'];
		
		//Output welcome Pop-up 
		echo '<script>alert("Welcome back '.$firstname.'");
			 window.location.href="main_page.php";</script>';
			 //redirect to main page
	}
	else //if userID and password are incorrect 
	{
	  echo '<script>alert("Invalid username or password.");
			window.location.href="login.php";</script>';
			//redirect to login page
	}
  }
}
//Close connection
mysqli_close($conn);
?>