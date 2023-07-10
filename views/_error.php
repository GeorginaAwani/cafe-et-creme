<?php

/**
 * @var int $code
 * @var string $message
 * @var string $description
 */
?>
<section id="error" class="align-items-stretch bg-accent d-flex py-5">
	<div class="container d-flex flex-column justify-content-center align-items-stretch pt-5 z-0">
		<div class="row align-items-center">
			<div class="col-md-5 text-center">
				<h1 class="fw-bold display-1 font-heading"><?= $code ?></h1>
				<h1 class="h2"><?= $message ?></h1>
				<p class="lead"><?= $description ?></p>
			</div>
			<div class="col-md-7">
				<div id="errorCircle1" class="align-items-center bg-primary-pink bg-primary-pink-dark d-flex error-circle justify-content-center mx-auto rounded-circle shadow-lg">
					<div id="errorCircle2" class="bg-primary-pink error-circle rounded-circle shadow-lg">
					</div>
				</div>
			</div>
		</div>
	</div>
</section>