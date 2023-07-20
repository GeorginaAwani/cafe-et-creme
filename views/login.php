<?php

use app\views\form\Form;
?>
<style>
	#hero {
		background-image: url('/assets/login-background.png');
	}

	#login .btn>img {
		width: 1.8rem;
	}
</style>

<script src="/js/login.js" type="module"></script>

<aside class="col-lg-7 px-0 bg-primary position-relative text-secondary z-1 bg-primary-img bg-img" id="hero">
	<div class="p-5 pt-0 d-flex flex-column h-100 justify-content-center">
		<div class="p-lg-5 p-3">
			<div class="px-lg-5 py-lg-3">
				<h1 class="display-3 fw-bolder mb-4"><a class="font-script text-reset text-decoration-none" href="/">Café et Crème</a></h1>
				<hr class="border-secondary ms-auto opacity-100 w-50 mb-5">
				<h2 class="fw-lighter">Log in to unlock a world full of flavors and quench your thirst for adventure</h2>
			</div>
		</div>
	</div>
</aside>
<main class="col-lg-5 px-0 overflow-auto bg-secondary bg-light-img z-1 position-relative bg-img text-primary" id="main">
	<div class="h-100 px-3">
		<div class="p-5 pb-3 h-100">
			<div class="mb-4">
				<h1 class="h1 text-primary">Log In</h1>
				<div class="mb-0 lead">Oops! Don't have an account? <a href="/signup" class="text-reset">Sign Up</a></div>
			</div>

			<?php $Form = Form::begin('login') ?>

			<div class="mb-4 position-relative">
				<?= $Form->input('email', 'Email', 'you@gmail.com')->emailField()->required() ?>
			</div>

			<div class="mb-4 position-relative">
				<?= $Form->input('password', 'Password', 'Enter your password')->passwordField()->required() ?>
			</div>

			<div class="border-primary border-top mx-auto my-4 position-relative text-align-center w-50">
				<div class="bg-secondary d-inline-block position-absolute px-2 start-50 top-50 translate-middle">Or</div>
			</div>

			<div class="mb-3">
				<button type="submit" class="btn py-3 px-5 text-primary w-100 btn-outline-primary bg-transparent position-relative rounded-pill">
					<img src="/assets/icons/google-icon.svg" alt="" height="100%" class="me-3">
					Log in with Google
				</button>
			</div>

			<div class="mb-4">
				<button type="submit" class="btn py-3 px-5 text-primary w-100 btn-outline-primary bg-transparent position-relative rounded-pill">
					<img src="/assets/icons/apple-icon.svg" alt="" height="100%" class="me-3">
					Log in with Apple
				</button>
			</div>

			<div class="pe-4 text-end">
				<p class="text-start text-danger form-error mb-0"></p>
				<?= $Form->submit('Continue') ?>
			</div>

			<?= $Form->end() ?>
		</div>
	</div>
</main>