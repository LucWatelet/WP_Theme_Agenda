<?php
function format_attributes($attributes)
{
    $index="";
    $attr_txt=array();
    $attr_picto=array();
    $attr_autre=array();

    foreach ($attributes as $attr) {
        $index=$attr['sort_key']."-".$attr['id'];

        if ($attr['id']=='lb_lcpn') {
            continue;
        }

        if ($attr['id']=='lb_autr') {
            $attr_autre[$index]="<li>".nl2br($attr['value'])."</li>";
        } elseif (isset($attr['picture'])) {
            $attr_picto[$index]='<li ><img src="'.get_picto($attr).'" title="'.$attr['labels']['fr'].'"  alt="'.$attr['labels']['fr'].'" /></li>';
        } else {
            $attr_txt[$index]="<li>".$attr['labels']['fr']."</li>";
        }
    }
    ksort($attr_txt);
    $str_attr_txt="<ul>".join($attr_txt, " ").join($attr_autre, " ")."</ul>";
    ksort($attr_picto);
    $str_attr_picto="<ul class='hades_picto'>".join($attr_picto, " ")."</ul>";

    $result= $str_attr_picto." ".$str_attr_txt;
    
    return $result;
}
