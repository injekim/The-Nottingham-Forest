<?php
	function EchoGridChild($product_id, $product_name, $price, $image_url) {
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