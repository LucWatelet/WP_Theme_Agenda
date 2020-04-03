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

                        <h3>Descripton :</h3>
                        <?php echo get_html_description() ; ?>

                        <!-- IF (vérification si contenu existe) -->
                        <?php if ($info = get_html_information()) { ?>
                        <h3>INFORMATIONS PRATIQUES :</h3>
                            <?php echo $info; ?>
                        <!-- FIN IF-->
                        <?php } ?>

                        <!-- IF (vérification si contenu existe) -->
                        <?php if ($constraints = get_html_constraints()) { ?>
                        <h3>ACCÈS :</h3>
                            <?php echo $constraints; ?>
                        <!-- FIN IF-->
                        <?php } ?>


                        <!-- FIN IF-->

                        <!-- IF (vérification si contenu existe) -->
                        <h3>HORAIRES :</h3>
                        <p>***********</p>
                        <!-- FIN IF-->


                        <!-- IF (vérification si contenu existe) -->
                        <?php if ($equipemnt=get_html_equipemnt()) { ?>
                        <h3>Équipement :</h3>
                            <?php echo $equipemnt; ?>
                        <!-- FIN IF-->
                        <?php } ?>


                        <!-- IF (vérification si photos existent) -->
                        <?php if ($medias=get_html_medias()) { ?>
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
                        <?php } ?>
                    </div>
                </div>




                <div class="maps grid-35 tablet-grid-100 mobile-grid-100">
                    <div id="mapid" class="map">
                        <!-- Ajout de la map -->
                    </div>
                    <script>
                        var mymap = L.map('mapid', {
                            zoomControl: false
                        }).setView([ < ? php echo $coords; ? > ], 15);
                        L.tileLayer('http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png?{foo}', {
                            foo: 'bar'
                        }).addTo(mymap);
                        var marker = L.marker([ < ? php echo $coords; ? > ]).addTo(mymap);
                        marker.bindPopup("<b><?php the_title();?></b>").openPopup();
                    </script>
                    <div class="informations-contact">
                        <h3>CONTACT</h3>
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
             ?>
    <section class="evenement-blog-details">
        <div class="wrapper clearfix">
            <div class="grid-100 tablet-grid-100 mobile-grid-100 grid-parent">
                <div class="grid-100 tablet-grid-100 mobile-grid-100 alignleft tablet-alignleft mobile-alignleft">
                    <header class="titre">
                        <h1><?php echo get_html_titles($offer_id); ?></h1>
                        <h2><?php echo get_html_dates($offer_id); ?></h2>
                    </header>
                </div>
                <div
                    class="details grid-65 suffixe-35 tablet-grid-100 mobile-grid-100 alignleft tablet-alignleft mobile-alignleft">
                    <!-- IF (vérification si photo existe) -->
            <?php
            $medias = get_html_medias($offer_id);
             if ($medias) { ?>
                <div class="liste-photo-evenement">
                 <?php
                    $nb_images=0;
                    foreach ($medias as $value) {
                        ?>
                    <div class="photo-couverture"
                        style="background-image:url('<?php echo $value["url"]; ?>');">
                    </div>
                                <?php
                                if (++$nb_images>=2) {
                                    break ;
                                }
                    }
            } ?>
            </div>
            <!-- FIN IF-->
            <!-- IF (vérification si contenu existe) -->
            <?php
            $info = get_html_information($offer_id);
             $desc = get_html_description($offer_id);
             if ($info || $desc) {
                 ?>
            <div class="informations-evenement">
                <h3>Descripton :</h3>
                <?php
                echo $desc?"<p>".$desc."</p>":"";
                 echo $info?"<p>".$info."</p>":"";
             } ?>
            <!-- FIN IF-->

                    </div>
                </div>
            </div>
        </div>
    </section>
            <?php
         } ?>
    <!-- FIN BOUCLE -->
        <?php
     } ?>
    <!-- FIN IF-->


    <!-- IF evenement existe -->
    <?php $list_agenda = get_list_related_offers("place");
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
                <h1>Lieu de l'événement</h1>
            </div>
        </div>
    </section>

    <!-- BOUCLE sur les evenements  -->
        <?php foreach ($list_agenda as $offer_id) {
            ?>
    <section class="evenement-blog-details">
        <div class="wrapper clearfix">
            <div class="grid-100 tablet-grid-100 mobile-grid-100 grid-parent">
                <div class="grid-100 tablet-grid-100 mobile-grid-100 alignleft tablet-alignleft mobile-alignleft">
                    <header class="titre">
                        <h1><?php echo get_html_titles($offer_id); ?></h1>
                        <h2><?php echo get_html_dates($offer_id); ?></h2>
                    </header>
                </div>
                <div
                    class="details grid-65 suffixe-35 tablet-grid-100 mobile-grid-100 alignleft tablet-alignleft mobile-alignleft">
                    <!-- IF (vérification si photo existe) -->
            <?php
            $medias = get_html_medias($offer_id);
            if ($medias) { ?>
                <div class="liste-photo-evenement">
                 <?php
                    $nb_images=0;
                    foreach ($medias as $value) {
                        ?>
                    <div class="photo-couverture"
                        style="background-image:url('<?php echo $value["url"]; ?>');">
                    </div>
                                <?php
                                if (++$nb_images>=2) {
                                    break ;
                                }
                    }
            } ?>
            </div>
            <!-- FIN IF-->
            <!-- IF (vérification si contenu existe) -->
            <?php
            $info = get_html_information($offer_id);
            $desc = get_html_description($offer_id);
            if ($info || $desc) {
                ?>
            <div class="informations-evenement">
                <h3>Descripton :</h3>
                <?php
                echo $desc?"<p>".$desc."</p>":"";
                echo $info?"<p>".$info."</p>":"";
            } ?>
            <!-- FIN IF-->

                    </div>
                </div>
            </div>
        </div>
    </section>
            <?php
        } ?>
    <!-- FIN BOUCLE -->
        <?php
    } ?>
    <!-- FIN IF-->



    <!-- IF activité existe -->

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

    <!-- BOUCLE sur les activités  -->
    <section class="evenement-blog-details">
        <div class="wrapper clearfix">
            <div class="grid-100 tablet-grid-100 mobile-grid-100 grid-parent">
                <div class="grid-100 tablet-grid-100 mobile-grid-100 alignleft tablet-alignleft mobile-alignleft">
                    <header class="titre">
                        <h1>Titre de l'activité</h1>
                        <h2>Durée de l'activité: 1h</h2>
                    </header>
                </div>
                <div
                    class="details grid-65 suffixe-35 tablet-grid-100 mobile-grid-100 alignleft tablet-alignleft mobile-alignleft">

                    <div class="informations-evenement details">

                        <!-- IF (vérification si contenu existe) -->
                        <h3>Services :</h3>
                        <ul>
                            <li>Visite guidée sur rendez-vous</li>
                            <li>Visite libre</li>
                            <li>Audio guidage FR</li>
                            <li>Guidage FR</li>
                            <li>Guidage NL</li>
                            <li>Guidage EN</li>
                            <li>Panneaux didactiques FR</li>
                        </ul>
                        <!-- FIN IF-->

                        <!-- IF (vérification si contenu existe) -->
                        <h3>HORAIRES :</h3>
                        <p>Ouvert du 15 janv. au 30 juin et les mar, mer, jeu et ven de 9h30 à 17h, du 01 juil. au 31
                            août les lun, mar, mer, jeu, ven et sam de 9h30 à 17h et le dim de 14h à 18h, et du 01 sept.
                            au 15 déc. les mar, mer, jeu et ven de 9h30 à 17h et le dim de 14h à 18h. Fermé du 16 déc.
                            au 14 janv. 2020</p>
                        <!-- FIN IF-->

                        <!-- IF (vérification si contenu existe) -->
                        <h3>Tarifs :</h3>
                        <p>Par Personne : 15€</p>
                        <!-- FIN IF-->

                        <!-- IF (vérification si contenu existe) -->
                        <h3>Remarque :</h3>
                        <p>Blablabla</p>
                        <!-- FIN IF-->

                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- FIN BOUCLE -->

    <!-- FIN IF-->



    <?php echo get_default_image_of_a_post($post->ID); ?>
</main>

<?php get_footer(); ?>