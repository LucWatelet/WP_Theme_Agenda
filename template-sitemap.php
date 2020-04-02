<?php /* Template Name: Sitemap */ ?>

<?php get_header(); ?>

<main>
	
	<?php include 'bouton-annonce.php'; ?>
	
	<section class="sitemap pad-top-bot">
		<div class="wrapper clearfix">
			<div class="grid-100 tablet-grid-100 mobile-grid-100">
				<?php echo do_shortcode('[wp_sitemap_page only="page" sort="menu_order"] '); ?>
			</div>
		</div>
	</section>
	
</main>

<?php get_footer(); ?>