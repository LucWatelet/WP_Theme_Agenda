<?php /* Template Name: Blog */ ?>

<?php get_header(); ?>

<main>
	
	<section class="prochains-evenements-blog pad-top">
		<div class="wrapper clearifx">
			<div class="grid-100 tablet-grid-100 mobile-grid-100 grid-parent">
				<div class="grid-75 tablet-grid-100 mobile-grid-100">
					<p class="intro">Bienvenue sur le blog de lagenda.plus. Soyez curieux, découvrez autrement les mondes culturels et sportifs du Luxembourg belge à travers différents focus.</p>
					<fieldset data-filter-group>
						<div class="line">
							<label for="all">
								<input type="radio" class="filter" name="blog" id="all" data-filter="all" checked> <span>Toutes</span>
							</label>
						</div>

						<?php
							$categories = get_terms(array(
								'taxonomy' => 'filtres_blog',
								'hide_empty' => false
							));
							foreach($categories as $categorie) {
						?>
						<div class="line">
							<label for="<?php echo $categorie->slug; ?>">
								<input type="radio" class="filter" name="blog" id="<?php echo $categorie->slug; ?>" data-filter=".<?php echo $categorie->slug; ?>"> <span><?php echo $categorie->name; ?></span>
							</label>
						</div>
						<?php
							}
						?>
					</fieldset>
					<div class="liste-evenement-blog clearfix">
						<div class="bg-image-micro liste"></div>
						<article class="titre grid-33 tablet-grid-50 mobile-grid-100 grid-parent">
							<header>
								<h1>Blog</h1>
								<h2>Articles récents</h2>
							</header>
						</article>
						<?php
						
						$today_annee = date( 'Y' );
						$custom_post_type  = 'blog';
						$custom_date_field = 'date';
						$order  = 'DESC';

						$args = array(
							'post_type' => $custom_post_type,
							'meta_key' => $custom_date_field,
							'orderby' => 'meta_value',
							'order' => $order,
							'posts_per_page' => 8
						);

						$the_query = new WP_Query( $args );
						if ( $the_query->have_posts() ) {
							while ( $the_query->have_posts() ) { $the_query->the_post();
								$photo = get_field("photo_de_couverture");
																
								$categories = get_the_terms( $post->ID, 'filtres_blog' );
								$links = array();

								foreach($categories as $categorie) {
									$links[] = $categorie->slug;
								}
																
								$tax_links = join( " ", str_replace(' ', '-', $links));
								$tax = strtolower($tax_links);
																
					?>

					<article class="grid-33 tablet-grid-50 mobile-grid-100 grid-parent mix <?php echo $tax; ?>">
						<a href="<?php the_permalink(); ?>">
							<div class="bg" style="background-image:url('<?php echo $photo ['url']; ?>');">
								<div class="details">
									<span class="date">Publié le <br><?php the_field('date'); ?></span>
									<h1 id="titre-evenement"><?php the_title(); ?></h1>
								</div>
							</div>
						</a>
					</article>

					<?php
							}
						}
						else{ ?>
							<h1>Il n'y a aucun article pour le moment</h1>
					<?php
							}
						wp_reset_postdata();
					?>
					</div>
					<div class="lien-page-contact">
						<a href="<?php echo get_permalink(52593); ?>" class="bouton">Participez en proposant votre article</a>
						<h3>Partagez:</h3>
						<?php echo do_shortcode('[DISPLAY_ULTIMATE_SOCIAL_ICONS]'); ?>
					</div>
				</div>
				<div class="date grid-25 tablet-grid-100 mobile-grid-100">
					<div class="liste-archives">
						<header><h1>Archives</h1></header>
						<div id="accordion">
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

										setlocale(LC_ALL,'fr_FR.utf8','fra');
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
		</div>
	</section>
	
	<script>
		
		$(document).ready(function () {
			var containerEl = document.querySelector('.liste-evenement-blog');
			var config = {
				animation: {
					enable: false
				}
			};
			var mixer = mixitup(containerEl, config);
		});

	</script>

</main>

<?php get_footer(); ?>