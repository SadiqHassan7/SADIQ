<!DOCTYPE html>
<html style="background:white;">

<head>

<link rel="stylesheet" type="text/css" href="325Project.emp.css">
</head>
<header>
     
    
    <ul class="topnav" id="Topnav" style="width:100%;">
                
		        <li style="float:left"><a  href="viewAllWorkorders.php">View Workorders</a></li>
                <li style="float:left"><a  href="viewAllComments.php">View Comments</a></li>			  
				<li style="float:right"><a  href="logoutmanager.php">Log out</a></li>
                				 
    </ul>
	
</header>


<body>
<h1 style="color:red; text-align:center; color:blue;">Welcome to Admin</h1>
<?php 
$connection = mysqli_connect('localhost','root','root123','wrkorder');

?>
<div >
<ul>
<li  " ><a  style=" color:blue; text-decoration: none;" href="Register_Resident.php">Register tenants</a></li>
<li  " ><a style=" color:blue;text-decoration: none;" href="Register_Maintenance.php">Register maintenance</a></li>
</ul>
<div>
<div>
<table style="border: 1px solid black; margin-top: 20px;  margin-left: auto;
  margin-right: auto;">
<thead >
<tr >
<th style="border: 1px solid black;">Resident_ID</th>
<th style="border: 1px solid black;">First Name</th>
<th style="border: 1px solid black;">Last Name</th>
<th style="border: 1px solid black;">Phone Number</th>
<th style="border: 1px solid black;">Apt Number</th>
</tr>

</thead>
<tbody>



 <?php
			  $query = "SELECT * FROM resident ";
              $result = mysqli_query($connection,$query);
		      while($row=mysqli_fetch_assoc($result)){
              
		      $Resident_ID=$row["Resident_ID"];
			  $FirstName=$row["FirstName"];
			  $LastName=$row["LastName"];
			  $PhoneNumber=$row["PhoneNumber"];
			  $AptNumber=$row["AptNumber"];
		 
  ?>
  
		<tr>
		
		<td style="border: 1px solid black;"><?php echo $Resident_ID;?></td>
		<td style="border: 1px solid black;"><?php echo $FirstName;?></td>
		<td style="border: 1px solid black;"><?php echo $LastName;?></td>
		<td style="border: 1px solid black;"><?php echo $PhoneNumber;?></td>
		<td style="border: 1px solid black;"><?php echo $AptNumber;?></td>
		<td style="border: 1px solid black;"><a href='Resident.php?page=update&Resid_id=<?php echo $Resident_ID;?>'>Edit</a></td>
		<td style="border: 1px solid black;"><a href='Resident.php?delete=<?php echo $Resident_ID;?>'>Delete</a></td>
		 
		</tr>


			 <?php } ?>
			 
		<?php 

		if(isset($_GET["delete"])){
				  $resid_ID =$_GET["delete"];
		          $query= "DELETE FROM resident where Resident_ID = $resid_ID ";
		          $result = mysqli_query($connection,$query);
		 header("Location: Resident.php");
		 
		}
		?>

</tbody>





</table>
</div>
 <?php
  

 
  ?>
	
	

</body>

</html>