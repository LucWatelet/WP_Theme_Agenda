<?php
function get_html_horaires($id = 0)
{
    global $post;
    $result=false;

    if ($id!=0) {
        $lot_horaire = $post->{$id."_lot_openings"};
    } else {
        $lot_horaire = $post->lot_openings;
    }

    if (!empty($lot_horaire)) {
        $lot_horaire = json_decode($lot_horaire, true);

        if (is_array($lot_horaire['openings'])) {
            $result_txt["0-opennig"]=$lot_horaire['openings']['contents']['fr'];
        }

        if (is_array($lot_horaire['descriptions'])) {
            foreach ($lot_horaire['descriptions'] as $desc) {
                $index=$desc['sort_key']."-".$desc['id'];
                $result_txt[$index]="<p>".$desc['labels']['fr'].": ".nl2br($desc['contents']['fr'])."</p>";
            }
        }

        if (is_array($lot_horaire['attributes'])) {
            foreach ($lot_horaire['attributes'] as $attr) {
                $att_tab=format_one_attribute($attr);
                $result_txt=array_merge($result_txt, $att_tab);
            }
        }

        if (count($result_txt)>0) {
            ksort($result_txt);
            $result=implode(" ", $result_txt);
        }
    }
    return $result;
}
