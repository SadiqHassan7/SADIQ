<?php 
session_start();
?>

<!DOCTYPE html>
<html >
 <head>
        <link rel="stylesheet" type="text/css" href="35Project.css"></head>
		<meta charset="utf-8">
</head>
<header>
    
    <ul class="topnav" id="Topnav">
	             <li style="float:left"><a  href="viewComment.php">View Comment</a></li>
				<li style="float:right"><a  href="logout.php">Log out</a></li>  
    </ul>
	
</header>
<body>

<h1 style="color:red; text-align:center; color:#008b8b;">Post a comment</h1>

    <?php 
	$x=1;
	$comment_content_expres="/([a-zA-Z]? ?[a-zA-Z]+ ?)+/";
	$rexpretion="/^[a-zA-Z]{1,20}$/";
	//$phonexpretion="/^[1-9][1-9][1-9][0-9][0-9][0-9][0-9][0-9][0-9][0-9]$/";
	//$emailxpretion="/^[a-zA-Z\-\\\w\d!#$%&]+@[a-zA-Z\-\d\w#$&!~%]+.[a-zA-Z]{2,3}$/";
	//$passwexpretion="/^[a-zA-Z!@#$%\^\\\.\-=+*\d]{6,10}$/";
	//$AptNumb="/^[0-9]{1,4}$/";
	//$AmountOfRent="/^[0-9]{4,4}$/";
	 

	
	if(isset($_POST['submit'])){
		
		if(!(preg_match($comment_content_expres, $_POST['Comment_content']))){
		$x=0;
		$comment_error="<b style='color:red; font-size:14px;'>Invalid Comment content. Only letters accepted.</b>";
		
	}
	if(!(preg_match($comment_content_expres, $_POST['CommentTitle']))){
		$x=0;
		$Comment_error="<b style='color:red; font-size:14px;'>Invalid Comment Title. Only letters accepted.</b>";
		
	}
		
		
	if(strtotime($_POST['CommentDate'])<strtotime(date("yy/m/d"))){
		$x=0;
		$CommentDate_error="<b style='color:red; font-size:14px;'>Invalid Date.  The date must be greater or equal the current date.  Only Date format accepted.</b>";
		
	}	
		
	if(!(preg_match($rexpretion,$_POST['CommentAuthor']))){
		$x=0;
		$CommentAuthor_erorrr="<b style='color:red; font-size:14px;'>Invalid First Name.  The first name must be less than 20 letters.  Only letters accepted.</b>";
		
	}	

	//var_dump(function_exists('mysqli_connect'));
	
	$connection = mysqli_connect('localhost','root','root123','wrkorder');
	
	if($connection){
		//echo "we are connected <br>";
	}
	else{
		echo "Connection Failed <br>";
	}
	
	$CommentTitle=trim($_POST['CommentTitle']);
	$CommentAuthor=trim($_POST['CommentAuthor']);
	$CommentDate=trim($_POST['CommentDate']);
	$Comment_content=trim($_POST['Comment_content']);
	
	
	 if(isset($_GET['Comment_Id'])){
		 $Residen_ID=$_GET['Comment_Id'];
	$query = "SELECT * FROM wrkorder.worder where Resident_ID = $Residen_ID ";
              $result = mysqli_query($connection,$query);
		      while($row=mysqli_fetch_assoc($result)){
		          $wkorder_ID=$row["wkorder_ID"];
				  
				  
			  }
			  
			  $query = "SELECT * FROM wrkorder.resident where Resident_ID = $Residen_ID ";
              $result = mysqli_query($connection,$query);
		      while($row=mysqli_fetch_assoc($result)){
		          $FirstName=$row["FirstName"];
			  
			  }
			  if($CommentAuthor!=$FirstName&&$CommentAuthor!=""){
				  
				 $CommentAuthor_erorrr="<b style='color:red; font-size:14px;'>Your author's name does not match your first name in the database. Please check it out. Thank you.</b>";
			     $x=0;
			  }
	 }
	
	if($x!=0){
	
	}
	if($x!=0){
	    $query = "INSERT INTO wrkorder.comment (Comment_Title, Comment_Author, Comment_Date, Comment_Content, wkorder_ID) 
       VALUES('$CommentTitle', '$CommentAuthor', '$CommentDate', '$Comment_content', $wkorder_ID )";
         mysqli_query($connection,$query);
		 echo " A new comment was Created by ".$CommentAuthor.".";
	}else{
		$x=1;
	}
	}
	   
?>
	<form action="" method="post">
	  <div style="font-size:1.5em; text-align: center; font-weight:400; color:black">
	<!-----------------------------------------------------------------------------------------------> 
	    <label for="CommentTitle">CommentTitle</label><br>
		<input type="text" name="CommentTitle" size="35"><br>
		<?php if(isset($Comment_error)){echo $Comment_error;}?><br>
	<!----------------------------------------------------------------------------------------------->
		<label for="CommentAuthor">CommentAuthor</label><br>
		<input type="text" name="CommentAuthor" size="35"><br>
		<?php if(isset($CommentAuthor_erorrr)){echo $CommentAuthor_erorrr;}?><br>
	
	 <!----------------------------------------------------------------------------------------------->   
		<label for="CommentDate">CommentDate</label><br>
		<input type="date" name="CommentDate" size="35"><br><br>
		<?php if(isset($CommentDate_error)){echo $CommentDate_error;}?><br>
	<!-----------------------------------------------------------------------------------------------> 
		<label for="Comment_content">Comment Content</label><br>
		<textarea  type="text" rows="8" cols="50" name="Comment_content" >
  
        </textarea><br>
		<?php if(isset($comment_error)){echo $comment_error;}?><br>
	<!-----------------------------------------------------------------------------------------------> 
			<input type="submit" name="submit" value="Submit" style="background-color: #008b8b;
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
	
	
<div class="footer">
  <p>St. Paul</p>
  <p>Address</p>
  <p>Phone #</p>
</div>
</body>
<script>
window.onscroll = function() {myFunction()};

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