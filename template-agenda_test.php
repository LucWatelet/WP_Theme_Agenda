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
                        <?php include 'inc_search_form.php'; ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <pre>
    <?php
    global $wpdb;

    $posts_agenda = new WP_Query();

    $posts_agenda->set('post_type', 'hades_offre');

    var_dump(get_query_var("datefork"));
    var_dump(get_query_var("cat"));
    
    if (get_query_var("cat")) {
        $posts_agenda->set('cat', get_query_var("cat"));
    }

    if (isset($_GET['localite_ray']))
        $posts_agenda->query_vars['localite_ray'] = $_GET['localite_ray'];
    if (isset($_GET['loc_rayon']))
        $posts_agenda->query_vars['loc_rayon'] = $_GET['loc_rayon'];

    $cats_in_hades = array("event" => true, "hades" => true);

    // on récupère ou on crée un tableau meta_query
    $meta_queries = $posts_agenda->get('meta_query', array());
    $order_queries = $posts_agenda->get('orderby', array());

    $meta_queries['relation'] = 'AND';

    //["query_vars"]=> array(53) { ["cat"]=> string(2) "82"
    //affichage d'événement suivant une indication catégorie ou de sélection

    if (get_query_var("datefork")) {
        $dates = get_details_from_hades_agenda(get_query_var("datefork"));
        var_dump($dates);

        $meta_queries['date_fin_clause'] = array(
            'key' => 'date_fin',
            'value' => $dates->date_deb,
            'compare' => '>=',
            'type' => 'DATETIME',
        );

        $meta_queries['date_deb_clause'] = array(
            'key' => 'date_deb',
            'value' => $dates->date_fin,
            'compare' => '<=',
            'type' => 'DATETIME',
        );
    } else {

        $meta_queries['date_fin_clause'] = array(
            'key' => 'date_fin',
        );

        $meta_queries['date_deb_clause'] = array(
            'key' => 'date_deb',
        );
        
     }

        $meta_queries['date_long_clause'] = array(
            'key' => 'date_long',
        );

    $meta_queries['localite_commune_clause'] = array(
        'key' => 'localite_commune',
    );

    $meta_queries['date_tjaff_clause'] = array(
        'key' => 'date_tjaff',
    );

    $order_queries = array(
        'date_tjaff_clause' => 'ASC'
        , 'date_fin_clause' => 'ASC'
        , 'date_deb_clause' => 'ASC'
        , 'date_long_clause' => 'ASC'
        , 'localite_commune_clause' => 'ASC'
    );
    $posts_agenda->set('meta_query', $meta_queries);
    $posts_agenda->set('orderby', $order_queries);
    
    var_dump($meta_queries);
    
    //echo "<small>Tri des post : Cats Events</small>";
    //affichage d'événements suivant une indication de date            




    /* if ($posts_agenda->get('hades_agenda') || isset($_GET['hades_agenda'])) {
      $dates = get_details_from_hades_agenda($posts_agenda->get('hades_agenda'));

      $meta_queries['date_fin_clause'] = array(
      'key' => 'date_fin',
      'value' => $dates->date_deb,
      'compare' => '>=',
      'type' => 'DATETIME',
      );

      $meta_queries['date_deb_clause'] = array(
      'key' => 'date_deb',
      'value' => $dates->date_fin,
      'compare' => '<=',
      'type' => 'DATETIME',
      );

      $meta_queries['date_long_clause'] = array(
      'key' => 'date_long',
      //'compare' => 'EXISTS',
      );

      $meta_queries['localite_commune_clause'] = array(
      'key' => 'localite_commune',
      //'compare' => 'EXISTS',
      );

      $meta_queries['date_tjaff_clause'] = array(
      'key' => 'date_tjaff',
      );

      $order_queries = array(
      'date_tjaff_clause' => 'ASC'
      , 'date_fin_clause' => 'ASC'
      , 'date_deb_clause' => 'ASC'
      , 'date_long_clause' => 'ASC'
      , 'localite_commune_clause' => 'ASC'
      );
      $posts_agenda->set('meta_query', $meta_queries);
      $posts_agenda->set('orderby', $order_queries);
      //echo "<small>Tri des post : Dates Events</small>";
      }
     */

    //affichage d'événement suivant une indication catégorie ou de sélection             
    /*        elseif ($posts_agenda->is_category() && $cats_in_hades['hades']) {

      $meta_queries['localite_commune_clause'] = array(
      'key' => 'localite_commune',
      );

      $order_queries = array(
      'localite_commune_clause' => 'ASC'
      );
      $posts_agenda->set('meta_query', $meta_queries);
      $posts_agenda->set('orderby', $order_queries);
      //echo "<small>Tri des post : Cats Hades</small>";
      } */

    //affichage d'une offre toute seule par sont identifiant Hades
    /*        if ($posts_agenda->get('hades_offre_id')) {

      $post_id = $wpdb->get_var("SELECT post_id FROM wp_postmeta WHERE meta_key='hades_id' AND meta_value=" . $posts_agenda->query_vars['hades_offre_id']);
      $posts_agenda->set('p', $post_id);
      $posts_agenda->set('post_type', HADES_CPT);
      $posts_agenda->set('name', NULL);
      } */


    $posts_agenda->set('posts_per_page', 300);

    /*        if (isset($_GET['loc_rayon']) && $_GET['loc_rayon'] > 0 && isset($_GET['localite_ray']) && $_GET['localite_ray'] != "") {
      add_filter('posts_where', array(&$this, 'distance_from_where'));
      $posts_agenda->set('posts_per_page', -1);
      } */



    /*           $args = array(
      'posts_per_page' => 50,
      'cat' => $_GET["cat"],
      'orderby' => 'name',
      'order' => 'ASC',
      'post_type' => 'hades_offre'
     * 
     */
