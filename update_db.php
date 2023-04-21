<!DOCTYPE html>
<?php
	require_once('functions.php');
	
	/* Get attributes */
	$con = mysqli_connect("localhost", "root", "", "nottingham_forest");
	$pid = $_GET['pid'];
	$mode = $_GET['mode'];
	$product_name = $_GET['product_name'];
	$price = $_GET['price'];
	$category_id = $_GET['category_id'];
	$image_url = $_GET['image_url'];
	$description = $_GET['description'];
	$traits = $_GET['traits'];
	$traits = explode("\n", $traits);

	/* Delete product */
	if($mode == "del") {
		$query = "SELECT * FROM order_items WHERE order_items.product_id = $pid;";
		$results = mysqli_query($con, $query);
		$order_items = mysqli_fetch_array($results);
		
		if(!is_null($order_items)) AlertNRedirect("Cannot delete product. - Related order exists.");
		else {
			$query = "DELETE FROM products WHERE products.product_id = $pid";
			$results = mysqli_query($con, $query);
			if($results) AlertNRedirect("Sussesfully deleted product.");
			else AlertNRedirect("Deletion failed.");
		}
	/* Add or update product */
	} else if($mode == "update") {
		$traits_array = mysqli_query($con, "SELECT * FROM product_traits;");
		
		/* Make traits dictionary */
		$traits_dic = array();
		while($trait = mysqli_fetch_array($traits_array)) $traits_dic[$trait[1]] = $trait[0];
		
		/* Convert trait names to id */
		$trait_count = count($traits);
		$traits_values = array();
		for($i = 0; $i < $trait_count; $i++) {
			$temp = explode(":", $traits[$i]);
			if(substr($temp[1], -1) == chr(13)) $temp[1] = substr($temp[1], 0, -1);
			array_push($traits_values, array($traits_dic[$temp[0]], $temp[1]));
		}
		
		/* Insert new product */
		if($pid == 0) {
			$query_0 = "INSERT INTO products (product_name, category_id, description, price, image_url)
			VALUES ('$product_name', $category_id, '$description', $price, '$image_url');";
			$results_0 = mysqli_query($con, $query_0);
			
			$query_1 = "SET @product_id = LAST_INSERT_ID();";
			$results_1 = mysqli_query($con, $query_1);
			
			$query_2 = "INSERT INTO product_trait_values (product_id, trait_id, value)
			VALUES
			";
			for($i = 0; $i < $trait_count; $i++) $query_2 = $query_2 . "(@product_id, " . $traits_values[$i][0] . ", '" . $traits_values[$i][1] . "'), ";
			$query_2 = substr($query_2, 0, -2) . ";";				
			$results_2 = mysqli_query($con, $query_2);
			
			if($results_0 && $results_1 && $results_2) AlertNRedirect("Sussesfully added new product.");
			else AlertNRedirect("Product add failed.");
			
		/* Update product */
		} else { 
			$query_0 = "UPDATE products
			SET product_name = '$product_name', category_id = $category_id, description = '$description', price = $price, image_url = '$image_url'
			WHERE product_id = $pid;";
			$results_0 = mysqli_query($con, $query_0);
			
			$query_1 = "DELETE FROM product_trait_values WHERE product_id = $pid;";
			$results_1 = mysqli_query($con, $query_1);
			
			$query_2 = "INSERT INTO product_trait_values (product_id, trait_id, value)
			VALUES
			";
			for($i = 0; $i < $trait_count; $i++) $query_2 = $query_2 . "($pid, " . $traits_values[$i][0] . ", '" . $traits_values[$i][1] . "'), ";
			$query_2 = substr($query_2, 0, -2) . ";";
			$results_2 = mysqli_query($con, $query_2);
			
			if($results_0 && $results_1 && $results_2) AlertNRedirect("Sussesfully updated product.");
			else AlertNRedirect("Product update failed.");
		}
	}
?>
