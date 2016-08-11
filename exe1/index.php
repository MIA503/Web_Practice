<?php // index.php
include_once 'header.php';
echo "<h3>Home page</h3>";
echo "Welcome, please Sign up and/or Log in to join in.<br /><br />";
$result = queryMysql("SELECT * FROM places ORDER BY available desc");
$n = 0;
echo "<table style='border-collapse:collapse;'>
		<tr>
			<th>Activity</th>
			<th>Quantity</th>
			<th>Available</th>
		</tr>";

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
	$n = $n + 1;
$ris = mysqli_fetch_array($result);
}
mysqli_free_result($result);
echo "</table>";
?>