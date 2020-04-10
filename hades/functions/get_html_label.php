<?php
function get_html_label($id = 0)
{
    global $post;
    if ($id!=0) {
        $clef=$id."_lot_labels";
        $lot_labels = $post->$clef;
    } else {
        $lot_labels = $post->lot_labels;
    }
    
    if (!empty($lot_labels)) {
        $lot_labels = json_decode($lot_labels, true);
        $result=format_attributes($lot_labels['attributes']);
    }
    return $result;
}
