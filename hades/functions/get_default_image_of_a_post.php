<?php

function get_default_image_of_a_post($postid) {
    static $cats_images = array();

    $terms = wp_get_object_terms($postid, "category");
    
    foreach ($terms as $term) {
//echo "<div><pre>";
    if (!key_exists($term->term_id, $cats_images)) {
        //var_dump($terms);
        $cats_images[$term->term_id] = $term->slug;
    }
  }

//    print_r($cats_images);
//echo "</pre></div>";
    return true;
}
