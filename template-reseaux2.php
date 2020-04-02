<?php /* Template Name: Reseaux Sport */ ?>

<?php get_header(); ?>

<main class="pad-bot">

	<?php include 'bouton-annonce.php'; ?>
	
	<section id="cherche-explore-organise" class="culture-sport pad-top-bot">
		<div class="wrapper clearfix">
			<div class="grid-100 tablet-grid-100 mobile-grid-100 grid-parent">
				<div class="grid-100 tablet-grid-100 mobile-grid-100">
					<div class="tab">
						<button class="tablinks2"><a href="<?php echo get_permalink(52589); ?>"><h1>Culture</h1></a></button>
						<button class="tablinks2 active"><h1>Sport</h1></button>
					</div>
					<div id="sport" class="tabcontent2 grid-100 tablet-grid-100 mobile-grid-100 pad-top">
						<?php echo do_shortcode('[hades_map_search categories="aerobic,baseball,basket-ball,karate-et-arts-martiaux,athletisme,badminton,centres-adeps,centres-sportifs,cyclisme,equitation,escalade,escrime,football,football-en-salle,gymnastique,handball,handisport,hockey,rugby,hebertisme-et-yoga,marches-populaires,natation,orientation,peche,petanque,plongee,speleologie,tennis-de-table,tennis,tir,tir-a-larc,volley-ball"]'); ?>
					</div>
				</div>
			</div>
		</div>
	</section>

</main>

<?php get_footer(); ?>