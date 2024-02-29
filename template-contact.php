<?php /* Template Name: Contact */ ?>

<?php get_header(); ?>

<main>
	
	<section class="nous-contacter pad-top-bot">
		<div class="wrapper clearfix">
			<div class="grid-80 suffixe-10 prefix-10 tablet-grid-100 mobile-grid-100 grid-parent">
				<header class="aligncenter tablet-aligncenter mobile-aligncenter">
					<h1>Nous contacter</h1>
					<h2>Besoin de nous ?</h2>
				</header>
				<div class="text-intro aligncenter tablet-aligncenter mobile-aligncenter">
					<p>Vous désirez nous contacter ? Envoyez-nous vos données et nous reviendrons vers vous dans les meilleurs délais.</p>
				</div>
				<div class="formulaire-contact">
					<?php echo do_shortcode('[contact-form-7 id="52713" title="Formulaire de contact"]'); ?>
				</div>
			</div>
		</div>
	</section>
	<section id="map-contact" class="pad-top">
		<div class="bg-image-pinceaux"></div>
		<div class="grid-100 tablet-grid-100 mobile-grid-100 grid-parent">
			<div id="map"></div>
		</div>
	</section>

</main>

<?php get_footer(); ?>