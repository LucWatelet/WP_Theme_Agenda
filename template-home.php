<?php /* Template Name: Home */ ?>

<?php get_header(); ?>

<main>

    <?php include 'bouton-annonce.php'; ?>

    <section id="cherche-explore-organise" class="cherche-explore-organise">
        <div class="wrapper clearfix">
            <div class="grid-100 tablet-grid-100 mobile-grid-100 grid-parent">
                <div class="grid-100 tablet-grid-100 mobile-grid-100">
                    <div class="tab">
                        <button class="tablinks active" onclick="openChoice(event, 'cherche')"><h1>Je cherche</h1><h2>Agenda du Luxembourg</h2></button>
                        <button class="tablinks" onclick="openChoice(event, 'explore')"><h1>J'explore</h1><h2>Cartes et répertoires</h2></button>
                        <button class="tablinks" onclick="openChoice(event, 'organise')"><h1>J'organise</h1><h2>Soutiens provinciaux</h2></button>
                    </div>
                    <div id="cherche" class="tabcontent grid-100 tablet-grid-100 mobile-grid-100 pad-top-bot">
                        <?php include 'hades/include/inc_search_form.php'; ?>
                    </div>
                    <div id="explore" class="tabcontent grid-100 tablet-grid-100 mobile-grid-100 pad-bloc">
                        <div id="lien-explore" class="clearfix">
                            <article class="grid-50 tablet-grid-50 mobile-grid-100 aligncenter tablet-aligncenter mobile-aligncenter">
                                <img class="picto" src="<?php echo get_template_directory_uri(); ?>/img/picto-spectacles-2.svg" alt="picto culture">
                                <h1>Culture</h1>
                                <div class="border"></div>
                                <a href="<?php echo get_permalink(52589); ?>" class="voir-plus transparant">Voir plus</a>
                            </article>
                            <article class="grid-50 tablet-grid-50 mobile-grid-100 aligncenter tablet-aligncenter mobile-aligncenter">
                                <img class="picto" src="<?php echo get_template_directory_uri(); ?>/img/picto-promenade.svg" alt="picto sportif">
                                <h1>Sport</h1>
                                <div class="border"></div>
                                <a href="<?php echo get_permalink(52776); ?>" class="voir-plus transparant">Voir plus</a>
                            </article>
                        </div>
                    </div>
                    <div id="organise" class="tabcontent grid-100 tablet-grid-100 mobile-grid-100 pad-bloc">
                        <div class="liste-organise-event clearfix">
                            <article class="grid-33 tablet-grid-50 mobile-grid-100 aligncenter tablet-aligncenter mobile-aligncenter">
                                <div class="ligne-verte">
                                    <img class="picto" src="<?php echo get_template_directory_uri(); ?>/img/picto-annonce.svg" alt="picto annonce gratuite">
                                    <h1>Poster une annonce gratuitement</h1>
                                    <a href="<?php echo get_permalink(52591); ?>#annonce" class="voir-plus transparant">Voir plus</a>
                                </div>
                            </article>
                            <article class="grid-33 tablet-grid-50 mobile-grid-100 aligncenter tablet-aligncenter mobile-aligncenter">
                                <div class="ligne-verte">
                                    <img class="picto" src="<?php echo get_template_directory_uri(); ?>/img/picto-materiel.svg" alt="picto materiel">
                                    <h1>Réserver du matériel</h1>
                                    <a href="<?php echo get_permalink(52591); ?>#materiel" class="voir-plus transparant">Voir plus</a>
                                </div>
                            </article>
                            <article class="grid-33 tablet-grid-50 mobile-grid-100 aligncenter tablet-aligncenter mobile-aligncenter">
                                <img class="picto" src="<?php echo get_template_directory_uri(); ?>/img/picto-impresion.svg" alt="picto culture">
                                <h1>Demander une aide à l'impression</h1>
                                <a href="<?php echo get_permalink(52591); ?>#impression" class="voir-plus transparant">Voir plus</a>
                            </article>
                            <div class="border hide-on-mobile"></div>
                            <article class="grid-33 tablet-grid-50 mobile-grid-100 aligncenter tablet-aligncenter mobile-aligncenter">
                                <div class="ligne-verte">
                                    <img class="picto" src="<?php echo get_template_directory_uri(); ?>/img/picto-salle.svg" alt="picto culture">
                                    <h1>Louer une salle du Palais abbatial</h1>
                                    <a href="<?php echo get_permalink(52591); ?>#palais" class="voir-plus transparant">Voir plus</a>
                                </div>
                            </article>
                            <article class="grid-33 tablet-grid-50 mobile-grid-100 aligncenter tablet-aligncenter mobile-aligncenter">
                                <img class="picto" src="<?php echo get_template_directory_uri(); ?>/img/picto-concert-2.svg" alt="picto culture">
                                <h1>Proposer une offre de concert</h1>
                                <a href="<?php echo get_permalink(52591); ?>#concert" class="voir-plus transparant">Voir plus</a>
                            </article>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="prochains-evenements-blog pad-top">
        <div class="wrapper clearifx">
            <div class="grid-100 tablet-grid-100 mobile-grid-100 grid-parent">
                <div class="liste-evenement-blog">
                    <div class="bg-image-calendrier"></div>
                    <article class="titre grid-25 tablet-grid-50 mobile-grid-100">
                        <header>
                            <h1>évènements du moment</h1>
                        </header>
                        <div class="aligncenter tablet-aligncenter mobile-aligncenter">
                            <a href="<?php echo get_permalink(52585); ?>" class="voir-plus fond-noir">Voir tout</a>
                        </div>
                    </article>

                    <?php
                    $arg['datefork'] = date("Ymd", time()) . date("Ymd", time() + (3600 * 24 * 7));
                    $query = query_hades_events($arg);
                    $posts_agenda = new WP_Query($query);
                    $posts_agenda->set('posts_per_page', 7);
                    $posts_agenda->get_posts();
                    if ($posts_agenda->have_posts()) {
                        $mois = array("JAN", "FEV", "MAR", "AVR", "MAI", "JUN", "JUL", "AOU", "SEP", "OCT", "NOV", "DEC");
                        while ($posts_agenda->have_posts()) {
                            include 'hades/include/inc_event_card.php';
                        }
                    }
                    ?>
                </div>
            </div>
        </div>
    </section>
    <section class="separator pad-top">
        <div class="wrapper clearfix">
            <div class="grid-100 tablet-grid-100 mobile-grid-100">
                <div class="separateur"></div>
            </div>
        </div>
    </section>
    <section class="prochains-evenements-blog pad-top">
        <div class="wrapper clearifx">
            <div class="grid-100 tablet-grid-100 mobile-grid-100 grid-parent">
                <div class="liste-evenement-blog">
                    <div class="bg-image-micro"></div>
                    <article class="titre grid-25 tablet-grid-50 mobile-grid-100">
                        <header>
                            <h1>Blog</h1>
                            <h2>Derniers articles</h2>
                        </header>
                        <div class="aligncenter tablet-aligncenter mobile-aligncenter">
                            <a href="<?php echo get_permalink(52595); ?>" class="voir-plus fond-noir">Voir plus</a>
                        </div>
                    </article>
                    <?php
                    $today = date('Y-m-d');

                    $args = array(
                        'post_type' => 'blog',
                        'meta_key' => 'date',
                        'orderby' => 'meta_value',
                        'order' => 'ASC',
                        'posts_per_page' => 3,
                        'meta_query' => array(
                            array(
                                'key' => 'date',
                                'value' => $today,
                                'compare' => '>=',
                                'type' => 'DATE'
                            )
                        )
                    );
                    $the_query = new WP_Query($args);
                    if ($the_query->have_posts()) {
                        while ($the_query->have_posts()) {
                            $the_query->the_post();
                            $photo = get_field("photo");
                            ?>

                            <article class="grid-25 tablet-grid-50 mobile-grid-100">
                                <a href="<?php the_permalink(); ?>">
                                    <div class="bg" style="background-image:url('<?php echo $photo ['url']; ?>');">
                                        <div class="details">
                                            <span class="date"><?php the_field('date'); ?></span>
                                            <h1 id="titre-evenement"><?php the_title(); ?></h1>
                                        </div>
                                    </div>
                                </a>
                            </article>

                            <?php
                        }
                    }
                    wp_reset_postdata();
                    ?>


                </div>
            </div>
        </div>
    </section>
    <section class="separator pad-top">
        <div class="wrapper clearfix">
            <div class="grid-100 tablet-grid-100 mobile-grid-100">
                <div class="separateur"></div>
            </div>
        </div>
    </section>
    <section class="publications pad-top">
        <div class="wrapper clearfix">
            <div class="grid-100 tablet-grid-100 mobile-grid-100 grid-parent">
                <div class="liste-livre">
                    <div class="bg-image-lunettes"></div>
                    <article class="titre grid-25 tablet-grid-50 mobile-grid-100">
                        <header>
                            <h1>Publications</h1>
                            <h2>Nos livres sur le patrimoine luxembourgeois</h2>
                        </header>
                        <div class="aligncenter tablet-aligncenter mobile-aligncenter">
                            <a href="<?php echo get_permalink(52587); ?>" class="voir-plus fond-noir grand">Toutes nos publications</a>
                        </div>
                    </article>
                    <?php
                    $args = array(
                        'post_type' => 'livres',
                        'posts_per_page' => 3
                    );
                    $the_query = new WP_Query($args);
                    if ($the_query->have_posts()) {
                        while ($the_query->have_posts()) {
                            $the_query->the_post();
                            $photo = get_field("image");
                            ?>
                            <article class="grid-25 tablet-grid-50 mobile-grid-100 aligncenter tablet-aligncenter mobile-alignleft">
                                <a href="<?php the_permalink(); ?>">
                                    <img class="photo-livre" src="<?php echo $photo ['sizes']['livre']; ?>" />
                                    <h1><?php the_title(); ?></h1>
                                    <p><strong><?php the_field('auteur'); ?></strong><br><?php the_field('extrait'); ?></p>
                                    <div class="panier">
                                        <img class="picto" src="<?php echo get_template_directory_uri(); ?>/img/panier.svg" alt="Ajouter au panier"><p class="prix-livre"><?php the_field('prix'); ?>€</p>
                                    </div>
                                </a>
                            </article>
                            <?php
                        }
                    }
                    wp_reset_postdata();
                    ?>
                </div>
            </div>
        </div>
    </section>

</main>

<?php get_footer(); ?>