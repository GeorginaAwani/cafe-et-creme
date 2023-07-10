<!DOCTYPE html>
<html lang="en">

<head>
	<?php
	include_once __DIR__ . '/_head.php';
	?>
	<link rel="stylesheet" href="/css/main.css" />
</head>

<body>
	<nav class="bg-white border-bottom border-light fixed-top navbar navbar-expand-lg" id="mainNavbar" data-bs-theme="{{THEME}}">
		<div class="container">
			<a href="/" class="navbar-brand px-1 mb-0 h3 font-script"><i id="logoIcon" class="fa-light fa-mug-hot me-2"></i>Café et Crème</a>
			<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNavbarContent" aria-controls="mainNavbarContent" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse justify-content-end" id="mainNavbarContent">
				<div class="d-flex align-items-center">
					<ul class="navbar-nav mb-0 me-3 pe-5" id="mainNav">
						<li class="nav-item mx-1">
							<a class="nav-link position-relative px-3 py-2" href="/">Home</a>
						</li>
						<li class="nav-item mx-1">
							<a class="nav-link position-relative px-3 py-2" href="/menu">Menu</a>
						</li>
					</ul>

					<ul class="navbar-nav ps-5">
						<li class="nav-item me-3">
							<a class="align-items-center d-flex justify-content-center nav-link rounded-circle border" href="/cart" id="cartBtn">
								<i class="fa-solid fa-basket-shopping"></i>
							</a>
						</li>

						<li class="nav-item mx-1">
							<a class="nav-link position-relative px-3 py-2" href="/login">Login</a>
						</li>

						<li class="nav-item">
							<a class="btn ease px-3 py-2 rounded-pill btn-primary-pink" id="accountBtn" href="/signup">
								Create account
							</a>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</nav>

	<div id="content">{{CONTENT}}</div>
</body>

</html>