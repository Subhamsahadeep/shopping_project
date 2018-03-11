
<?php
session_start();
if(!isset($_SESSION["uid"])){
	header("location:index.php");
}
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset = "UTF-8">
		<title>My Store</title>
		<link rel="stylesheet" href="css/bootstrap.min.css"/>
		
		<script src="js/jquery.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script src="new.js"></script>
		
	</head>
<body>
		<div class="navbar navbar-inverse navbar-fixed-top">
			<div class="container-fluid">
				<div class="navbar-header">
				  <a href="#" class="navbar-brand">My Store</a>
				</div>
				<ul class="nav navbar-nav">
				  <li><a href="#"><span class="glyphicon glyphicon-home"></span>Home</a></li>
				  <li><a href="#"><span class="glyphicon glyphicon-modal-window"></span>Product</a></li>
				</ul>
			</div>
		</div>	
		<p><br/><p>
		<p><br/><p>
		<p><br/><p>
		<form action="window.location.reload()" method="post">
		 <div class="container-fluid">
		  <div class="row">

									<div class="col-md-2"></div>
									<div class = "col-md-8" id="passchangemsg">
									<!--< Password msg is shown here>-->
									</div>
									<div class="col-md-2"></div>
		</div>
		 
		 <div class="row">
			<div class="col-md-2"></div>
			<div class="col-md-8">
			<div class="row">
				<div id="passchangemsg"><!-- Updated Pass is shown here --></div>
			</div>
			
			<div class="panel panel-primary">
			  <div class="panel-heading">Reset Password</div>
			  <div class="panel-body">
							 
			  <form method="post" >
				  <div class="row">
					<div class="col-md-6">
							<label for="password">New Password</label>
							<input type="password" id="new_pass" name="new_pass" class="form-control" autocomplete="off" required>
					</div>
						<div class="col-md-6">
							<label for="password">Current Password</label>
							<input type="password" id="current_pass" name="current_pass" class="form-control" autocomplete="off" required>
						</div>
					</div>
					
					<p><br/></p>
					<div class="row">
						<div class="col-md-12">
							<center><input value="Submit" type="button" id="passbutton" name="passbutton" class="btn btn-success btn-lg">
						</center></div>
					</div>
				  </div>
			  </form>
			  <div class="panel-footer">@2018</div>
			</div>
			</div>
			<div class="col-md-2"></div>
		 </div>
		 </div>
		 </form>
		
</body>
</html>			