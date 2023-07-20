<?php

use app\views\form\Form;

?>
<link rel="stylesheet" href="/css/home.css">
<script type="module" src="/js/home.js"></script>

<div class="row h-100">
	<div class="col-lg-7 px-0">
		<section id="hero" class="h-100 bg-primary position-relative text-white z-1 bg-primary-img bg-img">
			<div class="p-3 pt-0 d-flex flex-column justify-content-between h-100">
				<div class="p-5">
					<h1 class="display-3 fw-bolder mb-5 dynamic-text" id="heroTitle">Taste<br>
						The Goodness<br>
						Of Our Carefully
						Crafted Drinks</h1>
					<h2 class="h4 fw-lighter mb-4 dynamic-text" id="heroSubTitle">Explore our special offers</h2>
					<div id="heroCATBtn">
						<?= Form::arrowButton('light', '/menu', 'Our menu') ?>
					</div>
				</div>
				<?php include_once __DIR__ . '/components/full-contact-list.php' ?>
			</div>
		</section>
	</div>
	<div class="col-lg-5 px-0">
		<section class="h-100 bg-light text-primary">
			<div class="h-100">
				<div class="p-5 pb-3 h-100 flex-column d-flex justify-content-between">
					<div class="">
						<h1 class="h2 text-primary">What Everyone Likes</h1>
						<div class="h4 fw-light mb-0">Some of our customer favourites</div>
					</div>

					<div id="product" class="text-center mb-3">
						<div id="productImage" class="mb-2">
							<img src="/images/coffee.png" alt="" class="mx-auto">
						</div>
						<div id="productName" class="h3 font-script text-primary mb-2 dynamic-text">Cappuccino</div>
						<div class="position-relative d-inline-block">
							<div id="productPriceTag" class="position-absolute top-50 translate-middle-y"></div>
							<div id="productPrice" class="d-inline-block font-script h5 mb-0 pb-2 pe-3 ps-4 pt-2 text-light dynamic-text">N6,000</div>
						</div>
					</div>

					<ul class="list-inline mb-2 mx-auto" id="carouselControls">
						<li class="list-inline-item mx-2">
							<button class="btn btn-secondary rounded-circle active" type="button" aria-current="true" aria-label="Page 1"></button>
						</li>

						<li class="list-inline-item mx-2">
							<button class="btn btn-secondary rounded-circle" type="button" aria-label="Page 2"></button>
						</li>

						<li class="list-inline-item mx-2">
							<button class="btn btn-secondary rounded-circle" type="button" aria-label="Page 3"></button>
						</li>
					</ul>
				</div>
			</div>
		</section>
	</div>
</div>