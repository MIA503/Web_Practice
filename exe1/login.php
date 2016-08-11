<?php // rnlogin.php
include_once 'header.php';
echo "<h3>Member Log in</h3>";
$error = $user = $pass = "";

if (isset($_POST['user']))
{
	$user = sanitizeString($_POST['user']);
	$pass = sanitizeString($_POST['pass']);
	
	if ($user == "" || $pass == "")
	{
		$error = "Not all fields were entered<br />";
	}
	else
	{

		$query = "SELECT user,pass FROM users
				  WHERE user='$user' AND pass='$pass'";

		if (mysqli_fetch_array(queryMysql($query)) == NULL)
		{
			$error = "Username/Password invalid<br />";
		}
		else
		{
			$_SESSION['user'] = $user;
			$_SESSION['pass'] = $pass;
			 $_SESSION['lastOptTime']=time();
			die("You are now logged in. Please
			   <a href='members.php' style='color:#d3d3d3'>click here</a>.");
		}
	}
}

echo <<<_END
<form method='post' action='login.php'>$error
Username <input type='text' maxlength='16' name='user'
	value='$user' /><br /><br />
Password <input type='password' maxlength='16' name='pass'
	value='$pass' /><br /><br />
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
<input type='submit' value='Login' />
</form>
_END;
?>
