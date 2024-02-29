<?php /* Template Name: Reseaux liste sport */ ?>
<?php
if (isset($_GET['export'])) {
    ajax_for_excell($_GET['cat']);
}
 ?>
<?php
$categories_slugs=[
"karate-et-arts-martiaux","athletisme","badminton","baseball",
"basket-ball","centres-adeps","centres-sportifs","cyclisme","equitation","escalade",
"escrime","football","football-en-salle","aerobic",
"handball","handisport","hebertisme-et-yoga","hockey",
"marches-populaires","motocyclisme","orientation","peche","petanque",
"rugby","speleologie","plongee","tennis-de-table",
"tennis","tir","tir-a-larc","volley-ball"];
?>
<?php get_header(); ?>

<main class="pad-bot">
    <section id="cherche-explore-organise" class="culture-sport">
        <div class="wrapper clearfix">
            <div class="grid-100 tablet-grid-100 mobile-grid-100 grid-parent">
                <div class="grid-100 tablet-grid-100 mobile-grid-100">
                    <div class="tab">
						<button class="tablinks2"><a href="<?php echo get_permalink(62119); ?>"><h1>Culture</h1></a></button>
						<button class="tablinks2 active"><h1>Sport</h1></button>
					</div>
					<div id="sport" class="tabcontent grid-100 tablet-grid-100 mobile-grid-100">
						<?php 
						$selected_cat=$_GET['cat']?$_GET['cat']:null;
						include 'hades/include/inc_category_elements_list.php'; 
						?>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
<?php get_footer(); ?>