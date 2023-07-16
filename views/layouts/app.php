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

<body class="bg-primary text-secondary">
	<nav class="navbar navbar-dark navbar-expand-lg bg-primary fixed-top py-3 border-bottom border-secondary" id="navbar">
		<div class="container-fluid px-5">
			<a class="navbar-brand font-script" href="/">Café et Crème</a>
			<button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>

			<div class="offcanvas offcanvas-end ms-lg-5 bg-primary" tabindex="-1" id="offcanvasNavbar" aria-labelledby="siteName">
				<div class="offcanvas-header">
					<a href="/" class="navbar-brand m-0 font-script offcanvas-title" id="siteName">Café et Crème</a>
					<button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
				</div>

				<div class="offcanvas-body">
					<div class="d-lg-flex flex-grow-1 justify-content-between ps-lg-5">
						<ul class="navbar-nav justify-content-end align-items-center">
							<li class="nav-item">
								<a href="/menu" class="nav-link position-relative px-4 fw-lighter">Our Menu</a>
							</li>

							<li class="nav-item">
								<a href="/book" class="nav-link position-relative px-4 fw-lighter">Book A Table</a>
							</li>
						</ul>

						<div class="d-lg-flex text-secondary">
							<?php $Form = Form::begin('searchForm') ?>
							<div class="position-relative">
								<i class="fa-light fa-search position-absolute translate-middle-y top-50 ms-4 mb-0 h4"></i>
								<input type="search" id="search" name="search" class="bg-transparent border-secondary form-control py-3 px-5 rounded-pill fw-lighter" placeholder="Search" required>
								<div class="visually-hidden">
									<?= $Form->submit('Submit', 'secondary') ?>
								</div>
							</div>
							<?php $Form->end() ?>

							<ul class="navbar-nav justify-content-end flex-grow-1 align-items-center ms-lg-4" id="iconNav">
								<li class="nav-item">
									<a href="/" class="nav-link position-relative px-3 fw-lighter"><i class="fa-light fa-home-alt"></i><span class="visually-hidden">Home</span></a>
								</li>

								<li class="nav-item">
									<a href="/cart" class="nav-link position-relative px-3 fw-lighter"><i class="fa-light fa-cart-shopping"></i><span class="visually-hidden">Cart</span></a>
								</li>

								<li class="nav-item">
									<a href="/profile" class="nav-link position-relative px-3 fw-lighter"><i class="fa-light fa-user-circle"></i><span class="visually-hidden">Profile</span></a>
								</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	</nav>

	<div class="d-flex flex-column justify-content-between pt-5" id="mainWrap">
		<main id="main" class="mt-5">
			<div class="container py-5">
				{{CONTENT}}
			</div>
		</main>

		<footer id="footer" class="py-3 bg-primary border-top border-secondary text-secondary">
			<div class="container">
				<div class="d-flex justify-content-end">
					<?php include_once __DIR__ . '/../components/full-contact-list.php' ?>
				</div>
			</div>
		</footer>
	</div>
</body>

</html>