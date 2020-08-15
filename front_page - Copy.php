<?php 
session_start();

?>

<!DOCTYPE html>
<html style="background:white;">
 <head>
        <link rel="stylesheet" type="text/css" href="325Project.css"></head>
		<meta charset="utf-8">
</head>
<header>
    
   <!--<ul class="topnav" id="Topnav">
       <a class="topnav-logo" href="MetroHomePage.html"><img src="MetroLogo.png" alt="site-logo"></a>
               <li><a href="AboutUs.html">About Us</a></li>
                <li><a href="Rooms.html">Rooms</a></li>
                <li><a href="Facilities.html">Facilities</a></li>
                <li><a href="show_availible_rooms.php">Reservations</a></li>
                <li><a href="log_in.php">Sign In</a></li>
				<li><a style="margin-left:-80px" href="logout.php">Sign out</a></li>
                <li><a href="signup.php">Create Account</a></li>
				
    </ul>-->
</header>
<?php 



?>
<body>
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