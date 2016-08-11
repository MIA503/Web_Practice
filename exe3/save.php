<?php
include('function.php');
if(isset($_POST['pre'])){
	setcookie('error','');
    setcookie('email',$_POST['email']);
    header('Location:survey_next.php');
}else if(isset($_POST['save'])){
	if (empty($_POST["email"])) {
		$error = "email must be written!";
		setcookie('error',$error);
        setcookie('email','');
        setcookie('reward','');
		header('Location:survey_last.php');
	   } else {
	     $email = sanitizeString($_POST["email"]);
	     if (!preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/",$email)) {
	       $error="email is not written in right form!";
		   setcookie('error',$error);
           setcookie('email','');
           setcookie('reward','');
		   header('Location:survey_last.php');
	     }else{
			 $query="select * from survey where email='".$_POST['email']."'";
   		  	if(($row=mysqli_fetch_array(queryMysql($query)))!=NULL){
				$error ="email already exists, please write a new one!";
				setcookie('error',$error);
    			setcookie('email','');
    			setcookie('reward','');
     		   header('Location:survey_last.php');
   			}else{
    			$query="select count(*) from survey";
     		    $row=mysqli_fetch_array(queryMysql($query),MYSQLI_NUM);
     			$reward=50*pow(0.5,$row[0]);
     			$reward=$reward<1.00?1.00:$reward;
      	   		setcookie('reward',$reward);
       		 	$first_name=$_COOKIE['first_name'];
      		  	$last_name=$_COOKIE['last_name'];
     		   	$age=$_COOKIE['age'];
    			$email=$_POST['email'];
    			$sport1=$_COOKIE['sport1']?$_COOKIE['sport1']:'--';
     			$sport2=$_COOKIE['sport2']?$_COOKIE['sport2']:'--';
     		  	$sport3=$_COOKIE['sport3']?$_COOKIE['sport3']:'--';
      		  	$query="insert into survey values(null,'$first_name','$last_name','$age','$sport1','$sport2','$sport3','$email',$reward)";
     		   	queryMysql($query);
    			$uid=$row[0]+1;
    			$query="insert into sports values('$uid','$sport1'),('$uid','$sport2'),('$uid','$sport3')";
     		   	queryMysql($query);
 			   setcookie("first_name", "");
 			   setcookie("last_name", "");
 			   setcookie("age", "");
 			   setcookie("sport1",'');
 			   setcookie("sport2",'');
 			   setcookie("sport3",'');
 			   setcookie("email",'');
 			   setcookie('error','');
     		   header('Location:statistic.php');
				}
   			}
		}
	}
?>
