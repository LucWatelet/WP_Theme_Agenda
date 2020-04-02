<?php

function get_html_medias()
{
    global $post;
    $medias = $post->medias;
    $media_html="";
    if (!empty($medias)) {
        $medias = json_decode($medias, true);
        if (count($medias) > 0) {
            foreach ($medias as $value) {
                //var_dump($value);
                $media_html.="<div class=\"photo-evenement\" style=\"background-image:url('".$value["url"]."');\"></div>";
                if (++$i>=6) {
                    break ;
                }
            }
        }
    }
    return $media_html;
}
