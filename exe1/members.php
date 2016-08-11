<?php // rnmembers.php
include_once 'header.php';

if (!isset($_SESSION['user']))
	die("<br /><br />You must be logged in to view this page");
$user = $_SESSION['user'];

echo "<h2>$user's Page</h2>";
	$result = queryMysql("SELECT * FROM reservations WHERE user='$user'");
	$ris = mysqli_fetch_array($result);
	$n = 0;
	if($ris!=NULL){
	echo "<table style='border-collapse:collapse;'><tr><th>Reservation num</th><th>Activity</th><th>ChildNum</th></tr>";

	while($ris != NULL)
	{
		if($n%2 == 0){
		echo "<tr><td>";
		}else{
			echo "<tr class='alt'><td>";
		}
		echo($ris["reservenum"]);
		echo "</td><td>";
		echo($ris["activity"]);
		echo "</td><td>";
		echo($ris["childnum"]);
		echo "</td></tr>";
	$ris = mysqli_fetch_array($result);
	$n = $n + 1;
	}
	mysqli_free_result($result);
	echo "</table>";
}else
	echo "No reservation.";
?>
