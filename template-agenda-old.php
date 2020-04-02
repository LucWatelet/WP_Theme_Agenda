<?php /* Template Name: Agenda */ ?>

<?php get_header(); ?>

<main>
	
	<?php include 'bouton-annonce.php'; ?>
	
	<section id="cherche-explore-organise" class="pad-top">
		<div class="wrapper clearfix">
			<div class="grid-100 tablet-grid-100 mobile-grid-100 grid-parent">
				<div class="grid-100 tablet-grid-100 mobile-grid-100">
					<div class="tab tab-page-agenda aligncenter tablet-aligncenter mobile-aligncenter">
						<header>
							<h1>Je cherche</h1><h2>un évènement</h2>
						</header>
					</div>
					<div id="cherche" class="tabcontent grid-100 tablet-grid-100 mobile-grid-100 pad-top-bot">
						<div id="formulaire-recherche">
							<form id="search" action="<?php echo home_url( '/' ); ?>">
								<ul class="clearfix">
									<li>
										<select name="quoi" id="quoi">
											<?php 
												/*Marchés et Brocantes*/
												$link[0]["name"] = "Brocantes et Marchés";
												$link[0]["url"] = "80";
												$link[0]["image"] = "picto-brocante.svg";
			//
			//									/*Concert*/
												$link[7]["name"] = "Concerts";
												$link[7]["url"] = "13";
												$link[7]["image"] = "picto-concert.svg";
			//
			//									/*Conférences, Rencontres et Salons*/
												$link[1]["name"] = "Conférences, rencontres et salons";
												$link[1]["url"] = "72";
												$link[1]["image"] = "picto-conference.svg";
			//
			//									/*Évènements sportifs*/
												$link[2]["name"] = "évènement sportifs";
												$link[2]["url"] = "70";
												$link[2]["image"] = "picto-sportif.svg";
			//
			//									/*Expositions*/
												$link[3]["name"] = "Expositions";
												$link[3]["url"] = "73";
												$link[3]["image"] = "picto-exposition.svg";
			//
			//									/*Festivals*/
												$link[4]["name"] = "Festivals";
												$link[4]["url"] = "74";
												$link[4]["image"] = "picto-festival.svg";
			//
			//									/*Fêtes*/
												$link[5]["name"] = "Fêtes Folklore";
												$link[5]["url"] = "75";
												$link[5]["image"] = "picto-folklore.svg";
			//
			//									/*Jeux*/
												$link[6]["name"] = "Jeux";
												$link[6]["url"] = "77";
												$link[6]["image"] = "picto-jeux.svg";
			//
			//									/*Projection Ciné-club*/
												$link[8]["name"] = "Projections";
												$link[8]["url"] = "71";
												$link[8]["image"] = "picto-projection.svg";

												/*Promenades*/
												$link[9]["name"] = "Promenades";
												$link[9]["url"] = "81";
												$link[9]["image"] = "picto-promenade.svg";

			//									/*Spectacles*/
												$link[10]["name"] = "Spectacles";
												$link[10]["url"] = "82";
												$link[10]["image"] = "picto-spectacles.svg";
			//
			//									/*Stages et Ateliers*/
												$link[11]["name"] = "Stage et Atelier";
												$link[11]["url"] = "83";
												$link[11]["image"] = "picto-stage.svg";

											foreach( $link as $key=>$value){
											?>
											<option value="Arlon"><?php echo($value["name"]); ?></option>
											
												<?php
												}
											?>
										</select>
									</li>
									<li>
										<?php
										
										   $args_loc = array (
												'show_option_all' => __( 'Localité' ),
												'orderby' => 'name',
												'order' => 'ASC',
												'show_count' => 1,
												'hide_empty' => 1,
												'echo' => 0,
												'name' => 'localite' ,
												'id' => 'localite',
												'hierarchical' => FALSE,
												'depth' => 1,
												'taxonomy' => HADES_TAXO_LOC,
												'hide_if_empty' => true,
												'value_field' => 'slug',
											);
										        // Y-a-t'il une ville actuellement sélectionnée ?
											if( get_query_var( 'localite' ) && ( $t = term_exists( get_query_var( 'localite' ), HADES_TAXO_LOC ) ) ) {
												$args_loc['selected'] = get_query_var( 'localite' );
											}

												$listloc = wp_dropdown_categories( $args_loc );

											// Afficher la liste s'il existe des villes associées à des contenus
											if( $listloc ){
												echo $listloc;
											}

										?>
									</li>
									<li>
										<select name="date" id="date">
											<option value="<?php echo date( "Ymd", time() ) . date( "Ymd", time() + (3600 * 24 * 365) ) ?>" >Pas de préférence</option>
											<option value="<?php echo date( "Ymd", time() ) ?>" >Aujourd'hui</option>
											<option value="<?php echo date( "Ymd", time() + (3600 * 24) ) ?>" >Demain</option>
											 <option value="<?php
												  $datedep = time();
												  while( date( 'N', $datedep ) < 5 )
													  {
													  $datedep+=(3600 * 24);
													  }
												  $n = date( 'N', $datedep );
												  echo date( "Ymd", $datedep ) . date( "Ymd", $datedep + (3600 * 24) * (7 - $n) );
												  ?>" >Ce week-end</option>
												  <option value="<?php echo date( "Ymd", time() ) . date( "Ymd", time() + (3600 * 24 * 7) ) ?>" >Les 7 prochains jours</option>
												  <option value="<?php echo date( "Ymd", time() ) . date( "Ymd", time() + (3600 * 24 * 30) ) ?>" >Les 30 prochains jours</option>
										</select>
									</li>
									<li>
										<select name="loc_rayon" id="localitesrayon">
											<option value="<?php echo get_query_var( 'localitesrayon' ) ?>">5</option>
											<option value="<?php echo get_query_var( 'localitesrayon' ) ?>">10</option>
											<option value="<?php echo get_query_var( 'localitesrayon' ) ?>">15</option>
											<option value="<?php echo get_query_var( 'localitesrayon' ) ?>">20</option>
											<option value="<?php echo get_query_var( 'localitesrayon' ) ?>">25</option>
											<option value="<?php echo get_query_var( 'localitesrayon' ) ?>">30</option>
										</select>
									</li>
									<li>
										<button id="search-btn" type="submit" value="Rechercher"></button>
									</li>
								</ul>
							</form>
						</div>
						<div id="liste-theme">
							<ul class="clearfix">
								
								<?php 
                    				/*Marchés et Brocantes*/
									$link[0]["name"] = "Brocantes et Marchés";
									$link[0]["url"] = "80";
									$link[0]["image"] = "picto-brocante.svg";
