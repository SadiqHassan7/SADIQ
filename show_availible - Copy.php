<?php 
session_start();
echo "this is the seseion ".$_SESSION['Email'];
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

<?php

 	$large_room = (isset($_POST['large_room']) ? $_POST['large_room'] :'Something Wrong');
	//echo "this is large ".$large_room;
	$medium_room = (isset($_POST['medium_room']) ? $_POST['medium_room'] :'Something Wrong');
	//echo "this is medium ".$medium_room;
	$small_room = (isset($_POST['small_room']) ? $_POST['small_room'] :'Something Wrong');
	//$number_adults = (isset($_POST['number_adults']) ? $_POST['number_adults'] :'Something Wrong');
	//$number_children = (isset($_POST['number_children']) ? $_POST['number_children'] :'Something Wrong');
	$check_in = (isset($_POST['check_in']) ? $_POST['check_in'] :'Something Wrong');
	$check_out = (isset($_POST['check_out']) ? $_POST['check_out'] :'Something Wrong');
	//$Credit = (isset($_POST['Credit']) ? $_POST['Credit'] :'Something Wrong');
	//$cash = (isset($_POST['cash']) ? $_POST['cash'] :'Something Wrong');

    $connection = mysqli_connect('localhost','root','root123','project');
	if($connection){
		echo "we are connected";
	}
	else{
		echo "Connection Failed <br>";
	}
	
	
	if($large_room==0&&$medium_room==0&&$small_room==0){
		header("Location: show_availible_rooms.php?room='Empty'");
			 exit();
		
	}

?>


