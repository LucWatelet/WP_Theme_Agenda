<?php /* Template Name: Inscription */ ?>

<?php get_header(); ?>

<main>
	
	<section class="inscription pad-top-bot aligncenter tablet-aligncenter mobile-alignleft">
		<div class="wrapper clearfix">
            <div class="grid-100 tablet-grid-100 mobile-grid-100 grid-parent">
				<div class="grid-50 suffixe-25 prefix-25 tablet-grid-70 tablet-suffixe-15 tablet-prefix-15 mobile-grid-100">
					<h1>Inscription</h1>
					<?php register_user_form(); ?>
				</div>
				
			</div>
		</div>
	</section>
	
</main>


<?php get_footer(); ?>