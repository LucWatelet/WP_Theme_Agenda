<?php /* Template Name: Agenda Details Autre */ ?>

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
						<h1>Nom du musée</h1>
						<h2>Lieu</h2>
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
							<h3>En savoir plus :</h3>
							<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer mollis commodo diam, sit
							amet iaculis ligula sollicitudin eget. Tarifs : 10euros</p>
						<!-- FIN IF-->
						
						<!-- IF (vérification si contenu existe) -->
							<h3>Accueil :</h3>
							<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer mollis commodo diam, sit
							amet iaculis ligula sollicitudin eget.</p>
						<!-- FIN IF-->
						
						<!-- IF (vérification si contenu existe) -->
							<h3>équipements :</h3>
							<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer mollis commodo diam, sit
							amet iaculis ligula sollicitudin eget. Tarifs : 10euros.</p>
						<!-- FIN IF-->
						
						<!-- IF (vérification si contenu existe) -->
							<h3>restrictions :</h3>
								<div class="alignement-picto">
								<!-- Création de la boucle qui récupére les photos -->
									<img class="picto-restriction" src="">
									<img class="picto-restriction" src="">
								<!-- Fin de la boucle-->
								</div>
						<!-- FIN IF-->
						
						<div class="liste-photo-evenement">
							<!-- Création de la boucle qui récupére les photos -->
							<div class="photo-evenement" style="background-image:url('<?php echo get_template_directory_uri(); ?>/img/image-event.jpg');"></div>
							<div class="photo-evenement" style="background-image:url('<?php echo get_template_directory_uri(); ?>/img/image-event.jpg');"></div>
							<!-- Fin de la boucle-->
						</div>
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
						<p>Web: Adresse du site internet<br>
						Tél: +32(0)61 28 96 12</p>
						<p class="mail-contact">E-mail: devaltechristian7@gmail.com</p>
						<p>Place Communale,1<br>6800-Libramont</p>
					</div>
				</div>
			</div>
		</div>
	</section>
	

	<!-- IF evenement existe -->
	
	<section class="separator pad-top">
		<div class="wrapper clearfix">
			<div class="grid-100 tablet-grid-100 mobile-grid-100">
				<div class="separateur"></div>
			</div>
		</div>
	</section>
	
	<section class="titre pad-top">
		<div class="wrapper clearfix">
			<div class="grid-100 tablet-grid-100 mobile-grid-100">
				<h1>AGENDA</h1>
			</div>
		</div>
	</section>
	
	<!-- BOUCLE sur les evenements  -->
	<section class="evenement-blog-details">
		<div class="wrapper clearfix">
			<div class="grid-100 tablet-grid-100 mobile-grid-100 grid-parent">
				<div class="grid-100 tablet-grid-100 mobile-grid-100 alignleft tablet-alignleft mobile-alignleft">
					<header class="titre">
						<h1>Titre de l'évenement</h1>
						<h2>Date de l'évenement</h2>
					</header>
				</div>
				<div class="details grid-65 suffixe-35 tablet-grid-100 mobile-grid-100 alignleft tablet-alignleft mobile-alignleft">
					
					<!-- IF (vérification si photo existe) -->
						<div class="photo-couverture" style="background-image:url('<?php echo get_template_directory_uri(); ?>/img/image-event.jpg');"></div>
					<!-- FIN IF-->
					
					<div class="informations-evenement">
						<h3>Descripton :</h3>
						<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer mollis commodo diam, sit
						amet iaculis ligula sollicitudin eget. Donec sed magna a diam fringilla consectetur. Nullam
						vulputate sagittis tincidunt. Nulla posuere ultrices est nec luctus. Duis pulvinar mauris eu
						dui pulvinar elementum. In tellus lectus, dapibus ut vehicula non, venenatis in diam. Nullam
						vulputate sagittis tincidunt. Nulla posuere ultrices est nec luctus. Duis pulvinar mauris eu dui
						pulvinar elementum. In tellus lectus, dapibus ut vehicula non, venenatis in diam.</p>
						
						<!-- IF (vérification si contenu existe) -->
							<h3>HORAIRES :</h3>
							<p>le 27 juillet à 19h30.</p>
						<!-- FIN IF-->

					</div>
				</div>
			</div>
		</div>
	</section>
	
	<!-- FIN BOUCLE -->
	
	<!-- FIN IF-->
	
	
	<!-- IF activité existe -->
	
	<section class="separator pad-top">
		<div class="wrapper clearfix">
			<div class="grid-100 tablet-grid-100 mobile-grid-100">
				<div class="separateur"></div>
			</div>
		</div>
	</section>
	
	<section class="titre pad-top">
		<div class="wrapper clearfix">
			<div class="grid-100 tablet-grid-100 mobile-grid-100">
				<h1>Activités</h1>
			</div>
		</div>
	</section>
	
	<!-- BOUCLE sur les activités  -->
	<section class="evenement-blog-details">
		<div class="wrapper clearfix">
			<div class="grid-100 tablet-grid-100 mobile-grid-100 grid-parent">
				<div class="grid-100 tablet-grid-100 mobile-grid-100 alignleft tablet-alignleft mobile-alignleft">
					<header class="titre">
						<h1>Titre de l'activité</h1>
						<h2>Durée de l'activité: 1h</h2>
					</header>
				</div>
				<div class="details grid-65 suffixe-35 tablet-grid-100 mobile-grid-100 alignleft tablet-alignleft mobile-alignleft">
					
					<div class="informations-evenement details">
						
						<!-- IF (vérification si contenu existe) -->
							<h3>Services :</h3>
							<ul>
								<li>Visite guidée sur rendez-vous</li>
								<li>Visite libre</li>
								<li>Audio guidage FR</li>
								<li>Guidage FR</li>
								<li>Guidage NL</li>
								<li>Guidage EN</li>
								<li>Panneaux didactiques FR</li>
							</ul>
						<!-- FIN IF-->
						
						<!-- IF (vérification si contenu existe) -->
							<h3>HORAIRES :</h3>
							<p>Ouvert du 15 janv. au 30 juin et les mar, mer, jeu et ven de 9h30 à 17h, du 01 juil. au 31 août les lun, mar, mer, jeu, ven et sam de 9h30 à 17h et le dim de 14h à 18h, et du 01 sept. au 15 déc. les mar, mer, jeu et ven de 9h30 à 17h et le dim de 14h à 18h. Fermé du 16 déc. au 14 janv. 2020</p>
						<!-- FIN IF-->
						
						<!-- IF (vérification si contenu existe) -->
							<h3>Tarifs :</h3>
							<p>Par Personne : 15€</p>
						<!-- FIN IF-->
						
						<!-- IF (vérification si contenu existe) -->
							<h3>Remarque :</h3>
							<p>Blablabla</p>
						<!-- FIN IF-->

					</div>
				</div>
			</div>
		</div>
	</section>
	
	<!-- FIN BOUCLE -->
	
	<!-- FIN IF-->

</main>

<?php get_footer(); ?>