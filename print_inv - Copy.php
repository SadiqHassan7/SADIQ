<?php 
 session_start();
 $connection = mysqli_connect('localhost','root','root123','project');
	
	if($connection){
		//echo "we are connected";
	}
             if(isset($_SESSION['Email'])){
				$email =$_SESSION['Email'];
				 
			 
 $query = "SELECT * FROM project.customer where Email = '$email' ";
         $result = mysqli_query($connection,$query);
		 $password_in_database="";
		 while($row=mysqli_fetch_assoc($result)){
              
		  // echo $row["FirstName"],$row["LastName"];
		        $cust_id=$row["Customer_ID"];
		 }
			 }
   $query = "SELECT * FROM project.customer INNER JOIN project.reservation ON project.customer.Customer_ID = project.reservation.Customer_ID 
   INNER JOIN project.invoice ON project.reservation.Reservation_ID = project.invoice.Reservation_ID ";
         $result = mysqli_query($connection,$query);
		 $password_in_database="";
		 while($row=mysqli_fetch_assoc($result)){
              
		  
		        $FirstName=$row["FirstName"];
				$LastName=$row["LastName"];
				$Room_Number=$row["Room_Number"];
				$Sub_Total=$row["Sub_Total"];
				$Total=$row["Total"];
				$Start_Date=$row["Start_Date"];
				$End_Date=$row["End_Date"];
				
		 }
		 ?>
		 <?php 
		 $Room_Typ="";
		 if($Room_Number>=1&&$Room_Number<=10){
			 $Room_Typ="Large";
		 }elseif($Room_Number>=11&&$Room_Number<=20){
			  $Room_Typ="Medium";
		 }elseif($Room_Number>=21&&$Room_Number<=30){
			    $Room_Typ="Small";
		 }
		 
		 
		 $start_dat=explode('-', $Start_Date);
		 $start_datee=strtotime($Start_Date);
		 
		 if(checkdate($start_dat[0], $start_dat[1], $start_dat[2])){
			 die("Enter valid date");
		 }
		 $end_dat=explode('-', $End_Date);
		 $end_datee=strtotime($End_Date);
		 
		 if(checkdate($end_dat[0], $end_dat[1], $end_dat[2])){
			 die("Enter valid date");
		 }
		 $days=Floor(($end_datee-$start_datee)/86400);
		 
		 
		 ?>
		 <?php

 echo "<div style=\"margin: 0px; padding: 50px 50px 50px 50px;background:lightblue\">";
    //echo "Number of days ----".$days."<br>";
	echo "Name:    ".$FirstName."  ".$LastName."<br>";
	echo "Rooms:    "."   -------------------"."Roomtype  ". " -------------------" . "Price  <br>";
	echo "Rooms:     "."   -------------------".$Room_Typ.   " -------------------$".$Sub_Total."/night .<br>";	
 echo "</div> <br>";

 echo "<div style=\" margin-top:-10px; padding: 50px 50px 50px 50px;background:lightblue\">";
	echo "Reservation Dates:    "."-----".$Start_Date." ----- ------".$End_Date."<br>";
	echo "Total days:  ---- ".$days."<br>";
	echo "Tax:   ------- $".bcmul(($Sub_Total*0.05), $days).'<br>';
	echo "Subtotal:   ------- $".bcmul($Sub_Total, $days).'<br>';
echo "Total:   ------- $".bcmul(($Sub_Total*1.05), $days);	
 echo "</div>";

 "style=\"clear:both;\"";
unset($_SESSION['Email']);
session_destroy();
?>








