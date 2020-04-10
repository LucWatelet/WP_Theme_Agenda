<?php

function get_list_related_offers($type = "")
{
    global $post;
    $related_offers = $post->related_offers;
    $related_offers = json_decode($related_offers, true);
    $related_offers_id=array();
    print_r($related_offers);

    foreach ($related_offers as $key => $value) {
        switch (true) {
            case $type == "agenda" && $value["relationship_type"] == "agenda" && $value["relationship_position"] == "child":
                $dates=$post->{$key."_lot_openings"};
                $dates=json_decode($dates, true);
                $end_date=$dates["openings"]["end_date"][0];
                $cle=substr($end_date, 6, 4).substr($end_date, 3, 2).substr($end_date, 0, 2);
                $related_offers_id[$cle]=$key;
                break;

            case $type == "place" && $value["relationship_type"] == "agenda" && $value["relationship_position"] == "parent":
                $related_offers_id[]=$key;
                break;
            
            case $type == "act_ind" && $value["relationship_type"] == "act_ind" && $value["relationship_position"] == "child":
                $related_offers_id[]=$key;
                break;
                
            case $type == "act_group" && $value["relationship_type"] == "act_group" && $value["relationship_position"] == "child":
                $related_offers_id[]=$key;
                break;

            case $type == "annexe" && ($value["relationship_type"] == "annexe_e" || $value["relationship_type"] == "annexe_e"):
                $related_offers_id[]=$key;
                break;


            /*default:
                array_push($related_offers_id, $key);

                break;*/
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
