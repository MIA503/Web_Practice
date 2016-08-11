<?php
include 'function.php';
setcookie('error','');
setcookie('sport1',$_POST['sport1']);
setcookie('sport2',$_POST['sport2']);
setcookie('sport3',$_POST['sport3']);
if(isset($_POST['pre'])){
    header('Location:survey.php');
}else if(isset($_POST['next'])){
	$count =0;
	if(empty($_POST["sport1"]))$count=$count+1;
	if(empty($_POST["sport2"]))$count=$count+1;
	if(empty($_POST["sport3"]))$count=$count+1;
   if ($count==3) {
	   $error="at leat one sport should be written!";
	   setcookie('error',$error);
	   header('Location:survey_next.php');
   } else {
     $sport1 = sanitizeString($_POST["sport1"]);
	 $sport2 = sanitizeString($_POST["sport2"]);
	 $sport3 = sanitizeString($_POST["sport3"]);
     if ((!preg_match("/^[a-zA-Z ]*$/",$sport1)) || (!preg_match("/^[a-zA-Z ]*$/",$sport2)) || (!preg_match("/^[a-zA-Z ]*$/",$sport3))) {
       $error = "sport is not written in right form!";
	   setcookie('error',$error);
	   header('Location:survey_next.php');
     }else{
		     header('Location:survey_last.php');
		 }
   }
}
?>
