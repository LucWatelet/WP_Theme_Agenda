<?php

function get_post_by_hades_id($hades_id, $url = false)
{
    $hid = intval($hades_id);
    if ($hid > 0) {
        $qry = new WP_Query(
            array(
            'post_type' => 'hades_offre',
            'meta_query' => array(
                'relation' => 'AND',
                'hades_id' => array(
                    'key' => 'hades_id',
                    'value' => $hid,
                    'compare' => '='),
                'dateheure_id' => array('key' => 'dateheure_id')
            ),
            'orderby' => array('dateheure_id' => 'ASC')
                )
        );
        $res = $qry->get_posts();
        if ($qry->have_posts()) {
            if ($url) {
                $wpid = get_permalink($res[0]->ID);
            } else {
                $wpid = $res[0]->ID;
            }
        } else {
            $wpid = -1;
        }
    } else {
        trigger_error("get_post_by_hades_id() called with a Bad parameter, interger expression expected", E_USER_WARNING);
    }
    return $wpid;
}
