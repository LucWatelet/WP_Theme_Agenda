<?php 
/* Template Name: Agenda */
global $wpdb;

?>


<?php get_header(); 

        /* -----Pierre Ernould -----
        Mise à la corbeille des offres périmées */
        $t = date("Y-m-d");
        $db = $wpdb->prefix;
        $r = $wpdb->query(
            $wpdb->prepare(
                "update ".$wpdb->posts."
                inner join ".$wpdb->postmeta."
                on ".$wpdb->posts.".ID = ".$wpdb->postmeta.".post_id
                set ".$wpdb->posts.".post_status = %s
                where ".$wpdb->postmeta.".meta_key = %s and
                ".$wpdb->postmeta.".meta_value < %s",
                'trash', 'date_fin', $t
            )
        );
//        var_dump($r);
?>
?>
<main>

    <section id="cherche-explore-organise" class="cherche-explore-organise">
        <div class="wrapper clearfix">
            <div class="grid-100 tablet-grid-100 mobile-grid-100 grid-parent">
                <div class="grid-100 tablet-grid-100 mobile-grid-100">
                    <div class="tab tab-page-agenda aligncenter tablet-aligncenter mobile-aligncenter">
                        <header>
                            <h1>Je cherche</h1><h2>Agenda du Luxembourg BELGE</h2>
                        </header>
                    </div>
                    <div id="cherche" class="tabcontent grid-100 tablet-grid-100 mobile-grid-100">
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
    
    //$GLOBALS['wp_query']->datefork = date("Ymd", time()) . date("Ymd", time() + (3600 * 24 * 365));

    $query = query_hades_events($GLOBALS['wp_query']->query_vars);
    
    $posts_agenda = new WP_Query($query);
    
    if ($has_no_filter) {
        $posts_agenda->set('posts_per_page', 30);
    } else {
        $posts_agenda->set('posts_per_page', 300);
    }

    $posts_agenda->get_posts();

	$q=$GLOBALS['wp_query']->query_vars;
//	if($q["loc_rayon"] && !$q["commune"]) {
//		echo "<div class='wrapper clearfix'><div class='erreur_recherche' >Aucune commune n'ayant été choisie (Où?), le résultat ne tient pas compte de la distance sélectionnée (".$q["loc_rayon"]."km)</div></div>";
//	}
	
    if ($posts_agenda->have_posts()) {
        ?>
        <section class="prochains-evenements-blog pad-top" id="liste">
			<?php 	if($q["loc_rayon"] && !$q["commune"]) {
				echo "<div class='wrapper clearfix'><div class='erreur_recherche' >Aucune commune n'ayant été choisie (Où?), le résultat ne tient pas compte de la distance sélectionnée (".$q["loc_rayon"]."km)</div></div>";
			} ?>
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
    }else{ ?>
		
	<section class="prochains-evenements-blog pad-top" id="liste">
        <div class="wrapper clearifx">
			<div class="grid-100 tablet-grid-100 mobile-grid-100">
				<h1>Pas d'évènement correspondant à vos critères de recherche.</h1>
			</div>
		</div>
	</section>
<?php	}
    ?>

</main>
<?php
get_footer();
