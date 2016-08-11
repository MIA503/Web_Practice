<?php
include 'header.php';
?>
<h3>Survey Page One</h3>

<?php
if(!empty($_COOKIE['error'])){
	$error = $_COOKIE['error'];
	echo $error;
	echo "<br /><br />";
}
?>

<form action="save_survey.php" method="post">
<label for="first_name">First Name:</label>
<input type="text" name="first_name" placeholder="First Name" value="<?php echo isset($_COOKIE['first_name'])?$_COOKIE['first_name']:'';?>"><span class="error">*</span><br/>
<label for="">Last Name:</label>
<input type="text" name="last_name" placeholder="Last Name" value="<?php echo isset($_COOKIE['last_name'])?$_COOKIE['last_name']:'';?>"><span class="error">*</span><br/>
<label for="age">Age:</label>
<input type="text" name="age" placeholder="Age" value="<?php echo isset($_COOKIE['age'])?$_COOKIE['age']:'';?>"><span class="error">*</span><br/>
<input type="submit" value="Next">
</form>
<br/>
<p><span class="error">(* Mandatory to write)</span></p>
<?php
include('footer_with_timer.php');
?>

