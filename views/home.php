<link rel="stylesheet" href="/css/home.css">

<section id="hero" class="d-flex align-items-center py-5" style="background-color: var(--bs-danger-bg-subtle);">
	<div class="container py-5">
		<div class="caption pt-5">
			<h2 class="h6 text-uppercase text-body-tertiary mb-3">All the flavours of fun</h2>
			<h1 class="font-heading text-black mb-4 display-5 fw-semibold">
				<div class="display-4 fw-bolder text-primary-pink">500+</div> flavours to try
			</h1>
			<p class="lead mb-4">Our menu offers drinks in all their flavours and with any topping for every season, celebration and feeling.</p>

			<a href="/menu" class="btn btn-primary-pink px-4 py-3 rounded-pill">See our menu <i class="fa-solid ms-2 fa-long-arrow-right"></i></a>
		</div>
	</div>
</section>

<section class="container">
	<pre>
		<?= var_dump($_REQUEST) ?>
	</pre>
</section>

<section id="intro" class="py-5">
	<div class="container py-5">
		<div class="row align-items-center pt-3">
			<div class="col-md-7"></div>
			<div class="col-md-5">
				<h2 class="h6 text-uppercase text-body-tertiary mb-3 fw-bold">We bring the bar to you</h2>
				<h1 class="font-heading text-black mb-4">A drink for every mood</h1>

				<p class="mb-4">
					Coffee, tea, wine, ice cream, yoghurt, soda, juice, smoothie, beer, spirit, cocktail; you name it, we've got it. Even water.
				</p>

				<a href="/menu" class="btn btn-accent px-4 py-3 rounded-pill">Check our menu <i class="fa-solid ms-2 fa-long-arrow-right"></i></a>
			</div>
		</div>
	</div>
</section>

<section id="features" class="py-5 bg-secondary-blue position-relative overflow-hidden z-1">
	<div id="featureCircle" class="position-absolute bg-primary-blue rounded-circle z-n1"></div>
	<div class="container-fluid py-5">
		<div class="row py-5">
			<div class="col-md-2 offset-md-1">
				<h1 class="font-heading h2 text-white mb-4">Your choice to the nitty-gritty details</h1>
				<p class="text-light mb-0">We care about your drink experience. Customise every order just how you want it from the very best of options.</p>
			</div>
			<div class="align-items-center col-md-8 d-flex ps-md-5">
				<div class="row" id="featureList">
					<div class="col-md-4">
						<div class="feature-item ease p-5 rounded-bottom-pill rounded-top-pill text-center h-100">
							<div class="feature-icon h1 mb-3">
								<i class="fa-duotone fa-ice-cream text-primary-pink-dark"></i>
							</div>

							<div class="h5 text-primary-pink-dark">Create your own flavours</div>
							<p class="small">Lorem ipsum dolor sit amet consectetur adipisicing elit. Facere odio a molestiae explicabo necessitatibus</p>
						</div>
					</div>

					<div class="col-md-4">
						<div class="feature-item ease p-5 rounded-bottom-pill rounded-top-pill text-center h-100">
							<div class="feature-icon h1 mb-3">
								<i class="fa-duotone fa-donut text-primary-pink-dark"></i>
							</div>

							<div class="h5 text-primary-pink-dark">80+ topping options</div>
							<p class="small">Lorem ipsum dolor sit amet consectetur adipisicing elit. Facere odio a molestiae explicabo necessitatibus</p>
						</div>
					</div>

					<div class="col-md-4">
						<div class="feature-item ease p-5 rounded-bottom-pill rounded-top-pill text-center h-100">
							<div class="feature-icon h1 mb-3">
								<i class="fa-duotone fa-salad text-primary-pink-dark"></i>
							</div>

							<div class="h5 text-primary-pink-dark">Healthy goodness</div>
							<p class="small">Lorem ipsum dolor sit amet consectetur adipisicing elit. Facere odio a molestiae explicabo necessitatibus</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<script>
	$(document).ready(function() {
		$('#mainNav [href="/"]').addClass('active').attr('aria-current', 'page');
	})
</script>