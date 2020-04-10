<?php

function get_html_services($id = 0)
{
    global $post;
    if ($id!=0) {
        $clef=$id."_lot_services";
        $lot_services = $post->$clef;
    } else {
        $lot_services = $post->lot_services;
    }

    $index="";
    $desc_txt=array();
    $att_txt=array();

    if (!empty($lot_services)) {
        $lot_services = json_decode($lot_services, true);

        if (is_array($lot_services['descriptions'])) {
            foreach ($lot_services['descriptions'] as $desc) {
                $index=$desc['sort_key']."-".$desc['id'];
                $desc_txt[$index]="<p>".$lot_services['descriptions']['labels']['fr']."</p>
                <p>".nl2br($desc['contents']['fr'])."</p>";
            }
        }

        if (is_array($lot_services['attributes'])) {
            foreach ($lot_services['attributes'] as $attr) {
                $att_tab=format_one_attribute($attr);
                $att_txt=array_merge($att_txt, $att_tab);
            }
        }

        $all_txt=array_merge($desc_txt, $att_txt);
        ksort($all_txt);

        $result=join($all_txt, " ");
    }

    return $result;
}
