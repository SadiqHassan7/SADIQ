<!DOCTYPE html>
<html >
 <head>
        <link rel="stylesheet" type="text/css" href="325Project.emp.css">
		<meta charset="utf-8">
</head>
<header>
    
    <ul class="topnav" id="Topnav">
                <li style="float:right"><a  href="logoutmanager.php">Log out</a></li>				
    </ul>
</header>

<body>

<h1 style="color:red; text-align:center; color:black;">Update the workorders</h1>

    <?php 
	$x=1;
	$y=1;
	$z=1;
	
	$rexpretion="/^[a-zA-Z]{1,13}$/";

	$connection = mysqli_connect('localhost','root','root123','wrkorder');
	
	if(isset($_POST['subm'])){
		
	
	if(!(preg_match($rexpretion,$_POST['workorderstatus']))){
		$x=0;
		$statuserror="<b style='color:red; font-size:14px;'>Invalid status workorder.  The status of the workorder must be less than 13 letters.  Only letters accepted.</b>";
		
	}

	$Datecompleted=trim($_POST['Datecompleted']);
	$workorderstatus=trim($_POST['workorderstatus']);
	
	if(isset($_GET["worder_id"])&&($x!=0)){
		
		
	 
	      $worder_id=$_GET['worder_id'];
	    $query = "UPDATE wrkorder.worder SET Dat_completed = '$Datecompleted', Status = '$workorderstatus' where wkorder_ID = $worder_id ";
         mysqli_query($connection,$query);
		 echo "Account Updated! ";
			    $y=0;
				$z=0;
			  
	}else{
		
	}
	}
	
	if($connection){
		//echo "we are connected <br>";
	}
	else{
		echo "Connection Failed <br>";
	}
	   
?>
	<form action="" method="post">
	  <div style="font-size:1.5em; font-weight:400; color:black">
	<!----------------------------------------------------------------------------------------------->
	
	    <?php 
	
		 if(isset($_GET["worder_id"])){
	 
	      $worder_id=$_GET['worder_id'];
		  
		  
		  $query = "SELECT * FROM wrkorder.worder where wkorder_ID = $worder_id ";
              $result = mysqli_query($connection,$query);
			
		      while($row=mysqli_fetch_assoc($result)){
               
		      $Dat_completed=$row["Dat_completed"];
			  $Status=$row["Status"];
			         
			  if($Status=="completed" && $z==1||$Status=="Completed" && $z==1){
				  
				  header("Location: viewAllWorkorders.php?comleted='finished'");
				   exit;
			   }
		       
		  ?>

		  <?php 
		  if($y==0){
			  $Dat_completed="";
			  $Status="";
			  
		  }
		  
		  ?>
		  
		  
        <label for="Datecompleted">Date completed</label><br>
		<input value="<?php echo $Dat_completed;?>" type="date" name="Datecompleted" size="35"><br><br>
	<!----------------------------------------------------------------------------------------------->
		<label for="workorderstatus">Status of the workorder</label><br>
		<input value="<?php echo $Status;?>"  type="text" name="workorderstatus" size="35"><br>
		<?php if(isset($statuserror)){echo $statuserror;}?><br>
	
	
			<input type="submit" name="subm" value="Update" style="background-color: #4CAF50;
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
		  <?php 
		  
		  
		  
		  ?>
		  
		  
		<?php }} ?>
		
		
		
		

	</form>
	
	

</html>