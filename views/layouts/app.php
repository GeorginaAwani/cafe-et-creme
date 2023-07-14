<?php

use app\views\form\Form;
?>
<!DOCTYPE html>
<html lang="en" class="fullscreen">

<head>
	<?php
	include_once __DIR__ . '/_head.php';
	?>
	<link rel="stylesheet" href="/css/app.css" />
</head>

<body>
	<nav class="navbar navbar-dark navbar-expand-lg bg-primary fixed-top" id="nav">
		<div class="container">
			<a class="navbar-brand m-0 font-script" href="/">Café et Crème</a>
			<button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>

			<div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="siteName">
				<div class="offcanvas-header">
					<a href="/" class="navbar-brand m-0 font-script offcanvas-title" id="siteName">Café et Crème</a>
					<button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
				</div>

				<div class="offcanvas-body">
					<div class="d-flex justify-content-between flex-grow-1">
						<ul class="navbar-nav justify-content-end">
							<li class="nav-item">
								<a href="/menu" class="nav-link">Our Menu</a>
							</li>

							<li class="nav-item">
								<a href="/book" class="nav-link">Book A Table</a>
							</li>
						</ul>

						<div class="d-flex text-secondary">
							<?php $Form = Form::begin('searchForm') ?>
							<div class="position-relative">
								<i class="fa-light fa-search fa-position-absolute"></i>
								<input type="search" id="search" name="search" class="bg-transparent border-secondary form-control py-3 px-5 rounded-pill" placeholder="Search" required>
								<div class="visually-hidden">
									<?= $Form->submit('Submit', 'secondary') ?>
								</div>
							</div>
							<?php $Form->end() ?>

							<ul class="navbar-nav justify-content-end flex-grow-1">
								<li class="nav-item">
									<a href="/" class="nav-link"><i class="fa-light fa-home-alt"></i><span class="visually-hidden">Home</span></a>
								</li>

								<li class="nav-item">
									<a href="/cart" class="nav-link"><i class="fa-light fa-cart-shopping"></i><span class="visually-hidden">Cart</span></a>
								</li>

								<li class="nav-item">
									<a href="/profile" class="nav-link"><i class="fa-light fa-user-circle"></i><span class="visually-hidden">Profile</span></a>
								</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	</nav>

	<main id="main" class="bg-primary">
		<div class="container">
			{{CONTENT}}
		</div>
	</main>

	<footer id="footer" class="fixed-bottom py-3 bg-primary border-top border-secondary text-secondary">
		<div class="container">
			<div class="d-flex justify-content-end">
				<?php include_once __DIR__ . '/../components/full-contact-list.php' ?>
			</div>
		</div>
	</footer>
</body>

</html>