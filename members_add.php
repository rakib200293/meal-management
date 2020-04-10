<?php include_once('inc/connection.php'); ?>
   
<?php
   
   if(isset($_POST['submit'])){
	   $name = $_POST['name'];
	   $uname = $_POST['uname'];
	   $email = $_POST['email'];
	   $pass = $_POST['password'];
	   
	 
	   $sql = "INSERT INTO members VALUES(NULL,'$name','$uname','$email','$pass')";
		 if(mysqli_query($conn,$sql)){
			echo "Successfully Inserted";
		 }else{
			 echo "Not inserted";
		 }
   }
   ?>
   






