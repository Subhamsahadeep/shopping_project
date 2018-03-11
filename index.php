<?php
session_start();
if(isset($_SESSION["uid"])){
	header("location:profile.php");
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
				  <li style="width:300px;left:10px;top:10px;"><input type="text" class="form-control" id="search"></li>
				  <li style="top:10px;left:20px;"><button class="btn btn-primary" id="search_btn">Search</button></li>
				  
				  </ul>
				  
				  <ul class="nav navbar-nav navbar-right">
				  <li><a href="#" class="dropdown-toggle" data-toggle="dropdown" ><span class="glyphicon glyphicon-shopping-cart"></span>Cart<span class="badge">0</span></a>
						<div class = "dropdown-menu" style="width:400px">
							<div class="panel panel-success">
								<div class="panel panel-heading">
									<div class="row">
									    <div class="col-md-3">Sl.No</div>
										<div class="col-md-3">Productimage</div>
										<div class="col-md-3">Product Name</div>
										<div class="col-md-3">Price in $.</div>
									</div>
								</div>
								<div class="panel panel-body"></div>
								<div class="panel panel-footer"></div>
							</div>
						</div>
				  </li>
				  <li><a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-user"></span>SignIn</a>
				       <ul class="dropdown-menu">
							<div style="width:300px;">
								<div class="panel panel-primary">
									<div class="panel-heading">Login</div>
									<div class="panel-heading">
										<label for="email"> Email </label>
										<input type="email" class="form-control" id="email" required />
										<label for="email"> Password </label>
										<input type="password" class="form-control" id="password" required />
										<p><br/><p>
										<a href="indexchangepass.php" style="color:white; list-style:none;">Forgotten Password</a><input type="submit" class="btn btn-success" style="float:right;" id="login" value="Login">
									</div>
									<div class="footer" id="e_msg"></div>
								</div>
							</div>
					   </ul>
					</li>   
				  <li><a href="customer_registration.php"><span class="glyphicon glyphicon-user"></span>SignUp</a></li>
				 
				  </ul>
				 
			</div>	
		</div>

		<p><br/><p>
		<p><br/><p>
		<p><br/><p>
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-1"></div>
				<div class="col-md-2">
					<div id="getcat">
					</div>
					<!-- <div class="nav nav-pills nav-stacked">
						<li class="active"><a href="#"><h4>Categories</h4></a></li>
						<li><a href="#">Categories</a></li>
						<li><a href="#">Categories</a></li>
						<li><a href="#">Categories</a></li>
						<li><a href="#">Categories</a></li>
						
					</div> -->
					
					<div id="getbrand">
					</div>
					
				     <!-- <div class="nav nav-pills nav-stacked">
						<li class="active"><a href="#"><h4>Brand</h4></a></li>
						<li><a href="#">Categories</a></li>
						<li><a href="#">Categories</a></li>
						<li><a href="#">Categories</a></li>
						<li><a href="#">Categories</a></li>
						
					</div>-->
				</div>
				
				<div class = "col-md-8">
				 <div class="panel panel-info">
					<div class="panel-heading">Products</div>
					<div class="panel-body">
						<div id="getproduct">
						</div>
					    <!--<div class="col-md-4">
						  <div class="panel panel-info">
						  <div class="panel-heading">Samsung Galaxy</div>
						  <div class="panel-body">
							<img class="col-md-12"  src="shopping_images/image1.jpg"/>
						  </div>
						  <div class="panel-heading">$.500.00
						  <button style="float:right;" class="btn btn-danger btn-xs">AddToCart</button>
						  
						  </div>
						  </div>
						  </div>-->
					</div>	
					<div class="panel-footer">&copy; 2018</div>
				</div>
				</div>
				<div class= "col-md-1"></div>
				
			</div>
		</div>
</body>
</html>