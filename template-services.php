<?php /* Template Name: Services */ ?>

<?php get_header(); ?>

<main>

	<section id="cherche-explore-organise" class="cherche-explore-organise">
        <div class="wrapper clearfix">
            <div class="grid-100 tablet-grid-100 mobile-grid-100 grid-parent">
                <div class="grid-100 tablet-grid-100 mobile-grid-100">
                   <div class="tab tab-page-agenda aligncenter tablet-aligncenter mobile-aligncenter">
                        <header>
                            <h1>J'organise</h1><h2>Soutiens provinciaux</h2>
                        </header>
                    </div>
                    <div class="tabcontent organise grid-100 tablet-grid-100 mobile-grid-100">
                        <div class="liste-organise-event clearfix">
                            <article class="grid-33 tablet-grid-50 mobile-grid-100 aligncenter tablet-aligncenter mobile-aligncenter">
                                <div class="ligne-verte">
                                    <img class="picto" src="<?php echo get_template_directory_uri(); ?>/img/picto-annonce.svg" alt="picto annonce gratuite">
                                    <h1>Poster une annonce gratuitement</h1>
                                    <a href="<?php echo get_permalink(63574); ?>" class="voir-plus transparant">Voir plus</a>
                                </div>
                            </article>
                            <article class="grid-33 tablet-grid-50 mobile-grid-100 aligncenter tablet-aligncenter mobile-aligncenter">
								<img class="picto" src="<?php echo get_template_directory_uri(); ?>/img/picto-materiel.svg" alt="picto materiel">
								<h1>Réserver<br> du matériel</h1>
								<a href="<?php echo get_permalink(63578); ?>" class="voir-plus transparant">Voir plus</a>
                            </article>
                            <div class="border hide-on-mobile"></div>
							<article class="grid-33 tablet-grid-50 mobile-grid-100 aligncenter tablet-aligncenter mobile-aligncenter">
									<img class="picto" src="<?php echo get_template_directory_uri(); ?>/img/picto-concert-2.svg" alt="picto culture">
									<h1>Proposer une offre de concert</h1>
									<a href="<?php echo get_permalink(63581); ?>" class="voir-plus transparant">Voir plus</a>
                            </article>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>



<?php get_footer(); ?>