<?php /* Template Name: About */ ?>

<?php get_header(); ?>

<main>
	<section class="about pad-top">
		<div class="wrapper clearfix">
			<div class="grid-70 suffixe-15 prefix-15 tablet-grid-100 mobile-grid-100">
				<header>
					<h1>A propos de nous</h1>
					<h2>ce qu'il faut savoir</h2>
				</header>
				<?php $photo = get_field('photo'); ?>
				<img src="<?php echo $photo["url"]; ?>">
				<div class="liste-informations clearfix">
					<dl class="accordion">
						<?php if(get_field('content')): ?>

							<?php while(has_sub_field('content')): ?>

							<dt><h3><?php the_sub_field('titre'); ?></h3></dt>
							<dd><?php the_sub_field('texte'); ?></dd>

							<?php endwhile; ?>

						<?php endif; ?>
					</dl>
				</div>
			</div>
		</div>
	</section>

</main>

<?php get_footer(); ?>