<?php // rnlogout.php
include 'header.php';
setcookie("first_name", "");
setcookie("last_name", "");
setcookie("age", "");
setcookie("reward", "");
setcookie("sport1",'');
setcookie("sport2",'');
setcookie("sport3",'');
setcookie("email",'');
setcookie('error','');
echo "<br/>"
echo "Time is out, please <a href='index.php' style='color:#d3d3d3'>click here</a> to refresh the screen.";
?>
