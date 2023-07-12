<?php

use app\views\form\Form;

?>
<!-- <link rel="stylesheet" href="/css/contact.css"> -->
<!-- <script type="module" src="/js/contact.js"></script> -->

<style>
	#main {
		background-image: url('/assets/phone-background.png');
	}
</style>
<div class="row h-100">
	<div class="col-lg-6 px-0">
		<section class="h-100 bg-primary position-relative text-secondary z-1 bg-primary-img">
			<div class="pb-3 d-flex flex-column justify-content-between h-100">
				<div class="p-5 pt-4 pb-0">
					<h1 class="display-3 fw-bolder">React Out To Us</h1>
					<p class="lead mb-4">
						We’d love to hear from you. Our friendly team is always available to chat
					</p>
					<ul id="contactList" class="list-unstyled mb-0">
						<li class="mb-4">
							<div class="row">
								<div class="col-1">
									<i class="mb-0 h2 fa-regular fa-envelope me-4"></i>
								</div>
								<div class="col-9 ps-4">
									<h4 class="fw-normal">Chat Us</h4>
									<p class="fw-lighter mb-2">We’re available 24/7</p>
									<p class="lead mb-0">hi@cet.com</p>
								</div>
							</div>
						</li>

						<li class="mb-4">
							<div class="row">
								<div class="col-1">
									<i class="mb-0 h2 fa-regular fa-location-dot me-4"></i>
								</div>
								<div class="col-9 ps-4">
									<h4 class="fw-normal">Visit Us</h4>
									<p class="fw-lighter mb-2">6am-12am daily</p>
									<p class="lead mb-0">0 newstreet, city. country</p>
								</div>
							</div>
						</li>

						<li>
							<div class="row">
								<div class="col-1">
									<i class="mb-0 h2 fa-regular fa-phone me-4"></i>
								</div>
								<div class="col-9 ps-4">
									<h4 class="fw-normal">Call Us</h4>
									<p class="fw-lighter mb-2">6am-12am daily</p>
									<p class="lead mb-0">+234 000 000 0000</p>
								</div>
							</div>
						</li>
					</ul>
				</div>
				<ul class="mb-0 list-inline h4 ps-4 text-white">
					<li class="list-inline-item me-3">
						<a href="" aria-label="Our Instagram" class="text-reset"><i class="fa-brands fa-instagram"></i></a>
					</li>
					<li class="list-inline-item">
						<a href="" aria-label="Our Twitter" class="text-reset"><i class="fa-brands fa-twitter"></i></a>
					</li>
				</ul>
			</div>
		</section>
	</div>
	<div class="col-lg-6 px-0">
		<main id="main" class="h-100 bg-secondary text-primary">
			<div class="h-100 px-3">
				<div class="p-5 pb-3 h-100">
					<div class="mb-5">
						<h1 class="h2 text-primary">Tell Us What’s On Your Mind</h1>
						<div class="mb-0">Our team is always available to listen</div>
					</div>

					<?php $Form = Form::begin() ?>

					<div class="mb-4 position-relative">
						<?= $Form->input('name', 'Name', 'Your name') ?>
					</div>

					<div class="mb-4 position-relative">
						<?= $Form->input('email', 'Email', 'you@gmail.com')->emailField() ?>
					</div>

					<div class="mb-4 position-relative floating-group">
						<span class="floating-field ms-3 mt-3 position-absolute pt-1 z-1">
							<select name="country_code" id="country_code" class="bg-transparent border-0 floating-select text-primary">
								<option value="ng">+234</option>
							</select>
							<i class="fa-regular fa-chevron-down"></i>
						</span>
						<div class="position-relative">
							<?= $Form->input('phone', 'Phone', '000 000 0000')->phoneField() ?>
						</div>
					</div>

					<div class="mb-4 position-relative">
						<?= $Form->textarea('message', 'How can we help', 'Let us know how we can help you...') ?>
					</div>

					<div class="pe-4 text-end">
						<?= $Form->submit('Submit') ?>
					</div>

					<?= $Form->end() ?>
				</div>
			</div>
		</main>
	</div>
</div>