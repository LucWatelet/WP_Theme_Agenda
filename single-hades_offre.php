<?php /* Template Name: Agenda Details */?>
<?php get_header(); ?>
<style>
    .attribut.pic.chk {
        display: inline-block;
        margin: 0px 15px;
    }

    .attribut.pic.chk img {
        max-height: 30px;
    }
</style>
<?php

/* Affichage de la date de l'événement */

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

/* Affichage de l'image principale */

if (has_post_thumbnail()) {
    $thumbnail = get_the_post_thumbnail_url();
} else {
    $thumbnail = get_template_directory_uri() . '/img/image-event.jpg';
}

/* coordonnées de l'événement */

$coords = get_post_meta($post->ID, 'gps_y', true).",".get_post_meta($post->ID, 'gps_x', true);



?>

<main>
    <?php include 'bouton-annonce.php'; ?>
    <section class="evenement-blog-details pad-top">
        <div class="wrapper clearfix">
            <div class="grid-100 tablet-grid-100 mobile-grid-100 grid-parent">
                <div class="grid-100 tablet-grid-100 mobile-grid-100 alignleft tablet-alignleft mobile-alignleft">
                    <div class="lien-prec">
                        <a href="<?php echo get_permalink(52585); ?>" class="retour"><img
                                src="<?php echo get_template_directory_uri(); ?>/img/fleche-retour.svg"> Retour à la
                            page Agenda</a>
                    </div>
                    <header class="titre">
                        <h1><?php the_title(); ?></h1>
                        <h2><?php echo $dates; ?></h2>
                    </header>
                </div>
                <div
                    class="details grid-65 tablet-grid-100 mobile-grid-100 alignleft tablet-alignleft mobile-alignleft">
                    <!--<div class="photo-couverture" style="background-image:url('<?php echo $thumbnail; ?>');"></div>-->
                    <img class="photo-event" src="<?php echo $thumbnail; ?>" alt="<?php the_title(); ?>">
                    <div class="informations-evenement">

                        <!-- IF (vérification si contenu existe) -->
                        <?php if ($label = get_html_label()) { ?>
                            <?php echo $label;?>
                        <!-- FIN IF-->
                        <?php } ?>

                        <!-- IF (vérification si contenu existe) -->
                        <?php if ($descr = get_html_description()) { ?>
                            <h3>Descripton :</h3>
                            <?php echo $descr; ?>
                        <!-- FIN IF-->
                        <?php } ?>


                        <!-- IF (vérification si contenu existe) -->
                        <?php if ($info = get_html_information()) { ?>
                            <h3>Informations pratiques :</h3>
                            <?php echo $info; ?>
                        <!-- FIN IF-->
                        <?php } ?>

                        <!-- IF (vérification si contenu existe) -->
                        <?php if ($constraints = get_html_constraints()) { ?>
                            <h3>Accès :</h3>
                            <?php echo $constraints; ?>
                        <!-- FIN IF-->
                        <?php } ?>
                        <!-- FIN IF-->

                        <!-- IF (vérification si contenu existe) -->
                        <?php if ($horaires=get_html_horaires($offer_id)) { ?>
                            <h3>Horaires :</h3>
                            <?php echo $horaires; ?>
                        <!-- FIN IF-->
                        <?php } ?>


                        <!-- IF (vérification si contenu existe) -->
                        <?php if ($equipemnt=get_html_equipemnt()) { ?>
                            <h3>Équipement :</h3>
                            <?php echo $equipemnt; ?>
                        <!-- FIN IF-->
                        <?php } ?>


                        <!-- IF (vérification si photos existent) -->
                        <?php $medias=get_html_medias();
                        if (is_array($medias)) {
                            // on répète pas la première photo
                            if (count($medias)>0) {
                                $p=array_shift($medias);
                            }
                            if (count($medias)>0) { ?>
                        <div class="liste-photo-evenement">
                            <!-- Création de la boucle qui récupére les photos -->
                                <?php
                                foreach ($medias as $value) { ?>
                            <div class="photo-evenement" style="background-image:url(<?php echo $value["url"];?>);"></div>;
                                    <?php
                                    if (++$i>=6) {
                                        break ;
                                    }
                                } ?>
                            <!-- Fin de la boucle-->
                        </div>
                        <!-- FIN IF-->
                                <?php
                            }
                        }?>
                    </div>
                </div>




                <div class="maps grid-35 tablet-grid-100 mobile-grid-100">
                    <div id="mapid" class="map">
                        <!-- Ajout de la map -->
                    </div>
                    <script  type="text/javascript" >
                        var mymap = L.map('mapid', {
                            zoomControl: false
                        }).setView([ <?php echo $coords; ?> ], 15);
                        L.tileLayer('http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png?{foo}', {
                            foo: 'bar'
                        }).addTo(mymap);
                        var marker = L.marker([<?php echo $coords; ?>]).addTo(mymap);
                        marker.bindPopup("<b><?php the_title();?></b>").openPopup();
                    </script>
                    <div class="informations-contact">
                        <h3>Contact</h3>
                        <?php echo get_html_contact() ; ?>
                    </div>
                </div>
            </div>
        </div>
        </div>
        </div>
    </section>


    <!-- IF evenement existe -->
    <?php $list_agenda = get_list_related_offers("agenda");
    if ($list_agenda) {
        ?>
   <section class="separator pad-top">
        <div class="wrapper clearfix">
            <div class="grid-100 tablet-grid-100 mobile-grid-100">
                <div class="separateur"></div>
            </div>
        </div>
    </section>

    <section class="titre pad-top">
        <div class="wrapper clearfix">
            <div class="grid-100 tablet-grid-100 mobile-grid-100">
                <h1>AGENDA</h1>
            </div>
        </div>
    </section>

    <!-- BOUCLE sur les evenements  -->
        <?php foreach ($list_agenda as $offer_id) {
            include "hades/include/inc_event_blog_details.php";
        } ?>
    <!-- FIN BOUCLE -->
        <?php
    } ?>
    <!-- FIN IF-->


    <!-- IF Lieux existe -->
    <?php $list_lieux = get_list_related_offers("place");
    if ($list_lieux) {
        ?>
   <section class="separator pad-top">
        <div class="wrapper clearfix">
            <div class="grid-100 tablet-grid-100 mobile-grid-100">
                <div class="separateur"></div>
            </div>
        </div>
    </section>

    <section class="titre pad-top">
        <div class="wrapper clearfix">
            <div class="grid-100 tablet-grid-100 mobile-grid-100">
                <h1>Lieu de l'événement</h1>
            </div>
        </div>
    </section>

    <!-- BOUCLE sur les lieux  -->
        <?php foreach ($list_lieux as $offer_id) {
            include "hades/include/inc_other_blog_details.php";
        } ?>
    <!-- FIN BOUCLE -->
        <?php
    } ?>
    <!-- FIN IF-->



    <!-- IF activité existe -->
    <?php $list_activite = get_list_related_offers("act_ind");
    if ($list_activite) {
        ?>
    <section class="separator pad-top">
        <div class="wrapper clearfix">
            <div class="grid-100 tablet-grid-100 mobile-grid-100">
                <div class="separateur"></div>
            </div>
        </div>
    </section>

    <section class="titre pad-top">
        <div class="wrapper clearfix">
            <div class="grid-100 tablet-grid-100 mobile-grid-100">
                <h1>Activités</h1>
            </div>
        </div>
    </section>
        <?php //print_r($list_activite);?>

    <!-- BOUCLE sur les activités  -->
        <?php foreach ($list_activite as $offer_id) {
            include "hades/include/inc_activ_blog_details.php";
        } ?>
    <!-- FIN BOUCLE --> 
        <?php
    } ?>
    <!-- FIN IF-->

    <!-- IF activité de groupe existe -->
    <?php $list_activite = get_list_related_offers("act_group");
    if ($list_activite) {
        ?>
    <section class="separator pad-top">
        <div class="wrapper clearfix">
            <div class="grid-100 tablet-grid-100 mobile-grid-100">
                <div class="separateur"></div>
            </div>
        </div>
    </section>

    <section class="titre pad-top">
        <div class="wrapper clearfix">
            <div class="grid-100 tablet-grid-100 mobile-grid-100">
                <h1>En groupe</h1>
            </div>
        </div>
    </section>
        <?php //print_r($list_activite);?>

    <!-- BOUCLE sur les activités  -->
        <?php foreach ($list_activite as $offer_id) {
            include "hades/include/inc_activ_blog_details.php";
        } ?>
    <!-- FIN BOUCLE --> 
        <?php
    } ?>
    <!-- FIN IF-->


    <?php echo get_default_image_of_a_post($post->ID); ?>
</main>

<?php get_footer(); ?>