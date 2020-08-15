<!DOCTYPE html>
<html >
 <head>
        <link rel="stylesheet" type="text/css" href="325Project.emp.css">
		<meta charset="utf-8">
</head>
<header>
    
    <ul class="topnav" id="Topnav">
        
		        
                
				<li style="float:right"><a  href="logoutmanager.php">Log out</a></li>
                				
                
    </ul>
	
</header>
<body>

<h1 style="color:red; text-align:center; color:black;">Create an account for new residents</h1>

    <?php 
	$x=1;
	$rexpretion="/^[a-zA-Z]{1,20}$/";
	$phonexpretion="/^[1-9][1-9][1-9][0-9][0-9][0-9][0-9][0-9][0-9][0-9]$/";
	$emailxpretion="/^[a-zA-Z\-\\\w\d!#$%&]+@[a-zA-Z\-\d\w#$&!~%]+.[a-zA-Z]{2,3}$/";
	$passwexpretion="/^[a-zA-Z!@#$%\^\\\.\-=+*\d]{6,10}$/";
	$AptNumb="/^[0-9]{1,4}$/";
	$AmountOfRent="/^[0-9]{4,4}$/";
	 
	
	
	
	
	
	
	
	if(isset($_POST['submit'])){
		
		
	if(strtotime($_POST['DateMovedIn'])<strtotime(date("yy/m/d"))){
		$x=0;
		$DateMovedIn_error="<b style='color:red; font-size:14px;'>Invalid Date.  The Move in date must be greater or equal the current date.  Only Date format accepted.</b>";
		
	}	
		
	if(!(preg_match($rexpretion,$_POST['FirstName']))){
		$x=0;
		$firstN_error="<b style='color:red; font-size:14px;'>Invalid First Name.  The first name must be less than 20 letters.  Only letters accepted.</b>";
		
	}	
	if(!(preg_match($AmountOfRent,$_POST['AmountOfRent']))){
		$x=0;
		$AmountOfRent_error="<b style='color:red; font-size:14px;'>Invalid input.  The Amount of rent must be at least $1000.  Only numbers accepted.</b>";
		
	}	
	
	if(!(preg_match($AptNumb,$_POST['AptNumber']))){
		$x=0;
		$AptN_error="<b style='color:red; font-size:14px;'>Invalid AptNumber.  The AptNumber must be less than five numbers.  Only numbers accepted.</b>";
		
	}
	
	if(!(preg_match($rexpretion,$_POST['LastName']))){
		$x=0;
		$lastNerror="<b style='color:red; font-size:14px;'>Invalid Last Name.  The last name must be less than 20 letters.  Only letters accepted.</b>";
		
	}
	if(!(preg_match($phonexpretion,$_POST['PhoneNumber']))){
		$x=0;
		$phoneerorrr="<b style='color:red; font-size:14px;'>Invalid Phone Number.  Phone must be nine or ten digits with no special characters.  EX: 1234567891 </b>";
		
	}
	if(!(preg_match($emailxpretion,$_POST['Email']))){
		$x=0;
		$emailerorrr="<b style='color:red; font-size:14px;'>Invalid Email.  Email needs to be in a certain format.  EX: example@abc.com <br></b>";
	
	}
	if(!(preg_match($passwexpretion,$_POST['password']))){
		$x=0;
		$passerorrr="<b style='color:red; font-size:14px;'>the password must be at  most 10 characters</b>";
		
	}
	if(!(preg_match($passwexpretion,$_POST['pass']))){
		$x=0;
		$password=$_POST['pass'];
		$confmerorrr="<b style='color:red; font-size:14px;'>the passwords donnot match</b>";
		
	}
	
	
	if($_POST['password']!==$_POST['pass']){
		$confmerorrr="<b style='color:red'>the passwords donnot match</b>";
		$passerorrr="<b style='color:red'>the passwords donnot match</b>";
		
		$x=0;
	}
	//var_dump(function_exists('mysqli_connect'));
	
	$connection = mysqli_connect('localhost','root','root123','wrkorder');
	
	if($connection){
		//echo "we are connected <br>";
	}
	else{
		echo "Connection Failed <br>";
	}
	$FirstName=trim($_POST['FirstName']);
	$LastName=trim($_POST['LastName']);
	$PhoneNumber=trim($_POST['PhoneNumber']);
	$Email=trim($_POST['Email']);
	$password=trim($_POST['password']);
	$AptNum=trim($_POST['AptNumber']);
	$Movedate=trim($_POST['DateMovedIn']);
	$AmntofRent=trim($_POST['AmountOfRent']);
	
	if($x!=0){
	echo "Account Created!  Try to log in to make sure everything is working properly.";
	}
	if($x!=0){
	    $query = "INSERT INTO resident (FirstName, LastName, AptNumber, PhoneNumber, UserName, Password, DateMovedIn, Amount_Of_Rent) 
       VALUES('$FirstName', '$LastName', '$AptNum', '$PhoneNumber', '$Email', '$password', '$Movedate', $AmntofRent)";
         mysqli_query($connection,$query);
		
	}else{
		$x=1;
	}
	}
	   
?>
	<form action="" method="post">
	  <div style="font-size:1.5em; font-weight:400; color:black">
	<!----------------------------------------------------------------------------------------------->
        <label for="FirstName">FirstName</label><br>
		<input type="text" name="FirstName" size="35" ><br>
		<?php if(isset($firstN_error))echo $firstN_error;?><br>
	<!----------------------------------------------------------------------------------------------->
		<label for="LastName">LastName</label><br>
		<input type="text" name="LastName" size="35"><br>
		<?php if(isset($lastNerror)){echo $lastNerror;}?><br>
	<!----------------------------------------------------------------------------------------------->
	    <label for="AptNumber">AptNumber</label><br>
		<input type="text" name="AptNumber" size="35"><br>
		<?php if(isset($AptN_error)){echo $AptN_error;}?><br>
	<!----------------------------------------------------------------------------------------------->
		<label for="PhoneNumber">PhoneNumber</label><br>
		<input type="text" name="PhoneNumber" size="35"><br>
		<?php if(isset($phoneerorrr)){echo $phoneerorrr;}?><br>
		
		<label for="Email">Email</label><br>
		<input type="email" name="Email" size="35"><br>
		<?php if(isset($emailerorrr)){echo $emailerorrr;}?><br>
	 <!----------------------------------------------------------------------------------------------->   
		<label for="password">password</label><br>
		<input type="password" name="password" size="35"><br>
		<?php if(isset($passerorrr)){echo $passerorrr;}?><br>
	<!----------------------------------------------------------------------------------------------->
		<label for="confirm password">confirm password</label><br>
		<input type="password" name="pass" size="35"><br>
		<?php if(isset($confmerorrr)){echo $confmerorrr;}?><br>
	<!----------------------------------------------------------------------------------------------->	
        <label for="AmountOfRent">Amount of Rent</label><br>
		<input type="text" name="AmountOfRent" size="35"><br>
		<?php if(isset($AmountOfRent_error)){echo $AmountOfRent_error;}?><br>	
	<!----------------------------------------------------------------------------------------------->	
		<label for="DateMovedIn">Date Moved In</label><br>
		<input type="date" name="DateMovedIn" size="35"><br><br>
		
		<?php if(isset($DateMovedIn_error)){echo $DateMovedIn_error;}?><br>
	
			<input type="submit" name="submit" value="Register" style="background-color: #4CAF50;
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
<?php 
 

?>
</html>