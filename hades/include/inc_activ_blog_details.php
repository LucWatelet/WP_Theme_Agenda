<section class="evenement-blog-details">
    <div class="wrapper clearfix">
        <div class="grid-100 tablet-grid-100 mobile-grid-100 grid-parent">
            <div class="grid-100 tablet-grid-100 mobile-grid-100 alignleft tablet-alignleft mobile-alignleft">
                <header class="titre">
                    <h1><?php echo get_html_titles($offer_id); ?></h1>
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
                    <div class="photo-couverture" style="background-image:url('<?php echo $value["url"]; ?>');">
                    </div>
                        <?php
                        if (++$nb_images>=2) {
                            break ;
                        }
                    }
                } ?>

                    <!-- FIN IF-->
                    <!-- IF (vérification si contenu existe) -->

                    <div class="informations-evenement">
                        <?php
                        $desc = get_html_description($offer_id);
                        if ($desc) {
                            ?>
                            <h3>Descripton :</h3>
                            <?php
                            echo $desc?"<p>".$desc."</p>":""; ?>
                        <!-- FIN IF-->
                            <?php
                        } ?>

                        <!-- IF (vérification si contenu existe) -->
                        <?php if ($services=get_html_services($offer_id)) { ?>
                            <h3>Services :</h3>
                            <?php echo $services; ?>
                        <!-- FIN IF-->
                        <?php } ?>


                        <!-- IF (vérification si contenu existe) -->
                        <?php if ($constraints = get_html_constraints($offer_id)) { ?>
                            <h3>Accès :</h3>
                            <?php echo $constraints; ?>
                        <!-- FIN IF-->
                        <?php } ?>

                        <!-- IF (vérification si contenu existe) -->
                        <?php if ($horaires=get_html_horaires($offer_id)) { ?>
                            <h3>Horaires :</h3>
                            <?php echo $horaires; ?>
                        <!-- FIN IF-->
                        <?php } ?>

                        <!-- IF (vérification si contenu existe) -->
                        <?php if ($equipemnt=get_html_equipemnt($offer_id)) { ?>
                            <h3>Équipement :</h3>
                            <?php echo $equipemnt; ?>
                        <!-- FIN IF-->
                        <?php } ?>

                        <!-- IF (vérification si contenu existe) -->
                        <?php if ($tarif=get_html_tarif($offer_id)) { ?>
                            <h3>Tarifs :</h3>
                            <?php echo $tarif; ?>
                        <!-- FIN IF-->
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
</section>