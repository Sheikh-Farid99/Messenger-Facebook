<?php
	
	session_start();
	include("connection.php");
	if(!isset($_SESSION['email'])){
	   header("location:../login.php");
    }
	else{
		
		$email = $_SESSION['email'];

		if($_FILES["file"]["name"] != '')
		{
			 $test = explode('.', $_FILES["file"]["name"]);
			 $ext = end($test);
			 $name = rand(100, 9999) . '.' . $ext;

			 $location = '../img/' . $name;  
			 move_uploaded_file($_FILES["file"]["tmp_name"], $location);

			$update_pic = mysqli_query($con," UPDATE test SET pic='$name' WHERE email='$email' ");
			 if($update_pic){
				 echo "yes";
			 }

		}
	}
?>