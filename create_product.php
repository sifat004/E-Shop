<?php 

include_once('header.php'); 
include_once('DB_class.php'); 

if(isset($_POST['P_name'])){
	$db= new database();
	$name= $_POST['P_name'];
	$desc= $_POST['P_desc'];
	$price= $_POST['Price'];
	$stock= $_POST['Stock'];
	$img_link=$_POST['img_link'];
	$category=$_POST['category'];
	$brand=$_POST['brand'];
	$pro_code=$_POST['product_code'];
	
   $db->addProduct($name,$desc,$price,$stock,$img_link,$category,$brand,$pro_code);
	
	
}
?>



<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">

	<table>
		<tbody>
			<tr>
				<td>
					<label for="P_name">Enter The Product Name :</label>
				</td>
				<td>
					<input type="text" id="P_name" name="P_name">
				</td>
			</tr>

			<tr>
				<td>
					<label for="P_desc">Enter The Product Description :</label>
				</td>
				<td>
					<input type="text" id="P_desc" name="P_desc">
				</td>
			</tr>


			<tr>
				<td>
					<label for="Price">Enter The Product Price :</label>
				</td>
				<td>
					<input type="number" id="Price" name="Price">
				</td>
			</tr>


			<tr>
				<td>
					<label for="Stock">Enter The Product Stock :</label>
				</td>
				<td>
					<input type="number" id="Stock" name="Stock">
				</td>
			</tr>
			<tr>
				<td>
					<label for="img_link">Enter The Image Link :</label>
				</td>
				<td>
					<input type="text" id="img_link" name="img_link">
				</td>
			</tr>

			<tr>
				<td>
					<label for="category">Enter The Product category :</label>
				</td>
				<td>
					<input type="text" id="category" name="category">
				</td>
			</tr>

			<tr>
				<td>
					<label for="product_code">Enter product code :</label>
				</td>
				<td>
					<input type="text" id="product_code" name="product_code">
				</td>
			</tr>

			<tr>
				<td>
					<label for="brand">Enter The Product brand :</label>
				</td>
				<td>
					<input type="text" id="brand" name="brand">
				</td>
			</tr>


			<tr colspan="2">
				<input type="submit">
			</tr>


		</tbody>
	</table>

</form>


<?php 
include_once('footer.php'); 

 ?>