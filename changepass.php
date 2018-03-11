<?php
session_start();
include('db.php');

if(isset($_POST["resetpass"]))
	{
			$newpass     = $_POST["newpass"];
			$currentpass = $_POST["currentpass"];
			$user_email    = $_POST["email"];
			
			if(strcmp($newpass, $currentpass) == 0)
			{
				$newpass     = md5($_POST["newpass"]);
				$sql = "UPDATE user_info SET password='$newpass' where email='$user_email' ";
				$run_query = mysqli_query($con,$sql);
				while($run_query)
				{
					echo "
					<div class='alert alert-success'>
		       <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><b>Update Successful..!</b>
		       </div>
					";
				}
			}
			else{
				echo "
					<div class='alert alert-danger'>
		       <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><b>Password is not matching..!</b>
		       </div>
					";
			}
	}
?>