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
                <li style="float:left"><a  href="show_maintenance_worder.php">View Workorders</a></li>
                <li style="float:left"><a  href="maintenace_Comment.php">View Comments</a></li>
				<li style="float:right"><a href="logoutmaintenance.php">Log out</a></li>
                
    </ul>
	
	
</header>

<body style=" text-align:center;background-color: white;">
<h1 style="color:red; text-align:center; color:black;"></h1>


<table style="border-color: lightgray; width:80%; background-color:#a9a9a9; text-align: center;border: 1 solid black; margin-left:auto;margin-right:auto;">
<caption style=" color:black;">Important Comment</caption>
<thead>

</thead>
<th style=" border: 1px solid black;">First Name</th>
<th style=" padding: 2%;border: 1px solid black;">Comment Title</th>
<th style="border: 1px solid black;">Date submited</th>
<th style="border: 1px solid black;">Work Order Number</th>

<tbody>
 <?php
 
             $connection = mysqli_connect('localhost','root','root123','wrkorder');
      
             if (isset($_SESSION['UserName'])){
		           $email=$_SESSION['UserName'];
	         }else{
			       $email="";    
		     }
			   
			  $query = "SELECT * FROM wrkorder.maintenance where UserName = '$email' ";
              $result = mysqli_query($connection,$query);
			
		  while($row=mysqli_fetch_assoc($result)){
   
		      $maintenance_ID=$row["Maintenance_ID"];
			  $FirstName=$row["FirstName"];
			  $LastName=$row["LastName"];

			  }
		
			   $query = "SELECT * FROM wrkorder.worder where Maintenance_ID = $maintenance_ID ";
               $result = mysqli_query($connection,$query);
			   $column = array();
		     while($row=mysqli_fetch_assoc($result)){
		          $column[] = $row["wkorder_ID"];
				  
			  }
			 foreach($column as $wkorder_Id){
                  
			       $query = "SELECT * FROM wrkorder.comment where wkorder_ID = $wkorder_Id ";
                   $res = mysqli_query($connection,$query);
				   
		     while($row=mysqli_fetch_assoc($res)){
				  
				$Comment_Title = $row["Comment_Title"];
				$Comment_Date = $row["Comment_Date"];
				$Comment_ID = $row["Comment_ID"];
				$comment_Author = $row["Comment_Author"];
    
			 
			 echo "<tr>";
			   
			    echo "<td style= 'padding-left: 4%; padding-right: 4%;border: 1px solid black;'>".$comment_Author."</td>";
			    echo "<td style= 'padding-left: 4%; padding-right: 4%;border: 1px solid black;'><a href='DisplayComment_maint.php?coment_id=$Comment_ID'>".$Comment_Title."</a></td>";
				echo "<td style= 'padding-left: 4%; padding-right: 4%;border: 1px solid black;'>".$Comment_Date."</td>";
				echo "<td style= 'padding-left: 4%; padding-right: 4%;border: 1px solid black;'>".$wkorder_Id."</td>";
				
					
			 echo "</tr>";
			 
		
			 } 
			 } 
			 
			 ?>
			    
				<?php
				
	//if(isset($_GET["order_Id"])){
               //$wkorder_Id =$_GET["order_Id"];
               //$query= "UPDATE wrkorder.worder
                        //SET Maintenance_ID = $maintenance_ID
                         //WHERE wkorder_ID=$wkorder_Id ";
               //$result = mysqli_query($connection,$query);
 //$query= "DELETE FROM resident where Resident_ID = {$resid_ID} ";
	//}
              
			  //$Comment_Title="";
			  //$Comment_Date="";
			 
		?>     


</tbody>

</table>
<div class="footer" style="background-color: white;">
  <p>St. Paul</p>
  <p>Address</p>
  <p>Phone #</p>
</div>

</body>
<script>
window.onscroll = function() {myFunction();}

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