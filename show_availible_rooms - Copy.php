<?php 
session_start();
	//if(isset($_POST['Email'])){
	//$_SESSION['Email']=$_POST['Email'];
	//}
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
                <li><a href="show_availible_rooms.php?sign=clicked">Reservations</a></li>
                <li><a href="log_in.php">Sign In</a></li>
				<li><a style="margin-left:-80px" href="logout.php">Sign out</a></li>
                <li><a href="signup.php">Create Account</a></li>
    </ul>
</header>
<body>

<h1 style="color:red;">Unreserved Rooms</h1>

<ul style="color:red;">
<li>Large room price is $50 for each person</li>
<li>Medium room price is $30 for each person</li>
<li>Small room price is $20 for each person</li>

</ul>

<?php
 	if(isset($_GET["large_room"])&&isset($_GET["chec_in"])&&isset($_GET["chec_out"])){ 
		    Echo "This room .{$_GET["large_room"]}. was reserved on this date .{$_GET["chec_in"]}. and .{$_GET["chec_out"]}. , please pick another room, thank you";
		} else if(isset($_GET["medium_room"])&&isset($_GET["chec_in"]) && isset($_GET["chec_out"]) ){
			Echo "This room .{$_GET["medium_room"]}. was reserved on this date .{$_GET["chec_in"]}. and .{$_GET["chec_out"]}. , please pick another room, thank you";
			
		} else if(isset($_GET["small_room"])&&isset($_GET["chec_in"]) && isset($_GET["chec_out"])){
			Echo "This room .{$_GET["small_room"]}. was reserved on this date .{$_GET["chec_in"]}. and .{$_GET["chec_out"]}. , please pick another room, thank you";
			 
		} 
     if(isset($_GET["check_out"])&&isset($_GET["check_in"])){
	 echo " Check out date is less than.{$_GET["check_out"]}.the check in date.{$_GET["check_in"]}. please put the right date ";
			 
		}
		if(isset($_GET["check_ou"])||isset($_GET["check_i"])){
	             echo " you must chose dates ";
			 
		}
         if(isset($_GET["room"])){
	             echo " you must chose at least one room ";
			 
		}
    $connection = mysqli_connect('localhost','root','root123','project');
	if($connection){
		echo "we are connected";
	}

?>

<form action="show_availible.php" method="post">
	  <div style="font-size:1.5em; font-weight:400;color:black">
        <div>
			 Large <select name="large_room">
			  <option value='0'>0</option>;
			  
 <?php
			  $query = "SELECT * FROM project.rooms where Room_Type = 'large' ";
              $result = mysqli_query($connection,$query);
		      while($row=mysqli_fetch_assoc($result)){
              
		      $room_type=$row["Room_Type"];
			  
			  $room_number=$row["Room_Number"];
			  
			  
			  echo "<option value='{$room_number}'>$room_number</option>";
			
		 }
		 
  ?>
              
  
              </select><br><br>
			  
			  		        
			 Medium<select name="medium_room">
			  <option value='0'>0</option>;
			  
 <?php
			  $query = "SELECT * FROM project.rooms where Room_Type = 'medium' ";
              $result = mysqli_query($connection,$query);
		      while($row=mysqli_fetch_assoc($result)){
              
		      $room_type=$row["Room_Type"];
			  
			  $room_number=$row["Room_Number"];
			  
			  
			  echo "<option value='{$room_number}'>$room_number</option>";
			
		 }
		 
  ?>
              
  
              </select><br><br>
			  
			   Small<select name="small_room">
			     <option value='0'>0</option>;
			  
 <?php
			  $query = "SELECT * FROM project.rooms where Room_Type = 'small' ";
              $result = mysqli_query($connection,$query);
		      while($row=mysqli_fetch_assoc($result)){
              
		      $room_type=$row["Room_Type"];
			  
			  $room_number=$row["Room_Number"];
			  
			  
			  echo "<option value='{$room_number}'>$room_number</option>";
			
		 }
		 
  ?>
              
  
              </select><br><br>
			  
			  </div>
			  
	    <label for="check_in">Check In</label><br>
		<input type="date" name="check_in" size="35"><br>
		<label for="check_out">Check Out</label><br><br>
		<input type="date" name="check_out" size="35"><br><br> 
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