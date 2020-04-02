<?php /* Template Name: Agenda */ ?>


<?php get_header(); ?>

<main>

    <?php include 'bouton-annonce.php'; ?>

    <section id="cherche-explore-organise" class="pad-top">
        <div class="wrapper clearfix">
            <div class="grid-100 tablet-grid-100 mobile-grid-100 grid-parent">
                <div class="grid-100 tablet-grid-100 mobile-grid-100">
                    <div class="tab tab-page-agenda aligncenter tablet-aligncenter mobile-aligncenter">
                        <header>
                            <h1>Je cherche</h1><h2>un évènement</h2>
                        </header>
                    </div>
                    <div id="cherche" class="tabcontent grid-100 tablet-grid-100 mobile-grid-100 pad-top-bot">
                        <?php include 'hades/include/inc_search_form.php'; ?>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php
    $has_no_filter = false;
    
    if (!get_query_var("datefork") && !get_query_var("localite") && !get_query_var("cat")) {
        $has_no_filter = true;
    }
    
    $query = query_hades_events($GLOBALS['wp_query']->query_vars);
    
    $posts_agenda = new WP_Query($query);
    
    if ($has_no_filter) {
        $posts_agenda->set('posts_per_page', 30);
    } else {
        $posts_agenda->set('posts_per_page', 300);
    }

    $posts_agenda->get_posts();

    if ($posts_agenda->have_posts()) {
        ?>
        <section class="prochains-evenements-blog pad-top">
            <div class="wrapper clearifx">
                <div class="grid-100 tablet-grid-100 mobile-grid-100 grid-parent">
                    <div class="liste-evenement-blog clearfix">
                        <?php
                        $mois = array("JAN", "FEV", "MAR", "AVR", "MAI", "JUN", "JUL", "AOU", "SEP", "OCT", "NOV", "DEC");
                        while ($posts_agenda->have_posts()) {
                            include 'hades/include/inc_event_card.php';
                        }
                        if ($has_no_filter) {
                            ?> 
                            <article class="grid-25 tablet-grid-50 mobile-grid-100" >
                                <a href="#" >
                                    <div class="bg" style="background-color:rgb(5,5,5);">
                                        <div class="details">
                                            <span class="lieu">Et bien plus encore...</span><br>
                                            <h1 id="titre-evenement">Utilisez le formulaire de recherche pour en voir plus !</h1>
                                        </div>
                                    </div>
                                </a>
                            </article>    
                        <?php } ?>  
                    </div>
                </div>
            </div>
        </section>
        <?php
    }
    ?>

</main>
<?php
get_footer();
