<?php 

session_start();
if(isset($_SESSION['UserName'])){
unset($_SESSION['UserName']);
session_destroy();
header("Location: manager_log_in.php");
exit;
}else{
	
	echo "<strong style=\"font-size:30px;\">You loged out</strong";
}



?>