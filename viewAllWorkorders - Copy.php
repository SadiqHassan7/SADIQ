<?php 
session_start();
?>

<!DOCTYPE html>
<html style="background-color: white;">
 <head>
        <link rel="stylesheet" type="text/css" href="325Project.emp.css">
		<meta charset="utf-8">
</head>

<header>
    
    <ul class="topnav" id="Topnav">
	             <li style="float:left"><a  href="viewAllWorkorders.php">View Workorders</a></li>
                <li style="float:left"><a  href="viewAllComments.php">View Comments</a></li>
				<li style="float:right"><a  href="logoutmanager.php">Log out</a></li>  
    </ul>
	
</header>
<body style="background-color: white">
<h1 style="color:red; text-align:center; color:blue;">Work orders</h1>
  <?php 


?>

<table style="border: 1px solid black;">
<thead >
<tr >
<th style="border: 1px solid black;">WorkOrder Number</th>
<th style="border: 1px solid black;">Description</th>
<th style="border: 1px solid black;">Date Requested</th>
<th style="border: 1px solid black;">Date Completed</th>
<th style="border: 1px solid black;">Status</th>
<th style="border: 1px solid black;">Priority</th>
<th style="border: 1px solid black;">Resident_ID</th>
<th style="border: 1px solid black;">Maintenance_ID</th>
</tr>

</thead>
<tbody>
 <?php
              $connection = mysqli_connect('localhost','root','root123','wrkorder');
			  
			  
			  
      
             if (isset($_SESSION['UserName'])){
		           $email=$_SESSION['UserName'];
	         }else{
			       $email="";    
		     }
			   
			  $query = "SELECT * FROM wrkorder.manager where UserName = '$email'";
              $result = mysqli_query($connection, $query);
			  $Residen_ID=0;
		      while($row=mysqli_fetch_assoc($result)){
              
		      $manager_id=$row["Manager_ID"];
			  
  
  
			  }
			  
		
			 
			 $query = "SELECT * FROM wrkorder.worder ";
              $result = mysqli_query($connection,$query);
		      while($row=mysqli_fetch_assoc($result)){
		          $wkorder_ID=$row["wkorder_ID"];
			      $description=$row["description"];
			      $Dat_requested=$row["Dat_requested"];
				  $Dat_completed=$row["Dat_completed"];
				  $Status=$row["Status"];
				  $Priority=$row["Priority"];
			      $Resident_ID=$row["Resident_ID"];
				  $maintenance_ID=$row["Maintenance_ID"];
			 
			 
			 
			 
			 
			 ?>
			 
			 <tr>
					<td style="border: 1px solid black;"><?php echo $wkorder_ID;?></td>
					<td style="border: 1px solid black;"><?php echo $description;?></td>
					<td style="border: 1px solid black;"><?php echo $Dat_requested;?></td>
					<td style="border: 1px solid black;"><?php echo $Dat_completed;?></td>
					<td style="border: 1px solid black;"><?php echo $Status;?></t>
					<td style="border: 1px solid black;"><?php echo $Priority;?></td>
					<td style="border: 1px solid black;"><?php echo $Resident_ID;?></td>
					<td style="border: 1px solid black;"><?php echo $maintenance_ID;?></td>
					<td style="border: 1px solid black;"><a href='Commentmanager.php?workorder_Id=<?php echo $wkorder_ID; ?>&manager_Id=<?php echo $manager_id; ?>'>Comment</a></td>
					<td style="border: 1px solid black;"><a href='update.php?worder_id=<?php echo $wkorder_ID;?>'>Edit</a></t>
 
         </tr>

			 
			 <?php } ?>
			 
			 
			 
<?php 
             if(isset($_GET['comleted'])){
				  echo "<Strong style='color: red'>  Soryy, this work order has already being completed. Thank you. <Strong>";
			  }
//if(isset($_GET["delete"])){
         // $resid_ID =$_GET["delete"];
 //$query= "DELETE FROM resident where Resident_ID = {$resid_ID} ";
 //$result = mysqli_query($connection,$query);
// header("Location: resident.php");
//}
?>

</tbody>





</table>
 <?php
  

 
  ?>
	
	

</body>

</html>