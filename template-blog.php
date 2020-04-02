<?php /* Template Name: Blog */ ?>

<?php get_header(); ?>

<main>
	
	<?php include 'bouton-annonce.php'; ?>
	
	<section class="prochains-evenements-blog pad-top">
		<div class="wrapper clearifx">
			<div class="grid-100 tablet-grid-100 mobile-grid-100 grid-parent">
				<div class="grid-75 tablet-grid-100 mobile-grid-100">
					<div class="liste-evenement-blog clearfix">
						<div class="bg-image-micro liste"></div>
						<article class="titre grid-33 tablet-grid-50 mobile-grid-100">
							<header>
								<h1>Blog</h1>
								<h2>Derniers articles</h2>
							</header>
						</article>
						<?php
					
						$today = date( 'Y-m-d' );
					
						$args = array(
							'post_type' => 'blog',
							'meta_key' => 'date',
							'orderby' => 'meta_value',
							'order' => 'ASC',
							'posts_per_page' => -1,
							'meta_query' => array(
								array(
									'key' => 'date',
									'value' => $today,
									'compare' => '>=',
									'type' => 'DATE'
								)
							)
						);
						$the_query = new WP_Query( $args );
						if ( $the_query->have_posts() ) {
							while ( $the_query->have_posts() ) { $the_query->the_post();
								$photo = get_field("photo");
					?>
						
					<article class="grid-33 tablet-grid-50 mobile-grid-100">
						<a href="<?php the_permalink(); ?>">
							<div class="bg" style="background-image:url('<?php echo $photo ['url']; ?>');">
								<div class="details">
									<span class="date"><?php the_field('date'); ?></span>
									<h1 id="titre-evenement"><?php the_title(); ?></h1>
								</div>
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
				<div class="grid-25 tablet-grid-100 mobile-grid-100">
					<div class="liste-archives">

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
		</div>
	</section>

</main>

<?php get_footer(); ?>