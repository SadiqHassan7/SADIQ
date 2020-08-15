<?php 
session_start();
?>
<!DOCTYPE html>
<html style="background: white;">
 <head>
        <link rel="stylesheet" type="text/css" href="325Project.emp.css">
		<meta charset="utf-8">
</head>
<header>
    
    <ul class="topnav"  id="Topnav">
                <li style="float:left"><a  href="show_maintenance_worder.php">View Workorders</a></li>
                <li style="float:left"><a  href="maintenace_Comment.php">View Comments</a></li>
				<li style="float:right"><a href="logoutmaintenance.php">Log out</a></li>
                
    </ul>
	
	
</header>
<body style="text-align:center;">
 <?php
   $connection = mysqli_connect('localhost','root','root123','wrkorder');
				  if(isset($_GET["coment_id"])){
					 
					$comment_id=$_GET["coment_id"];	
				 }else{
					$comment_id="";
					exit;
				 }
				 
				  $query="SELECT * FROM wrkorder.comment where Comment_ID = $comment_id ";
				  $result = mysqli_query($connection, $query);

				  while($row=mysqli_fetch_assoc($result)){
					  
					$Comment_Title=$row["Comment_Title"];
					$Comment_Content=$row["Comment_Content"];
					$Comment_Author=$row["Comment_Author"];
	
?>

                <h3 style="color:red;  color:black;"><?php echo $Comment_Title; ?></h3><br>
				<div style=" border: 1px dotted black; width: 60%; text-align: center; margin:0 auto; " >
				<p><?php echo $Comment_Content; ?></p><br><br>
				
                  </div>
                 <p style="color: blue;">---------- Writen by <?php echo $Comment_Author; ?>---------</p>
				 <?php } ?>
	
	
<div class="footer" >
  <p>Comment Page</p>
  <p></p>
  <p></p>
</div>

</body>
<script>
window.onscroll = function() {
	myFunction();
	
	}

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