<?php /* Template Name: Proposer une offre de concert */ ?>

<?php get_header(); ?>

<main>
	
	<section class="titre">
		<div class="wrapper clearfix">
			<div class="grid-100 tablet-grid-100 mobile-grid-100 grid-parent">
				<header class="titre aligncenter tablet-aligncenter mobile-aligncenter">
					<h1>J'organise</h1>
					<h2>Soutiens provincaux</h2>
				</header>
			</div>
		</div>
	</section>
	
	<section id="barre-services">
		<div class="wrapper clearfix">
			<div class="grid-100 tablet-grid-100 mobile-grid-100 grid-parent">
				<nav id="menu-services">
					<ul>
						<li><a href="<?php echo get_permalink(63574); ?>">Poster une annonce gratuitement</a></li>
						<li><a href="<?php echo get_permalink(63578); ?>">Réserver du matériel</a></li>
						<li class="active"><a href="#">Proposer une offre de concert</a></li>
					</ul>
				</nav>
			</div>
		</div>
	</section>
	
	<section class="liste-services pad-top">
		<div class="wrapper clearfix">
			<div class="grid-100 tablet-grid-100 mobile-grid-100 grid-parent">
				<?php $photo = get_field("picto"); ?>
				<div class="clearfix">
					<div class="information-service grid-60 tablet-grid-100 mobile-grid-100">
						<img class="picto" src="<?php echo $photo ['sizes']['picto']; ?>" alt="picto services">
						<h1><?php the_title(); ?></h1>
						<?php the_field('video'); ?>
						<?php the_field('description'); ?>
						<div class="liste-bouton">
						<?php 
							$file_form = get_field('formulaire_fichier');

							if( $file_form ): ?>
								<a href="<?php echo $file_form['url']; ?>" class="voir-plus fond-noir medium" target="_blank">Remplir la réservation</a>
							<?php endif; ?>
							<?php
							$file_regl = get_field('reglement');

							if( $file_regl ): ?>
								<a href="<?php echo $file_regl['url']; ?>" class="voir-plus fond-noir medium" target="_blank">Lire le règlement</a>
							<?php endif; ?>
							
							<?php 
								$file_commande = get_field('formulaire_commande');

							if( $file_commande ): ?>
								<a href="<?php echo $file_commande['url']; ?>" class="voir-plus fond-noir medium" target="_blank">Remplir la commande</a>
							<?php endif; ?>
							<?php
							$file_charte = get_field('charte_graphique');

							if( $file_charte ): ?>
								<a href="<?php echo $file_charte['url']; ?>" class="voir-plus fond-noir medium" target="_blank">Lire la charte graphique</a>
							<?php endif; ?>
							
						</div>
					</div>
					<div class="contact-service grid-40 tablet-grid-100 mobile-grid-100">
						<h1>Contact:</h1>
						<?php if(get_field('contact')): ?>
						<ul>
							<?php while(has_sub_field('contact')): 
								$image = get_sub_field('photo');
							?>
							<li>
								<img class="photo-contact" src="<?php echo $image ['url']; ?>" alt="photo portrait">
								<p><strong><?php the_sub_field('nom_prenom'); ?></strong><br>
								<a href="tel:<?php the_sub_field('telephone'); ?>" class="tel"><?php the_sub_field('telephone'); ?></a><br>
								<a href="mailto:<?php the_sub_field('e-mail'); ?>" class="mail"><?php the_sub_field('e-mail'); ?></a>
								</p>
								
							</li>
							<?php endwhile; ?>
							
						</ul>
						<?php endif; ?>
					</div>
					<div class="formulaire grid-100 tablet-grid-100 mobile-grid-100">
						<?php 
							$poster = get_field('poster_une_annonce');
							if($poster):
						?>

						<iframe class="form" src="https://www.ftlb.be/h2o/event/index.php?css=<?php echo get_template_directory_uri(); ?>/css/lagendalux.css"></iframe>

						<?php endif; ?>
					</div>
				</div>
			</div>
		</div>
	</section>
</main>



<?php get_footer(); ?>