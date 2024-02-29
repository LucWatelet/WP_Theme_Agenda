<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$posts_agenda->the_post();
//echo "<p>" . $post->ID . " - " . $post->post_title . " </p>";
//echo "<div>" . print_r($post) . " </p>";


if (has_post_thumbnail()) {
    $thumbnail = get_the_post_thumbnail_url();
} else {
    $thumbnail = get_template_directory_uri() . '/img/image-event.jpg';
}

$post_categories = get_the_category();

$picto_categorie = array();
foreach ($post_categories as $value) {
    $lien = get_template_directory() . "/img/categories/" . $value->slug . ".svg";
    if (file_exists($lien)) {
        $picto_categorie[] = $value->slug;
    }
}
?>



<article class="grid-100 tablet-grid-100 mobile-grid-100" id="offre-hades-<?php echo get_post_meta($post->ID, 'hades_id', true); ?>">
     <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
        <div class="bg">
			<div class="image">
				 <?php foreach ($picto_categorie as $value) { ?>
					<img src="<?php echo get_template_directory_uri(); ?>/img/categories-culture-sport/<?php echo $value; ?>.svg" alt="icon">
				<?php } ?>

				<?php if (count($picto_categorie) == 0) { ?>
					<img src="<?php echo get_template_directory_uri(); ?>/img/icon-categories.svg" alt="icon" title="<?php
					foreach ($post_categories as $v) {
						echo $v->slug . " - ";
					}
					?>">
				<?php } ?>
			</div>
            
            <div class="details">
                <span class="lieu"><?php echo get_post_meta($post->ID, 'localite_commune', true); ?></span><br>
                <h1 id="titre-evenement"><?php echo $post->post_title; ?></h1>
				
				<?php $rue = get_post_meta($post->ID, 'adresse', true); ?>
				<?php $code_postal = get_post_meta($post->ID, 'cp', true); ?>
				<?php $localite = get_post_meta($post->ID, 'localite_commune', true); ?>
				
				<?php $email = get_post_meta($post->ID, 'email', true); ?>
				<?php $tel = get_post_meta($post->ID, 'tel', true); ?>
				
				<p> Adresse: <?php if($rue): ?> <?php echo $rue; ?> <br> <?php endif; ?>
					<?php if($code_postal): ?> <?php echo $code_postal; ?> <?php endif; ?>
					<?php if($localite): ?> <?php echo $localite; ?> <?php endif; ?>
				</p>
				
				<p>
					<?php if($tel): ?> Tél.: <?php echo $tel; ?> <?php endif; ?><br>
					<?php if($email): ?> Email: <?php echo $email; ?> <?php endif; ?>
				</p>
				
				
            </div>
             
        </div>
    </a>
   
</article>

