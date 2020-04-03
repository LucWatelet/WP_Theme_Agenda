<?php

function get_html_description($id = 0)
{
    global $post;
    if ($id!=0) {
        $clef=$id."_lot_description";
        $lot_description = $post->$clef;
    } else {
        $lot_description = $post->lot_description;
    }
    
    $index="";
    $sc=array();

    if (!empty($lot_description)) {
        $lot_description = json_decode($lot_description, true);

        foreach ($lot_description['descriptions'] as $desc) {
            $index=$desc['sort_key']."-".$desc['id'];

            if (!is_array($desc_txt[$index])) {
                $desc_txt[$index]=array();
            }

            switch ($desc['id']) {
                case "gn_comp":
                    array_push(
                        $desc_txt[$index],
                        "<p><i>".nl2br($desc['contents']['fr'])."</i></p>"
                    );
                    break;

                default:
                    array_push(
                        $desc_txt[$index],
                        "<p>".nl2br($desc['contents']['fr'])."</p>"
                    );
                    break;
            }
        }
        ksort($desc_txt);


        foreach ($desc_txt as $tble) {
            $sc[]=join($tble, " ");
        }

        if (is_array($lot_description['attributes'])) {
            $sc[]=format_attributes($lot_description['attributes']);
        }
        
        $result=join($sc, " ");
    }

    return $result;
}
