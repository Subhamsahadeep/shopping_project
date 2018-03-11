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
		<style>
		table tr td {padding:10px;}
		</style>
		
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
		
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-2"></div>
				<div class="col-md-8">
					<div class="panel panel-default">
						<div class="panel-heading"></div>
						<div class="panel-body">
								<h1>CUSTOMER ORDER DETAILS</h1>
								<hr/>
								<div class="row">
									<div class="col-md-6">
									  <img style="float:right;" src="shopping_images/camera.jpg" class="img-thumbnail" />
									  </div>
									<div class="col-md-6">
										<table >
											<tr><td>Product Name</td><td><b>Sony Camera</b></td></tr>
											<tr><td>Product Price</td><td><b>$500</b></td></tr>
											<tr><td>Quantity</td><td><b>3</b></td></tr>
											<tr><td>Payment</td><td><b>Completed</b></td></tr>
											<tr><td>Transaction Id</td><td><b>RTdnjfd</b></td></tr>
										</table>										
									</div>
								</div>
						</div>
						<div class="panel-footer"></div>
					</div>
				</div>
				<div class="col-md-2"></div>
			</div>
		</div>
</body>
</html>