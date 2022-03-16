<?php
	require_once("config.php");
?>
	<option value="">Select Product</option>
<?php
	$conn = mysqli_connect(DB_HOST,DB_USER,DB_PASS,DB_NAME);
	if(!empty($_POST["category_id"])) {
		$query ="SELECT * FROM product WHERE category_id = '" . $_POST["category_id"] . "'";
		$results =mysqli_query($conn,$query);
		while ($product = mysqli_fetch_array($results)) { 
		 // var_dump($product)
?>
		
	<option value="<?php echo $product["id"]; ?>"><?php echo $product["product_name"]; ?></option>
<?php
	}
}
?>