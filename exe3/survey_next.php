<?php
    include('header.php');
?>
<h3>Page Page Two</h3>
<?php
if(!empty($_COOKIE['error'])){
	$error = $_COOKIE['error'];
	echo $error;
	echo "<br /><br />";
}
?>
 <form action="save_survey_next.php" method="post">
    <label for="sport1">First</label>
    <input type="text" name="sport1" placeholder="First Sport" value="<?php echo isset($_COOKIE['sport1'])?$_COOKIE['sport1']:'';?>"><span class="error">*</span><br/>
    <label for="sport2">Second</label>
    <input type="text" name="sport2" placeholder="Second Sport"  value="<?php echo isset($_COOKIE['sport2'])?$_COOKIE['sport2']:'';?>"><br/>
    <label for="sport3">Third</label>
    <input type="text" name="sport3" placeholder="Third Sport" value="<?php echo isset($_COOKIE['sport3'])?$_COOKIE['sport3']:'';?>"><br/>
    <input type="submit" name="pre" value="Pre">
    <input type="submit" name="next" value="Next">
</form>
<br/>
<p><span class="error">(* Mandatory to write)</span></p>
<?php
include('footer_with_timer.php');
?>

