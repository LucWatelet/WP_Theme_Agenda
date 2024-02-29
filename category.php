<?php get_header(); ?>

<main>

    <?php include 'bouton-annonce.php'; 
    $posts_agenda=&$wp_query;
    $posts_agenda->set('posts_per_page', 1000);
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
                        } ?>  
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
