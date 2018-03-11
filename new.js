$(document).ready(function(){
	cat();
    brand();
	product();
	
	function cat(){
		$.ajax({
			url     : 'action.php',
			method    : 'POST',
			data    : {category:1},
			success : function(data){
				$("#getcat").html(data);			
				}
		})
	}

	
	function brand(){
		$.ajax({
			url     : 'action.php',
			method    : 'POST',
			data    : {brand:1},
			success : function(data){
				$("#getbrand").html(data);			
				}
		})
	}

	function product(){
		$.ajax({
			url     : 'action.php',
			method    : 'POST',
			data    : {getproduct:1},
			success : function(data){
				$("#getproduct").html(data);			
				}
		})
	}
	
	
		$("body").delegate(".category","click",function(event){
			event.preventDefault();
			var cid = $(this).attr('cid');
			$.ajax({
			url     : 'action.php',
			method    : 'POST',
			data    : {getselectedcategory:1, cat_id:cid},
			success : function(data){
				$("#getproduct").html(data);			
				}
				
			})
			
		})
		
		$("body").delegate(".brand","click",function(event){
			event.preventDefault();
			var bid = $(this).attr('bid');
			$.ajax({
			url     : 'action.php',
			method    : 'POST',
			data    : {getselectedbrand:1, bid_id:bid},
			success : function(data){
				$("#getproduct").html(data);			
				}
				
			})
			
		})
		
		$("#search_btn").click(function(){
			
			var keyword= $("#search").val();
			if(keyword != ""){
				$.ajax({
			url     : 'action.php',
			method  : 'POST',
			data    : {search:1,keyword:keyword},
			success : function(data){
				$("#getproduct").html(data);			
				}
				
			})
			}
		})
		$("#signup_button").click(function(event){
			event.preventDefault();
			$.ajax({
			url     : 'register.php',
			method    : 'POST',
			data    : $("form").serialize(),
			success : function(data){
					$("#signup_msg").html(data);
				}
				
			})
			
		})
		
		$("#pass_button").click(function(event){
			event.preventDefault();
			alert("HEY");
			
		})
		
		$("#login").click(function(event){
			event.preventDefault();
			var email = $("#email").val();
			var pass = $("#password").val();
			
			$.ajax({
				url : "login.php",
				method : "POST",
				data : {userLogin : 1,useremail:email,userpassword:pass},
				success : function(data){
					window.location.href = "profile.php";
				}
			})
		})
		cart_count();
		$("body").delegate("#product","click",function(event){
			event.preventDefault();
			var p_id = $(this).attr('pid');
			$.ajax({
				url : "action.php",
				method: "POST",
				data : {addproduct:1,productid:p_id},
				success: function(data){
					$("#product_msg").html(data);
					cart_count();
					cart_container();
				}
				
			})
		})
		
		cart_container();
		function cart_container(){
			$.ajax({
				url : "action.php",
				method: "POST",
				data : {get_cart_product:1},
				success: function(data){
					$("#cart_product").html(data);
				}
				
			})
			
			
		}
		
		function cart_count(){
			$.ajax({
				url : "action.php",
				method: "POST",
				data : {cart_count:1},
				success: function(data){
					$(".badge").html(data);
				}
				
			})
		}
	
		
		cart_checkout();
		function cart_checkout(){
			$.ajax({
				url : "action.php",
				method : "POST",
				data: {cart_checkout:1},
				success: function(data){
					$("#cart_checkout").html(data);
				}
			})
		}
		
		$("body").delegate(".qty","keyup",function(){
			var pid=$(this).attr("pid");
			var qty = $("#qty-"+pid).val();
			var price = $("#price-"+pid).val();
			var total = qty*price;
			$("#total-"+pid).val(total);
		})
		
		$("body").delegate(".remove","click",function(event){
			event.preventDefault();
			var pid=$(this).attr("remove_id");
			$.ajax({
				url:"action.php",
				method:"POST",
				data:{removeid:1,productid:pid},
				success: function(data){
					$("#cartmsg").html(data);
					cart_checkout();
				}
				
			})
		})
		
		$("body").delegate(".update","click",function(event){
			event.preventDefault();
			var pid   = $(this).attr("update_id");
			var qty   = $("#qty-"+pid).val();
			var price = $("#price-"+pid).val();
			var total = $("#total-"+pid).val();
			$.ajax({
				url : "action.php",
				method: "POST",
				data:{updateid:1,productid:pid,qty:qty,price:price,total:total},
				success:function(data){
					$("#cartmsg").html(data);
					cart_checkout();
				}
			})
				
		})
		page();
		function page(){
			$.ajax({
				url : "action.php",
				method : "POST",
				data : {page:1},
				success : function(data){
					$("#pageno").html(data);
				}
			})
		}
		$("body").delegate("#page","click",function(){
			var pn = $(this).attr("page");
			$.ajax({
				url : "action.php",
				method : "POST",
				data : {getproduct:1,setpage:1,pageno:pn},
				success : function(data){
					$("#getproduct").html(data);
				}
			})
		})
		
		$("#passbutton").click(function(event){
			event.preventDefault();
			var newpass= $("#new_pass").val();
			var currentpass= $("#current_pass").val();
			
			
			$.ajax({
				url : "action.php",
				method : "POST",
				data : {resetpass:1,newpass:newpass,currentpass:currentpass},
				success: function(data){
					$("#passchangemsg").html(data);
					
					
				}
			})
		})
		
		$("#pnbtn").click(function(event){
			var newpass=$("#new_pass").val();
			var currentpass=$("#current_pass").val();
			var email=$("#email").val();
			$.ajax({
				url : "action.php",
				method:"POST",
				data  :{rp:1,newpass:newpass,currentpass:currentpass,email:email},
				success:function(data){
					$("#pci").html(data);
				}
			})
		})

		
	})