<?php /* Template Name: Services */ ?>

<?php get_header(); ?>

<main>
	
	<?php include 'bouton-annonce.php'; ?>
	
	<section id="barre-services">
		<div class="wrapper clearfix">
			<div class="grid-100 tablet-grid-100 mobile-grid-100 grid-parent">
				<nav id="menu-services">
					<ul class="clearfix">
						<?php
							$args = array(
								'post_type' => 'services',
								'orderby' => 'menu_order',
								'posts_per_page' => -1
							);
							$the_query = new WP_Query( $args );
							if ( $the_query->have_posts() ) {
								while ( $the_query->have_posts() ) { $the_query->the_post();
						?>
						<li><a href="#<?php the_field('id'); ?>"><?php the_title(); ?></a></li>
						<?php
								}
							}
							wp_reset_postdata();
						?>
					</ul>
				</nav>
			</div>
		</div>
	</section>
	<section class="liste-services pad-top">
		<div class="wrapper clearfix">
			<div class="grid-100 tablet-grid-100 mobile-grid-100 grid-parent">
				<header class="titre aligncenter tablet-aligncenter mobile-aligncenter">
					<h1>J'organise</h1>
					<h2>Un évènement</h2>
				</header>
				<?php
					$args = array(
						'post_type' => 'services',
						'orderby' => 'menu_order',
						'posts_per_page' => -1
					);
					$the_query = new WP_Query( $args );
					if ( $the_query->have_posts() ) {
						while ( $the_query->have_posts() ) { $the_query->the_post();
							$photo = get_field("picto");
				?>
				<div class="bloc-service clearfix" id="<?php the_field('id'); ?>">
					<div class="information-service grid-60 tablet-grid-100 mobile-grid-100">
						<img class="picto" src="<?php echo $photo ['sizes']['picto']; ?>" alt="picto services">
						<h1><?php the_title(); ?></h1>
						<?php the_field('video'); ?>
						<?php the_field('description'); ?>
						<div class="liste-bouton">
						<?php 
							$file_form = get_field('formulaire_fichier');

							if( $file_form ): ?>
								<a href="<?php echo $file_form['url']; ?>" class="voir-plus fond-noir grand" target="_blank">Remplir le formulaire</a>
							<?php endif; ?>
							<?php
							$file_regl = get_field('reglement');

							if( $file_regl ): ?>
								<a href="<?php echo $file_regl['url']; ?>" class="voir-plus fond-noir grand" target="_blank">Réglement</a>
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
				</div>
				<div class="separateur-service"></div>
				<?php
						}
					}
					wp_reset_postdata();
				?>
			</div>
		</div>
	</section>
</main>

<?php get_footer(); ?>