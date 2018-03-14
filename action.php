<?php

session_start();

include('db.php');
if(isset($_POST["category"])){
	$category_query = "SELECT * FROM categories";
	$run_query = mysqli_query($con,$category_query);
	
	echo "
		<div class='nav nav-pills nav-stacked'>
						<li class='active'><a href='#'><h4>Categories</h4></a></li>
	";
	
	if(mysqli_num_rows($run_query)>0){
		while($row = mysqli_fetch_array($run_query) )
		{
			$cid = $row["cat_id"];
			$cat_name = $row["cat_title"];
			echo "
					<li><a href='#' class='category' cid='$cid'>$cat_name</a></li>
			";
			
		}
		echo "</div>";
	}
	
}

if(isset($_POST["brand"])){
	$brand_query = "SELECT * FROM brands";
	$run_query = mysqli_query($con,$brand_query);
	
	echo "
		<div class='nav nav-pills nav-stacked'>
						<li class='active'><a href='#'><h4>Brands</h4></a></li>
	";
	
	if(mysqli_num_rows($run_query)>0){
		while($row = mysqli_fetch_array($run_query) )
		{
			$bid = $row["brand_id"];
			$brand_name = $row["brand_title"];
			echo "
					<li><a href='#' class='brand' bid='$bid' >$brand_name</a></li>
			";
			
		}
		echo "</div>";
	}
	
}
	if(isset($_POST["page"])){
		$sql = "SELECT * FROM products";
		$run_query = mysqli_query($con,$sql);
		$count = mysqli_num_rows($run_query);
		$pageno = ceil($count/9);
		for($i=1;$i<=$pageno;$i++){
			echo"	
			<li><a href='#' page='$i' id='page'>$i</a><li>
			";
		}
		
	}
	if(isset($_POST["getproduct"])){
		$limit=9;
		if(isset($_POST["setpage"]))
		{
		  $pageno = $_POST["pageno"];	
		  $start  = ($pageno * $limit)-$limit;
		}
		else
		{
			$start = 0;
		}
		$product_query = "SELECT * FROM products ORDER BY RAND() LIMIT $start,$limit";
		$run_query = mysqli_query($con,$product_query);
		if(mysqli_num_rows($run_query)>0){
			while($row = mysqli_fetch_array($run_query)){
				$product_id = $row["product_id"];
				$product_cat = $row["product_cat"];
				$product_brand = $row["product_brand"];
				$product_title = $row["product_title"];
				$product_price = $row["product_price"];
				$product_image = $row["product_image"];
				
				echo "
				<div class='col-md-4'>
						  <div class='panel panel-info'>
						  <div class='panel-heading'>$product_title</div>
						  <div class='panel-body'>
							<img src='shopping_images/$product_image' style= 'width:200px; height:300px'/>
						  </div>
						  <div class='panel-heading'>$.$product_price.00
						  <button pid='$product_id' style='float:right;' id='product' class='btn btn-danger btn-xs'>AddToCart</button>
						  
						  </div>
						  </div>
						  </div>
				";
			}
		}
		
	}

	if(isset($_POST['getselectedcategory']) || isset($_POST['getselectedbrand']) || isset($_POST['search']) ){
		if(isset($_POST['getselectedcategory'])){
		$cid = $_POST['cat_id'];
		$sql = "SELECT * from products WHERE product_cat = '$cid'";
		}
		elseif(isset($_POST['getselectedbrand']))
		{
			$bid = $_POST['bid_id'];
		$sql = "SELECT * from products WHERE product_brand = '$bid'";
			
		}
		else{
			$keyword = $_POST['keyword'];
		    $sql = "SELECT * from products WHERE product_keywords LIKE '%$keyword%'";
			
		}
		$run_query = mysqli_query($con,$sql);
		
		while($row = mysqli_fetch_array($run_query)){
			
			    $product_id    = $row["product_id"];
				$product_cat   = $row["product_cat"];
				$product_brand = $row["product_brand"];
				$product_title = $row["product_title"];
				$product_price = $row["product_price"];
				$product_image = $row["product_image"];
				
				echo "
				<div class='col-md-4'>
						  <div class='panel panel-info'>
						  <div class='panel-heading'>$product_title</div>
						  <div class='panel-body'>
							<img src='shopping_images/$product_image' style= 'width:200px; height:300px'/>
						  </div>
						  <div class='panel-heading'>$.$product_price.00
						  <button pid='$product_id' style='float:right;' id='product' class='btn btn-danger btn-xs'>AddToCart</button>
						  
						  </div>
						  </div>
						  </div>
				";
		}
		
	}

	if(isset($_POST["addproduct"])){
		
		if(isset($_SESSION["uid"]))
		{
			$p_id = $_POST["productid"];
			$user_id = $_SESSION["uid"];
			$sql="select * from cart where p_id= '$p_id' and user_id= '$user_id'";
			$run_query = mysqli_query($con,$sql);
			$count = mysqli_num_rows($run_query);
			if($count > 0){
				echo "
				<div class='alert alert-danger'>
				   <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><b>Product is already added into the cart Continue Shopping ..!</b>
				   </div>
				";
			}else{
				$sql="select * from products where product_id= '$p_id'";
				$run_query = mysqli_query($con,$sql);
				$row = mysqli_fetch_array($run_query);
				
				
				$pro_name =$row["product_title"];
				$pro_image=$row["product_image"];
				$pro_price=$row["product_price"];
				
				$sql = "INSERT INTO `cart` (`id`, `p_id`, `ip_address`, `user_id`, `product_title`, 
											`product_image`, `qty`, `price`, `total_amount`) 
											VALUES (NULL, '$p_id', '0', '$user_id', '$pro_name', '$pro_image', '1', 
											'$pro_price', '$pro_price')";
			
				if(mysqli_query($con,$sql)){
					echo "
					<div class='alert alert-success'>
				   <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><b>Product is added.....!</b>
				   </div>
					";
				}
			}
		}
		else {
			echo "
			       <div class='alert alert-danger'>
				   <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><b>Sign Up first,
				   then You can add product to cart.....!</b>
				   </div>
			";
		}
		
		
		
	}
	
	if(isset($_POST["get_cart_product"]) || isset($_POST["cart_checkout"]) ){
			$uid = $_SESSION["uid"];
			$sql = "SELECT * FROM cart WHERE  user_id='$uid'";
			$run_query = mysqli_query($con,$sql);
			$count=mysqli_num_rows($run_query);
			if($count>0)
			{
				$no = 1;
				$total_amt = 0;
				while($row=mysqli_fetch_array($run_query)){
					$id = $row["id"];
					$pro_id = $row["p_id"];
					$pro_name = $row["product_title"];
					$pro_image = $row["product_image"];
					$pro_price = $row["price"];
					$qty=$row["qty"];
					$total=$row["total_amount"];
					
					$price_array = array($total);
					$total_sum = array_sum($price_array);
					$total_amt = $total_amt + $total_sum;
					
					setcookie("ta",$total_amt,strtotime("+1 day"),"/","","",TRUE);
					
					if(isset($_POST["get_cart_product"])){
						
						echo"
						<div class='row'>
									    <div class='col-md-3'>$no</div>
										<div class='col-md-3'><img src='shopping_images/$pro_image' width='60px' height='50px'></div>
										<div class='col-md-3'>$pro_name</div>
										<div class='col-md-3'>$ $pro_price</div>
									</div>
					";
					$no=$no+1;
					
					}
					elseif(isset($_POST["cart_checkout"]))
					{
						echo "
						<div class='row'>
						<div class='col-md-2'>
						<div class='btn-group'>
						   <a href='#' remove_id='$pro_id'  class='btn btn-danger remove'><span class='glyphicon glyphicon-trash'></span></a>
						   <a href='#' update_id='$pro_id' class='btn btn-primary update'><span class='glyphicon glyphicon-ok-sign'></span></a>
						</div>
						</div>
						<div class='col-md-2'><img src='shopping_images/$pro_image' width='60px' height='50px'></div>
						<div class='col-md-2'>$pro_name</div>
						<div class='col-md-2'><input type='text' class='form-control qty'   pid='$pro_id' id='qty-$pro_id'   value='$qty' ></div>
						<div class='col-md-2'><input type='text' class='form-control price' pid='$pro_id' id='price-$pro_id' value='$pro_price' disabled></div>
						<div class='col-md-2'><input type='text' class='form-control total' pid='$pro_id' id='total-$pro_id' value='$total' disabled></div>
					  </div>
						";
					}
					
				}
				if(isset($_POST["cart_checkout"])){
					echo"
					<div class='row'>
						<div class='col-md-10'></div>
						<dib class='col-md-2'>
							<b>Total :: $total_amt</b>
						</div>
					";
					
				}
				 if(isset($_POST["cart_checkout"]))
				 {
				echo '
				<form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post">
					  <input type="hidden" name="cmd" value="_cart">
					  <input type="hidden" name="business" value="shoppingcart1234567@mystore.com">
					  <input type="hidden" name="upload" value="1">';
					  
					  $x=0;
					  $sql = "SELECT * FROM cart WHERE user_id ='$uid'";
					  $row_query = mysqli_query($con,$sql);
					  while($row=mysqli_fetch_array($row_query)){
						$x++;
					 echo ' 
					 <input type="hidden" name="item_name_'.$x.'" value="'.$row["product_title"].'">
					  <input type="hidden" name="item_number_'.$x.'" value="'.$x.'">
					  <input type="hidden" name="amount_'.$x.'" value="'.$row["price"].'">
					  <input type="hidden" name="quantity_'.$x.'" value="'.$row["qty"].'">
					  
					  '
					  
					  ;
						
					 }
					  echo '
					  <input type="hidden" name="return" value="http://auburn-pine.000webhostapp.com/payment_success.php"/>
					  <input type="hidden" name="cancel_return" value="https://auburn-pine.000webhostapp.com/cancel.php"/>
					  <input type="hidden" name="curency_code" value="USD"/>
					  <input type="hidden" name="custom" value="'.$uid.'" />
					  
					  
					  <input style="float:right; margin-right:100px;" type="image" name="submit"
						src="https://www.paypalobjects.com/en_US/i/btn/btn_buynow_LG.gif"
						alt="PayPal - The safer, easier way to pay online">
					</form>
				';
				}
			}
			
		}
	
	
	if(isset($_POST["cart_count"]) AND isset($_SESSION["uid"]))
	{
		$uid = $_SESSION["uid"];
		$sql = "SELECT * FROM cart WHERE  user_id='$uid'";
		$run_query = mysqli_query($con,$sql);
		$count = mysqli_num_rows($run_query);
		echo "$count";
	}
	
	
	if(isset($_POST["removeid"])){
		$p_id 	 = $_POST["productid"];
		$user_id = $_SESSION["uid"];
		
		$sql     = "DELETE FROM cart where p_id='$p_id' AND user_id='$user_id'";
		$run_sql = mysqli_query($con,$sql);
		if($run_sql)
		{
			echo "
			<div class='alert alert-danger'>
		       <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><b>Product is deleted..!</b>
		       </div>
			";
		}
		
	}
	
	if(isset($_POST["updateid"])){
		$p_id 	 = $_POST["productid"];
		$user_id = $_SESSION["uid"];
		$qty     = $_POST["qty"];
	    $price   = $_POST["price"];
	    $total   = $_POST["total"];		
		
		$sql     = "Update cart set qty='$qty',price='$price', total_amount='$total' where p_id='$p_id' AND user_id='$user_id'";
		$run_sql = mysqli_query($con,$sql);
		if($run_sql)
		{
			echo "
			<div class='alert alert-success'>
		       <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><b>Update Successful..!</b>
		       </div>
			";
		}
		
	}

	if(isset($_POST["resetpass"]))
	{
			$newpass     = $_POST["newpass"];
			$currentpass = $_POST["currentpass"];
			$user_id     = $_SESSION["uid"];
			
			if($newpass != "" && $currentpass != "")
			{
				if( $newpass == $currentpass )
				{
					if(strlen($newpass)<5)
					{
						echo "
						<div class='alert alert-danger'>
		       <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><b>Passwords must be atleast 6 characters..!</b>
		       </div>
						";
					}
					else{
						$currentpass     = md5($_POST["currentpass"]);
						$sql = "UPDATE user_info SET password='$currentpass' where user_id='$user_id' ";
						$run_query = mysqli_query($con,$sql);
						while($run_query)
						{
							echo "
							<div class='alert alert-success'>
						   <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><b>Update Successful..!</b>
						   </div> 
							
							";
							exit();
						}
					}
				}
				
				else if($newpass != $currentpass){
					echo "
						<div class='alert alert-danger'>
		       <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><b>Passwords are not Matching..!</b>
		       </div>
						";
						
				}
			}
			else{
				echo "
				<div class='alert alert-warning'>
		       <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><b>Please fill the data.!</b>
		       </div>
				";
			}
	}
	
	if(isset($_POST["rp"]))
	{
			$newpass     = $_POST["newpass"];
			$currentpass = $_POST["currentpass"];
			$user_email    = $_POST["email"];
			
			if($newpass != "" && $currentpass != "" && $user_email !="")
			{
				if( $newpass == $currentpass )
				{
					if(strlen($newpass)<5)
					{
						echo "
						<div class='alert alert-danger'>
		       <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><b>Passwords must be atleast 6 characters..!</b>
		       </div>
						";
					}
					else{
						$currentpass     = md5($_POST["currentpass"]);
						$sql = "UPDATE user_info SET password='$currentpass' where email='$user_email'";
						$run_query = mysqli_query($con,$sql);
						while($run_query)
						{
							echo "
							<div class='alert alert-success'>
						   <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><b>Update Successful..!</b>
						   </div> 
							
							";
							exit();
						}
					}
				}
				
				else if($newpass != $currentpass){
					echo "
						<div class='alert alert-danger'>
		       <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><b>Passwords are not Matching..!</b>
		       </div>
						";
						
				}
			}
			else{
				echo "
				<div class='alert alert-warning'>
		       <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><b>Please fill the data.!</b>
		       </div>
				";
			}
	}
	
?>
