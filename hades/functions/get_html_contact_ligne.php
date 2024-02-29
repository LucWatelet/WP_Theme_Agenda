<?php

function get_html_contact_ligne()
{
    global $post;
    $comms=array();
    $lcontact = $post->lot_contact;
    $result=false;

    $index="";

    $pattern = "#\\\\#";
    $replacement = "\\\\\\\\";
    $lcontact=preg_replace($pattern, $replacement, $lcontact);

    if (!empty($lcontact)) {
        $contact = json_decode($lcontact, true);
        
        if (is_array($contact)) {
            if (key_exists('main_contact', $contact)) {
                $address = "<span class='hades_contact_address'>".$contact['main_contact']['street'].",&nbsp;".$contact['main_contact']['number']." "
                .$contact['main_contact']['zip_code']."&nbsp;".$contact['main_contact']['city']. "</span>";
            }
            
            $contact_pub = $contact['public_contact'];

            if (is_array($contact_pub) && key_exists('company', $contact_pub)) {
                $company= "<span class='hades_contact_company'>" . $contact_pub['company'] . "</span>";
            }


            if (is_array($contact_pub) && key_exists('last_name', $contact_pub)) {
                $name= "<span class='hades_contact_name'>".$contact_pub['first_name'] . "&nbsp;".$contact_pub['last_name'] . "</span>";
            }

            if (is_array($contact_pub) && is_array($contact_pub['channels'])) {
                foreach ($contact_pub['channels'] as $channel) {
                    $index=$channel['sort_key']."-".$channel['type'];

                    if (!is_array($comms[$index])) {
                        $comms[$index]=array();
                    }

                    if (isset($channel['val']) && $channel['val']!="") {
                        switch ($channel['type']) {
                            case 'url':
                                array_push(
                                    $comms[$index],
                                    "<span class='hades_contact_url'><a href='".$channel['val']."' >".$channel['labels']['fr'].":&nbsp;".$channel['val']."</a></span>"
                                );
                                break;

                            case 'mail':
                                array_push(
                                    $comms[$index],
                                    "<span class='hades_contact_mail'><a href='mailto:".$channel['val']."' >".$channel['labels']['fr'].":&nbsp;".$channel['val']."</a></span>"
                                );
                                break;

                            default:
                                array_push(
                                    $comms[$index],
                                    "<span class='hades_contact_other'>".$channel['labels']['fr'].":&nbsp;".$channel['val']."</span>"
                                );
                                break;
                        }
                    }
                }
            }

            ksort($comms);

            $sc=array();
            foreach ($comms as $tble) {
                $sc[]=join($tble, "&nbsp;- ");
            }
            $communications= join($sc, "");

            $result=$company.$name."<br/>".$address."<br/>".$communications;
        }
    }
    return $result;
}
