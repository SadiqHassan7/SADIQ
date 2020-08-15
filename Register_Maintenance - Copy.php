<!DOCTYPE html>
<html >
 <head>
        <link rel="stylesheet" type="text/css" href="325Project.emp.css"></head>
		<meta charset="utf-8">
</head>
<header>
    
    <ul class="topnav" id="Topnav">
		<li style="float:right"><a  href="logoutmanager.php">Log out</a></li>   
    </ul>
	
</header>
<body>

<h1 style="color:red; text-align:center; color:black;">Create an account for new maintenances</h1>

    <?php 
	$x=1;
	$rexpretion="/^[a-zA-Z]{1,20}$/";
	$phonexpretion="/^[1-9][1-9][1-9][0-9][0-9][0-9][0-9][0-9][0-9][0-9]$/";
	$emailxpretion="/^[a-zA-Z\-\\\w\d!#$%&]+@[a-zA-Z\-\d\w#$&!~%]+.[a-zA-Z]{2,3}$/";
	$passwexpretion="/^[a-zA-Z!@#$%\^\\\.\-=+*\d]{6,10}$/";
	$AptNumb="/^[0-9]{1,4}$/";
	$street_address="/^\d+\s[A-z0-9]+\s[A-z]+/";
	$city="/^[A-z][a-z]+ ?[A-z]?([a-z]+)?$/";
	//$state="/^[A-Z]{2}$/";
	$zip="/^[0-9]{5}( [0-9]+)?$/";
	$hourwage="/^[0-9]{1,2}\.?[0-9]{0,2}$/";
	
	 
	
	
	
	
	
	
	
	if(isset($_POST['submit'])){
		echo $_POST['DateHired'];
		
	if(empty(strtotime($_POST['DateHired']))){
		$x=0;
		$DateHired_error="<b style='color:red; font-size:14px;'>Invalid Date.  The Move in date must be greater or equal the current date.  Only Date format accepted.</b>";
		
	}	
		
	if(!(preg_match($rexpretion,$_POST['FirstName']))){
		$x=0;
		$firstN_error="<b style='color:red; font-size:14px;'>Invalid First Name.  The first name must be less than 20 letters.  Only letters accepted.</b>";
		
	}	
	if(!(preg_match($hourwage,$_POST['HourlyWage']))){
		$x=0;
		$HourlyWage_error="<b style='color:red; font-size:14px;'>Invalid input.  The hourlly wage must be decimal. </b>";
		
	}
    if(!(preg_match($street_address,$_POST['StreetAdress']))){
			$x=0;
			
		$streetN_error="<span style='color:red; font-size:14px;'>Invalid Address.  It needs to be in (number)(Street Name) (Ave/Street/Blvd) format.  EX: 1 1st Ave </span>";
	}
		if(!(preg_match($city,$_POST['city']))){
		$x=0;
		
		$cityN_error="<b style='color:red; font-size:14px;'>Invalid City.  City must only be in letters. EX: St Paul</b>";
		}
	if(!(preg_match($zip,$_POST['zip']))){
		$x=0;
		
		$zipN_error="<b style='color:red; font-size:14px;'>Invalid Zip.  Zip must be 5-10 numbers</b>";
	}
		
	
	if(!(preg_match($AptNumb,$_POST['AptNumber']))&&!empty($_POST['AptNumber'])){
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
		echo "we are connected <br>";
	}
	else{
		echo "Connection Failed <br>";
	}
	$FirstName=trim($_POST['FirstName']);
	$LastName=trim($_POST['LastName']);
	$PhoneNumber=trim($_POST['PhoneNumber']);
	$Email=trim($_POST['Email']);
	$password=trim($_POST['password']);
	$StreetAdress=trim($_POST['StreetAdress']);
	$AptNum=trim($_POST['AptNumber']);
	//$state=trim($_POST['state']);
	$city=trim($_POST['city']);
	$zip=trim($_POST['zip']);
	$DateHired=trim($_POST['DateHired']);
	$HourlyWage=trim($_POST['HourlyWage']);
	
	if($x!=0){
	echo "Account Created!  Try to log in to make sure everything is working properly.";
	}
	if($x!=0){
	    $query = "INSERT INTO wrkorder.maintenance (FirstName, LastName, StreetAdress, AptNumber, City, ZipCode, PhoneNumber, UserName, Password, DateHired, HourlyWage) 
       VALUES('$FirstName', '$LastName', '$StreetAdress', '$AptNum', '$city', '$zip', '$PhoneNumber', '$Email', '$password', '$DateHired', '$HourlyWage')";
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
		<label for="streetAdress">StreetAdress</label><br>
		<input type="text" name="StreetAdress" size="35"><br>
		<?php if(isset($streetN_error)){echo $streetN_error;}?><br>
	<!----------------------------------------------------------------------------------------------->
	    <label for="AptNumber">AptNumber</label><br>
		<input type="text" name="AptNumber" size="35"><br>
		<?php if(isset($AptN_error)){echo $AptN_error;}?><br>
	<!----------------------------------------------------------------------------------------------->
	<!----------------------------------------------------------------------------------------------->
		<!--<label for="state">state</label><br>
		<input type="text" name="state" size="35"><br>-->
		<!--<?php if(isset($stateN_error)){echo $stateN_error;}?><br>-->
	<!----------------------------------------------------------------------------------------------->
	     <label for="city">city</label><br>
		<input type="text" name="city" size="35"><br>
		<?php if(isset($cityN_error)){echo $cityN_error;}?><br>
	<!----------------------------------------------------------------------------------------------->
		<label for="zip">Zip code</label><br>
		<input type="text" name="zip" size="35"><br>
		<?php if(isset($zipN_error)){echo $zipN_error;}?><br>
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
        <label for="HourlyWage">HourlyWage</label><br>
		<input type="text" name="HourlyWage" size="35"><br>
		<?php if(isset($HourlyWage_error)){echo $HourlyWage_error;}?><br>	
	<!----------------------------------------------------------------------------------------------->	
		<label for="DateHired">Date Hired</label><br>
		<input type="date" name="DateHired" size="35"><br><br>
		<?php if(isset($DateHired_error)){echo $DateHired_error;}?><br>
	
			<input type="submit" name="submit" value="Register" style="background-color: #2f4f4f;
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