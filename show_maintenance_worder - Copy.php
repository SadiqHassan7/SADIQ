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
    
    <ul class="topnav"  id="Topnav">
                
                <li style="float:left"><a  href="maintenace_Comment.php">View Comments</a></li>
				<li style="float:right"><a href="logoutmaintenance.php">Log out</a></li>
                
    </ul>
	
	
</header>
<body style="background-color: white">
<h1 style="color:red; text-align:center; color:black;">Pending Work orders</h1>
  <?php 


?>

<table style=" background-color: gray;  border: 1px solid; border-color: lightgray; width:100%; margin-left:auto;margin-right:auto;">
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
				 echo " Something Wrong";
			       $email="";    
		     }
			  
			  
			  $query = "SELECT * FROM wrkorder.maintenance where UserName = '$email' ";
              $result = mysqli_query($connection, $query);
			 
		      while($row=mysqli_fetch_assoc($result)){
              
		        $maintenance_ID = $row["Maintenance_ID"];

			    }
			  
			  
			   
			 
			 
			 $query = "SELECT * FROM wrkorder.worder where Status = 'Uncompleted' ";
              $result = mysqli_query($connection,$query);
		      while($row=mysqli_fetch_assoc($result)){
		          $wkorder_ID=$row["wkorder_ID"];
			      $description=$row["description"];
			      $Dat_requested=$row["Dat_requested"];
				  $Dat_completed=$row["Dat_completed"];
				  $Status=$row["Status"];
				  $Priority=$row["Priority"];
			      $Resident_ID=$row["Resident_ID"];
				  $Maintenance_ID=$row["Maintenance_ID"];
			 
			 
			 
			 
			 
			 ?>
			 
			 <tr>
					<td style="border: 1px solid black;"><?php echo $wkorder_ID;?></td>
					<td style="border: 1px solid black;"><?php echo $description;?></td>
					<td style="border: 1px solid black;"><?php echo $Dat_requested;?></td>
					<td style="border: 1px solid black;"><?php echo $Dat_completed;?></td>
					<td style="border: 1px solid black;"><?php echo $Status;?></t>
					<td style="border: 1px solid black;"><?php echo $Priority;?></td>
					<td style="border: 1px solid black;"><?php echo $Resident_ID;?></td>
					<td style="border: 1px solid black;"><?php echo $Maintenance_ID;?></td>
					<td style="border: 1px solid black;"><a href='show_maintenance_worder.php?wkorder_Id=<?php echo $wkorder_ID; ?>'>fixing</a></td>
					<td style="border: 1px solid black;"><a href='make_maint_Comment.php?maintenance_Id=<?php echo $maintenance_ID; ?>'>Comment</a></td>
					<!---<td style="border: 1px solid black;"><a href='Resident.php?page=update&Resid_id=//<?php echo $Resident_ID;?>'>Edit</a></t>-->
 
           </tr>

			 
			 <?php } ?>
			 
<?php 

if(isset($_GET["wkorder_Id"])){
     $wkorder_Id =$_GET["wkorder_Id"];
   $query= "UPDATE wrkorder.worder
           SET Maintenance_ID = $maintenance_ID
           WHERE wkorder_ID=$wkorder_Id ";
   $result = mysqli_query($connection,$query);
 //$query= "DELETE FROM resident where Resident_ID = {$resid_ID} ";

header("Location: show_maintenance_worder.php");
}
?>

</tbody>





</table>
 <?php
  

 
  ?>
	
	

</body>

</html>