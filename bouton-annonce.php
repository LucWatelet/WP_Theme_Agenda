<div class="bouton-annonce">
	<a href="<?php echo get_permalink(63574); ?>"><img class="picto" src="<?php echo get_template_directory_uri(); ?>/img/picto-annonce.svg" alt="picto"><h1>Poster une annonce</h1></a>
</div>


<?php if ( ! is_user_logged_in() ) { ?>


<div class="bouton-connexion">
	<a href="<?php echo get_permalink(61188); ?>"><img class="picto" src="<?php echo get_template_directory_uri(); ?>/img/picto-profil.svg" alt="picto"><h1>Connexion</h1></a>
</div>

<?php } else { ?>

<div class="bouton-profil">
	<a href="<?php echo get_permalink(61196); ?>"><img class="picto" src="<?php echo get_template_directory_uri(); ?>/img/picto-profil.svg" alt="picto"><h1>Profil</h1></a>
</div>


<?php } ?>