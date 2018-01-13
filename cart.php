<?php
session_start();
if(isset($_GET['id'])){
	header("location:homepage.php#section1");
}

	

$title="Shopper";
include_once('DB_class.php');
$db=new database();
$result=$db->getAllProducts();
$latest_products= $db->getLatestProducts();
if(isset($_POST["add_to_cart"])){
    if(isset($_SESSION['shopping_cart'])){
        $item_array_id = array_column($_SESSION["shopping_cart"], "product_id");  
        if(!in_array($_GET["id"], $item_array_id))  
        {  
             $count = count($_SESSION["shopping_cart"]);  
             $item_array = array(  
                  'product_id'               =>     $_GET["id"],  
                  'product_name'               =>     $_POST["hidden_name"],  
                  'product_price'          =>     $_POST["hidden_price"],  
                  'product_stock'          =>     $_POST["quantity"],  
                  'product_img'          =>     $_POST["hidden_img"]  
             );  
             $_SESSION["shopping_cart"][$count] = $item_array;  
        } 
        else  
        {  
             echo '<script>alert("Item Already Added")</script>';  
             echo '<script>window.location="cart.php"</script>';  
        }  
    }
    else{
        $item_array= array(
            'product_id'=> $_GET['id'],
            'product_name'=> $_POST['hidden_name'],
            'product_price'=> $_POST['hidden_price'],
            'product_stock'=> $_POST['quantity'],
            'product_img'          =>     $_POST["hidden_img"] 

        );
        $_SESSION['shopping_cart'][0]=$item_array;
    }
}
if(isset($_GET["action"]))  
{  
     if($_GET["action"] == "delete")  
     {  
          foreach($_SESSION["shopping_cart"] as $keys => $values)  
          {  
               if($values["product_id"] == $_GET["id"])  
               {  
                    unset($_SESSION["shopping_cart"][$keys]);  
                    echo '<script>alert("Item Removed")</script>';  
                    echo '<script>window.location="cart.php"</script>';  
               }  
          }  
     }  
}  ?>




<?php
include_once('header1.php');
include_once('topBar.php');
include_once('navBar.php');







?>

			<section class="header_text sub">
			<img class="pageBanner" src="themes/images/pageBanner.png" alt="New products" >
				<h4><span>Shopping Cart</span></h4>
			</section>
			<section class="main-content">				
				<div class="row">
					<div class="span9">					
						<h4 class="title"><span class="text"><strong>Your</strong> Cart</span></h4>
						<table class="table table-striped">
							<thead>
								<tr>
									<th>Item Image</th>
									<th>Item Name</th>
									<th>Quantity</th>
									<th>Price</th>
									<th>Total</th>
									<th>ActionUnit Price</th>
									
								</tr>
							</thead>
							<?php   
          if(!empty($_SESSION["shopping_cart"]))  
          {  
               $total = 0;  
               foreach($_SESSION["shopping_cart"] as $keys => $values)  
               {  
          ?> 
							<tbody>
								<tr>
									
									<td><a href="product_detail.php"><img alt="" height="42" width="42" src="<?php echo $values["product_img"]; ?>"></a></td>
									<td><?php echo $values["product_name"]; ?></td>
									<td><input type="text" placeholder="<?php echo $values["product_stock"]; ?>" class="input-mini"></td>
									<td>$ <?php echo $values["product_price"]; ?></td>
									<td>$ <?php echo number_format($values["product_stock"] * $values["product_price"], 2); ?></td>
									<td><a href="cart.php?action=delete&id=<?php echo $values["product_id"]; ?>"><span class="text-danger">Remove</span></a></td>
								</tr>			  
								
								<?php  
                    $total = $total + ($values["product_stock"] * $values["product_price"]);  
               }  
          ?>  
								<tr>
									<td>&nbsp;</td>
									<td>&nbsp;</td>
									<td>&nbsp;</td>
									<td>&nbsp;</td>
									<td><strong>$ <?php echo number_format($total, 2); ?></strong></td>
									<td>&nbsp;</td>
									
								</tr>	
								<?php  
          }  
          ?> 	  
							</tbody>
						</table>
						<h4>What would you like to do next?</h4>
						<p>Choose if you have a discount code or reward points you want to use or would like to estimate your delivery cost.</p>
						<label class="radio">
							<input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked="">
							Use Coupon Code
						</label>
						<label class="radio">
							<input type="radio" name="optionsRadios" id="optionsRadios2" value="option2">
							Estimate Shipping &amp; Taxes
						</label>
					
						<p class="buttons center">				
							<button class="btn" type="button">Update</button>
							<button class="btn" type="button">Continue</button>
							<button class="btn btn-inverse" type="submit" id="checkout">Checkout</button>
						</p>					
					</div>
					
				</div>
			</section>			
			
			
			
			<script src="themes/js/common.js"></script>
		<script>
			$(document).ready(function() {
				$('#checkout').click(function (e) {
					document.location.href = "checkout.php";
				})
			});
		</script>

<?php



include_once('footer1.php');


?>