<?php 
include_once('header.php'); 
include_once('DB_class.php'); 
if(isset($_POST['pid'])){
    $pid = $_POST['pid'];
    $db = new database();
    $product_one = $db->getProductById($pid);	
?>
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
	<table>
        <tbody>
            <tr>
                <td>
                    <label for="P_ID">Product ID</label>
                </td>
                <td>
                    <input type="text" disable id="P_ID" name="P_ID" readonly value="<?php echo $product_one['P_ID'];?>"/>
                </td>
            </tr>
			<tr>
				<td>
					<label for="P_name">Enter The Product Name :</label>
				</td>
				<td>
					<input type="text" id="P_name" name="P_name"  value="<?php echo $product_one['P_name'];?>"/>
				</td>
			</tr>

			<tr>
				<td>
					<label for="P_desc">Enter The Product Description :</label>
				</td>
				<td>
					<input type="text" id="P_desc" name="P_desc"  value="<?php echo $product_one['P_desc'];?>"/>
				</td>
			</tr>


			<tr>
				<td>
					<label for="Price">Enter The Product Price :</label>
				</td>
				<td>
					<input type="number" id="Price" name="Price"  value="<?php echo $product_one['Price'];?>"/>
				</td>
			</tr>


			<tr>
				<td>
					<label for="Stock">Enter The Product Stock :</label>
				</td>
				<td>
					<input type="number" id="Stock" name="Stock" value="<?php echo $product_one['Stock'];?>"/>
				</td>
			</tr>

			<tr>
				<td>
					<label for="img_link">Enter The Product Image Link :</label>
				</td>
				<td>
					<input type="text" id="img_link" name="img_link" value="<?php echo $product_one['img_link'];?>"/>
				</td>
			</tr>

			<tr>
				<td>
					<label for="category">Enter The Product category :</label>
				</td>
				<td>
					<input type="text" id="category" name="category" value="<?php echo $product_one['category'];?>"/>
				</td>
			</tr>

			<tr>
				<td>
					<label for="product_code">Enter product code :</label>
				</td>
				<td>
					<input type="text" id="product_code" name="product_code" value="<?php echo $product_one['product_code'];?>"/>
				</td>
			</tr>

			<tr>
				<td>
					<label for="brand">Enter The Product brand :</label>
				</td>
				<td>
					<input type="text" id="brand" name="brand" value="<?php echo $product_one['brand'];?>"/>
				</td>
			</tr>

			<tr colspan="2">
				<input type="submit">
			</tr>


		</tbody>
	</table>

</form>
<?php 
}

if(isset($_POST['P_ID'])){
   
    $pid =$_POST['P_ID'];
	$name = $_POST['P_name'];
	$desc = $_POST['P_desc'];
	$price = $_POST['Price'];
	$stock = $_POST['Stock'];
	$img_link=$_POST['img_link'];
	$category=$_POST['category'];
	$brand=$_POST['brand'];
	$pro_code=$_POST['product_code'];
    $db = new database();
    $msg = $db -> updateProduct($pid,$name,$desc,$price,$stock,$img_link,$category,$brand,$pro_code);
    header ('location: show_products.php?msg='.$msg);
}
include_once('footer.php'); 
?>