//$posts = get_posts($args);
//print_r( $posts );
    $posts_agenda->get_posts();
//var_dump($posts_agenda);
    ?>
</pre>

    <?php
    if ($posts_agenda->have_posts()) {
        ?>
        <section class="prochains-evenements-blog pad-top">
            <div class="wrapper clearifx">
                <div class="grid-100 tablet-grid-100 mobile-grid-100 grid-parent">
                    <div class="liste-evenement-blog clearfix">

                        <?php
                        $mois = array("JAN", "FEV", "MAR", "AVR", "MAI", "JUN", "JUL", "AOU", "SEP", "OCT", "NOV", "DEC");
                        while ($posts_agenda->have_posts()) {
                            $posts_agenda->the_post();
                            //echo "<p>" . $post->ID . " - " . $post->post_title . " </p>";
                            //echo "<div>" . print_r($post) . " </p>";

                            /* AFFICHAGE DE LA DATE DE L'EVENEMENT */

                            $dd = get_post_meta($post->ID, 'date_deb', true);
                            $df = get_post_meta($post->ID, 'date_fin', true);

                            if ($dd) {
                                //$dates = substr($dd, 8, 2) . " " . $mois[intval(substr($dd, 5, 2)) - 1]." ".substr($dd, 0, 4);
                                $dates = substr($dd, 8, 2) . "." . substr($dd, 5, 2) . "." . substr($dd, 0, 4);
                                if ($df && ($df != $dd )) {
                                    //$dates .= " - " . substr($df, 8, 2) . " " . $mois[intval(substr($df, 5, 2)) - 1]." ".substr($dd, 0, 4);
                                    $dates .= " - " . substr($df, 8, 2) . "." . substr($df, 5, 2) . "." . substr($dd, 0, 4);
                                }
                            }

                            if (has_post_thumbnail()) {
                                $thumbnail = get_the_post_thumbnail_url();
                            } else {
                                $thumbnail = get_template_directory_uri() . '/img/image-event.jpg';
                            }

                            $post_categories = get_the_category();

                            $picto_categorie = array();
                            foreach ($post_categories as $value) {
                                $lien = get_template_directory() . "/img/icon-" . $value->slug . ".svg";
                                if (file_exists($lien)) {
                                    $picto_categorie[] = $value->slug;
                                }
                            }
                            ?>	

                            <article class="grid-25 tablet-grid-50 mobile-grid-100" id="offre-hades-<?php echo $custom_values['hades_id'][0]; ?>">
                                <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
                                    <div class="bg" style="background-image:url('<?php echo $thumbnail ?>');">
                                        <?php foreach ($picto_categorie as $value) { ?>
                                            <img src="<?php echo get_template_directory_uri(); ?>/img/icon-<?php echo $value; ?>.svg" alt="icon">
                                        <?php } ?>
                                        <?php if (count($picto_categorie) == 0) { ?>
                                            <img src="<?php echo get_template_directory_uri(); ?>/img/icon-categories.svg" alt="icon" 
                                                 title="<?php foreach ($post_categories as $v) {
                                    echo $v->slug . " - ";
                                } ?>" >
        <?php } ?>    

                                        <div class="details">
                                            <span class="lieu"><?php echo get_post_meta($post->ID, 'localite_commune', true); ?></span><br>
                                            <span class="date"><?php echo $dates; ?></span>
                                            <h1 id="titre-evenement"><?php echo $post->post_title; ?></h1>
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
