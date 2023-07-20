<?php

use app\views\form\Form;

?>
<link rel="stylesheet" href="/css/menu.css">
<script type="module" src="/js/menu.js"></script>

<section id="hero" class="bg-light text-white p-5 mb-5 rounded-xl">
	<div class="container">
		<div class="row">
			<div class="col-lg-5"></div>
			<div class="col-9 col-lg-7">
				<div class="d-flex h-100 align-items-center">
					<h1 class="mb-0">Prepare<br>Your Own <br>Drink With <br>Our Ingredients</h1>
					<div class="ms-4">
						<h2 class="h4 fw-lighter mb-3">Craft your own drink</h2>
						<?= Form::fillButton('Get started', '/menu/craft') ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<section id="menu">
	<ul class="nav mt-4 h4 mb-5 fw-normal" id="menuNav">
		<a href="/menu" class="fw-light mx-1 nav-link px-4 py-2 rounded-pill">Popular</a>
		<a href="/menu/coffee" class="fw-light mx-1 nav-link px-4 py-2 rounded-pill">Coffees</a>
		<a href="/menu/smoothie" class="fw-light mx-1 nav-link px-4 py-2 rounded-pill">Smoothie</a>
		<a href="/menu/tea" class="fw-light mx-1 nav-link px-4 py-2 rounded-pill">Teas</a>
		<a href="/menu/mocktail" class="fw-light mx-1 nav-link px-4 py-2 rounded-pill">Mocktails</a>
		<a href="/menu/cocktail" class="fw-light mx-1 nav-link px-4 py-2 rounded-pill">Cocktails</a>
	</ul>

	<section id="menulist" class="pt-5 row">
	</section>
	<div id="loader" class="text-center h1" style="display:none">
		<i class="fa-light text-secondary fa-spin fa-spinner-third"></i>
	</div>
	<div id="loadMore" class="text-center" style="display:none">
		<?= Form::fillButton('Load More', '', 'secondary') ?>
	</div>
</section>