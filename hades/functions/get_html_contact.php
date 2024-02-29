<?php

function get_html_contact()
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
                $address = $contact['main_contact']['street'].", ".$contact['main_contact']['number']
                ."<br/>".$contact['main_contact']['zip_code']." ".$contact['main_contact']['city'];
            }
            
            $contact_pub = $contact['public_contact'];

            if (key_exists('company', $contact_pub)) {
                $company= "<strong>" . $contact_pub['company'] . "</strong><br/>";
            }


            if (key_exists('last_name', $contact_pub)) {
                $name= "<p><strong>Personne de contact: <strong>" .$contact_pub['first_name'] . " ".$contact_pub['last_name'] . "</p>";
            }

            if (key_exists('channels', $contact_pub) && is_array($contact_pub['channels'])) {
                foreach ($contact_pub['channels'] as $channel) {
                    $index=$channel['sort_key']."-".$channel['type'];

                    if (!is_array($comms[$index])) {
                        $comms[$index]=array();
                    }

                    switch ($channel['type']) {
                        case 'url':
                            array_push(
                                $comms[$index],
                                $channel['labels']['fr']." : 
                            <a href='".$channel['val']."' target='_blank'>".$channel['val']."</a>"
                            );
                            break;

                        case 'mail':
                            array_push(
                                $comms[$index],
                                $channel['labels']['fr']." : 
                            <a href='mailto:".$channel['val']."' >".$channel['val']."</a>"
                            );
                            break;

                        default:
                            array_push(
                                $comms[$index],
                                $channel['labels']['fr']." : ".$channel['val']
                            );
                            break;
                    }
                }
                ksort($comms);
            }

            $sc=array();
            foreach ($comms as $tble) {
                $sc[]=join($tble, "<br />");
            }
            $communications= join($sc, "<br />");
            if($address) {$lieu="<p><i>Lieu</i> : ".$address."</p>"; } else {$lieu="";}
            $result=$lieu."<p><i>Contact</i> : ".$company.$communications."</p>".$name;
        }
    }
    return $result;
}
