<!DOCTYPE html>
<html lang="en-GB">
	<?php
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
		
		// echo $pid;
		// echo $mode;
		// echo $product_name;
		// echo $price;
		// echo $category_id;
		// echo $image_url;
		// echo $description;
		// echo $traits;
		
		if($mode == "del") {
			$query = "SELECT * FROM order_items WHERE order_items.product_id = $pid;";
			$results = mysqli_query($con, $query);
			$order_items = mysqli_fetch_array($results);
			if(!is_null($order_items)) {
				echo '<script type="text/javascript">
					window.onload = function () {
						alert("Cannot delete product. - Related order exists.");
						window.location = "./search.php";
					}
				</script>';
			} else {
				$query = "DELETE FROM products WHERE products.product_id = $pid";
				$results = mysqli_query($con, $query);
				if($results) {
					echo '<script type="text/javascript">
						window.onload = function () {
							alert("Sussesfully deleted product.");
							window.location = "./search.php";
						}
					</script>';
				} else {
					echo '<script type="text/javascript">
						window.onload = function () {
							alert("Deletion failed.");
							window.location = "./search.php";
						}
					</script>';
				}
			}
		} else if($mode == "update") {
			$traits_array = mysqli_query($con, "SELECT * FROM product_traits;");
			
			/* Make traits dictionary */
			$traits_dic = array();
			while($trait = mysqli_fetch_array($traits_array)) {
				$traits_dic[$trait[1]] = $trait[0];
				// echo $traits_dic[$trait[1]];
			}
			
			/* Convert trait names to id */
			$trait_count = count($traits);
			$traits_values = array();
			for($i = 0; $i < $trait_count; $i++) {
				$temp = explode(":", $traits[$i]);
				array_push($traits_values, array($traits_dic[$temp[0]], str_replace('\n', '', $temp[1])));
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
				
				for($i = 0; $i < $trait_count; $i++) {
					$query_2 = $query_2 . "(@product_id, " . $traits_values[$i][0] . ", '" . $traits_values[$i][1] . "'), ";
				}
				$query_2 = substr($query_2, 0, -2) . ";";
				// echo $query_0 . $query_1 . $query_2;

				$results_2 = mysqli_query($con, $query_2);
				if($results_0 && $results_1 && $results_2) {
					echo '<script type="text/javascript">
						window.onload = function () {
							alert("Sussesfully added new product."); 
							window.location = "./search.php";
						}
					</script>';
				} else {
					echo '<script type="text/javascript">
						window.onload = function () {
							alert("Product add failed.");
							window.location = "./search.php";
						}
					</script>';
				}
			} else { /* Update product */
				$query_0 = "UPDATE products
				SET product_name = '$product_name', category_id = $category_id, description = '$description', price = $price, image_url = '$image_url'
				WHERE product_id = $pid;";
				$results_0 = mysqli_query($con, $query_0);
				echo "$query_0";
				
				$query_1 = "DELETE FROM product_trait_values WHERE product_id = $pid;";
				$results_1 = mysqli_query($con, $query_1);
				
				$query_2 = "INSERT INTO product_trait_values (product_id, trait_id, value)
				VALUES
				";
				
				for($i = 0; $i < $trait_count; $i++) {
					$query_2 = $query_2 . "($pid, " . $traits_values[$i][0] . ", '" . $traits_values[$i][1] . "'), ";
				}
				$query_2 = substr($query_2, 0, -2) . ";";
				// echo $query_0 . $query_1 . $query_2;
				
				$results_2 = mysqli_query($con, $query_2);
				if($results_0 && $results_1 && $results_2) {
					echo '<script type="text/javascript">
						window.onload = function () {
							alert("Sussesfully updated product."); 
							window.location = "./search.php";
						}
					</script>';
				} else {
					echo '<script type="text/javascript">
						window.onload = function () {
							alert("Product update failed.");
							window.location = "./search.php";
						}
					</script>';
				}
			}
		}
	?>
</html>