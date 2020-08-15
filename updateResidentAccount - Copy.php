<!DOCTYPE html>
<html >
 <head>
        <link rel="stylesheet" type="text/css" href="325Project.emp.css">
		<meta charset="utf-8">
</head>
<header>
    
    <ul class="topnav" id="Topnav">
                
                <li style="float:right"><a  href="logout.php">Log out</a></li>				
    </ul>
</header>

<body>

<h1 style="color:red; text-align:center; color:black;">Update an account for the residents</h1>

    <?php 
	$x=1;
	$rexpretion="/^[a-zA-Z]{1,20}$/";
	$phonexpretion="/^[1-9][1-9][1-9][0-9][0-9][0-9][0-9][0-9][0-9][0-9]$/";
	$emailxpretion="/^[a-zA-Z\-\\\w\d!#$%&]+@[a-zA-Z\-\d\w#$&!~%]+.[a-zA-Z]{2,3}$/";
	$passwexpretion="/^[a-zA-Z!@#$%\^\\\.\-=+*\d]{6,10}$/";
	$AptNumb="/^[0-9]{1,4}$/";
	$AmountOfRent="/^[0-9]{4,4}$/";
	 
	
	
	$connection = mysqli_connect('localhost','root','root123','wrkorder');
	
	
	$y=1;
	
	if(isset($_POST['subm'])){
		
		
	
		
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
	
	
	
	
	
	
	$FirstName=trim($_POST['FirstName']);
	$LastName=trim($_POST['LastName']);
	$PhoneNumber=trim($_POST['PhoneNumber']);
	$Email=trim($_POST['Email']);
	$password=trim($_POST['password']);
	$AptNum=trim($_POST['AptNumber']);
	$AmntofRent=trim($_POST['AmountOfRent']);
	
	    
	if(isset($_GET["Resid_id"])&&($x!=0)){
	 
	      $Resd_id=$_GET['Resid_id'];
	    $query = "UPDATE resident SET FirstName = '$FirstName', LastName = '$LastName', AptNumber = '$AptNum', PhoneNumber = '$PhoneNumber', UserName = '$Email', Password = '$password', Amount_Of_Rent = '$AmntofRent'  where Resident_ID = $Resd_id ";
         mysqli_query($connection,$query);
		 echo "Account Updated!  Try to log in to make sure everything is working properly.";
			    $y=0;
			  
	}else{
		
	}
	}
	
	
	
	if($connection){
		//echo "we are connected <br>";
	}
	else{
		echo "Connection Failed <br>";
	}
	   
?>
	<form action="" method="post">
	  <div style="font-size:1.5em; font-weight:400; color:black">
	<!----------------------------------------------------------------------------------------------->
	
	    <?php 
		
		
		
		 if(isset($_GET["Resid_id"])){
	 
	      $Resd_id=$_GET['Resid_id'];
		  
		  
		  $query = "SELECT * FROM resident  where Resident_ID = $Resd_id ";
              $result = mysqli_query($connection,$query);
		      while($row=mysqli_fetch_assoc($result)){
              
		      
			  $FirstName=$row["FirstName"];
			  $LastName=$row["LastName"];
			  $AptNumber=$row["AptNumber"];
			  $PhoneNumber=$row["PhoneNumber"];
			  $UserName=$row["UserName"];
			  $Password=$row["Password"];
			  $Amount_Of_Rent=$row["Amount_Of_Rent"];
		  
		  ?>
		  
		  
		  
		  <?php 
		  if($y==0){
			  $FirstName="";
			  $LastName="";
			  $AptNumber="";
			  $PhoneNumber="";
			  $UserName="";
			  $Password="";
			  $Amount_Of_Rent="";
		  }
		  
		  ?>
		  
		  
        <label for="FirstName">FirstName</label><br>
		<input value="<?php echo $FirstName;?>" type="text" name="FirstName" size="35" ><br>
		<?php if(isset($firstN_error))echo $firstN_error;?><br>
	<!----------------------------------------------------------------------------------------------->
		<label for="LastName">LastName</label><br>
		<input value="<?php echo $LastName;?>"  type="text" name="LastName" size="35"><br>
		<?php if(isset($lastNerror)){echo $lastNerror;}?><br>
	<!----------------------------------------------------------------------------------------------->
	    <label for="AptNumber">AptNumber</label><br>
		<input value="<?php echo $AptNumber;?>" type="text" name="AptNumber" size="35"><br>
		<?php if(isset($AptN_error)){echo $AptN_error;}?><br>
	<!----------------------------------------------------------------------------------------------->
		<label for="PhoneNumber">PhoneNumber</label><br>
		<input value="<?php echo $PhoneNumber;?>" type="text" name="PhoneNumber" size="35"><br>
		<?php if(isset($phoneerorrr)){echo $phoneerorrr;}?><br>
		
		<label for="Email">Email</label><br>
		<input value="<?php echo $UserName;?>" type="email" name="Email" size="35"><br>
		<?php if(isset($emailerorrr)){echo $emailerorrr;}?><br>
	 <!----------------------------------------------------------------------------------------------->   
		<label for="password">password</label><br>
		<input value="<?php echo $Password;?>" type="password" name="password" size="35"><br>
		<?php if(isset($passerorrr)){echo $passerorrr;}?><br>
	<!----------------------------------------------------------------------------------------------->
		
	<!----------------------------------------------------------------------------------------------->	
        <label for="AmountOfRent">Amount of Rent</label><br>
		<input value="<?php echo $Amount_Of_Rent;?>" type="text" name="AmountOfRent" size="35"><br>
		<?php if(isset($AmountOfRent_error)){echo $AmountOfRent_error;}?><br>	
	<!----------------------------------------------------------------------------------------------->	
		
		
		<?php if(isset($DateMovedIn_error)){echo $DateMovedIn_error;}?><br>
	
			<input type="submit" name="subm" value="Update" style="background-color: #4CAF50;
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
		  <?php 
		  
		  
		  
		  ?>
		  
		  
		<?php }} ?>
		
		
		
		

	</form>
	
	

</html>