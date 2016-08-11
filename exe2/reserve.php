<?php // rnmessages.php
include_once 'header.php';

if (!isset($_SESSION['user']))
	die("<br /><br />You need to login to view this page");
$user = $_SESSION['user'];



if (isset($_POST['participant']) && isset($_POST['stimem']) && isset($_POST['stimeh']) && 
		isset($_POST['etimeh']) && isset($_POST['etimem']))
{
	
	$participant = sanitizeString($_POST['participant']);
	$stimem = sanitizeString($_POST['stimem']);
	
	$stimeh = sanitizeString($_POST['stimeh']);
	$etimem = sanitizeString($_POST['etimem']);
	$etimeh = sanitizeString($_POST['etimeh']);
	
	$stime = array($stimeh,$stimem);
	$etime = array($etimeh,$etimem);
	$starttime = toTime($stime);
	$endtime = toTime($etime);
	if(isSmall($stime,$etime)){
		$sum = 0;
		$result = queryMysql("SELECT * FROM orders");		
		$ris = mysqli_fetch_array($result);
		while($ris != NULL){
			$nstime = array($ris['sth'],$ris['stm']);
			$netime = array($ris['eth'],$ris['etm']);
			if((isSmall($etime,$nstime) || isSmall($netime,$stime))==0){
				$sum = $sum + $ris['participant'];
			}
			$ris = mysqli_fetch_array($result);		
		}
		mysqli_free_result($result);
	
		$sum = $sum+$participant;
		if($sum > 100)
			die("Too many participants  at the same time!");
		else 
		queryMysql("INSERT INTO orders VALUES(NULL,'$user', '$participant', '$starttime', 
			'$endtime', '$stimeh', '$stimem', '$etimeh', '$etimem')");		
		
	}else{	
		die("The end time cannot smaller than start time");
	}	
}


echo <<<_END
	<form method='post' action='reserve.php?'>
	<h2>new reservation:</h2>
	Number of participants:<input type='txt' name="participant">
	<br /><br />
	Start Time:<input type='text' name='stimeh'/><input type='text' name='stimem'/>(hh:mm)<br /><br />
	End Time:  <input type='text' name='etimeh'/><input type='text' name='etimem'/>(hh:mm)<br /><br />
	<input type='submit' value='Add reservation' />
	</form>
_END;

	if (isset($_GET['cancle']))
	{
		$cannum = sanitizeString($_GET['cancle']);		
		queryMysql("DELETE FROM orders WHERE reservid='$cannum'");
	}
	
	
	echo "<br /><br />";
	$result = queryMysql("SELECT * FROM orders WHERE user='$user'");
	echo "<table style='border-collapse:collapse;'>
			<tr>
				<th>ReservationId</th>
				<th>Participant</th>
				<th>StartTime</th>
				<th>EndTime</th>
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
		$act = $ris["reservid"];
		echo($ris["reservid"]);
		echo "</td><td>";
		echo($ris["participant"]);
		echo "</td><td>";
		echo($ris["starttime"]);
		echo "</td><td>";
		echo($ris["endtime"]);
		echo "</td><td>";
		echo "[<a href='reserve.php?cancle=$act' style='color:#d3d3d3'>cancle</a>]";
		echo "</td></tr>";
	$ris = mysqli_fetch_array($result);
	$n = $n + 1;
	}
	mysqli_free_result($result);
	echo "</table>";
	
	echo "<br /><br />";
	
	echo "<form method='post' action='reserve.php?update=1'>";
	echo "<input type='submit' value='Update current orders' />";
	echo "</form>";
	
	
	if(isset($_GET['update']) || isset($_GET['cancle']) || (isset($_POST['participant']) 
		&& isset($_POST['stimem']) && isset($_POST['stimeh']) && isset($_POST['etimeh']) && isset($_POST['etimem']))){
	$result = queryMysql("SELECT * FROM orders ORDER BY participant desc");
	echo "<table style='border-collapse:collapse;'>
			<tr>
				<th>ReservationId</th>
				<th>Participant</th>
				<th>StartTime</th>
				<th>EndTime</th>
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

		echo($ris["reservid"]);
		echo "</td><td>";
		echo($ris["participant"]);
		echo "</td><td>";
		echo($ris["starttime"]);
		echo "</td><td>";
		echo($ris["endtime"]);
		echo "</td><tr>";
	$ris = mysqli_fetch_array($result);
	$n = $n + 1;
	}
	mysqli_free_result($result);
	echo "</table>";}
	
?>
