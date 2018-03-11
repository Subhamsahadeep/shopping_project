<?php

include "db.php";

$f_name = $_POST["f_name"];
$l_name = $_POST["l_name"];
$email = $_POST["email"];
$password = $_POST["password"];
$repassword = $_POST["repassword"];
$mobile = $_POST["mobile"];
$address1 = $_POST["address1"];
$address2 = $_POST["address2"];
$name = "/^[A-Z][a-zA-Z ]+$/";
$emailvalidation = "/^[_a-z0-9-]+(\.[_a-z0-9-])*@[a-z0-9]+(\.[a-z]{2,4})$/";
$number = "/^[0-9]+$/";

if(($f_name == "") || ($l_name == "") || ($email== "") || ($password== "") || 
   ($repassword== "") || ($mobile== "") || ($address1== "") || ($address2== "") )
   {
	   echo "
	     <div class='alert alert-warning'>
		  <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><b>Please fill all the fields..!</b>
		 </div>
	   ";
	   exit();
   }
   
   else{
		   if(!preg_match($name,$f_name))
		   {
			   echo "
			   <div class='alert alert-warning'>
		       <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><b>First Name :: $f_name is not valid..!</b>
		       </div>
			   ";
			   exit();
		   }
		   if(!preg_match($name,$l_name))
		   {
			   echo "
			   <div class='alert alert-warning'>
		       <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><b>Last Name :: $l_name is not valid..!</b>
		       </div>
			  ";
			   exit();
		   }
			  if(!preg_match($emailvalidation,$email))
		   {
			   
			   echo "
			   <div class='alert alert-warning'>
		       <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><b> Email :: $email is not valid..!</b>
		       </div>
			   ";
			   exit();
		   }
			 
		   if(strlen($password)<5)
		   {
			   echo "
			   <div class='alert alert-warning'>
		       <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><b>Password is weak Atleast 5 characters..!</b>
		       </div>
			   ";
			   exit();
		   }
		   if($password != $repassword){
			   echo "
			   <div class='alert alert-warning'>
		       <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><b>Password is NOT SAME..!</b>
		       </div> 
			   ";
			   exit();
		   }
			if(!preg_match($number,$mobile))
		   {
			   echo "
			   <div class='alert alert-warning'>
		       <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><b>Mobile Number :: $mobile is not valid..!</b>
		       </div> 
			   ";
			   exit();
		   }
		   if(!(strlen($mobile) == 10)){
			   echo "
			    <div class='alert alert-warning'>
		       <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><b>Mobile number should be 10 digit..!</b>
		       </div>
			   ";
				exit();
		   }
		   
		   //existing email in our database;
		    $sql = "SELECT * FROM user_info WHERE email = '$email'";
			$check_query = mysqli_query($con,$sql);
			if(mysqli_num_rows($check_query) > 0)
			{
				echo "
				<div class='alert alert-danger'>
		       <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><b>Email Address is already available , Please try again with another email..!</b>
		       </div>
				";
				exit();
			}
			else{
				$password = md5($password);
				$sql = "INSERT INTO `user_info` (`user_id`, `first_name`, `last_name`, `email`, `password`, `mobile`, `address1`, `address2`)
				VALUES (NULL, '$f_name', '$l_name', '$email', '$password', '$mobile', '$address1', '$address2')";
				$run_sql=mysqli_query($con,$sql);
				if($run_sql)
				{
					echo "
					<div class='alert alert-success'>
		       <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><b>You are Registered Successfully....!</b>
		       </div>
					";
				}
				
			}
   }
?>