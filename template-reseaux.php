<?php /* Template Name: Reseaux Culture */ ?>

<?php get_header(); ?>

<main class="pad-bot">

	<?php include 'bouton-annonce.php'; ?>
	
	<section id="cherche-explore-organise" class="culture-sport pad-top-bot">
		<div class="wrapper clearfix">
			<div class="grid-100 tablet-grid-100 mobile-grid-100 grid-parent">
				<div class="grid-100 tablet-grid-100 mobile-grid-100">
					<div class="tab">
						<button class="tablinks active" onclick="openChoice(event, 'culture')"><h1>Culture</h1></button>
						<button class="tablinks"><a href="<?php echo get_permalink(52776); ?>"><h1>Sport</h1></a></button>
					</div>
					<div id="culture" class="tabcontent grid-100 tablet-grid-100 mobile-grid-100 pad-top">
						<?php echo do_shortcode('[hades_map_search categories="academies,artisans-dart,bibliotheques,centres-culturels,centres-dexpression-et-creativite,centres-maisons-de-jeunes,cercles-dhistoire,chorales,cine-clubs,cinemas-et-theatres,galeries-et-centres-dexpositions,groupes-de-musique-amplifiees,harmonies-et-fanfares,ludotheques,mediatheques,musees,organisateurs-de-festivals,sites-archeologiques,troupes-de-theatre,troupes-de-dances"]'); ?>
					</div>
				</div>
			</div>
		</div>
	</section>

</main>

<?php get_footer(); ?>