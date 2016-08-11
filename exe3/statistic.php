<?php
include('header.php');
?>
<?php
if(isset($_COOKIE['reward'])){
    echo '<p><h3>Reward:<small>'.$_COOKIE['reward'].'</small></h3></h></p>';
}
?>
<h3>Statistic</h3>

<hr/>
<?php
$query="select id,email,reward from survey";
$result=queryMysql($query);
echo '<table>';
echo '<tr><th>ID</th><th>Email</th><th>Reward</th></tr>';
while($row=mysqli_fetch_array($result,MYSQLI_ASSOC)){
    echo '<tr>';
    echo '<td>'.$row['id'].'</td><td>'.$row['email'].'</td><td>'.$row['reward'].'</td>';
    echo '</tr>';
}
echo '</table>';
?>
<hr/>
<?php
$query="select elt(interval(age,0,18,30,50),'0-17','18-29','30-49','>50') as `age_group`,count(*) as `count` from survey group by elt(interval(age,0,18,30,50),'0-17','18-29','30-49','>50')";
$query1 = "select count(*) as 'amount'  from survey";
$amm = queryMysql($query1);
$amo = mysqli_fetch_array($amm,MYSQLI_ASSOC);
$amount = $amo['amount'];
$result=queryMysql($query);
echo '<table>';
echo '<tr><th>Age Group</th><th>Count</th><th>Percentage</th></tr>';
while($row=mysqli_fetch_array($result,MYSQLI_ASSOC)){
	$per = $row['count']/$amount*100;
    echo '<tr>';
    echo '<td>'.$row['age_group'].'</td><td>'.$row['count'].'</td><td>'.$per.'%'.'</td>';
    echo '</tr>';
}
echo '</table>';
?>
<hr/>
<?php
$query="select sport,count(*) as 'count'  from sports group by sport";
$query1 = "select count(*) as 'amount'  from sports where sport<>'--'";
$amm = queryMysql($query1);
$amo = mysqli_fetch_array($amm,MYSQLI_ASSOC);
$amount = $amo['amount'];
$result=queryMysql($query);
echo '<table>';
echo '<tr><th>Sport</th><th>Count</th><th>Percentage</th></tr>';
while($row=mysqli_fetch_array($result,MYSQLI_ASSOC)){
	$per = $row['count']/$amount*100;
	echo '<tr>';
	if($row['sport']=='--'){
		echo '<td>'.$row['sport'].'</td><td>'.$row['count'].'</td><td>'.'--'.'</td>';
	}else{
		echo '<td>'.$row['sport'].'</td><td>'.$row['count'].'</td><td>'.$per.'%'.'</td>';
	}   
    echo '</tr>';
}
echo '</table>';
?>
<hr/>

<?php
?>
