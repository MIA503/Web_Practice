<?php // rnsignup.php
include_once 'header.php';

echo <<<_END
<h3>Sign up Form</h3>
_END;

$error = $user = $pass = "";
if (isset($_SESSION['user'])) destroySession();

if (isset($_POST['user']))
{
	$user = sanitizeString($_POST['user']);
	$pass = sanitizeString($_POST['pass']);
	
	if ($user == "" || $pass == "")
	{
		$error = "Not all fields were entered<br /><br />";
	}
	else
	{
		$query = "SELECT * FROM users WHERE user='$user'";

		if (mysqli_fetch_array(queryMysql($query))!=NULL)
		{
			$error = "That username already exists<br /><br />";
			$script= $_SERVER['PHP_SELF'] ;
			die("<h4>$error</h4>Please <a href=\"$script\">sign up again.</a>");
		}
		else
		{
			$query = "INSERT INTO users VALUES('$user', '$pass')";
			queryMysql($query);
			die("<h4>Account created</h4>Please Log in.");
		}
	}
}

echo <<<_END
<form method='post' action='signup.php'>$error
Username <input type='text' maxlength='16' name='user' value='$user'
	     /><br /><br />
Password <input type='text' maxlength='16' name='pass'
	value='$pass' /><br /><br />
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
<input type='submit' value='Signup' />
</form>
_END;
?>
