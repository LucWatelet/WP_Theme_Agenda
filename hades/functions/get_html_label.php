<?php
function get_html_label()
{
    global $post;
    $lot_labels = $post->lot_labels;
    if (!empty($lot_labels)) {
        $lot_labels = json_decode($lot_labels, true);
        $result=format_attributes($lot_labels['attributes']);
    }
    return $result;
}
