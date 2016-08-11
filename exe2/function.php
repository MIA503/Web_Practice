<?php // rnfunctions.php
$dbhost  = '127.0.0.1';    // Unlikely to require changing
$dbname  = 'conference'; // Modify these...
$dbuser  = 'cheng';     // ...variables according
$dbpass  = '1234567';     // ...to your installation
$appname = "Conference Reservation"; // ...and preference

$conn = mysqli_connect($dbhost, $dbuser, $dbpass,$dbname);
    if (!$conn)
die('Connection error (' . mysqli_connect_errno() . ') ' . mysqli_connect_error());

function createTable($name, $query)
{
	if (!tableExists($name))
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
	if(!$ris){
		return 1;
	}
	else 
		return 0;
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

function toTime($var){
	if(isTime($var))
		return $var[0].':'.$var[1];
	else
		die("Time is not in correct form.");
}

function isTime($var){
	if($var[0]<0 || $var[0]>23)
		return 0;
	else if($var[1]<0 || $var[1]>59)
		return 0;
	else
		return 1;
}

function isSmall($var1,$var2){
	if($var1[0]<$var2[0])
		return 1;
	else if($var1[0] == $var2[0] && $var1[1]<$var2[1])
		return 1;
	else return 0;
}
	
	
	
	
	

