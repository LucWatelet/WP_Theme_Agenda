<?php get_header(); ?>

<main>
	
	<?php include 'bouton-annonce.php'; ?>
	
	<section class="livre-details pad-top">
		<div class="wrapper clearfix">
			<div class="grid-100 tablet-grid-100 mobile-grid-100 grid-parent">
				<div class="lien-prec grid-100 tablet-grid-100 mobile-grid-100">
					<a href="<?php echo get_permalink(52587); ?>" class="retour"><img src="<?php echo get_template_directory_uri(); ?>/img/fleche-retour.svg">Retour à la page publications</a>
				</div>
				<header class="titre grid-100 tablet-grid-100 mobile-grid-100 alignleft tablet-alignleft mobile-alignleft">
					<h1><?php the_title(); ?></h1>
					<h2><?php the_field('date_de_publication'); ?></h2>
				</header>
				<div class="liste-informations clearfix">
					<div class="photo-livre grid-35 tablet-grid-40 mobile-grid-100">
						<?php $photo = get_field("image"); ?>
						<img class="photo-livre" src="<?php echo $photo ['sizes']['livre']; ?>" />
					</div>
					<div class="informations-livre grid-65 tablet-grid-60 mobile-grid-100">
						<h3><?php the_field('prix'); ?>€</h3>
						<p><strong><?php the_field('auteur'); ?></strong><br><?php the_field('extrait'); ?></p>
						<h3>Descripton :</h3>
						<?php the_field('description'); ?>
						<div class="lien-acheter alignleft tablet-alignleft mobile-alignleft">
							<a href="#" class="voir-plus fond-noir">Acheter</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
</main>


<?php get_footer(); ?>