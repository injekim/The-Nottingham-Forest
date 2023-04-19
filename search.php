<!DOCTYPE html>
<html lang="en-GB">
	<head>
		<title>The Nottingham Forest</title>
		
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		
		<!-- Favicon -->
		<link rel="icon" type="image/x-icon" href="/images/favicon.ico">
		
		<!-- Stylesheets -->
		<link href="static/global.css" rel="stylesheet">
		<link href="static/search.css" rel="stylesheet">
		
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
			?>
			<header class="header header--big">
				<div class="container container--header">
					<a href="./index.php" class="logo logo--big hover hover--opacity-08">
						<img src="static/images/logo.svg" class="logo__img logo--big__img" alt="Logo">
					</a>
				</div>
			</header>
			<div class="container container--search">
				<form action="./search.php" method="get">
					<?php
						$con = mysqli_connect("localhost", "root", "", "nottingham_forest");
						$search = $_GET['search'];
						echo <<< EOT
							<input
								type="text"
								name="search"
								class="search-bar"
								value="$search"
								placeholder="🍃 DON’T LEAF WITHOUT WHAT YOU’RE LOOKING FOR!"
							>
						EOT;
					?>
				</form>
			</div>
			<div class="container container--main">
				<div class="container container--sidebar">
					<form action="./search.php" method="get">
						<?php
							$sidebar_query_1 = '';
							$sidebar_query_2 = '';
							echo <<< EOT
								<input
									type="text"
									name="search"
									style="display: none;"
									value="$search"
								>
							EOT;
						?>
						<h3 class="title--sidebar">Price</h3>
						<div class="sidebar-box sidebar-box--price">
							<?php
								$min = $_GET['min'];
								$max = $_GET['max'];
								$price_query = '';
								
								if(strlen($min) > 0) {
									$price_query = $price_query . 'AND products.price >= ' . $min . ' ';
								}
								if(strlen($max) > 0) {
									$price_query = $price_query . 'AND products.price <= ' . $max . ' ';
								}
								if(strlen($min) + strlen($max) > 0) {
									$sidebar_query_1 = $sidebar_query_1 . 'AND (' . substr($price_query, 3) . ')';
								}
								
								echo <<< PRICE
									<input class="price-box" type="text" name="min" placeholder="Min" value="$min">
									<p class="price-box__p">~</p>
									<input class="price-box" type="text" name="max" placeholder="Max" value="$max">
								PRICE;
							?>
						</div>
						<h3 class="title--sidebar">Category</h3>
						<div class="sidebar-box">
							<?php
								$category = $_GET['category'];
								$cat_query = '';
								$categories = mysqli_query($con, "SELECT * FROM categories;");
								while($cat = mysqli_fetch_array($categories)) {
									$category_id = $cat['category_id'];
									$category_name = $cat['category_name'];
									$checked = '';
									if(!is_null($category)) {
										if(in_array($category_id, $category)) {
											$checked = 'checked';
											$cat_query = $cat_query . 'OR categories.category_id = ' . $category_id . ' ';
											echo $cat_query;
										}
									}
									echo <<< CAT
										<label class="sidebar__label">
											<input class="checkbox" type="checkbox" name="category[]" value="$category_id" $checked>
											<span class="checkbox--bg"></span>
											$category_name
										</label>
									CAT;
								}
								if(strlen($cat_query) > 0) {
									$sidebar_query_1 = $sidebar_query_1 . 'AND (' . substr($cat_query, 2) . ')';
								}
							?>
						</div>
						<?php
							$traits = mysqli_query($con, "SELECT * FROM product_traits;");
							while($trait = mysqli_fetch_array($traits)) {
								$trait_id = $trait['trait_id'];
								$trait_name = $trait['trait_name'];
								
								$trait_values = $_GET[$trait_id];
								$trait_query = '';
								
								$query = "SELECT product_trait_values.value, COUNT(product_trait_values.value)
									FROM product_trait_values
									WHERE product_trait_values.trait_id = $trait_id
									GROUP BY product_trait_values.value;";
								$values = mysqli_query($con, $query);
								echo <<< TRAIT
									<h3 class="title--sidebar">$trait_name</h3>
									<div class="sidebar-box">
								TRAIT;
								while($trait = mysqli_fetch_array($values)) {
									$value = $trait['value'];
									$name = $trait_id . '[]';
									$checked = '';
									if(!is_null($trait_values)) {
										if(in_array($value, $trait_values)) {
											$checked = 'checked';
											$trait_query = $trait_query . 'OR traits LIKE "%' . $trait_id . ':' . $value . '%" ';
											echo $trait_query;
										}
									}

									echo <<< VALUE
										<label class="sidebar__label">
											<input class="checkbox" type="checkbox" name="$name" value="$value" $checked>
											<span class="checkbox--bg"></span>
											$value
										</label>
									VALUE;
								}
								if(strlen($trait_query) > 0) {
									$sidebar_query_2 = $sidebar_query_2 . 'AND (' . substr($trait_query, 2) . ')';
									echo $sidebar_query_2;
								}
								echo "</div>";
							}
						?>
						<button class="button button--submit hover hover--opacity-08" type="submit">Submit</button>
					</form>
				</div>
				<div class="container container--results">
					<?php
						$search_query = "SELECT products.product_id, products.product_name, products.price, products.image_url, GROUP_CONCAT(product_traits.trait_id, ':', product_trait_values.value SEPARATOR ', ') AS traits
						FROM products
						JOIN product_trait_values ON products.product_id = product_trait_values.product_id
						JOIN product_traits ON product_trait_values.trait_id = product_traits.trait_id
						JOIN categories ON products.category_id = categories.category_id
						WHERE (
							products.product_name LIKE '%$search%'
							OR products.description LIKE '%$search%'
							OR categories.category_name LIKE '%$search%'
							OR product_trait_values.value LIKE '%$search%'
						)";
						$group_by = "GROUP BY products.product_id";
						
						// echo $search_query . $sidebar_query_1 . $group_by . ' HAVING' . substr($sidebar_query_2, 3) . ';';
						$having = '';
						if(strlen($sidebar_query_2) > 0) $having = ' HAVING';
						$results = mysqli_query($con, $search_query . $sidebar_query_1 . $group_by . $having . substr($sidebar_query_2, 3) . ';');
					?>
					<h2 class="title--content">Search Results</h2>
					<div class="content-block gridview">
						<?php
							while($product = mysqli_fetch_array($results)) {
								$product_id = $product['product_id'];
								$product_name = $product['product_name'];
								$price = $product['price'];
								$image_url = $product['image_url'];
								
								echo <<< PRODUCT
									<div class="grid-child hover hover--opacity-08">
										<a class="link" href="./product.php?pid=$product_id">
											<div class="grid-child__img" style="background-image: url('$image_url');"></div>
											<div class="grid-child__info">
												<h3 class="grid-child__title">$product_name</h3>
												<p class="grid-child__price">￡ $price</p>
											</div>
										</a>
									</div>
								PRODUCT;
							}
						?>
						<!-- Dummies to help with formatting -->
						<div class="grid-child grid-child--dummy"></div>
						<div class="grid-child grid-child--dummy"></div>
						<div class="grid-child grid-child--dummy"></div>
					</div>
				</div>
			</div>
		</div>
		<footer class="footer">
			<div class="container container--footer">
				<a href="./index.php" class="logo logo--footer hover hover--opacity-08">
					<img src="static/images/logo_grey.svg" class="logo__img logo--footer__img" alt="Logo">
				</a>
			</div>
		</footer>
	</body>
</html>