<?php

function get_html_tarif($id = 0)
{
    global $post;
    $result=false;
    $result_txt=array();
    
    if ($id!=0) {
        $clef=$id."_lot_tarif";
        $lot_tarif = $post->$clef;
    } else {
        $lot_tarif = $post->lot_tarif;
    }

    $index="";
    $sc=array();

    if (!empty($lot_tarif)) {
        $lot_tarif = json_decode($lot_tarif, true);

        if (is_array($lot_tarif['descriptions'])) {
            foreach ($lot_tarif['descriptions'] as $desc) {
                $index=$desc['sort_key']."-".$desc['id'];
                $result_txt[$index]="<p>".$desc['labels']['fr'].": ".nl2br($desc['contents']['fr'])."</p>";
            }
        }

        if (is_array($lot_tarif['attributes'])) {
            foreach ($lot_tarif['attributes'] as $attr) {
                $att_tab=format_one_attribute($attr);
                $result_txt=array_merge($result_txt, $att_tab);
            }
        }

        if (is_array($lot_tarif['tarifs'])) {
            foreach ($lot_tarif['tarifs'] as $tarif) {
                $index=$tarif['sort_key']."-".$tarif['id'];

                if ($tarif['min']==$tarif['max']) {
                    $prix_txt=$tarif['min']."€";
                } else {
                    $prix_txt="de ".$tarif['min']." à ".$tarif['max']."€";
                }

                if ($tarif['rem']['fr']) {
                    $rem="<br/><i>".$tarif['rem']['fr']."</i>";
                } else {
                    $rem="";
                }

                $result_txt[$index]="<p>".$tarif['labels']['fr'].": ".$prix_txt.$rem."</p>";
            }
        }

        if (count($result_txt)>0) {
            ksort($result_txt);
            $result=implode(" ", $result_txt);
        }
    }

    return $result;
}
