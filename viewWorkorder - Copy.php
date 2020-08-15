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

				<li style="float:left"><a  href="viewWorkorder.php">View Work order</a></li>
                <li style="float:left"><a  href="viewComment.php">View comments</a></li> 				
				<li style="float:right"><a  href="logoutResident.php">Log out</a></li>
         
    </ul>
	
</header>


<body style="background-color: white">
<h1 style="color:red; text-align:center; color:black;">History work orders</h1>
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
			   
			  $query = "SELECT * FROM wrkorder.resident where UserName = '$email'";
              $result = mysqli_query($connection, $query);
			  $Residen_ID=0;
		      while($row=mysqli_fetch_assoc($result)){
              
		      $Residen_ID=$row["Resident_ID"];
			  
  
  
			  }
			  
			 
			 $query = "SELECT * FROM wrkorder.worder where Resident_ID = $Residen_ID ";
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
					<td style="border: 1px solid black;"><a href='Comment.php?Comment_Id=<?php echo $Resident_ID; ?>'>Comment</a></td>
					<!---<td style="border: 1px solid black;"><a href='Resident.php?page=update&Resid_id=//<?php echo $Resident_ID;?>'>Edit</a></t>-->
 
         </tr>

			 
			 <?php } ?>
			 
<?php 

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