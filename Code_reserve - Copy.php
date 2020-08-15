        <label for="city">city</label><br>
		<input type="text" name="city" size="35"><br><br>
		<?php if(isset($cityN_error)){echo $cityN_error;}?><br>
		<label for="state">state</label><br>
		<input type="text" name="state" size="35"><br>
		<?php if(isset($stateN_error)){echo $stateN_error;}?><br>
		<label for="zip">Zip code</label><br>
		<input type="text" name="zip" size="35"><br>
		<?php if(isset($zipN_error)){echo $zipN_error;}?><br
		<!------------------------------------------------------------------------------------------------------->
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
		
		<!------------------------------------------------------------------------------------------------------->
		<label for="streetAdress">StreetAdress</label><br>
		<input type="text" name="StreetAdress" size="35"><br>
		<?php if(isset($streetN_error)){echo $streetN_error;}?><br>
		<!------------------------------------------------------------------------------------------------------->
		<li><a href="log_in.php">Sign In</a></li>
		<li><a href="log_in.php">Sign In</a></li>
		<!--<li><a href="Register_Resident.php">Create Account</a></li>-->
		<a class="topnav-logo" href="MetroHomePage.html"><img src="MetroLogo.png" alt="site-logo"></a>
		<a class="topnav-logo" href="MetroHomePage.html"><img src="MetroLogo.png" alt="site-logo"></a>
		
		<li><a href="AboutUs.html">About Us</a></li>
                <li><a href="Facilities.html">Facilities</a></li>
				<h1 style="color:red; text-align:center; color:black;">Create an account for new residents</h1>
				<li><a href="AboutUs.html">About Us</a></li>
                <li><a href="Facilities.html">Facilities</a></li>
				<!----------------------------------------------------------------------------------------------->
				if($_POST['password']!==$_POST['pass']){
		$confmerorrr="<b style='color:red'>the passwords donnot match</b>";
		$passerorrr="<b style='color:red'>the passwords donnot match</b>";
		
		$x=0;
	}
	//var_dump(function_exists('mysqli_connect'));
		
		<!------------------------------------------------------------------------------------------------------->
		if(!(preg_match($street_address,$_POST['StreetAdress']))){
			$x=0;
			
		$streetN_error="<span style='color:red; font-size:14px;'>Invalid Address.  It needs to be in (number)(Street Name) (Ave/Street/Blvd) format.  EX: 1 1st Ave </span>";
	}
		if(!(preg_match($city,$_POST['city']))){
		$x=0;
		
		$cityN_error="<b style='color:red; font-size:14px;'>Invalid City.  City must only be in letters. EX: St Paul</b>";
	}if(!(preg_match($state,$_POST['state']))){
		$x=0;
		$stateN_error="<b style='color:red; font-size:14px;'>Invalid State.  State must be Abbreviation.  EX: MN </b>";
		
	}if(!(preg_match($zip,$_POST['zip']))){
		$x=0;
		
		$zipN_error="<b style='color:red; font-size:14px;'>Invalid Zip.  Zip must be 5-10 numbers</b>";
	}
	
	
	<!------------------------------------------------------------------------------------------------------->
	//$statexpretion="/^[A-Z]{2}$/";
	//$countexpretion="/^[a-zA-Z ]+$/";
	//$street_address="/^\d+\s[A-z0-9]+\s[A-z]+/";
	
	//$city="/^[A-z][a-z]+$/";
	//$state="/^[A-Z]{2}$/";
	//$zip="/^[0-9]{5}( [0-9]+)?$/";
	
	<!------------------------------------------------------------------------------------------------------->
	
	
	$streetN=trim($_POST['StreetAdress']);
	$city=trim($_POST['city']);
	$state=trim($_POST['state']);
	$zip=trim($_POST['zip']);
	
<!-------------------------------------------------------------------------------------------------------------->
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
		<input type="password" name="AmountOfRent" size="35"><br>
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
	<!-------------------------------------------------------------------------------------------------------->
	   <?php 
	$x=1;
	$rexpretion="/^[a-zA-Z]{1,20}$/";
	$phonexpretion="/^[1-9][1-9][1-9][0-9][0-9][0-9][0-9][0-9][0-9][0-9]$/";
	$emailxpretion="/^[a-zA-Z\-\\\w\d!#$%&]+@[a-zA-Z\-\d\w#$&!~%]+.[a-zA-Z]{2,3}$/";
	$passwexpretion="/^[a-zA-Z!@#$%\^\\\.\-=+*\d]{6,10}$/";
	$AptNumb="/^[0-9]{1,4}$/";
	$AmountOfRent="/^[0-9]{4,4}$/";
	 
	
	echo date("yy/m/d")."<br>";
	echo $_POST['DateMovedIn'];
	
	
	
	
	
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
	
	<!---------------------------------------------------------------------------------------------->
		<!--<td style="border: 1px solid black;"><?php echo $Status;?></t>-->
					<!--<td style="border: 1px solid black;"><?php echo $Priority;?></td>-->
					<!--<td style="border: 1px solid black;"><?php echo $Resident_ID;?></td>-->
					<!--<td style="border: 1px solid black;"><?php echo $Maintenance_ID;?></td>-->
					<!--<td style="border: 1px solid black;"><a href='Comment.php?Comment_Id=<?php echo $Resident_ID; ?>'>Comment</a></td>
					<!---<td style="border: 1px solid black;"><a href='Resident.php?page=update&Resid_id=//<?php echo $Resident_ID;?>'>Edit</a></t>-->
	!----------------------------------------------------------------------------------------------->
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

<!------------------------------------------------------------------------------------------------------------------->
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
	   
?>