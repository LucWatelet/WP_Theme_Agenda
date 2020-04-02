<?php
function get_html_dates($id = 0)
{
    global $post;
    if ($id!=0) {
        $dates = $post->{$id."_lot_openings"};
    } else {
        $dates = $post->lot_openings;
    }

    if (!empty($dates)) {
        $dates = json_decode($dates, true);
        $result=$dates['openings']['contents']['fr'];
    }
    return $result;
}
