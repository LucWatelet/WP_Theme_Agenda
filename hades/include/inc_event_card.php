<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$posts_agenda->the_post();
//echo "<p>" . $post->ID . " - " . $post->post_title . " </p>";
//echo "<div>" . print_r($post) . " </p>";

/* AFFICHAGE DE LA DATE DE L'EVENEMENT */

$dd = get_post_meta($post->ID, 'date_deb', true);
$df = get_post_meta($post->ID, 'date_fin', true);

if ($dd) {
    //$dates = substr($dd, 8, 2) . " " . $mois[intval(substr($dd, 5, 2)) - 1]." ".substr($dd, 0, 4);
    $dates = substr($dd, 8, 2) . "." . substr($dd, 5, 2) . "." . substr($dd, 0, 4);
    if ($df && ($df != $dd)) {
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

<article class="grid-25 tablet-grid-50 mobile-grid-100" id="offre-hades-<?php echo get_post_meta($post->ID, 'hades_id', true); ?>">
    <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
        <div class="bg" style="background-image:url('<?php echo $thumbnail ?>');">
            <?php foreach ($picto_categorie as $value) { ?>
                <img src="<?php echo get_template_directory_uri(); ?>/img/icon-<?php echo $value; ?>.svg" alt="icon">
            <?php } ?>
            <?php if (count($picto_categorie) == 0) { ?>
                <img src="<?php echo get_template_directory_uri(); ?>/img/icon-categories.svg" alt="icon" 
                     title="<?php
                     foreach ($post_categories as $v) {
                         echo $v->slug . " - ";
                     }
                     ?>" >
                 <?php } ?>    

            <div class="details">
                <span class="lieu"><?php echo get_post_meta($post->ID, 'localite_commune', true); ?></span><br>
                <span class="date"><?php echo $dates; ?></span>
                <h1 id="titre-evenement"><?php echo $post->post_title; ?></h1>
            </div>
             
        </div>
    </a>
   
</article>
