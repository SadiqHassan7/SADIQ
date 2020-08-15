<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="325Project.emp.css"></head>
		<meta charset="utf-8">
</head>
<header>
    
    <ul class="topnav" id="Topnav">
        <a class="topnav-logo" href="CheckIn.html"><img src="MetroLogoEmp.png" alt="site-logo"></a>
                <li><a href="Checkin.html">Check-In</a></li>
                <li><a href="EmpReservation.html">New Reservation</a></li>
                <li><a href="Checkout.html">Checkout</a></li>
                <li><a href="NewUser.html">New User</a></li>
    </ul>
</header>
<body>
<?php
    $connection = mysqli_connect('localhost','root','root123','project');
	
	if($connection){
		echo "we are connected";
	}
	
	$query="SELECT * FROM project.reservation";
	
         $result = mysqli_query($connection, $query);
		 
		 
		 while($row=mysqli_fetch_assoc($result)){
          $room_number = $row["room_number"];
		 $reser_id = $row["reser_id"];
		 $start_date = $row["start_id"];
		 $end_date = $row["end_id"];
		  $cust_id = $row["cust_id"];
		  
		 echo " <br>Reservation id ".$reser_id.'<br>';
		 echo "Start date".$start_date.'<br>' ;
		 echo "End date".$end_date.'<br>';
		 echo "Customer id".$cust_id.'<br>' ;
		 echo "Room Number".$room_number.'<br>';
		
			 
			
		 
		 }
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