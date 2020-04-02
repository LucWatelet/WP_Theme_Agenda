<?php /* Template Name: About */ ?>

<?php get_header(); ?>

<main>
	<?php include 'bouton-annonce.php'; ?>
	
	<section class="about-equipe pad-top">
		<div class="wrapper clearfix">
			<div class="grid-100 tablet-grid-100 mobile-grid-100 grid-parent">
				<div class="about grid-65 tablet-grid-100 mobile-grid-100">
					<header class="titre">
						<h1>A propos de nous</h1>
						<h2>ce qu'il faut savoir</h2>
					</header>
					<div class="couverture" style="background-image:url('<?php echo get_template_directory_uri(); ?>/img/image-event.jpg');">
					</div>
					<div class="liste-informations clearfix">
						<dl class="accordion">
							<?php if(get_field('informations')): ?>

								<?php while(has_sub_field('informations')): ?>

								<dt><h3><?php the_sub_field('titre'); ?></h3></dt>
								<dd><?php the_sub_field('texte'); ?></dd>

								<?php endwhile; ?>

							<?php endif; ?>
						</dl>
					</div>
				</div>
				<div class="equipe grid-35 tablet-grid-100 mobile-grid-100">
					<header class="titre">
						<h1>L'équipe</h1>
						<h2>derrière l'agenda.plus</h2>
					</header>
					<div class="liste-equipe clearfix">
						<ul>
							<?php
								$args = array(
									'post_type' => 'equipe',
									'posts_per_page' => -1
								);
								$the_query = new WP_Query( $args );
								if ( $the_query->have_posts() ) {
									while ( $the_query->have_posts() ) { $the_query->the_post();
										$photo = get_field("photo");
							?>
							<li>
								<img src="<?php echo $photo ['sizes']['equipe']; ?>" alt="photo equipe"/>
								<h3><?php the_field('nom_prenom'); ?></h3>
								<p><strong><?php the_field('fonction'); ?></strong><br>
								<a href="tel:<?php the_field('telephone'); ?>"><?php the_field('telephone'); ?></a>
								</p>
							</li>
							<?php
									}
								}
								wp_reset_postdata();
							?>
						</ul>
					</div>
					<div class="mais-aussi">
						<h3>Mais aussi</h3>
						<p>La Fédération Touristique du Luxembourg Belge (FTLB) - Le service Informatique Provincial</p>
						<img class="logo-province" src="<?php echo get_template_directory_uri(); ?>/img/LOGO_PROVINCE.svg" alt="logo de la province du luxembourg">
					</div>
				</div>
			</div>
		</div>
	</section>
	<section class="nous-contacter pad-top">
		<div class="wrapper clearfix">
			<div class="grid-100 tablet-grid-100 mobile-grid-100">
				<header class="titre aligncenter tablet-aligncenter mobile-aligncenter">
					<h1>Nous contacter</h1>
					<h2>Besoin de nous ?</h2>
				</header>
				<div class="text-intro-2 aligncenter tablet-aligncenter mobile-aligncenter">
					<p>Vous désirez nous contacter ? Envoyez-nous vos données et nous reviendrons vers vous dans les meilleurs délais.</p>
					<a href="<?php echo get_permalink(52593); ?>" class="voir-plus fond-noir">Envoyer</a>
				</div>
			</div>
		</div>
	</section>

</main>

<?php get_footer(); ?>