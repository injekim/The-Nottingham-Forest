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
		<link href="static/landing.css" rel="stylesheet">
		
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
						<img src="static/images/logo.svg" class="logo__img logo--big__img" alt="Logo">
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
				<?php 
					$con = mysqli_connect("localhost", "root", "", "nottingham_forest");
				?>
				<div class="content-block banner-area">
					<a href="./search.php?category=Trees&Shrubs" class="banner banner--half banner--trees hover hover--opacity-08">
						<h1 class="banner__title">TREES</h1>
					</a>
					<a href="./search.php?category=Herbs&Flowers&Ivy&Cactus" class="banner banner--half banner--plants hover hover--opacity-08">
						<h1 class="banner__title">PLANTS</h1>
					</a>
				</div>
				<h2 class="title--content">Best Sellers</h2>
				<div class="content-block gridview">
					<?php 
						$re1 = mysqli_query($con, "SELECT * FROM products LIMIT 0, 5;");
						while($product = mysqli_fetch_array($re1)) {
							$product_id = $product['product_id'];
							$product_name = $product['product_name'];
							$price = $product['price'];
							$image_url = $product['image_url'];
							
							echo <<< EOT
								<div class="grid-child hover hover--opacity-08">
									<a class="link" href="./product.php?pid=$product_id">
										<div class="grid-child__img" style="background-image: url('$image_url');"></div>
										<div class="grid-child__info">
											<h3 class="grid-child__title">$product_name</h3>
											<p class="grid-child__price">￡ $price</p>
										</div>
									</a>
								</div>
							EOT;
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
					<img src="static/images/logo_grey.svg" class="logo__img logo--footer__img" alt="Logo">
				</a>
			</div>
		</footer>
	</body>
</html>