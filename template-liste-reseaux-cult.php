<?php /* Template Name: Reseaux liste Culture */ ?>
<?php
if (isset($_GET['export'])) {
    ajax_for_excell($_GET['cat']);
}
 ?>
<?php
$categories_slugs=[
"academies","artisans-dart","bibliotheques",
"centres-culturels","galeries-et-centres-dexpositions",
"centres-dexpression-et-creativite",
"cercles-dhistoire",
"chorales","cine-clubs","cinemas-et-theatres",
"harmonies-et-fanfares","ludotheques","centres-maisons-de-jeunes","musees",
"organisateurs-de-festivals","sites-archeologiques",
"troupes-de-theatre","troupes-de-dances"];
?>
<?php get_header(); ?>

<main class="pad-bot">
    <section id="cherche-explore-organise" class="culture-sport">
        <div class="wrapper clearfix">
            <div class="grid-100 tablet-grid-100 mobile-grid-100 grid-parent">
                <div class="grid-100 tablet-grid-100 mobile-grid-100">
                    <div class="tab">
						<button class="tablinks2 active"><h1>Culture</h1></button>
						<button class="tablinks2 "><a href="<?php echo get_permalink(62121); ?>"><h1>Sport</h1></a></button>
                    </div>
                    <div id="culture" class="tabcontent grid-100 tablet-grid-100 mobile-grid-100">
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