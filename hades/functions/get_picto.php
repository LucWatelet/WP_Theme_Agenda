<?php
function get_picto($attribut)
{
    if (isset($attribut['picture']) && file_exists(get_template_directory()."/hades/pictos/".$attribut['picture'].".svg")) {
        $result=get_template_directory_uri()."/hades/pictos/".$attribut['picture'].".svg";
    } elseif (file_exists(get_template_directory()."/hades/pictos/".$attribut['id'].".svg")) {
        $result=get_template_directory_uri()."/hades/pictos/".$attribut['id'].".svg";
    } elseif (isset($attribut['picture']) && file_exists(get_template_directory()."/hades/pictos/".$attribut['picture'].".png")) {
        $result=get_template_directory_uri()."/hades/pictos/".$attribut['picture'].".png";
    } else {
        $result="https://www.ftlb.be/logos/default/".$attribut['picture'].".png";
    }
    return $result;
}
