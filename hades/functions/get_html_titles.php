<?php
function get_html_titles($id = 0)
{
    global $post;
    if ($id!=0) {
        $titles = $post->{$id."_titles"};
    } else {
        $titles = $post->titles;
    }

    if (!empty($titles)) {
        $titles = json_decode($titles, true);
        $result=$titles['fr'];
    }
    return $result;
}
