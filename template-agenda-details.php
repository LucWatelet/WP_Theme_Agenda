<?php /* Template Name: Agenda Details */ ?>

<?php get_header(); ?>

<main>
	
	<?php include 'bouton-annonce.php'; ?>
	
	<section class="evenement-blog-details pad-top">
		<div class="wrapper clearfix">
			<div class="grid-100 tablet-grid-100 mobile-grid-100 grid-parent">
				<div class="grid-100 tablet-grid-100 mobile-grid-100 alignleft tablet-alignleft mobile-alignleft">
					<div class="lien-prec">
						<a href="<?php echo get_permalink(52585); ?>" class="retour"><img src="<?php echo get_template_directory_uri(); ?>/img/fleche-retour.svg"> Retour à la page Agenda</a>
					</div>
					<header class="titre">
						<h1>Titre de l'évènement</h1>
						<h2>Date de l'évènement</h2>
					</header>
				</div>
				<div class="details grid-65 tablet-grid-100 mobile-grid-100 alignleft tablet-alignleft mobile-alignleft">
<!--					<div class="photo-couverture" style="background-image:url('<?php echo get_template_directory_uri(); ?>/img/image-event.jpg');"></div>-->
					<img class="photo-event" src="<?php echo get_template_directory_uri(); ?>/img/image-event.jpg');" alt="photo event">
					<div class="informations-evenement">
						<h3>Descripton :</h3>
						<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer mollis commodo diam, sit
						amet iaculis ligula sollicitudin eget. Donec sed magna a diam fringilla consectetur. Nullam
						vulputate sagittis tincidunt. Nulla posuere ultrices est nec luctus. Duis pulvinar mauris eu
						dui pulvinar elementum. In tellus lectus, dapibus ut vehicula non, venenatis in diam. Nullam
						vulputate sagittis tincidunt. Nulla posuere ultrices est nec luctus. Duis pulvinar mauris eu dui
						pulvinar elementum. In tellus lectus, dapibus ut vehicula non, venenatis in diam.</p>
						
						<!-- IF (vérification si contenu existe) -->
							<h3>INFORMATIONS PRATIQUES :</h3>
							<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer mollis commodo diam, sit
						amet iaculis ligula sollicitudin eget. Tarifs : 10euros</p>
						<!-- FIN IF-->
						
						<!-- IF (vérification si contenu existe) -->
							<h3>RESTRICTIONS :</h3>
								<div class="alignement-picto">
								<!-- Création de la boucle qui récupére les photos -->
									<img class="picto-restriction" src="">
									<img class="picto-restriction" src="">
								<!-- Fin de la boucle-->
								</div>
						<!-- FIN IF-->
						
						<!-- IF (vérification si contenu existe) -->
							<h3>HORAIRES :</h3>
							<p>le 27 juillet à 19h30.</p>
						<!-- FIN IF-->
						
						<!-- IF (vérification si photos existent) -->
							<div class="liste-photo-evenement">
								<!-- Création de la boucle qui récupére les photos -->
									<div class="photo-evenement" style="background-image:url('<?php echo get_template_directory_uri(); ?>/img/image-event.jpg');"></div>
									<div class="photo-evenement" style="background-image:url('<?php echo get_template_directory_uri(); ?>/img/image-event.jpg');"></div>
									<div class="photo-evenement" style="background-image:url('<?php echo get_template_directory_uri(); ?>/img/image-event.jpg');"></div>
									<div class="photo-evenement" style="background-image:url('<?php echo get_template_directory_uri(); ?>/img/image-event.jpg');"></div>
									<div class="photo-evenement" style="background-image:url('<?php echo get_template_directory_uri(); ?>/img/image-event.jpg');"></div>
									<div class="photo-evenement" style="background-image:url('<?php echo get_template_directory_uri(); ?>/img/image-event.jpg');"></div>
								<!-- Fin de la boucle-->
							</div>
						<!-- FIN IF-->
					</div>
				</div>
				<div class="maps grid-35 tablet-grid-100 mobile-grid-100">
					<div class="map">
						<!-- Ajout de la map -->
					</div>
					<div class="informations-contact">
						<h3>CONTACT</h3>
						<p><strong>M. Devalte Christian<br>
						Royal Syndicat d’Initiative de Houffalize</strong></p>
						<p>Tél: +32(0)61 28 96 12<br>
						Tél: +32(0)478 94 41 73</p>
						<p class="mail-contact">E-mail: devaltechristian7@gmail.com</p>
					</div>
				</div>
			</div>
		</div>
	</section>

</main>

<?php get_footer(); ?>