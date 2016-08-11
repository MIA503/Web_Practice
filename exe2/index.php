<?php // index.php
include_once 'header.php';
echo "<h3>Home page</h3>";
echo "Welcome, please Sign up and/or Log in to join in.<br /><br />";
$result = queryMysql("SELECT * FROM orders ORDER BY participant desc");
$n = 0;
echo "<table style='border-collapse:collapse;'>
		<tr>
			<th>ReservationID</th>
			<th>Participant</th>
			<th>StartTime</th>
			<th>EndTime</th>
		</tr>";

$ris = mysqli_fetch_array($result);
while($ris != NULL)
{	
	if($n%2 == 0){
	echo "<tr><td>";
	}else{
		echo "<tr class='alt'><td>";
	}
		echo($ris['reservid']);
		echo "</td><td>";
		echo($ris['participant']);
		echo "</td><td>";
		echo($ris['starttime']);
		echo "</td><td>";
		echo($ris['endtime']);
		echo "</td></tr>";
	$n = $n + 1;
$ris = mysqli_fetch_array($result);
}
mysqli_free_result($result);
echo "</table>";
?>