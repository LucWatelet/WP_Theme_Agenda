<?php /* Template Name: Message */ ?>

<?php get_header(); ?>

<main>
	
	<section class="message pad-top-bot-200 aligncenter tablet-aligncenter mobile-aligncenter">
		<div class="wrapper clearfix">
            <div class="grid-100 tablet-grid-100 mobile-grid-100">
				<?php echo show_user_registration_message(); ?>
				<div class="container-bouton">
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="bouton">Retour à la page d'accueil</a>
				</div>
			</div>
		</div>
	</section>
	
</main>


<?php get_footer(); ?>