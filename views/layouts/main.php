<!DOCTYPE html>
<html lang="en" class="fullscreen">

<head>
	<?php
	include_once __DIR__ . '/_head.php';
	?>
	<link rel="stylesheet" href="/css/main.css" />
</head>

<body>
	<div class="container-fluid h-100">
		<div class="row h-100">
			<aside class="col-lg-3 px-0" id="sideNav">
				<nav class="bg-primary border-2 border-end h-100 navbar sticky-top navbar-dark navbar-expand-lg px-lg-5 py-lg-4 overflow-auto" id="navbar">
					<div class="h-100 d-flex flex-lg-column px-3 px-lg-0 justify-content-between justify-content-lg-start w-100">
						<a class="navbar-brand m-0 font-script" href="/">Café et Crème</a>
						<button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
							<span class="navbar-toggler-icon"></span>
						</button>

						<div class="offcanvas offcanvas-end flex-column" tabindex="-1" id="offcanvasNavbar" aria-labelledby="siteName">
							<div class="offcanvas-header">
								<a href="/" class="navbar-brand m-0 font-script offcanvas-title" id="siteName">Café et Crème</a>
								<button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
							</div>

							<div class="offcanvas-body flex-grow-1" id="navbarNav">
								<div class="align-items-start d-flex flex-column flex-grow-1 justify-content-between mt-4">
									<ul class="navbar-nav flex-column">
										<li class="nav-item"><a href="/about" class="ps-lg-0 px-3 nav-link fw-lighter position-relative">About
												Us</a></li>
										<li class="nav-item"><a href="/contact" class="ps-lg-0 px-3 nav-link fw-lighter position-relative">Contact
												Us</a></li>
										<li class="nav-item"><a href="/events" class="ps-lg-0 px-3 nav-link fw-lighter position-relative">Our
												Events</a></li>
									</ul>

									<div class="d-flex flex-column">
										<ul class="navbar-nav flex-column mb-5">
											<li class="nav-item"><a href="/menu" class="ps-lg-0 px-3 nav-link fw-lighter position-relative">Our
													Menu</a></li>
											<li class="nav-item"><a href="/book" class="ps-lg-0 px-3 nav-link fw-lighter position-relative">Book A
													Table</a></li>
										</ul>

										<ul class="navbar-nav flex-column">
											<li class="nav-item">
												<a href="/login" id="loginBtn" class="ps-lg-0 px-3 nav-link fw-lighter position-relative">Log
													in <i class="fa-light fa-arrow-right-to-arc ms-1"></i></a>
											</li>
										</ul>
									</div>
								</div>
							</div>
						</div>
					</div>
				</nav>
			</aside>
			<main class="col-lg-9" id="main">
				{{CONTENT}}
			</main>
		</div>
	</div>
</body>

</html>