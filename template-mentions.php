<?php /* Template Name: Mentions Légales */ ?>

<?php get_header(); ?>

<main>
	
	<?php include 'bouton-annonce.php'; ?>
	
	<section class="mentions-legales pad-top-bot">
		<div class="wrapper clearfix">
			<div class="grid-100 tablet-grid-100 mobile-grid-100 grid-parent">
				<h1><?php the_field('titre')?></h1>
				<?php the_field('texte')?>
			</div>
		</div>
	</section>

	
</main>

<?php get_footer(); ?>
	
	