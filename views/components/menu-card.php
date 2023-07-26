<?php

use app\views\form\Form;
?>
<link rel="stylesheet" href="/css/menu.css">

<section id="hero" class="text-white">
	<div class="container">
		<div class="row">
			<div class="col-md-7">
				<div class="py-4">
					<h1 class="display-3 fw-semibold">Prepare Your Own Drink With Our Ingredients</h1>

					<p class="lead my-5">
						Craft Your Own Drink
					</p>

					<div class="d-flex">
						<div class="me-5">
							<?= Form::button('Get started', '/craft', 'secondary') ?>
						</div>
						<?= Form::button('Go to menu', '/menu/popular', 'link text-white text-decoration-none', false) ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<img src="/assets/icons/bottle-group.png" alt="" srcset="" id="heroIcon" class="position-absolute">