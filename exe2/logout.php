<?php // rnlogout.php
include_once 'header.php';
echo "<h3>Log out</h3>";

if (isset($_SESSION['user']))
{
	destroySession();
	echo "You have been logged out. Please
	<a href='index.php' style='color:#d3d3d3'>click here</a> to refresh the screen.";
}
else echo "You are not logged in";
?>
