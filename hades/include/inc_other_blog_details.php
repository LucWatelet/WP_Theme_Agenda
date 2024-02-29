<section class="evenement-blog-details">
    <div class="wrapper clearfix">
        <div class="grid-100 tablet-grid-100 mobile-grid-100 grid-parent">
            <div class="grid-100 tablet-grid-100 mobile-grid-100 alignleft tablet-alignleft mobile-alignleft">
				<p><?php echo get_html_titles($offer_id); ?></p>
            </div>
            <div class="details grid-65 suffixe-35 tablet-grid-100 mobile-grid-100 alignleft tablet-alignleft mobile-alignleft">
				
				<?php
				$desc = get_html_description($offer_id);
				if ($desc) {
					?>
				<div class="informations-evenement lieu">
					<h3>Description du lieu:</h3>
					<?php
					echo $desc?"<p>".$desc."</p>":"";
				} ?>
				</div>
				
				
           
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
  

            </div>
        </div>
    </div>
</section> 