<?php

use app\views\form\Form;

?>
<!-- <link rel="stylesheet" href="/css/contact.css"> -->
<script type="module" src="/js/contact.js"></script>

<style>
	#formWrap {
		background-image: url('/assets/phone-background.png');
	}
</style>
<div class="row h-100">
	<div class="col-lg-6 px-0">
		<section class="h-100 bg-primary position-relative text-light z-1 bg-primary-img bg-img">
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
				<?php include_once __DIR__ . '/components/social-contact-list.php' ?>
			</div>
		</section>
	</div>
	<div class="col-lg-6 px-0">
		<div id="formWrap" class="h-100 bg-light bg-light-img z-1 position-relative bg-img text-primary">
			<div class="h-100 px-3">
				<div class="p-5 pb-3 h-100">
					<div class="mb-5">
						<h1 class="h2 text-primary">Tell Us What’s On Your Mind</h1>
						<div class="mb-0">Our team is always available to listen</div>
					</div>

					<?php $Form = Form::begin('contact') ?>

					<div class="mb-4 position-relative">
						<?= $Form->input('name', 'Name', 'Your name')->required() ?>
					</div>

					<div class="mb-4 position-relative">
						<?= $Form->input('email', 'Email', 'you@gmail.com')->emailField()->required() ?>
					</div>

					<div class="mb-4 position-relative floating-group">
						<span class="floating-field ms-3 mt-3 position-absolute pt-1 z-1">
							<select name="country_code" id="country_code" class="bg-transparent border-0 floating-select text-primary" name="country_code">
								<option value="234">+234</option>
							</select>
							<i class="fa-regular fa-chevron-down"></i>
						</span>
						<div class="position-relative">
							<?= $Form->input('phone', 'Phone', '000 000 0000')->phoneField()->required() ?>
						</div>
					</div>

					<div class="mb-3 position-relative">
						<?= $Form->textarea('message', 'How can we help', 'Let us know how we can help you...')->required() ?>
					</div>

					<div class="pe-4 text-end">
						<p class="text-start text-danger form-error mb-0"></p>
						<?= $Form->submit('Send') ?>
					</div>

					<?= $Form->end() ?>
				</div>
			</div>
		</div>
	</div>
</div>