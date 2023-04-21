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
		<link href="images/landing.css" rel="stylesheet">
		
		<!-- php -->
		<?php require_once('functions.php'); ?>
		
		<!-- Fonts -->
		<link rel="preconnect" href="https://fonts.googleapis.com">
		<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
		<link href="https://fonts.googleapis.com/css2?family=Finlandica:wght@400;500;600;700&display=swap" rel="stylesheet">
	</head>
	<body>
		<div class="min-100vh">
			<header class="header header--big">
				<div class="container container--header">
					<a href="./index.php" class="logo logo--big hover hover--opacity-08">
						<img src="images/logo.svg" class="logo__img logo--big__img" alt="Logo">
					</a>
				</div>
			</header>
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
				<div class="content-block banner-area">
					<a href="./search.php?category%5B%5D=1&category%5B%5D=5" class="banner banner--half banner--trees hover hover--opacity-08">
						<h1 class="banner__title">TREES</h1>
					</a>
					<a href="./search.php?category%5B%5D=2&category%5B%5D=3&category%5B%5D=4&category%5B%5D=6" class="banner banner--half banner--plants hover hover--opacity-08">
						<h1 class="banner__title">PLANTS</h1>
					</a>
				</div>
				<h2 class="title--content">Best Sellers</h2>
				<div class="content-block gridview">
					<?php
						$con = mysqli_connect("localhost", "root", "", "nottingham_forest");
						$query = "SELECT products.product_id, products.product_name, products.price, products.image_url, SUM(order_items.quantity) as total_sales
						FROM order_items
						JOIN products ON order_items.product_id = products.product_id
						GROUP BY products.product_id
						ORDER BY total_sales DESC
						LIMIT 5;";
						$results = mysqli_query($con, $query);
												
						while($product = mysqli_fetch_array($results)) {
							$product_id = $product['product_id'];
							$product_name = $product['product_name'];
							$price = $product['price'];
							$image_url = $product['image_url'];
							
							EchoGridChild($product_id, $product_name, $price, $image_url);
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