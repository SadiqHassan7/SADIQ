<!DOCTYPE html>
<html style="background:white;">
<body style=" width:88%; margin:0 auto; background:#c5c2ff; padding:20px 20px 290px;" >

<h1 style="color:red;text-align:center;">Employee Log in</h1>

    <?php 
	
	$userxpretion="/^[a-zA-Z]+$/";
	$passwexpretion="/^[a-zA-Z!@#$%\^\\\.\-=+*\d]{6,8}$/";
	
	
	if(isset($_POST['submit'])){
	if(!(preg_match($userxpretion,$_POST['username']))){
		//$emailerorrr="<span style='color:red'>X</span>";
	}
	if(!(preg_match($passwexpretion,$_POST['password']))){
		$passerorrr="<span style='color:red'>X</span>";
	}
	$connection = mysqli_connect('localhost','root','root123','project');
	if($connection){
		echo "we are connected";
	}
	$username=$_POST['username'];
	$password=$_POST['password'];
	$query = "SELECT * FROM project.employee where password='$password' and userName='$username'";
	
         $result = mysqli_query($connection,$query);
		 
		 while($row=mysqli_fetch_assoc($result)){
              
		 echo $row["FirstName"],$row["LastName"];;
		 }
	}
	?>

	<form action="Emp_log_in.php" method="post">
	  <div style="font-size:1.5em; font-weight:400;color:white">
        
		<label for="username">UserName</label><br>
		<input type="text" name="username" size="35">
		<?php if(isset($emailerorrr)){echo $emailerorrr;}?><br><br>
		<label for="password">password</label><br>
		<input type="password" name="password" size="35">
		<?php if(isset($passerorrr)){echo $passerorrr;}?><br><br>
		<input type="submit" name="submit" value="Sign in" style="background-color: #4CAF50;
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

	</form>
	
	

</body>
</html>