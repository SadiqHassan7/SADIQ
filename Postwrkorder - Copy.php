<?php 
session_start();

?>
<!DOCTYPE html>
<html >
 <head>
        <link rel="stylesheet" type="text/css" href="325Project.emp.css"></head>
		<meta charset="utf-8">
</head>
<header>
    
    <ul class="topnav" id="Topnav">

				<li style="float:left"><a  href="viewWorkorder.php">View Work order</a></li>
                <li style="float:left"><a  href="viewComment.php">View comments</a></li> 				

				<li style="float:right"><a  href="logoutResident.php">Log out</a></li>
         
    </ul>
	
</header>
<body>

<h1 style="color:red; text-align:center; color:blue;">Post a work order</h1>
<?php 




?>

    <?php 
	$x=1;
	$descript_expres="/^[^0-9]+$/";
	//$phonexpretion="/^[1-9][1-9][1-9][0-9][0-9][0-9][0-9][0-9][0-9][0-9]$/";
	//$emailxpretion="/^[a-zA-Z\-\\\w\d!#$%&]+@[a-zA-Z\-\d\w#$&!~%]+.[a-zA-Z]{2,3}$/";
	//$passwexpretion="/^[a-zA-Z!@#$%\^\\\.\-=+*\d]{6,10}$/";
	//$AptNumb="/^[0-9]{1,4}$/";
	$Resid_id="/^[0-9]{1,4}$/";
	 
	
	
	
	
	
	$connection = mysqli_connect('localhost','root','root123','wrkorder');
	
	
	if(isset($_POST['submit'])){
		
		 
	if(strtotime($_POST['Date_requested'])<strtotime(date("yy/m/d"))){
		$x=0;
		$Date_requested_error="<b style='color:red; font-size:14px;'>Invalid Date.  The date must be greater or equal the current date.  Only Date format accepted.</b>";
		
	}
	if(!(preg_match($Resid_id,$_POST['Residen_id']))){
		$x=0;
		$Residen_id_error="<b style='color:red; font-size:14px;'>The Id can be at least one digit or at most four digits</b>";
		
	}
		
	if(!(preg_match($descript_expres, $_POST['description']))){
		$x=0;
		$discr_error="<b style='color:red; font-size:14px;'>Invalid description. it must be less than or equal to 400 letters.  Only letters accepted.</b>";
		
	}	
	
	//var_dump(function_exists('mysqli_connect'));
	
	
	
	if($connection){
		//echo "we are connected <br>";
	}
	else{
		echo "Connection Failed <br>";
	}
	$Dat_requested=trim($_POST['Date_requested']);
	$Residen_id=trim($_POST['Residen_id']);
	$description=trim($_POST['description']);
	$priority=trim($_POST['priority']);
	//$password=trim($_POST['password']);
	//$AptNum=trim($_POST['AptNumber']);
	//$Movedate=trim($_POST['DateMovedIn']);
	//$AmntofRent=trim($_POST['AmountOfRent']);
	
	//if($x!=0){
	
	//}
	if($x!=0){
	    $query = "INSERT INTO wrkorder.worder (description, Dat_requested, Priority, Resident_ID )
		          VALUES('$description', '$Dat_requested', '$priority', $Residen_id)";
         mysqli_query($connection,$query);
		 echo "Account Created!  Try to log in to make sure everything is working properly.";
		 
		
	}else{
		$x=1;
	}
	}	
		   
?>

<!-------------------------------------------------------------------------------------------------------------------------->
	<form action="" method="post" style="text-align:center;">
	  <div style="font-size:1.5em; font-weight:400; color:black">
	  <?php  
	  if (isset($_SESSION['UserName'])){
		  $email=$_SESSION['UserName'];
	  }else{
			$email="";    
		  }
	         $query = "SELECT * FROM wrkorder.resident where UserName = '$email' ";
             $result = mysqli_query($connection,$query);
		       while($row=mysqli_fetch_assoc($result)){
			         $Resident_ID=$row["Resident_ID"];
			       
	  ?>
	  
	       <!---<label for="Residen_id">Resident_ID</label><br>-->
		   <input value="<?php echo $Resident_ID; ?>" type="hidden" name="Residen_id" size="15" ><br>
		   <?php if(isset($Residen_id_error))echo $Residen_id_error;?><br>
	  <?php }?>
      
	<!----------------------------------------------------------------------------------------------->	
		<label for="Date_requested">Date requested</label><br>
		<input type="date" name="Date_requested" size="35"><br>
		<?php if(isset($Date_requested_error)){echo $Date_requested_error;}?><br>
	<!------------------------------------------------------------------------------------------->
		<select name="priority">
			     <option value='Urgent'>Urgent</option>;
				 <option value='Medium'>Medium</option>;
				 <option value='Low'>Low</option>;
		</select><br><br>
		<textarea type="text" name="description" rows="8" cols="50">

        </textarea><br>
		<?php if(isset($discr_error)){echo $discr_error;}?><br>
	
			<input type="submit" name="submit" value="Submit" style="background-color: #4CAF50;
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