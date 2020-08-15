





<?php
//$user_name=(isset($_POST['user_name'])? $_POST['user_name']:'Something Wrong');
//echo $user_name;
$Number_of_movies=(isset($_POST['Number_of_movies'])? $_POST['Number_of_movies']:'Something Wrong');
$user_name=(isset($_POST['user_name']) ? $_POST['user_name'] :'Something Wrong');
$document_root=(isset($_SERVER['DOCUMENT_ROOT'])? $_SERVER['DOCUMENT_ROOT'] : 'Something Wrong' );
$Total=0.00;
?>



<!DOCTYPE html>
<html>
<head>
<title> Movie's payment receipt calculation</title>
</head>
<body>

<h1>payment receipt calculation</h1>
<form action="" method="post">

<table>
<tr>
<td><input type="text" name="user_name"></td>
</tr>

<tr>
<td><input type="text" name="Number_of_movies"></td>
</tr>

<tr>
<td><input type="submit" value="submit"></td>
</tr>

</table>

</form>

<?php 
 
     define('FIRST_2MOV_PRICE',5.50);
	 define('NEXT_2MOV_PRICE',4.25);
	 define('NEXT_3MOV_PRICE',3.00);
	 define('NEXT_13MOV_PRICE',2.00);
	     
if($user_name&&$Number_of_movies<=20&&$Number_of_movies>=1){
    
	if($Number_of_movies>=1&&$Number_of_movies<=2){
				$Total=$Number_of_movies*FIRST_2MOV_PRICE;
				echo "Total amount due is $".number_format($Total,2).'<br>';
	
    }else if($Number_of_movies>=3&&$Number_of_movies<=4){
		
				$extra=$Number_of_movies-2;
				$Number_of_movies=$Number_of_movies-$extra;
				$SubTotal=$Number_of_movies*FIRST_2MOV_PRICE;
				$Total=($SubTotal)+($extra*NEXT_2MOV_PRICE);
				echo "Total amount due is $".number_format($Total,2).'<br>';
			
	}else if($Number_of_movies>=5&&$Number_of_movies<=7){
		
				$extra=$Number_of_movies-4;
				$Number_of_movies=$Number_of_movies-$extra;
				 $Number_of_movies=($Number_of_movies/2);
				$SubTotal1=$Number_of_movies*FIRST_2MOV_PRICE;
				$SubTotal2=$Number_of_movies*NEXT_2MOV_PRICE;
				$Total=($SubTotal1)+($SubTotal2)+($extra*NEXT_3MOV_PRICE);
				echo "Total amount due is $".number_format($Total,2).'<br>';
		
	}else if($Number_of_movies>=8&&$Number_of_movies<=20){
		
				$extra=$Number_of_movies-7;
				$Number_of_movies=$Number_of_movies-$extra;
			    if($Number_of_movies==7){
					$extra2=$Number_of_movies-4;
					$Number_of_movies=$Number_of_movies-$extra2;
					$Number_of_movies=($Number_of_movies/2);
					$SubTotal1=$Number_of_movies*FIRST_2MOV_PRICE;
					$SubTotal2=$Number_of_movies*NEXT_2MOV_PRICE;
					$Total=($SubTotal1)+($SubTotal2)+($extra2*NEXT_3MOV_PRICE);
					//echo "Total is $".number_format($Total,2).'<br>';
                }
				$Total=($SubTotal1)+($SubTotal2)+($extra2*NEXT_3MOV_PRICE)+($extra*NEXT_13MOV_PRICE);
				echo "Total amount due is $".number_format($Total,2).'<br>';
		
	}
	
	@$resour_pointer=fopen("visitor.txt", 'wb');
	  
	if(!$resour_pointer){
		echo "<p><strong> your order could not be processed at this moment.<br> please try again later</strong></p>";
		exit;
	}
	flock($resour_pointer, LOCK_EX);
	fwrite($resour_pointer,$user_name,strlen($user_name));
	flock($resour_pointer,LOCK_UN);
	fclose($resour_pointer);
	echo "<p>Order written.</p>";
	} else if($Number_of_movies>20&&$user_name!=""){
		echo "<p>You Can not order more than 20 movies at a time.<br>
			   Please try once more.</p>";	
	} else if($user_name=="" && $Number_of_movies==""){
		
		echo "<p>You Can not order more than 20 movies at a time.<br>
			   Please try once more.</p>";	
		
	}  else if($user_name!="" && $Number_of_movies==""){
		
		echo "<p> here You Can not order more than 20 movies at a time.<br>
			   Please try once more.</p>";	
		
	} else if($user_name=="" && $Number_of_movies!=""){
		
		echo "<p>You Can not order more than 20 movies at a time.<br>
			   Please try once more.</p>";	
		
	} else if($Number_of_movies<=0){
		
		echo "<p>You Can not order less than 1 movies at a time.<br>
			   Please try once more.</p>";	
		
	}
	
?>

</body>
</html>