<?php
	    if(isset($_GET["cvv"]) && isset($_GET["credit_number"]) && isset($_GET["expre_date"])){
			echo "Input the right Expration Date, CVV and Credit Number <br>";
		}elseif(isset($_GET["cvv"]) && isset($_GET["credit_number"])){
			echo "Input the right CVV and this is the code Credit Number <br>";
		}elseif(isset($_GET["credit_number"]) && isset($_GET["expre_date"])){
			echo "Input the right Expration Date and Credit Number <br>";
		}elseif(isset($_GET["cvv"]) && isset($_GET["expre_date"])){
			echo "Input the right Expration Date and CVV <br>";
		}elseif(isset($_GET["cvv"])){
			echo "Invalid CVV number.  Please enter 3 digits. <br>";
		}elseif(isset($_GET["credit_number"])){
			echo "Invalid Credit Card Number.  Please enter 16 digits <br>";
		}elseif(isset($_GET["expre_date"])){
			echo "input the right expration date <br>";
		}
		   
	if($check_out<$check_in){
		     header("Location: show_availible_rooms.php?check_out=$check_out&check_in=$check_in");
			 exit();
			//echo "this is the wrong date please put the right date ";
			//exit();
		}
		if($check_out==""||$check_in==""){
		     header("Location: show_availible_rooms.php?check_ou=$check_out&check_i=$check_in");
			 exit();
			//echo "this is the wrong date please put the right date ";
			//exit();
		}
		if($large_room!=0 && $medium_room!=0 & $small_room!=0){ 
		     header("Location: show_availible_rooms.php?large=$large_room&medium=$medium_room&small=$small_room");
			 exit();
		}elseif($large_room!=0 && $medium_room!=0){
			Echo "please pick one of the rooms but not all athe sametime, thank you";
			 header("Location: show_availible_rooms.php?large=$large_room&medium=$medium_room&small=$small_room");
			 exit();
		}elseif($large_room!=0 && $small_room!=0){
			Echo "please pick one of the rooms but not all athe sametime, thank you";
			 header("Location: show_availible_rooms.php?large=$large_room&medium=$medium_room&small=$small_room");
			 exit();
		}elseif($medium_room!=0 && $small_room!=0){
			Echo "please pick one of the rooms but not all athe sametime, thank you";
			 header("Location: show_availible_rooms.php?large=$large_room&medium=$medium_room&small=$small_room");
			 exit();
		}
		
		
		
	if($large_room!=0){
	echo "This is inside the large ".$large_room;
		echo $email = (isset($_SESSION['Email']) ? $_SESSION['Email'] :'Something Wrong');
		$cust_id=0;
		$query = "SELECT * FROM project.customer where Email = '$email' ";
         $result = mysqli_query($connection,$query);
		 while($row=mysqli_fetch_assoc($result)){
              
		  $cust_id=$row["Customer_ID"];
		 }
		 
		 $start_date="";
		 $end_date="";
		 $room_num="";
		 $cus_id="";
		$query = "SELECT * FROM project.reservation ";
         $result = mysqli_query($connection,$query);
		 while($row=mysqli_fetch_assoc($result)){
              
		  $cus_id=$row["Customer_ID"];
		  $room_num=$row["Room_Number"];
		  $start_date=$row["Start_Date"];
		  $end_date=$row["End_Date"];
		  
		  if(($large_room==$room_num) && ($check_in>=$start_date) && ($check_out<=$end_date) ){
			  
			  header("Location: show_availible_rooms.php?large_room=$large_room&chec_in=$check_in&chec_out=$check_out");
				 exit();
			  
		  }
		  
		 }
			 //if($cus_id==""){
		  $query = "INSERT INTO project.reservation (Customer_ID, Room_Number, Start_Date, End_Date) 
           VALUES('$cust_id', '$large_room', '$check_in', '$check_out') ";
		        mysqli_query($connection, $query);
			 //}elseif($cus_id!=""){
				 // header("Location: show_availible_rooms.php?cus_id=$cus_id");
				 //exit();
				 
			 //}
		   //$query_room = "UPDATE project.rooms SET Status = 'reserved' where Room_Number = $large_room ";
		    
		   //mysqli_query($connection, $query_room);
		      
		 } else if($medium_room!=0){
			  echo "This is inside the medium ".$medium_room;
		 echo $email = (isset($_SESSION['Email']) ? $_SESSION['Email'] :'Something Wrong');
		$cust_id=0;
		$query = "SELECT * FROM project.customer where Email = '$email' ";
         $result = mysqli_query($connection,$query);
		 while($row=mysqli_fetch_assoc($result)){
              
		  $cust_id=$row["Customer_ID"];
		 }
		 
		  $cus_id=$row["Customer_ID"];
		  $room_num=$row["Room_Number"];
		  $start_date=$row["Start_Date"];
		  $end_date=$row["End_Date"];
		$query = "SELECT * FROM project.reservation ";
         $result = mysqli_query($connection,$query);
		 while($row=mysqli_fetch_assoc($result)){
              
		  
		  $cus_id=$row["Customer_ID"];
		  $room_num=$row["Room_Number"];
		  $start_date=$row["Start_Date"];
		  $end_date=$row["End_Date"];
		  
		  if(($medium_room==$room_num) && ($check_in>=$start_date) && ($check_out<=$end_date) ){
			  
			  header("Location: show_availible_rooms.php?medium_room=$medium_room&chec_in=$check_in&chec_out=$check_out");
				 exit();
			  
		  }
		 }
			 //if($cus_id==""){
			 
		  $query = "INSERT INTO project.reservation (Customer_ID, Room_Number, Start_Date, End_Date) 
           VALUES('$cust_id', '$medium_room', '$check_in', '$check_out') ";
		        mysqli_query($connection, $query);
			 //}elseif($cus_id!=""){
				// header("Location: show_availible_rooms.php?cus_id=$cus_id");
				 //exit();
				 
			 //}
		   //$query_room = "UPDATE project.rooms SET Status = 'reserved' where Room_Number = $medium_room ";
		    
		   //mysqli_query($connection, $query_room);
		 
		 }elseif($small_room!=0){
			 echo "This is inside the small ".$small_room;
		   echo $email = (isset($_SESSION['Email']) ? $_SESSION['Email'] :'Something Wrong');
		$cust_id=0;
		$query = "SELECT * FROM project.customer where Email = '$email' ";
         $result = mysqli_query($connection,$query);
		 while($row=mysqli_fetch_assoc($result)){
              
		  $cust_id=$row["Customer_ID"];
		 }
		  $cus_id=$row["Customer_ID"];
		  $room_num=$row["Room_Number"];
		  $start_date=$row["Start_Date"];
		  $end_date=$row["End_Date"];
		$query = "SELECT * FROM project.reservation ";
         $result = mysqli_query($connection,$query);
		 while($row=mysqli_fetch_assoc($result)){
              
		  $cus_id=$row["Customer_ID"];
		  $room_num=$row["Room_Number"];
		  $start_date=$row["Start_Date"];
		  $end_date=$row["End_Date"];
		  
		  if(($small_room==$room_num) && ($check_in>=$start_date) && ($check_out<=$end_date) ){
			  
			  header("Location: show_availible_rooms.php?small_room=$small_room&chec_in=$check_in&chec_out=$check_out");
				 exit();
			  
		  }
		 }
			 //if($cus_id==""){ 
		  $query = "INSERT INTO project.reservation (Customer_ID, Room_Number, Start_Date, End_Date) 
           VALUES('$cust_id', '$small_room', '$check_in', '$check_out') ";
		        mysqli_query($connection, $query);
			 //}elseif($cus_id!=""){
				// header("Location: show_availible_rooms.php?cus_id=$cus_id");
				// exit();
				 
			 //}
		   //$query_room = "UPDATE project.rooms SET Status = 'reserved' where Room_Number = $small_room ";
		    
		   //mysqli_query($connection, $query_room);

		 
		 }

	?>
	
<form action="Credit.php" method="POST">
	  <div style="font-size:1.5em; font-weight:400;color:black">
        
		<label for="credit">Credit Number</label><br>
		<input type="text" name="credit_number" size="35">
		<?php if(isset($emailerorrr)){echo $emailerorrr;}?><br><br>
		<label for="expdate">Expration date</label><br>
		<input type="text" name="expdate" size="35">
		<?php if(isset($passerorrr)){echo $passerorrr;}?><br><br>
		<label for="cvv">cvv</label><br>
		<input type="text" name="cvv" size="10">
		<?php if(isset($passerorrr)){echo $passerorrr;}?><br><br>
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
</html>