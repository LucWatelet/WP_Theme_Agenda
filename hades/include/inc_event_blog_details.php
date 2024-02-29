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
                    <div class="photo-couverture" style="background-image:url('<?php echo $value["url"]; ?>');">
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
                    <h3>Description :</h3>
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