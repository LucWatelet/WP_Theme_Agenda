<?php

function get_html_equipemnt()
{
    global $post;
    $lot_equipemnt = $post->lot_equipemnt;
    $index="";
    $sc=array();

    if (!empty($lot_equipemnt)) {
        $lot_equipemnt = json_decode($lot_equipemnt, true);

        if (is_array($lot_equipemnt['descriptions'])) {
            foreach ($lot_equipemnt['descriptions'] as $desc) {
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
        }

        if (is_array($lot_equipemnt['attributes'])) {
            $sc[]=format_attributes($lot_equipemnt['attributes']);
        }
        
        $result=join($sc, " ");
    }

    return $result;
}
