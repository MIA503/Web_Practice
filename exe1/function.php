<?php // rnfunctions.php
$dbhost  = '127.0.0.1';    // Unlikely to require changing
$dbname  = 'sport'; // Modify these...
$dbuser  = 'cheng';     // ...variables according
$dbpass  = '1234567';     // ...to your installation
$appname = "Sport Place Reservation"; // ...and preference

$conn = mysqli_connect($dbhost, $dbuser, $dbpass,$dbname);
    if (!$conn)
die('Connection error (' . mysqli_connect_errno() . ') ' . mysqli_connect_error());

function createTable($name, $query)
{
	if (tableExists($name))
	{
		echo "Table '$name' already exists<br />";
	}
	else
	{
		queryMysql("CREATE TABLE $name($query)");
		echo "Table '$name' created<br />";
	}
}

function tableExists($name)
{
	$result = queryMysql("SHOW TABLES LIKE '$name'");
	$ris = mysqli_fetch_array($result);
	return $ris;
}

function queryMysql($query)
{
	global $conn;
	$result = mysqli_query($conn, $query);
    if (!$result)
      die('Query non riuscita');
	return $result;
}

function destroySession()
{
	$_SESSION=array();
	
	if (session_id() != "" || isset($_COOKIE[session_name()]))
	    setcookie(session_name(), '', time()-2592000, '/');
		
	session_destroy();
}

function sanitizeString($var)
{
	global $conn;
	$var = strip_tags($var);
	$var = htmlentities($var);
	$var = stripslashes($var);
	return mysqli_real_escape_string($conn,$var);
}

