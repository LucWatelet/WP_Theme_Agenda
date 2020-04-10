<?php
function format_one_attribute($attr)
{
    $index="";
    $index=$attr['sort_key']."-".$attr['id'];
    
    $attr_txt=array();

    if ($attr['id']=='lb_autr') {
        $attr_txt[$index]="<li>".nl2br($attr['value'])."</li>";
    } elseif (isset($attr['picture'])) {
        $attr_txt[$index]='<li ><img src="'.get_picto($attr).'" title="'.$attr['labels']['fr'].'"  alt="'.$attr['labels']['fr'].'" /></li>';
    } else {
        if (is_string($attr['value']) or is_numeric($attr['value'])) {
            $attr_txt[$index]="<li>".$attr['labels']['fr'].":".$attr['value']."</li>";
        } else {
            $attr_txt[$index]="<li>".$attr['labels']['fr']."</li>";
        }
    }
    return $attr_txt;
}
