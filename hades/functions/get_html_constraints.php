<?php

function get_html_constraints($id = 0)
{
    global $post;
    if ($id!=0) {
        $clef=$id."_lot_constraints";
        $lot_constraints = $post->$clef;
    } else {
        $lot_constraints = $post->lot_constraints;
    }

    $index="";
    $sc=array();

    if (!empty($lot_constraints)) {
        $lot_constraints = json_decode($lot_constraints, true);

        if (is_array($lot_constraints['descriptions'])) {
            foreach ($lot_constraints['descriptions'] as $desc) {
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

        if (is_array($lot_constraints['attributes'])) {
            $sc[]=format_attributes($lot_constraints['attributes']);
        }
        
        $result=join($sc, " ");
    }

    return $result;
}
