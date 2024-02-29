<?php /* Template Name: Login */ ?>

<?php get_header(); ?>

<main>
	
	<section class="login pad-top pad-bot aligncenter tablet-aligncenter mobile-alignleft">
		<div class="wrapper clearfix">
            <div class="grid-100 tablet-grid-100 mobile-grid-100">
				<?php if ( ! is_user_logged_in() ) { ?>
				<div class="grid-70 suffixe-15 prefix-15 tablet-grid-100 mobile-grid-100 grid-parent">
					<p class="aligncenter tablet-aligncenter mobile-alignleft">Accédez à plus de fonctionnalités en créant gratuitement un profil de connexion à lagenda.plus : enregistrez votre sélection d’évènements, réagissez aux articles du blog.</p>
					<h1>Connexion</h1>
					<?php } else { ?>
						<h1>Profil</h1>
					<?php } ?>
				</div>

		<?php
		// Formulaire de connexion
		if ( ! is_user_logged_in() ){
			?>
			<div class=" bloc-form grid-40 suffixe-30 prefix-30 tablet-grid-60 tablet-suffixe-20 tablet-prefix-20 mobile-grid-100">
			<?php wp_login_form( array(
				'redirect'       => site_url( '/profil/' ), // par défaut renvoie vers la page courante
				'label_username' => 'Login',
				'label_password' => 'Mot de passe',
				'label_remember' => 'Se souvenir de moi',
				'label_log_in'   => 'Se connecter',
				'form_id'        => 'login-form',
				'id_username'    => 'user-login',
				'id_password'    => 'user-pass',
				'id_remember'    => 'rememberme',
				'id_submit'      => 'wp-submit',
				'remember'       => false, //afficher l'option se ouvenir de moi
				'value_remember' => false //se souvenir par défaut ?
			) );
			?>
				<a href="<?php echo get_permalink(61190); ?>">Pas encore inscrit ?</a>
				
		<?php } else { ?>
				
			<div class="container-bouton">
				<?php echo '<a href="' .get_permalink(61196).'" class="bouton">Accès au profil</a>'; ?>	
				<?php echo '<a href="' . wp_logout_url( site_url( '/' ) ) .'" class="bouton">Se déconnecter</a>'; ?>
				
			</div>
				
		<?php } ?>
		</div>
			</div>
		</div>
	</section>
	
</main>


<?php get_footer(); ?>