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
					<form>
						<h3 class="title--sidebar">Price</h3>
						<div class="sidebar-box sidebar-box--price">
							<input class="price-box" type="text" placeholder="Min">
							<p class="price-box__p">~</p>
							<input class="price-box" type="text" placeholder="Max">
						</div>
						<h3 class="title--sidebar">Type</h3>
						<div class="sidebar-box">
							<label class="sidebar__label">
								<input class="checkbox" type="checkbox" id="type_tree" name="type_tree" value="True">
								<span class="checkbox--bg"></span>
								Tree
							</label>
							<label class="sidebar__label">
								<input class="checkbox" type="checkbox" id="type_plant" name="type_plant" value="True">
								<span class="checkbox--bg"></span>
								Plant
							</label>
						</div>
					</form>
				</div>
				<div class="container container--results">
					<h2 class="title--content">Search Results</h2>
					<div class="content-block gridview">
						<div class="grid-child hover hover--opacity-08">
							<div class="grid-child__img" style="background-image: url('./images/plant_test.png');"></div>
							<div class="grid-child__info">
								<h3 class="grid-child__title">AAAAAAggggg</h3>
								<p class="grid-child__price">￡ 40</p>
							</div>
						</div>
						<div class="grid-child hover hover--opacity-08">
							<div class="grid-child__img"></div>
							<div class="grid-child__info">
								<h3 class="grid-child__title">Test</h3>
								<p class="grid-child__price">￡ 40</p>
							</div>
						</div>
						<div class="grid-child hover hover--opacity-08">
							<div class="grid-child__img"></div>
							<div class="grid-child__info">
								<h3 class="grid-child__title">Test</h3>
								<p class="grid-child__price">￡ 40</p>
							</div>
						</div>
						<div class="grid-child hover hover--opacity-08">
							<div class="grid-child__img"></div>
							<div class="grid-child__info">
								<h3 class="grid-child__title">Treeeee</h3>
								<p class="grid-child__price">￡ 40</p>
							</div>
						</div>
						<div class="grid-child hover hover--opacity-08">
							<div class="grid-child__img"></div>
							<div class="grid-child__info">
								<h3 class="grid-child__title">How long can this goooooooooooo</h3>
								<p class="grid-child__price">￡ 40</p>
							</div>
						</div>
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