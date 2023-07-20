<?php

use app\views\form\Form;

?>

<style>
	#aside {
		background-image: url('/assets/barista-background.png');
	}
</style>

<div class="row h-100">
	<div class="col-lg-7 px-0">
		<section class="h-100 bg-light text-primary z-1">
			<div class="px-3 h-100">
				<div class="p-5">
					<h1 class="display-3 fw-bolder mb-5">Get To Know Us</h1>
					<p class="lead mb-5">
						<b>At Café et Crème we are passionate about creating a warm and inviting atmosphere where people can gather to enjoy delightful beverages and good company.</b> Whether you're looking for a refreshing pick-me-up in the morning, a cozy spot to work or relax during the day, or a place to unwind with friends in the evening, we aim to be the perfect destination for you. From handcrafted coffees to unique signature blends, we offer a diverse range of flavors. Join us for great drinks and great moments.
					</p>
					<p class="text-danger lead fw-medium mb-4">Now that you know us, explore our menu</p>
					<div id="aboutCATBtn">
						<?= Form::arrowButton('primary', '/menu', 'Our menu') ?>
					</div>
				</div>
			</div>
		</section>
	</div>
	<div class="col-lg-5 px-0">
		<section class="h-100 bg-primary position-relative bg-primary-img bg-img z-1 text-light">
			<div class="p-5 pb-4 h-100">
				<div class="pt-5 px-3 d-flex flex-column h-100 justify-content-between">
					<div class="">
						<div class="mb-4">
							<h2 class="h3 fw-semibold mb-4">Our Mission</h2>
							<p class="lead">Crafting exceptional beverages, fostering community, and delivering unforgettable experiences.</p>
						</div>

						<div>
							<h2 class="h3 fw-semibold mb-4">Our Vision</h2>
							<p class="lead">To be the ultimate destination for extraordinary drinks, creating cherished memories and becoming an integral part of our customers' lives.</p>
						</div>
					</div>
					<?php include_once __DIR__ . '/components/full-contact-list.php' ?>
				</div>
			</div>
		</section>
	</div>
</div>