//
//									/*Concert*/
									$link[7]["name"] = "Concerts";
									$link[7]["url"] = "13";
									$link[7]["image"] = "picto-concert.svg";
//
//									/*Conférences, Rencontres et Salons*/
									$link[1]["name"] = "Conférences, rencontres et salons";
									$link[1]["url"] = "72";
									$link[1]["image"] = "picto-conference.svg";
//
//									/*Évènements sportifs*/
									$link[2]["name"] = "évènement sportifs";
									$link[2]["url"] = "70";
									$link[2]["image"] = "picto-sportif.svg";
//
//									/*Expositions*/
									$link[3]["name"] = "Expositions";
									$link[3]["url"] = "73";
									$link[3]["image"] = "picto-exposition.svg";
//
//									/*Festivals*/
									$link[4]["name"] = "Festivals";
									$link[4]["url"] = "74";
									$link[4]["image"] = "picto-festival.svg";
//
//									/*Fêtes*/
									$link[5]["name"] = "Fêtes Folklore";
									$link[5]["url"] = "75";
									$link[5]["image"] = "picto-folklore.svg";
//
//									/*Jeux*/
									$link[6]["name"] = "Jeux";
									$link[6]["url"] = "77";
									$link[6]["image"] = "picto-jeux.svg";
//
//									/*Projection Ciné-club*/
									$link[8]["name"] = "Projections";
									$link[8]["url"] = "71";
									$link[8]["image"] = "picto-projection.svg";

									/*Promenades*/
									$link[9]["name"] = "Promenades";
									$link[9]["url"] = "81";
									$link[9]["image"] = "picto-promenade.svg";

//									/*Spectacles*/
									$link[10]["name"] = "Spectacles";
									$link[10]["url"] = "82";
									$link[10]["image"] = "picto-spectacles.svg";
