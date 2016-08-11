<?php // rnmessages.php
include_once 'header.php';

if (!isset($_SESSION['user']))
	die("<br /><br />You need to login to view this page");
$user = $_SESSION['user'];

if (isset($_POST['activity']) && isset($_POST['childnum']))
{
	$activity = sanitizeString($_POST['activity']);
	$childnum = sanitizeString($_POST['childnum']);
	if($childnum>3)
		die("<br />Sorry, you cannot reserve the place with more than 3 children!");
	
	if ($activity != "")
	{
		$result = queryMysql("SELECT * FROM places WHERE activity='$activity'");
		$ris = mysqli_fetch_array($result);
		if($ris['available']==0)
			die("<br />The palces of $activity are all reserved.");
		$num = $childnum + 1;
		if($ris['available']<$num)
			die("<br />The palces of $activity are not enough.");
		
		queryMysql("INSERT INTO reservations VALUES(NULL,'$user', '$activity', '$childnum')");
		queryMysql("UPDATE places SET available = available-$num WHERE activity='$activity'");		   
	}
}




echo <<<_END
	<form method='post' action='reserve.php?'>
	<h2>new reservation:</h2>
	Activity:<select name="activity">
	<option value="volley">Volley</option>
	<option value="soccer">Soccer</option>
	<option value="swimming">Swimming</option>
	</select><br /><br />
	Child Number:<input type='text' name='childnum'/><br /><br />
	<input type='submit' value='Add reservation' /></form>
_END;

	if (isset($_GET['cancle']))
	{
		$cannum = sanitizeString($_GET['cancle']);
		$can = queryMysql("SELECT * FROM reservations WHERE reservenum='$cannum'");
		$canl = mysqli_fetch_array($can);
		$canactivity = $canl["activity"];
		$cnum = $canl["childnum"];
		$num = $cnum +1;
		queryMysql("DELETE FROM reservations WHERE reservenum='$cannum'");
		queryMysql("UPDATE places SET available = available+$num WHERE activity='$canactivity'");
	}
	
	
	echo "<br /><br />";
	$result = queryMysql("SELECT * FROM reservations WHERE user='$user'");
	echo "<table style='border-collapse:collapse;'>
			<tr>
				<th>Reservation number</th>
				<th>Activity</th>
				<th>ChildNum</th>
				<th>Edit</th>
			</tr>";
	$n = 0;
	$ris = mysqli_fetch_array($result);
	while($ris != NULL)
	{
		if($n%2 == 0){
		echo "<tr><td>";
		}else{
			echo "<tr class='alt'><td>";
		}
		$act = $ris["reservenum"];
		echo($ris["reservenum"]);
		echo "</td><td>";
		echo($ris["activity"]);
		echo "</td><td>";
		echo($ris["childnum"]);
		echo "</td><td style='color:#d3d3d3'>";
		echo "[<a href='reserve.php?cancle=$act' style='color:#d3d3d3'>cancle</a>]";
		echo "</td></tr>";
	$ris = mysqli_fetch_array($result);
	$n = $n + 1;
	}
	mysqli_free_result($result);
	echo "</table>";
	
	echo "<br /><br />";
	
	echo "<form method='post' action='reserve.php?update=1'>";
	echo "<input type='submit' value='Update available places' />";
	echo "</form>";
	
	
	if(isset($_GET['update']) || isset($_GET['cancle']) || isset($_POST['activity']) && isset($_POST['childnum'])){
	$result = queryMysql("SELECT * FROM places ORDER BY available desc");
	echo "<table style='border-collapse:collapse;'>
			<tr>
				<th>Sport</th>
				<th>Quantity</th>
				<th>Available</th>
			</tr>";
	$n = 0;
	$ris = mysqli_fetch_array($result);
	while($ris != NULL)
	{
		if($n%2 == 0){
		echo "<tr><td>";
		}else{
			echo "<tr class='alt'><td>";
		}

		echo($ris["activity"]);
		echo "</td><td>";
		echo($ris["quantity"]);
		echo "</td><td>";
		echo($ris["available"]);
		echo "</td></tr>";
	$ris = mysqli_fetch_array($result);
	$n = $n + 1;
	}
	mysqli_free_result($result);
	echo "</table>";}
	
?>
