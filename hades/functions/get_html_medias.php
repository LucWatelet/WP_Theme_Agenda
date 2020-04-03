<?php

function get_html_medias($id = 0)
{
    global $post;
    $medias_tab=false;
    if ($id!=0) {
        $clef=$id."_medias";
        $medias = $post->$clef;
    } else {
        $medias = $post->medias;
    }
    
    if (!empty($medias)) {
        $medias_tab = json_decode($medias, true);
    }

    return $medias_tab;
}
