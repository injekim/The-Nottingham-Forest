<!DOCTYPE html>
<html lang="en-GB">
	<head>
		<title>The Nottingham Forest</title>
		
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		
		<!-- Favicon -->
		<link rel="icon" type="image/x-icon" href="images/favicon.ico">
		
		<!-- Stylesheets -->
		<link href="images/global.css" rel="stylesheet">
		<link href="images/product.css" rel="stylesheet">
		<link href="images/data_entry.css" rel="stylesheet">
		
		<!-- Fonts -->
		<link rel="preconnect" href="https://fonts.googleapis.com">
		<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
		<link href="https://fonts.googleapis.com/css2?family=Finlandica:wght@400;500;600;700&display=swap" rel="stylesheet">
	</head>
	<body>
		<div class="min-100vh">
			<?php
				$admin = $_GET['admin'];
				if($admin == 'True') {
					echo "<div class='admin-sign'>Admin</div>";
				}
			
				$con = mysqli_connect("localhost", "root", "", "nottingham_forest");
				$pid = $_GET['pid'];
			?>
			<header class="header header--big">
				<div class="container container--header">
					<a href="./index.php" class="logo logo--big hover hover--opacity-08">
						<img src="images/logo.svg" class="logo__img logo--big__img" alt="Logo">
					</a>
				</div>
			</header>
			<div class="navigation">
				<div class="container container--navigation">
					<?php
						if($pid > 0) {
							$nav_results = mysqli_query($con, "
								SELECT products.product_id, categories.category_name, products.product_name
								FROM products
								JOIN categories ON products.category_id = categories.category_id
								WHERE products.product_id = $pid;
							");
							
							$product = mysqli_fetch_array($nav_results);
							echo "<p class='nav-text'>Home > $product[1] > $product[2]</p>";
						} else {
							echo "<p class='nav-text'>🆕 New product</p>";
							$pid = 0;
						}
					?>
				</div>
			</div>
			<div class="container container--search">
				<form action="./search.php" method="get">
					<input
						type="text"
						name="search"
						class="search-bar"
						placeholder="🍃 DON’T LEAF WITHOUT WHAT YOU’RE LOOKING FOR!"
					>
				</form>
			</div>
			<div class="container container--main">
				<div class="container container--product">
					<?php
						$product = '';
						$product_name = '';
						$price = '';
						$image_url = '';
						$description = '';
						$category_id = '1';
						$traits = '';
						
						$data_query = "SELECT products.*, categories.*, GROUP_CONCAT(product_traits.trait_name, ':', product_trait_values.value SEPARATOR '&#10;') AS traits
						
						FROM products
						JOIN product_trait_values ON products.product_id = product_trait_values.product_id
						JOIN product_traits ON product_trait_values.trait_id = product_traits.trait_id
						JOIN categories ON products.category_id = categories.category_id
						WHERE products.product_id = $pid;";
						
						if($pid > 0) {
							$results = mysqli_query($con, $data_query);
							$product = mysqli_fetch_array($results);
							$product_name = $product['product_name'];
							$price = $product['price'];
							$image_url = $product['image_url'];
							$description = $product['description'];
							$category_id = $product['category_id'];
							$traits = $product['traits'];
							echo $traits.str_replace(",", "&#10;", $traits);
						}
						echo <<< PHOTO
							<div class="product-photo" style="background-image: url('$image_url');"></div>
						PHOTO;
					?>
					<div class="product-info product-info--entry">
						<form action="./update_db.php" method="get">
							<?php
								echo "<input type='text' name='pid' value='$pid' style='display: none;'>";
							?>
							<input type="text" name="mode" value="update" style="display: none;">
							<h3 class="title--entry">Title</h3>
							<?php
								echo "<input name='product_name' class='input--entry input--entry__title' type='text' placeholder='Mandrake' value='$product_name'>";
							?>
							
							<h3 class="title--entry">Price</h3>
							<?php
								echo "<input name='price' class='input--entry input--entry__price' type='text' placeholder='00.0' value='$price'>";
							?>
							
							<h3 class="title--entry">Category</h3>
							<select name="category_id" class="input--entry input--entry__select">
								<?php
									$results = mysqli_query($con, "SELECT * FROM categories;");
									
									while($category = mysqli_fetch_array($results)) {
										$cid = $category['category_id'];
										$cname = $category['category_name'];
										
										if($category_id == $cid) echo "<option value='$cid' selected='selected'>$cname</option>";
										else echo "<option value='$cid'>$cname</option>";
									}
								?>
							</select>
							
							<h3 class="title--entry">Image url</h3>
							<?php
								echo "<input name='image_url' class='input--entry input--entry__text' type='text' placeholder='./images/product_photo/mandrake.png' value='$image_url'>";
							?>
							
							<h3 class="title--entry">Description</h3>
							<?php
								echo "<textarea name='description' class='input--entry input--entry__desc' placeholder='A Mandrake, also known as Mandragora, is a plant which has a root that looks like a human. When mature, its cry can be fatal to any person who hears it.'>$description</textarea>";
							?>
							
							<h3 class="title--entry">Traits</h3>
							<?php
							echo "<textarea name='traits' class='input--entry input--entry__desc' placeholder='Growth Rate:Fast&#10;Watering Needs:Regular Water Needs'>$traits</textarea>"
							?>
							
							<div class="product-info__button-area product-info__button-area--entry">
								<?php
									if($pid > 0) {
										echo "<button class='button button--buy hover hover--opacity-08' type='submit'>Update</button>
										<button onclick='deleteConfirm()' class='button button--cart hover hover--opacity-08' type='button'>Delete</button>";
									} else {
										echo "<button class='button button--buy hover hover--opacity-08' type='submit'>Add Product</button>";
									}
								?>
							</div>
						</form>
						<script>
							function deleteConfirm() {
								var parts = window.location.search.substr(1).split("&");
								var $_GET = {};
								for (var i = 0; i < parts.length; i++) {
									var temp = parts[i].split("=");
									$_GET[decodeURIComponent(temp[0])] = decodeURIComponent(temp[1]);
								}
								if($_GET['pid'] > 0) {
									var con = confirm("Are you sure you want to delete this product?");
									if (con == true) {
										document.location = "update_db.php?mode=del&pid=".concat($_GET['pid']);
									}
								} else {
									alert("Product does not exist!");
								}
							}
						</script>
					</div>
				</div>
			</div>
		</div>
		<footer class="footer">
			<div class="container container--footer">
				<a href="./index.php" class="logo logo--footer hover hover--opacity-08">
					<img src="images/logo_grey.svg" class="logo__img logo--footer__img" alt="Logo">
				</a>
			</div>
		</footer>
	</body>
</html>