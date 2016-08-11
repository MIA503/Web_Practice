<?php // rnheader.php
include 'function.php';
session_start();
if(isset($_SESSION['lastOptTime'])){
    if(time()-$_SESSION['lastOptTime']>120){
        unset($_SESSION['lastOptTime']);
        header('Location:logout.php');
    }else{
        $_SESSION['lastOptTime']=time();
    }
}
if (isset($_SESSION['user']))
{
	$user = $_SESSION['user'];
	$loggedin = TRUE;
	
}
else $loggedin = FALSE;

echo "<html><head><title>$appname";
if ($loggedin) echo " ($user)";
echo "</title></head>";
?>
<style type="text/css">
div#container{width:100%}
div#header {background-color:#87cefa;height:10%;text-align:center;font-size:50px;color:#ffffff;  font-family:Arial, Helvetica, sans-serif;}
div#menu {background-color:#d3d3d3;height:90%;width:15%;float:left;padding-top:1%;  font-family:'Trebuchet MS', Arial, Helvetica, sans-serif;}
div#content {background-color:#f0f8ff;height:90%;width:83%;float:left;padding-left:2%; font-family:'Trebuchet MS', Arial, Helvetica, sans-serif;}
ul{list-style-type:none;margin:0;padding:0;padding-left:0.3cm;}
li{margin:0.2cm;}
a:link,a:visited{font-weight:bold;color:#ffffff;text-align:center;margin:5px;text-decoration:none;text-transform:uppercase;}
a:hover,a:active{background-color:#87cefb;}
td,th{width:4cm;font-size:1em;border:1px solid #1E90FF;padding:3px 7px 2px 7px;}
th{font-size:1.1em;text-align:left;padding-top:5px;padding-bottom:4px;background-color:#00BFFF;color:#ffffff}
tr.alt td{color:#000000;background-color:#87CEFA;}
</style>	
<?php
echo "<body>";
echo "<div id='container'><div id='header'>$appname</div>";
echo "<div id='menu'>";
if ($loggedin)
{
	
		

	echo "	<ul>
			<li><a href='members.php'>Your Home</a></li>
			<li><a href='reserve.php'>Reserve</a></li>
			<li><a href='logout.php'>Log out</a></li>
			</ul>";
}
else
{
	echo "<ul><li><a href='index.php'>Home</a></li>
		 <li><a href='signup.php'>Sign up</a></li>
		 <li><a href='login.php'>Log in</a></li><ul>";
}
echo "</div><div id='content'>";
?>


