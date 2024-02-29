<?php /* Template Name: Profil */ ?>

<?php get_header(); ?>

<main>

	<section class="login pad-top-bot aligncenter tablet-aligncenter mobile-alignleft">
		<div class="wrapper clearfix">
            <div class="grid-100 tablet-grid-100 mobile-grid-100">
				<header>
					<h1>Profil</h1>
				</header>
				<div class="bloc-form grid-40 suffixe-30 prefix-30 tablet-grid-60 tablet-suffixe-20 tablet-prefix-20 mobile-grid-100">
					<?php echo edit_user_form(); ?>
					
					
					<h1 style="padding-top:50px;">Mes favoris</h1>
					
					<?php
					echo do_shortcode('[user_favorites include_links="true" include_thumbnails="true" include_buttons="true"]');
					echo do_shortcode('[clear_favorites_button]');
					?>
					
					<div class="container-bouton">
						<?php echo '<a href="' . wp_logout_url( site_url( '/' ) ) .'" class="bouton">Se déconnecter</a>'; ?>
						<p>Nous respectons votre vie privée: <a href="<?php echo get_permalink(52762); ?>">Mentions légales</a></p>
					</div>
					
				</div>
			</div>
		</div>
	</section>
	
</main>


<?php get_footer(); ?>