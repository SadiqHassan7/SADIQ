<!DOCTYPE html>
<html style="background:white;">
 <head>
        <link rel="stylesheet" type="text/css" href="325Project.css"></head>
		<meta charset="utf-8">
</head>
<header>
    
    <ul class="topnav" id="Topnav">
        <a class="topnav-logo" href="MetroHomePage.html"><img src="MetroLogo.png" alt="site-logo"></a>
                <li><a href="AboutUs.html">About Us</a></li>
                <li><a href="Rooms.html">Rooms</a></li>
                <li><a href="Facilities.html">Facilities</a></li>
                <li><a href="show_availible_rooms.php">Reservations</a></li>
                <li><a href="log_in.php">Sign In</a></li>
				<li><a style="margin-left:-80px" href="logout.php">Sign out</a></li>
                <li><a href="signup.php">Create Account</a></li>
    </ul>
</header>
<body>

<h1 style="color:red; text-align:center; color:black;">Create an account</h1>

    <?php 
	$x=1;
	$rexpretion="/^[a-zA-Z]{1,20}$/";
	$phonexpretion="/^[1-9][1-9][1-9][0-9][0-9][0-9][0-9][0-9][0-9][0-9]$/";
	$emailxpretion="/^[a-zA-Z\-\\\w\d!#$%&]+@[a-zA-Z\-\d\w#$&!~%]+.[a-zA-Z]{2,3}$/";
	$passwexpretion="/^[a-zA-Z!@#$%\^\\\.\-=+*\d]{6,8}$/";
	//$statexpretion="/^[A-Z]{2}$/";
	$countexpretion="/^[a-zA-Z ]+$/";
	$street_address="/^\d+\s[A-z0-9]+\s[A-z]+/";
	//(([A-Za-z])+)?([0-9]{1,2})?([a-zA-Z]){2} (blvd|Blvd|Ave|ave|AVE|STREET|Street|street|St|ST|drive|Drive|sT|st|)? (Apt|apt|Apartment|apartment|Unit|#)? ?([0-9]{1,5})?$/";
	$city="/^[A-z][a-z]+$/";
	$state="/^[A-Z]{2}$/";
	$zip="/^[0-9]{5}( [0-9]+)?$/";
	
	if(isset($_POST['submit'])){
		if(!(preg_match($street_address,$_POST['StreetAdress']))){
			$x=0;
			
		$streetN_error="<span style='color:red; font-size:14px;'>Invalid Address.  It needs to be in (number)(Street Name) (Ave/Street/Blvd) format.  EX: 1 1st Ave </span>";
	}if(!(preg_match($city,$_POST['city']))){
		$x=0;
		
		$cityN_error="<b style='color:red; font-size:14px;'>Invalid City.  City must only be in letters. EX: St Paul</b>";
	}if(!(preg_match($state,$_POST['state']))){
		$x=0;
		$stateN_error="<b style='color:red; font-size:14px;'>Invalid State.  State must be Abbreviation.  EX: MN </b>";
		
	}if(!(preg_match($zip,$_POST['zip']))){
		$x=0;
		
		$zipN_error="<b style='color:red; font-size:14px;'>Invalid Zip.  Zip must be 5-10 numbers</b>";
	}
		
	if(!(preg_match($rexpretion,$_POST['FirstName']))){
		$x=0;
		$firstN_error="<b style='color:red; font-size:14px;'>Invalid First Name.  The first name must be less than 20 letters.  Only letters accepted.</b>";
		
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
		$passerorrr="<b style='color:red; font-size:14px;'>the password must be at least 8 characters</b>";
		
	}
	if(!(preg_match($passwexpretion,$_POST['pass']))){
		$x=0;
		$password=$_POST['pass'];
		$confmerorrr="<b style='color:red; font-size:14px;'>the passwords donnot match</b>";
		
	}
	//if(!(preg_match($statexpretion,$_POST['state']))){
		
		//$staterorrr="<span style='color:red'>X</span>";
		
	//}
	
	if($_POST['password']!==$_POST['pass']){
		$confmerorrr="<b style='color:red'>the passwords donnot match</b>";
		$passerorrr="<b style='color:red'>the passwords donnot match</b>";
		
		$x=0;
	}
	var_dump(function_exists('mysqli_connect'));
	
	$connection = mysqli_connect('localhost','root','root123','project');
	
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
	$streetN=trim($_POST['StreetAdress']);
	$city=trim($_POST['city']);
	$state=trim($_POST['state']);
	$zip=trim($_POST['zip']);
	if($x!=0){
	echo "Account Created!  Try to log in to make sure everything is working properly.";
	}
	if($x!=0){
	    $query = "INSERT INTO customer (FirstName, LastName, PhoneNumber, Email, Password, StreetAdress, City, State, Zip) 
       VALUES('$FirstName', '$LastName', '$PhoneNumber', '$Email', '$password', '$streetN', '$city', '$state', '$zip')";
         mysqli_query($connection,$query);
		
	}else{
		$x=1;
	}
	}
	   
?>
	<form action="signup.php" method="post">
	  <div style="font-size:1.5em; font-weight:400; color:black">
        <label for="FirstName">FirstName</label><br>
		<input type="text" name="FirstName" size="35" ><br>
		<?php if(isset($firstN_error))echo $firstN_error;?><br>
		    
		<label for="LastName">LastName</label><br>
		<input type="text" name="LastName" size="35"><br>
		<?php if(isset($lastNerror)){echo $lastNerror;}?><br>
		<label for="PhoneNumber">PhoneNumber</label><br>
		<input type="text" name="PhoneNumber" size="35"><br>
		<?php if(isset($phoneerorrr)){echo $phoneerorrr;}?><br>
		<label for="Email">Email</label><br>
		<input type="email" name="Email" size="35"><br><br>
		<?php if(isset($emailerorrr)){echo $emailerorrr;}?><br>
		<label for="password">password</label><br>
		<input type="password" name="password" size="35"><br>
		<?php if(isset($passerorrr)){echo $passerorrr;}?><br>
		<label for="confirm password">confirm password</label><br>
		<input type="password" name="pass" size="35"><br>
		<?php if(isset($confmerorrr)){echo $confmerorrr;}?><br>
		<label for="streetN">StreetAdress</label><br>
		<input type="text" name="StreetAdress" size="35"><br>
		<?php if(isset($streetN_error)){echo $streetN_error;}?><br>
		<label for="city">city</label><br>
		<input type="text" name="city" size="35"><br><br>
		<?php if(isset($cityN_error)){echo $cityN_error;}?><br>
		<label for="state">state</label><br>
		<input type="text" name="state" size="35"><br>
		<?php if(isset($stateN_error)){echo $stateN_error;}?><br>
		<label for="zip">Zip code</label><br>
		<input type="text" name="zip" size="35"><br>
		<?php if(isset($zipN_error)){echo $zipN_error;}?><br>
		
		
		
	
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