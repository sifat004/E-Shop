<?php
include_once("header1.php");
$ID= $_GET['ID'];
include_once("DB_class.php");


$db=new database();
$result=$db->getProductsDetails($ID);
echo $ID;

?>
    <body>
			
		<div id="top-bar" class="container">
			<div class="row">
				<div class="span4">
					<form method="POST" class="search_form">
						<input type="text" class="input-block-level search-query" Placeholder="eg. T-sirt">
					</form>
				</div>
				<div class="span8">
					<div class="account pull-right">
						<ul class="user-menu">				
							<li><a href="#">My Account</a></li>
							<li><a href="cart.html">Your Cart</a></li>
							<li><a href="checkout.html">Checkout</a></li>					
							<li><a href="register.html">Login</a></li>		
						</ul>
					</div>
				</div>
			</div>
		</div>
		<div id="wrapper" class="container">
			<section class="navbar main-menu">
				<div class="navbar-inner main-menu">				
					<a href="index.html" class="logo pull-left"><img src="themes/images/logo.png" class="site_logo" alt=""></a>
					<nav id="menu" class="pull-right">
						<ul>
							<li><a href="./products.html">Woman</a>					
								<ul>
									<li><a href="./products.html">Lacinia nibh</a></li>									
									<li><a href="./products.html">Eget molestie</a></li>
									<li><a href="./products.html">Varius purus</a></li>									
								</ul>
							</li>															
							<li><a href="./products.html">Man</a></li>			
							<li><a href="./products.html">Sport</a>
								<ul>									
									<li><a href="./products.html">Gifts and Tech</a></li>
									<li><a href="./products.html">Ties and Hats</a></li>
									<li><a href="./products.html">Cold Weather</a></li>
								</ul>
							</li>							
							<li><a href="./products.html">Hangbag</a></li>
							<li><a href="./products.html">Best Seller</a></li>
							<li><a href="./products.html">Top Seller</a></li>
						</ul>
					</nav>
				</div>
			</section>
			<section class="header_text sub">
			<img class="pageBanner" src="themes/images/pageBanner.png" alt="New products" >
				<h4><span>Product Detail</span></h4>
			</section>
			<section class="main-content">				
				<div class="row">						
					<div class="span9">
						<div class="row">
							<div class="span4">
								
								<a href="themes/images/ladies/3.jpg" class="thumbnail" data-fancybox-group="group1" title="Description 1"><img alt="" src="<?php echo $result['img_link']?>"></a>												
								
							</div>
							<div class="span5">
								<?php
								
								
									
									echo "<address>
									<strong>Brand:</strong> <span>".$result['brand']."</span><br>
									<strong>Product Code:</strong> <span>".$result['product_code']."</span><br>
									<strong>Availability:</strong> <span>".$result['Stock']."</span><br>								
								</address>
								<h4><strong>Price:".$result['Price']."</strong></h4>";
								
								?>
																
								
							</div>
							<div class="span5">
								
									
									
									<label for="item">Amount</label><input min="1" style="width:30px" type="number" name="" id="item" >
									<button onclick="loadDoc()" href="show_products.php"  class="btn btn-inverse" type="submit">Add to cart</button>

								
							</div>	
							<script>
								var item = document.getElementById('item').value;
								var xmlhttp = new XMLHttpRequest();
									function loadDoc() {
									  var xhttp = new XMLHttpRequest();
									 
									  xhttp.open("GET", "show_cart.php?q=", true);
									  xhttp.send();
									
									}
							</script>						
						</div>
						
			</section>			 
<?php
include_once("footer1.php")
?>
			