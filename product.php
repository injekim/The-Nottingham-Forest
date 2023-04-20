<!DOCTYPE html>
<html lang="en-GB">
	<head>
		<title>The Nottingham Forest</title>
		
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		
		<!-- Favicon -->
		<link rel="icon" type="image/x-icon" href="/images/favicon.ico">
		
		<!-- Stylesheets -->
		<link href="images/global.css" rel="stylesheet">
		<link href="images/product.css" rel="stylesheet">
		
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
						$nav_results = mysqli_query($con, "
							SELECT products.product_id, categories.category_name, products.product_name
							FROM products
							JOIN categories ON products.category_id = categories.category_id
							WHERE products.product_id = $pid;
						");
						
						$product = mysqli_fetch_array($nav_results);
						echo "<p class='nav-text'>Home > $product[1] > $product[2]</p>";
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
						$results = mysqli_query($con, "SELECT * FROM products WHERE products.product_id = $pid;");
						$product = mysqli_fetch_array($results);
						$product_name = $product['product_name'];
						$price = $product['price'];
						$image_url = $product['image_url'];
						$description = $product['description'];
						
						echo <<< INFO
							<div class="product-photo" style="background-image: url('$image_url');"></div>
							<div class="product-info">
								<h1 class="product-info__title">$product_name</h1>
								<h3 class="product-info__price">￡ $price</h3>
								<p class="product-info__p">$description</p>
								<div class="product-info__button-area">
									<form>
										<button class="button button--buy hover hover--opacity-08" type="button">Buy Now</button>
										<button class="button button--cart hover hover--opacity-08" type="button">🛒</button>
									</form>
								</div>
							</div>
						INFO;
					?>
				</div>
				<h2 class="title--content">Related Items</h2>
				<div class="content-block gridview">
					<?php
						$query = "SELECT products.product_id, products.product_name, products.price, products.image_url
						FROM products
						INNER JOIN product_trait_values ptv ON products.product_id = ptv.product_id
						INNER JOIN product_trait_values ptv2 ON ptv.trait_id = ptv2.trait_id AND ptv.value = ptv2.value
						WHERE products.product_id <> $pid
						AND ptv2.product_id = $pid
						GROUP BY products.product_id
						ORDER BY COUNT(*) DESC
						LIMIT 5;";
						$results = mysqli_query($con, $query);
						
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
					<div class="grid-child grid-child--dummy-fw"></div>
					<div class="grid-child grid-child--dummy-fw"></div>
					<div class="grid-child grid-child--dummy-fw"></div>
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