<?php
include('header.php');
?>
<h3>Survey Page Three</h3>
<?php
if(!empty($_COOKIE['error'])){
	$error = $_COOKIE['error'];
	echo $error;
	echo "<br /><br />";
}
?>
<form action="save.php" method="post">
<label for="email">Enter a valid email address</label>
<input type="email" name="email" placeholder="Email Address" value="<?php echo isset($_COOKIE['email'])?$_COOKIE['email']:'';?>" size="48"><span class="error">*</span><br/>
<input type="submit" name="pre" value="Pre">
<input type="submit" name="save" value="Save">
</form>
<br/>
<p><span class="error">(* Mandatory to write)</span></p>
<?php
include('footer_with_timer.php');
?>