//
//									/*Stages et Ateliers*/
									$link[11]["name"] = "Stage et Atelier";
									$link[11]["url"] = "83";
									$link[11]["image"] = "picto-stage.svg";

									foreach( $link as $key=>$value){
										?>
									<div class="bloc grid-33 tablet-grid-100 mobile-grid-100">
										<li>
											<a href="./?cat=<?php echo($value["url"]); ?>">
												<img class="picto" src="<?php echo get_template_directory_uri(); ?>/img/<?php echo($value["image"]); ?>" alt="picto">
												<h3><?php echo($value["name"]); ?></h3>
											</a>
										</li>
									</div>
									<?php
									}
								?>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<section class="prochains-evenements-blog pad-top">
		<div class="wrapper clearifx">
			<div class="grid-100 tablet-grid-100 mobile-grid-100 grid-parent">
				<div class="liste-evenement-blog clearfix">
					<article class="grid-25 tablet-grid-50 mobile-grid-100">
						<a href="#">
							<div class="bg" style="background-image:url('<?php echo get_template_directory_uri(); ?>/img/image-event.jpg');">
								<img src="<?php echo get_template_directory_uri(); ?>/img/icon-categorie.svg" alt="icon">
								<div class="details">
									<span class="lieu">Arlon</span><br>
									<span class="date">05.08.2019</span>
									<h1 id="titre-evenement">Visite guidée du musée Athus et l’Acier</h1>
								</div>
							</div>
						</a>
					</article>
					<article class="grid-25 tablet-grid-50 mobile-grid-100">
						<a href="#">
							<div class="bg" style="background-image:url('<?php echo get_template_directory_uri(); ?>/img/image-event.jpg');">
								<img src="<?php echo get_template_directory_uri(); ?>/img/icon-categorie.svg" alt="icon">
								<div class="details">
									<span class="lieu">Arlon</span><br>
									<span class="date">05.08.2019</span>
									<h1 id="titre-evenement">Visite guidée du musée Athus et l’Acier</h1>
								</div>
							</div>
						</a>
					</article>
					<article class="grid-25 tablet-grid-50 mobile-grid-100">
						<a href="#">
							<div class="bg" style="background-image:url('<?php echo get_template_directory_uri(); ?>/img/image-event.jpg');">
								<img src="<?php echo get_template_directory_uri(); ?>/img/icon-categorie.svg" alt="icon">
								<div class="details">
									<span class="lieu">Arlon</span><br>
									<span class="date">05.08.2019 - 06.08.2019</span>
									<h1 id="titre-evenement">Visite guidée du musée Athus et l’Acier</h1>
								</div>
							</div>
						</a>
					</article>
					<article class="grid-25 tablet-grid-50 mobile-grid-100">
						<a href="#">
							<div class="bg" style="background-image:url('<?php echo get_template_directory_uri(); ?>/img/image-event.jpg');">
								<img src="<?php echo get_template_directory_uri(); ?>/img/icon-categorie.svg" alt="icon">
								<div class="details">
									<span class="lieu">Arlon</span><br>
									<span class="date">05.08.2019 - 06.08.2019</span>
									<h1 id="titre-evenement">Visite guidée du musée Athus et l’Acier</h1>
								</div>
							</div>
						</a>
					</article>
					<article class="grid-25 tablet-grid-50 mobile-grid-100">
						<a href="#">
							<div class="bg" style="background-image:url('<?php echo get_template_directory_uri(); ?>/img/image-event.jpg');">
								<img src="<?php echo get_template_directory_uri(); ?>/img/icon-categorie.svg" alt="icon">
								<div class="details">
									<span class="lieu">Arlon</span><br>
									<span class="date">05.08.2019 - 06.08.2019</span>
									<h1 id="titre-evenement">Visite guidée du musée Athus et l’Acier</h1>
								</div>
							</div>
						</a>
					</article>
					<article class="grid-25 tablet-grid-50 mobile-grid-100">
						<a href="#">
							<div class="bg" style="background-image:url('<?php echo get_template_directory_uri(); ?>/img/image-event.jpg');">
								<img src="<?php echo get_template_directory_uri(); ?>/img/icon-categorie.svg" alt="icon">
								<div class="details">
									<span class="lieu">Arlon</span><br>
									<span class="date">05.08.2019 - 06.08.2019</span>
									<h1 id="titre-evenement">Visite guidée du musée Athus et l’Acier</h1>
								</div>
							</div>
						</a>
					</article>
					<article class="grid-25 tablet-grid-50 mobile-grid-100">
						<a href="#">
							<div class="bg" style="background-image:url('<?php echo get_template_directory_uri(); ?>/img/image-event.jpg');">
								<img src="<?php echo get_template_directory_uri(); ?>/img/icon-categorie.svg" alt="icon">
								<div class="details">
									<span class="lieu">Arlon</span><br>
									<span class="date">05.08.2019 - 06.08.2019</span>
									<h1 id="titre-evenement">Visite guidée du musée Athus et l’Acier</h1>
								</div>
							</div>
						</a>
					</article>
					<article class="grid-25 tablet-grid-50 mobile-grid-100">
						<a href="#">
							<div class="bg" style="background-image:url('<?php echo get_template_directory_uri(); ?>/img/image-event.jpg');">
								<img src="<?php echo get_template_directory_uri(); ?>/img/icon-categorie.svg" alt="icon">
								<div class="details">
									<span class="lieu">Arlon</span><br>
									<span class="date">05.08.2019 - 06.08.2019</span>
									<h1 id="titre-evenement">Visite guidée du musée Athus et l’Acier</h1>
								</div>
							</div>
						</a>
					</article>
					<article class="grid-25 tablet-grid-50 mobile-grid-100">
						<a href="#">
							<div class="bg" style="background-image:url('<?php echo get_template_directory_uri(); ?>/img/image-event.jpg');">
								<img src="<?php echo get_template_directory_uri(); ?>/img/icon-categorie.svg" alt="icon">
								<div class="details">
									<span class="lieu">Arlon</span><br>
									<span class="date">05.08.2019 - 06.08.2019</span>
									<h1 id="titre-evenement">Visite guidée du musée Athus et l’Acier</h1>
								</div>
							</div>
						</a>
					</article>
				</div>
			</div>
		</div>
	</section>

</main>

<?php get_footer(); ?>