<?php 
session_start();

?>

<!DOCTYPE html>
<html style="background:white;">
 <head>
        <link rel="stylesheet" type="text/css" href="325Project.css"></head>
		<meta charset="utf-8">
</head>
<header>
    
    <ul class="topnav" id="Topnav">
                <li><a href="AboutUs.html">About Us</a></li>
                <li><a href="Facilities.html">Facilities</a></li>	
    </ul>
</header>
<body>


      <?php
	  
	 $emailxpretion="/^[a-zA-Z\-\\\w\d!#$%&]+@[a-zA-Z\-\d\w#$&!~%]+.[a-zA-Z]{2,3}$/";
	 $passwexpretion="/^[a-zA-Z!@#$%\^\\\.\-=+*\d]+$/";
	  if(isset($_POST['submit'])){
		   
		   $emil_erorr="";
		   $password_erorr="";
		   
		  
	
	if(!(preg_match($emailxpretion,$_POST['Email'])) && !(preg_match($passwexpretion,$_POST['password'])) ){
		                     $emil_erorr="<b style=\"color:red;\">Invalid email</b>";
		                     $password_erorr="<b style=\"color:red;\">Invalid password</b>";
		 //header("Location: log_in.php?both_email_password='your email and password ar not the right format' ");
		 //exit();;
	}
	if(!(preg_match($emailxpretion,$_POST['Email']))){
		          $emil_erorr="<b style=\"color:red;\">Invalid email</b>";
		 //header("Location: log_in.php?email='your email is not the right format' ");
		 //exit();
	}
	if(!(preg_match($passwexpretion,$_POST['password']))){
		          $password_erorr="<b style=\"color:red;\">Invalid password</b>";
		 //header("Location: log_in.php?passw='your password is not the right format' ");
		 //exit();
	}
	
	$connection = mysqli_connect('localhost','root','root123','wrkorder');
	if($connection){
		echo "we are connected";
	}
	else{
		echo "Connection Failed <br>";
	}
     
	 
		   
    	$email=$_POST['Email'];
	   $password=$_POST['password'];
	   $password_in_database="";
	   $emai_data="";
	   if($password!=""&&$email!=""){
		    
	    $query = "SELECT * FROM wrkorder.resident where Password = '$password' and UserName = '$email' ";
         $result = mysqli_query($connection,$query);
		 
		 while($row=mysqli_fetch_assoc($result)){
              
		  echo $row["FirstName"],$row["LastName"];
		        $password_in_database=$row["Password"];
				$emai_data=$row["UserName"];
		 }
		 
		 if($password!=$password_in_database &&$email!=$emai_data){
			 $password_erorr="<b style=\"color:red;\">Invalid password or both</b>";
			 $emil_erorr="<b style=\"color:red;\">Invalid email or</b>";
		
			 
		 }elseif($password==$password_in_database&&$email==$emai_data){
			              $_SESSION['Email']=$_POST['Email'];
			 //header("Location: front_page.php");
			 //exit();
		 }elseif($password!=$password_in_database){
			 $password_erorr="<b style=\"color:red;\">Invalid password</b>";
			 
		 }elseif($email!=$emai_data){
			 $emil_erorr="<b style=\"color:red;\">Invalid email</b>";
			 
		 }
	   }if($password==""&&$email==""){
		   
		   $password_erorr="<b style=\"color:red;\">you did not put any password</b>";
		   $emil_erorr="<b style=\"color:red;\">you did not put any email</b>";
	   }elseif($password==""){
		   $password_erorr="<b style=\"color:red;\">you did not put any password</b>";
	   }elseif($email==""){
		   $emil_erorr="<b style=\"color:red;\">you did not put any email</b>";
	   } 
	}
	  
	  
	  
	  
	  ?>
    <?php 
	
	

   
	//if (isset($_SESSION['Email'])){
		 //$_SESSION['Email']=$email;
		//echo "this is wrongggggggggg seseion ".$_SESSION['Email'];
	//}
	
	?>

	<form action="" method="post">
	  <div style="font-size:1.5em; font-weight:400;color:white">
        
		<label for="Email">Email</label><br>
		<input type="email" name="Email" size="35"><br>
		<?php if(isset($emil_erorr)){echo $emil_erorr;}?><br><br>
		<label for="password">password</label><br>
		<input type="password" name="password" size="35"><br>
		<?php if(isset($password_erorr)){echo $password_erorr;}?><br><br>
		<input type="submit" name="submit" value="Sign in" style="background-color: #4CAF50;
			  border: none;
			  color: white;
			  padding: 15px 32px;
			  text-align: center;
			  text-decoration: none;
			  display: inline-block;
			  font-size: 16px;
			  margin: 4px 2px;
			  cursor: pointer;">
		
        </div>

	</form>
	
	
<div class="footer">
  <p>St. Paul</p>
  <p>Address</p>
  <p>Phone #</p>
</div>
</body>
<script>
window.onscroll = function() {myFunction()};

var header = document.getElementById("Topnav");
var sticky = header.offsetTop;

function myFunction() {
  if (window.pageYOffset > sticky) {
    header.classList.add("sticky");
  } else {
    header.classList.remove("sticky");
  }
}
</script>
</html>