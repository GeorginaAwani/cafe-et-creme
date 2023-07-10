<!DOCTYPE html>
<html lang="en">

<head>
	<?php
	include_once __DIR__ . '/_head.php';
	?>
	<link rel="stylesheet" href="/css/main.css" />
</head>

<body>
	<!-- <nav class="navbar bg-body-tertiary fixed-top">
		<div class="container-fluid">
			<a class="navbar-brand font-script" href="#">Offcanvas navbar</a>
			<button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
				<div class="offcanvas-header">
					<h5 class="offcanvas-title" id="offcanvasNavbarLabel">Offcanvas</h5>
					<button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
				</div>
				<div class="offcanvas-body">
					<ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
						<li class="nav-item">
							<a class="nav-link active" aria-current="page" href="#">Home</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="#">Link</a>
						</li>
						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
								Dropdown
							</a>
							<ul class="dropdown-menu">
								<li><a class="dropdown-item" href="#">Action</a></li>
								<li><a class="dropdown-item" href="#">Another action</a></li>
								<li>
									<hr class="dropdown-divider">
								</li>
								<li><a class="dropdown-item" href="#">Something else here</a></li>
							</ul>
						</li>
					</ul>
					<form class="d-flex mt-3" role="search">
						<input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
						<button class="btn btn-outline-success" type="submit">Search</button>
					</form>
				</div>
			</div>
		</div>
	</nav> -->
	<div class="container-fluid h-100">
		<div class="row h-100">
			<div class="col-lg-3 px-0">
				<nav class="bg-primary border-2 border-end h-100 navbar navbar-dark navbar-expand-lg px-lg-5 py-lg-4"
					id="mainNavbar">
					<div class="d-flex flex-column h-100">
						<a href="/" class="navbar-brand m-0 font-script">Café et Crème</a>
						<button class="navbar-toggler" type="button" data-bs-toggle="collapse"
							data-bs-target="#mainNavbarNav" aria-controls="mainNavbarNav" aria-expanded="false"
							aria-label="Toggle navigation">
							<span class="navbar-toggler-icon"></span>
						</button>

						<div class="align-items-start collapse flex-column justify-content-between navbar-collapse mt-4"
							id="mainNavbarNav">
							<ul class="navbar-nav flex-column">
								<li class="nav-item"><a href="/about" class="nav-link fw-lighter text-white">About
										Us</a></li>
								<li class="nav-item"><a href="/contact" class="nav-link fw-lighter text-white">Contact
										Us</a></li>
								<li class="nav-item"><a href="/events" class="nav-link fw-lighter text-white">Our
										Events</a></li>
							</ul>

							<div class="d-flex flex-column">
								<ul class="navbar-nav flex-column mb-5">
									<li class="nav-item"><a href="/menu" class="nav-link fw-lighter text-white">Our
											Menu</a></li>
									<li class="nav-item"><a href="/book" class="nav-link fw-lighter text-white">Book A
											Table</a></li>
								</ul>

								<ul class="navbar-nav flex-column">
									<li class="nav-item">
										<a href="/login" id="loginBtn" class="nav-link fw-lighter text-white">Log in <i
												class="fa-light fa-arrow-right-to-arc ms-1"></i></a>
									</li>
								</ul>
							</div>
						</div>
					</div>
				</nav>
			</div>
			<div class="col-lg-9">
				{{CONTENT}}
			</div>
		</div>
	</div>
</body>

</html>