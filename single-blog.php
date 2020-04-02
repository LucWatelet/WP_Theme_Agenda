<?php get_header(); ?>

<main>
	
	<?php include 'bouton-annonce.php'; ?>
	
	<section class="evenement-blog-details pad-top">
		<div class="wrapper clearfix">
			<div class="grid-100 tablet-grid-100 mobile-grid-100 grid-parent">
				<div class="grid-75 tablet-grid-100 mobile-grid-100 alignleft tablet-alignleft mobile-alignleft">
					<div class="lien-prec">
						<a href="<?php echo get_permalink(52595); ?>" class="retour"><img src="<?php echo get_template_directory_uri(); ?>/img/fleche-retour.svg"> Retour au Blog</a>
					</div>
					<header class="titre">
						<h1><?php the_title(); ?></h1>
						<h2><?php the_field('date'); ?></h2>
					</header>
				
				<div class="details">
					<?php $photo = get_field("photo"); ?>
<!--					<div class="photo-couverture" style="background-image:url('<?php echo $photo ['url']; ?>');"></div>
-->
					<img class="photo-event" src="<?php echo $photo ['url']; ?>" alt="photo">
					<div class="informations-evenement">
						<h3>Descripton :</h3>
						<?php the_field('description'); ?>
					</div>
				</div>
				<div class="form-comment">
					<?php comments_template( '', true ); ?>	
				</div>
				</div>
				<div class="date grid-25 tablet-grid-100 mobile-grid-100">
					<ul>
							
						<?php

							$today = date( 'Y-m-d' );
							$custom_post_type  = 'blog';
							$custom_date_field = 'date';
							$order  = 'DESC';

							$args = array(
								'post_type' => $custom_post_type,
								'meta_key' => $custom_date_field,
								'orderby' => 'meta_value',
								'order' => $order,
								'posts_per_page' => -1,
								'meta_query' => array(
									array(
										'key' => 'date',
										'value' => $today,
										'compare' => '<',
										'type' => 'DATE'
									)
								)
							);
							
										
							$all_blog = [];
					
							$the_query = new WP_Query( $args );
							if ( $the_query->have_posts() ) {
								while ( $the_query->have_posts() ) { $the_query->the_post();

									setlocale(LC_ALL, 'fr_FR.utf8','fra');
									$dateformatstring = "%B %Y";
									$date = strtotime( get_post_meta( get_the_ID(), $custom_date_field, true ) );
									$month_year = strftime($dateformatstring, $date);

									$all_blog[ $month_year ][] = $the_query->post;
								}
							}
							wp_reset_postdata();

							?>
							<?php foreach ( $all_blog as $month_year => $events ) : ?>
								<h1 class="mois"><?php echo $month_year ?></h1>
								<?php foreach ( $events as $event ) : ?>
							<li>
								<a href="<?php echo get_permalink($event->ID);?>">
									<span class="date"><?php the_field( 'date', $event->ID ); ?></span>
									<h1 id="titre-evenement"><?php echo $event->post_title; ?></h1>
								</a>
							</li>
							<?php endforeach; ?>
							<div class="border"></div>
						<?php endforeach; ?>
						</ul>
				</div>
			</div>
		</div>
	</section>
	
	
</main>


<?php get_footer(); ?>