<?php
function get_html_information()
{
    global $post;
    $lot_information = $post->lot_information;
    $index="";
    $sc=array();

    if (!empty($lot_information)) {
        $lot_information = json_decode($lot_information, true);
        $result=nl2br($lot_information['descriptions']['inf']['contents']['fr']);
    }
    return $result;
}
