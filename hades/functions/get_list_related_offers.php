<?php

function get_list_related_offers($type = "")
{
    global $post;
    $related_offers = $post->related_offers;
    $related_offers = json_decode($related_offers, true);
    $related_offers_id=array();
    foreach ($related_offers as $key => $value) {
        if ($value["relationship_type"] == $type) {
            if ($type=="agenda") {
                $dates=$post->{$key."_lot_openings"};
                $dates=json_decode($dates, true);
                $end_date=$dates["openings"]["end_date"][0];
                $cle=substr($end_date, 6, 4).substr($end_date, 3, 2).substr($end_date, 0, 2);
                $related_offers_id[$cle]=$key;
            } else {
                array_push($related_offers_id, $key);
            }
        }
    }

    ksort($related_offers_id);

    print_r($related_offers_id);
    if (count($related_offers_id)>=1) {
        return $related_offers_id;
    } else {
        return false;
    }
}
