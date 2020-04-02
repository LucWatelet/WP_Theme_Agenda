<?php /* Template Name: Publications */ ?>

<?php get_header(); ?>

<main>
	
	<?php include 'bouton-annonce.php'; ?>
	
	<section class="publications pad-top">
		<div class="wrapper clearfix">
			<div class="grid-100 tablet-grid-100 mobile-grid-100 grid-parent">
				<div class="liste-livre clearfix">
					<div class="bg-image-lunettes"></div>
					<article class="titre grid-25 tablet-grid-50 mobile-grid-100">
						<header>
							<h1>Publications</h1>
							<h2>Nos livres sur le patrimoine luxembourgeois</h2>
						</header>
					</article>
					<?php
						$args = array(
							'post_type' => 'livres',
							'posts_per_page' => -1
						);
						$the_query = new WP_Query( $args );
						if ( $the_query->have_posts() ) {
							while ( $the_query->have_posts() ) { $the_query->the_post();
								$photo = get_field("image");
								
					?>
					<article class="liste grid-25 tablet-grid-50 mobile-grid-100 aligncenter tablet-aligncenter mobile-alignleft">
						<a href="<?php the_permalink(); ?>">
							<img class="photo-livre" src="<?php echo $photo ['sizes']['livre']; ?>" />
							<h1><?php the_title(); ?></h1>
							<p><strong><?php the_field('auteur'); ?></strong><br><?php the_field('extrait'); ?></p>
							<div class="panier">
								<img class="picto" src="<?php echo get_template_directory_uri(); ?>/img/panier.svg" alt="Ajouter au panier"><p><strong><?php the_field('prix'); ?>€</strong></p>
							</div>
						</a>
					</article>
					<?php
							}
						}
						wp_reset_postdata();
					?>
				</div>
			</div>
		</div>
	</section>

</main>

<?php get_footer(); ?>