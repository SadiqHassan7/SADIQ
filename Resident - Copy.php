<!DOCTYPE html>
<html style="background:white;">
 <head>
        <link rel="stylesheet" type="text/css" href="35Project.css"></head>
		<meta charset="utf-8">
</head>
<header>
    
    <ul class="topnav" id="Topnav">
        
		        
                
				
                				
                
    </ul>
	
	
</header>
<body>
 <?php
  if(isset($_GET["page"])){
	 
	$page=$_GET['page'];	
 }else{
	$page="";
	
 }
   
 switch ($page) { 
  case 'register';
    include "Register_Resident.php";
    break;
	
  case 'update';
       
   include "updateResidentAccount.php";
    break;
	
  default:
    include "viewResident.php";
	
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
<?php 
 

?>
</html>