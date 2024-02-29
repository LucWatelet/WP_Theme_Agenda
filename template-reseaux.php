<?php /* Template Name: Cartes et repertoires */ ?>

<?php get_header(); ?>

<main>

	<section id="cherche-explore-organise" class="cherche-explore-organise">
        <div class="wrapper clearfix">
            <div class="grid-100 tablet-grid-100 mobile-grid-100 grid-parent">
                <div class="grid-100 tablet-grid-100 mobile-grid-100">
                   <div class="tab tab-page-agenda aligncenter tablet-aligncenter mobile-aligncenter">
                        <header>
                            <h1>J'explore</h1><h2>Cartes et Répertoires</h2>
                        </header>
                    </div>
                    <div class="tabcontent explore grid-100 tablet-grid-100 mobile-grid-100 pad-bloc">
                        <div id="lien-explore" class="clearfix">
                            <article class="grid-50 tablet-grid-50 mobile-grid-100">
                                <img class="picto" src="<?php echo get_template_directory_uri(); ?>/img/picto-spectacles-2.svg" alt="picto culture">
                                <h1>Culture</h1>
                                <div class="border"></div>
                                <a href="<?php echo get_permalink(62119); ?>" class="voir-plus transparant">Voir plus</a>
                            </article>
                            <article class="grid-50 tablet-grid-50 mobile-grid-100">
                                <img class="picto" src="<?php echo get_template_directory_uri(); ?>/img/picto-promenade.svg" alt="picto sportif">
                                <h1>Sport</h1>
                                <div class="border"></div>
                                <a href="<?php echo get_permalink(62121); ?>" class="voir-plus transparant">Voir plus</a>
                            </article>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

</main>

<?php get_footer(); ?>