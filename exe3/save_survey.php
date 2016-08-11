<?php
include 'function.php';
   if (empty($_POST["first_name"])) {
	   $error="first_name must be written!";
	   setcookie('error',$error);
	   header('Location:survey.php');
   }
  else if (empty($_POST["last_name"])){
		   $error= "last_name must be written!";
		   setcookie('error',$error);
		   header('Location:survey.php');
   }
   else if (empty($_POST["age"])){
		   $error = "age must be written!";
		   setcookie('error',$error);
		   header('Location:survey.php');
   }
   else {
     $first_name = sanitizeString($_POST["first_name"]);
	 $last_name = sanitizeString($_POST["last_name"]);
	 $age = sanitizeString($_POST["age"]);
     if ((!preg_match("/^[a-zA-Z ]*$/",$first_name)) || (!preg_match("/^[a-zA-Z ]*$/",$last_name))) {
       $error= "name is not written in right form!";
	   setcookie('error',$error);
	   header('Location:survey.php');
     }
     else if (!preg_match("/^[0-9]+$/",$age)) {
       $error= "age is not written in right form!";
	   setcookie('error',$error);
	   header('Location:survey.php');
     }else{
	 setcookie('first_name',$_POST['first_name']);
	 setcookie('last_name',$_POST['last_name']);
	 setcookie('age',$_POST['age']);
	 setcookie('error','');
	 header('Location:survey_next.php');
 }

 }

?>
