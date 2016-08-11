<?php // index.php
include_once 'header.php';
echo "<h3>Home page</h3>";
echo "Welcome, please Sign up and/or Log in to join in.";
$result = queryMysql("SELECT * FROM places");
{
echo "<table>
		<tr>
			<th>Activity</th>
			<th>Quantity</th>
			<th>Available</th>
		</tr>";

$ris = mysql_fetch_array($result);
while($ris != NULL)
{
	echo "<tr>
		<td>";
	echo($ris['activity']);
		echo "</td><td>";
		echo($ris['quantity']);
		echo "</td><td>";
		echo($ris['available']);
		echo "</td></tr>";
$ris = mysql_fetch_array($result);
}
mysql_free_result($result);
echo "</table>";
?>

