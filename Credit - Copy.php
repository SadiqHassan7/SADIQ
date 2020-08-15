<?php 
session_start();
//echo "this is the seseion ".$_SESSION['Email'];
?>

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

<h1 style="color:red;text-align:center;">Credit Information</h1>

    <?php 
		$credit_number="/^[0-9]{13,16}$/";
	    $expre_date="/^([0-9]{1,2})(\/|-)(19|20|21|22|23|24|25)$/";
	    $cvv="/^[0-9]{3,4}$/";

	//$reser_id=0;
	//$start_date=0;
	//$end_date=0;
	
	
	if(isset($_POST['submit'])){
		    $tcvv=$_POST['cvv'];
			$creditN=$_POST['credit_number'];
			$expredate=$_POST['expdate'];
		
		if(!(preg_match($cvv,$_POST['cvv'])) && !(preg_match($credit_number,$_POST['credit_number'])) && !(preg_match($expre_date,$_POST['expdate'])) ){
			
			header("Location: show_availible.php?cvv=$tcvv&credit_number=$creditN&expre_date=$expredate");
			exit();
		
	     }
       if(!(preg_match($credit_number,$_POST['credit_number'])) && !(preg_match($expre_date,$_POST['expdate']))){
		
		header("Location: show_availible.php?credit_number=$creditN&expre_date=$expredate");
			exit();
	
         }
       if(!(preg_match($expre_date,$_POST['expdate'])) && !(preg_match($cvv,$_POST['cvv']))){
	  
       
	      header("Location: show_availible.php?expre_date=$expre_date&cvv=$tcvv");
			exit();
	    }
	    if(!(preg_match($credit_number,$_POST['credit_number'])) && !(preg_match($cvv,$_POST['cvv']))){
	  
       
	      header("Location: show_availible.php?cvv=$tcvv&credit_number=$creditN");
			exit();
	    }
	    if(!(preg_match($credit_number,$_POST['credit_number']))){
	  
       
	      header("Location: show_availible.php?credit_number=$creditN");
			exit();
	    } 
		if(!(preg_match($cvv,$_POST['cvv']))){
	  
       
	      header("Location: show_availible.php?cvv=$tcvv");
			exit();
	    } 
		if(!(preg_match($expre_date,$_POST['expdate']))){
	  
       
	      header("Location: show_availible.php?expre_date=$expre_date");
			exit();
	    } 
		
	$connection = mysqli_connect('localhost','root','root123','project');
	
	if($connection){
		echo "we are connected";
	}
	else{
		echo "Connection Failed <br>";
	}
	if(isset($_POST['cvv']) && isset($_POST['credit_number']) && isset($_POST['expdate']) ){
	$cvv =(isset($_POST['cvv']) ? $_POST['cvv'] :'Fill in the cvv input');
	$credit_number =(isset($_POST['credit_number']) ? $_POST['credit_number'] :'Fill in the credit number');
	$expdate =(isset($_POST['expdate']) ? $_POST['expdate'] :'Fill in the expration date');
	echo $email = (isset($_SESSION['Email']) ? $_SESSION['Email'] :'Something Wrong');
		$cust_id=0;
		$query = "SELECT * FROM project.customer where Email = '$email' ";
         $result = mysqli_query($connection,$query);
		 while($row=mysqli_fetch_assoc($result)){
              
		  $cust_id=$row["Customer_ID"];
		 }
			
		 
	    echo "this is the cus_id".$cust_id;
	
	   $query = "INSERT INTO project.card (Card_Number, Expiration_Date, CVV_Number, Customer_ID) 
       VALUES('$credit_number', '$expdate', '$cvv', '$cust_id')";
	   
         mysqli_query($connection, $query);
		 
	
	
	
	
	$query = "SELECT * FROM project.reservation where Customer_ID = '$cust_id' ";
         $result = mysqli_query($connection,$query);
		 $Room_Number=0;
		 while($row=mysqli_fetch_assoc($result)){
              
		  $Reservation_id=$row["Reservation_ID"];
		  $Room_Number=$row["Room_Number"];
		 }
		 
		 echo "Room Number Top of the page".$Room_Number;
		$query = "SELECT * FROM project.rooms where Room_Number = '$Room_Number' ";
         $result = mysqli_query($connection,$query);
		 $Room_Type="";
		 while($row=mysqli_fetch_assoc($result)){
              

		  $Room_Type=$row["Room_Type"];
		 } 
		 $Sub_Total=0.00;
		if($Room_Type=="large"){
			$Sub_Total=50.00;
			
		}else if($Room_Type=="medium"){
			$Sub_Total=30.00;
			
		}else if($Room_Type=="small"){
			$Sub_Total=20.00;
			
		}	
		 $Total=($Sub_Total*1.10);
	   
	
	   $query = "INSERT INTO project.invoice(Reservation_ID, Sub_Total, Total) 
       VALUES('$Reservation_id', '$Sub_Total', '$Total')";
	   
        $result = mysqli_query($connection,$query);
		 
	
	
	$query = "SELECT * FROM project.invoice where Reservation_ID = '$Reservation_id' ";
         $result = mysqli_query($connection,$query);
		 $Invoice_Number="";
		 while($row=mysqli_fetch_assoc($result)){
              

		  $Invoice_Number=$row["Invoice_Number"];
		 } 
		 
		    $query = "INSERT INTO project.payment(Payment_Type, Amount, Invoice_Number, Card_Number, Reservation_ID) 
       VALUES('Credit', '$Total', '$Invoice_Number', '$credit_number','$Reservation_id')";
	   
        $result = mysqli_query($connection,$query);
		
		
		$query_room = "UPDATE project.reservation SET Payment_Status = 'Paid' where Room_Number = $Room_Number ";
		      echo "Room Number bottom of the page".$Room_Number;
		   $result = mysqli_query($connection,$query_room);
		
		
		
			//$query_room = "UPDATE project.rooms SET Status = 'reserved' where Room_Number = $Room_Number ";
//echo "Room Number bottom of the page".$Room_Number;
		   //$result = mysqli_query($connection,$query_room);
			
		
		
		
	
	}
	}
	
  header("Location: print_inv.php");
  exit();
	
	

		
	
	
	
	?>


	
	
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