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
				  <li style="width:300px;left:10px;top:10px;"><input type="text" class="form-control" id="search"></li>
				  <li style="top:10px;left:20px;"><button class="btn btn-primary" id="search_btn">Search</button></li>
				  
				  </ul>
				  
				  <ul class="nav navbar-nav navbar-right">
				  <li><a href="#" id="cart_container" class="dropdown-toggle" data-toggle="dropdown" ><span class="glyphicon glyphicon-shopping-cart"></span>Cart<span class="badge">0</span></a>
						<div class = "dropdown-menu" style="width:400px">
							<div class="panel panel-success">
								<div class="panel panel-heading">
									<div class="row">
									    <div class="col-md-3">Sl.No</div>
										<div class="col-md-3">Product Image</div>
										<div class="col-md-3">Product Name</div>
										<div class="col-md-3">Price in $.</div>
									</div>
								</div>
								<div class="panel panel-body">
								<div id="cart_product">
								
								</div>
								</div>
								<div class="panel panel-footer"></div>
							</div>
						</div>
				  </li>
				  <li><a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-user"></span><?php echo "Hi,".$_SESSION["name"]; ?></a>
				       <ul class="dropdown-menu">
							<li><a href="cart.php" style="text-decoration:none; color:blue;"><span class="glyphicon glyphicon-shopping-cart"></span>Cart</a></li>
							<li class="divider"></li>
							<li><a href="changePassword.php" style="text-decoration:none; color:blue;">Change Password</a></li>
							<li class="divider"></li>
							<li><a href="logout.php" style="text-decoration:none; color:blue;">LogOut</a></li>
					   </ul>
					</li>   
			
				 
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
				  <div class="row">
				    <div class="col-md-12" id="product_msg"></div>
				  </div>
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
			<div class="row">
			<div class="col-md-12">
				<center>
				   <ul class="pagination" id="pageno">
						
					
				   </ul>
				</center>
			</div>
			</div>
		</div>
</body>
</html>