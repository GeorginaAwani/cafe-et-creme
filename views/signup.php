<?php

use app\views\form\Form;
?>
<style>
	#hero {
		background-image: url('/assets/signup-background.png');
	}

	#login .btn>img {
		width: 1.8rem;
	}
</style>

<script src="/js/signup.js" type="module"></script>

<aside class="col-lg-7 px-0 bg-primary position-relative text-light z-1 bg-primary-img bg-img" id="hero">
	<div class="p-5 pt-0 d-flex flex-column h-100 justify-content-center">
		<div class="p-lg-5 p-3">
			<div class="px-lg-5 py-lg-3">
				<h1 class="display-3 fw-bolder mb-4"><a class="font-script text-reset text-decoration-none" href="/">Café et Crème</a></h1>
				<hr class="border-light ms-auto opacity-100 w-50 mb-5">
				<h2 class="fw-lighter">Thirsty for Adventure? Sign Up and Start Exploring.</h2>
			</div>
		</div>
	</div>
</aside>
<main class="col-lg-5 px-0 h-100 bg-light bg-light-img z-1 position-relative bg-img text-primary overflow-auto" id="main">
	<div class="px-3">
		<div class="p-5 pb-3 h-100">
			<div class="mb-4">
				<h1 class="h1 text-primary">Sign Up</h1>
				<div class="mb-0 lead">Oops! Already have an account? <a href="/login" class="text-reset">Login</a></div>
			</div>

			<?php $Form = Form::begin('signup') ?>

			<div class="mb-4 position-relative">
				<?= $Form->input('name', 'Name', 'Your Name')->required() ?>
			</div>

			<div class="mb-4 position-relative">
				<?= $Form->input('email', 'Email', 'you@gmail.com')->emailField()->required() ?>
			</div>

			<div class="mb-4 position-relative">
				<?= $Form->input('password', 'Password', 'Enter your password')->passwordField()->required() ?>
			</div>

			<div class="mb-4 position-relative">
				<?= $Form->input('confirm_password', 'Confirm Password', 'Re-enter your password')->passwordField()->required() ?>
			</div>

			<div class="pe-4 text-end">
				<p class="text-start text-danger form-error mb-0"></p>
				<?= $Form->submit('Get Started') ?>
			</div>

			<div class="border-primary border-top mx-auto my-4 position-relative text-align-center w-50">
				<div class="bg-light d-inline-block position-absolute px-2 start-50 top-50 translate-middle">Or</div>
			</div>

			<div class="mb-3">
				<button type="submit" class="btn py-3 px-5 text-primary w-100 btn-outline-primary bg-transparent position-relative rounded-pill">
					<img src="/assets/icons/google-icon.svg" alt="" height="100%" class="me-3">
					Sign up with Google
				</button>
			</div>

			<div class="mb-4">
				<button type="submit" class="btn py-3 px-5 text-primary w-100 btn-outline-primary bg-transparent position-relative rounded-pill">
					<img src="/assets/icons/apple-icon.svg" alt="" height="100%" class="me-3">
					Sign up with Apple
				</button>
			</div>

			<?= $Form->end() ?>
		</div>
	</div>
</main>