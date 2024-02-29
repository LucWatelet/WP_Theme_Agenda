<?php get_header(); ?>

<main>
	
	<section class="evenement-blog-details pad-top">
		<div class="wrapper clearfix">
			<div class="grid-100 tablet-grid-100 mobile-grid-100 grid-parent">
				<div class="grid-75 tablet-grid-100 mobile-grid-100 alignleft tablet-alignleft mobile-alignleft">
					<div class="lien-prec">
						<a href="<?php echo $_SERVER['HTTP_REFERER']; ?>" class="retour"><img src="<?php echo get_template_directory_uri(); ?>/img/fleche-retour.svg"> Retour au Blog</a>
					</div>
					<header>
						<?php $lieu = get_field('lieu'); ?>
						<h1><?php the_title(); ?></h1>
						<h2>Publié le <?php the_field('date'); ?></h2>
						<?php if($lieu): ?><h3>Lieu: <?php echo $lieu; ?></h3> <?php endif; ?>
					</header>
				
				<div class="details-blog">
					
					<?php $photo = get_field("photo_de_couverture"); ?>

					<?php $coordonnees = get_field('coordonnees'); ?>
					<?php if($coordonnees): ?>
					<div class="bloc-infos">
						<?php echo $coordonnees; ?>
					</div>
					<?php endif; ?>
					
					
					<?php if( have_rows('module') ): ?>
						<?php while( have_rows('module') ): the_row(); ?>

							<?php if( get_row_layout() == 'texte' ): ?>

								<?php $text = get_sub_field('texte'); ?>

									<?php echo $text; ?>

							<?php endif; ?>


							<?php if( get_row_layout() == 'medias' ): ?>

								<?php
									$images = get_sub_field('galerie_photo');
									$photo = get_sub_field('image');
									$video = get_sub_field('video');
								?>

							<div class="liste-photo-blog clearfix">

								<?php if( $images ): ?>
									<ul>
										<?php foreach( $images as $image ): ?>

											<li>
												<a href="<?php echo esc_url($image['url']); ?>" data-fancybox="image" data-caption="<?php echo $photo["caption"]; ?>">
													 <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
												</a>
											</li>

										<?php endforeach; ?>
									</ul>
								<?php endif; ?>

								<?php if( $photo ): ?>

									<a href="<?php echo $photo['url']; ?>" data-fancybox="image" data-caption="<?php echo $photo["caption"]; ?>">
										<img class="photo" src="<?php echo $photo['url']; ?>" alt="<?php echo $photo['alt']; ?>" />
									</a>
								<?php endif; ?>

							<?php if( $video ): ?>

								<p><?php echo $video; ?></p>

								<?php endif; ?>
							</div>

							<?php endif; ?>


					<?php endwhile; ?>
				<?php endif; ?>


				</div>
					
				<div class="form-comment">
					
					<?php if ( is_user_logged_in() ){ ?>
						<h1>Laissez un commentaire:</h1>
					<?php } ?>
					
					<?php comments_template( '', true ); ?>
					
					<?php if ( is_user_logged_in() ){ ?>
					<p>Nous respectons votre vie privée: <a href="<?php echo get_permalink(52762); ?>">Mentions légales</a></p>
					<?php } ?>
					
					<?php if ( ! is_user_logged_in() ){ ?>
					<p>Vous devez <a href="<?php echo get_permalink(61188); ?>">être connecté</a> pour laisser un commentaire.</p>
				<?php } ?>
				</div>
					
				</div>
				<div class="date grid-25 tablet-grid-100 mobile-grid-100">
					<div id="accordion">
						<header><h1>Archives</h1></header>
						<ul class="clearfix">
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
									$dateformatstring = "%Y";
									$date_annee = strtotime( get_post_meta( get_the_ID(), $custom_date_field, true ) );
									$annee = strftime($dateformatstring, $date_annee);

									$dateformatstring = "%B";
									$date_mois = strtotime( get_post_meta( get_the_ID(), $custom_date_field, true ) );
									$months = strftime($dateformatstring, $date_mois);

									$all_blog[ $annee ][ $months ][] = $the_query->post;


								}
							}
							wp_reset_postdata();

							?>

						<?php foreach ( $all_blog as $annee => $months ) : ?>
							 <li class='has-sub'><a href='#'><?php echo $annee; ?></a>
								<ul>
							<?php foreach ($months as $month => $events ) : ?>
								<li class='has-sub'><a href='#'>- <?php echo $month; ?></a>
									<ul>
									<?php foreach ($events as $event ) : ?>

										<li>

											<a href="<?php echo get_permalink($event->ID); ?>">
												-  <?php echo $event->post_title; ?>
											 </a>

										</li>

									<?php endforeach; ?>
									</ul>
								</li>

							<?php endforeach; ?>
								</ul>
							</li>
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
