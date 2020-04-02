<?php get_header(); ?>

<main>
	
	<?php include 'bouton-annonce.php'; ?>
	
	<section class="erreur404">
		<div class="wrapper clearfix">
			<div class="grid-100 tablet-grid-100 mobile-grid-100">
				<h1>Oups !</h1>
				<h2>La page que vous recherchez semble introuvable.</h2>
				<p>Code d'erreur : <strong>404</strong></p>
				<div class="lien-prec">
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="retour"><img src="<?php echo get_template_directory_uri(); ?>/img/fleche-retour.svg">Retour à la page d'accueil</a>
				</div>
			</div>
		</div>
	</section>
	
</main>

<?php get_footer(); ?>