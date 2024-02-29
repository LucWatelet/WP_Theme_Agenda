<?php $id = get_the_ID(); ?>

<div id="formulaire-recherche">
	<h1>Recherche spécifique</h1>
    <form id="search" action="<?php echo home_url('/agenda/'); ?>">
        <ul class="clearfix">
        <li>
                <select name="cat" id="quoi">
                    <?php
                    /* Marchés et Brocantes */
                    $link[0]["name"] = "Brocantes et Marchés";
                    $link[0]["url"] = "80";
                    $link[0]["image"] = "picto-brocante.svg";
                    //
                    /*Concert*/
                    $link[7]["name"] = "Concerts";
                    $link[7]["url"] = "13";
                    $link[7]["image"] = "picto-concert.svg";
                    //
                    /*Conférences, Rencontres et Salons*/
                    $link[1]["name"] = "Conférences, rencontres, salons et visites guidées";
                    $link[1]["url"] = "72";
                    $link[1]["image"] = "picto-conference.svg";
                    //
                    /*Évènements sportifs*/
                    $link[2]["name"] = "évènements sportifs";
                    $link[2]["url"] = "70";
                    $link[2]["image"] = "picto-sportif.svg";
                    //
                    /*Expositions*/
                    $link[3]["name"] = "Expositions";
                    $link[3]["url"] = "73";
                    $link[3]["image"] = "picto-exposition.svg";
                    //
                    /*Festivals*/
                    $link[4]["name"] = "Festivals";
                    $link[4]["url"] = "74";
                    $link[4]["image"] = "picto-festival.svg";
                    //
                    /*Fêtes*/
                    $link[5]["name"] = "Fêtes et Folklore";
                    $link[5]["url"] = "75";
                    $link[5]["image"] = "picto-folklore.svg";
                    //
                    /*Jeux*/
                    $link[6]["name"] = "Jeux";
                    $link[6]["url"] = "77";
                    $link[6]["image"] = "picto-jeux.svg";
                    //
                    /*Projection Ciné-club*/
                    $link[8]["name"] = "Projections";
                    $link[8]["url"] = "71";
                    $link[8]["image"] = "picto-projection.svg";

                    /* Promenades */
                    $link[9]["name"] = "Promenades";
                    $link[9]["url"] = "81";
                    $link[9]["image"] = "picto-promenade.svg";

                    /*Spectacles*/
                    $link[10]["name"] = "Spectacles";
                    $link[10]["url"] = "82";
                    $link[10]["image"] = "picto-spectacles.svg";
                    //
                    /*Stages et Ateliers*/
                    $link[11]["name"] = "Stages et Ateliers";
                    $link[11]["url"] = "83";
                    $link[11]["image"] = "picto-stage.svg";

					?>
					<option value="" >Quoi ?</option>
					<?php
					
                    foreach ($link as $key => $value) {
                        ?>
                        <option 
                            value="<?php echo($value["url"]); ?>"
                            <?php echo $value["url"] == get_query_var('cat') ? "selected='selected'" : ""; ?>
                            ><?php echo($value["name"]); ?>
                        </option>
                        <?php
                    }
                    ?>
                </select>
            </li> 
            <li>
                <select name="datefork" id="datefork">
                    <option 
                    <?php $d1 = date("Ymd", time()) . date("Ymd", time() + (3600 * 24 * 365)); ?>
                        value="<?php echo $d1; ?>" 
                        <?php echo $d1 == get_query_var('datefork') ? "selected='selected'" : ""; ?>
                        >
                        Quand ?
                    </option>
                    <option 
                    <?php $d2 = date("Ymd", time()); ?>
                        value="<?php echo $d2; ?>" 
                        <?php echo $d2 == get_query_var('datefork') ? "selected='selected'" : ""; ?>
                        >
                        Aujourd'hui
                    </option>
                    <option 
                    <?php $d3 = date("Ymd", time() + (3600 * 24)); ?>
                        value="<?php echo $d3; ?>" 
                        <?php echo $d3 == get_query_var('datefork') ? "selected='selected'" : ""; ?>
                        >
                        Demain
                    </option>
                    <option 
                    <?php
                    $datedep = time();
                    while (date('N', $datedep) < 5)
                        $datedep += (3600 * 24);
                    $n = date('N', $datedep);
                    $d4 = date("Ymd", $datedep) . date("Ymd", $datedep + (3600 * 24) * (7 - $n));
                    ?>
                        value="<?php echo $d4; ?>" 
                        <?php echo $d4 == get_query_var('datefork') ? "selected='selected'" : ""; ?>
                        >
                        Ce week-end
                    </option>
                    <option 
                    <?php $d5 = date("Ymd", time()) . date("Ymd", time() + (3600 * 24 * 7)); ?>
                        value="<?php echo $d5; ?>" 
                        <?php echo $d5 == get_query_var('datefork') ? "selected='selected'" : ""; ?>
                        >
                        Les 7 prochains jours
                    </option>
                    <option 
                    <?php $d6 = date("Ymd", time()) . date("Ymd", time() + (3600 * 24 * 30)); ?>
                        value="<?php echo $d6; ?>" 
                        <?php echo $d6 == get_query_var('datefork') ? "selected='selected'" : ""; ?>
                        >
                        Les 30 prochains jours
                    </option>
                </select>
            </li>
			<li>
                <?php
                $args_com = array(
                    'show_option_all' => __('Où ?'),
                    'orderby' => 'name',
                    'order' => 'ASC',
                    'show_count' => 0,
                    'hide_empty' => 1,
                    'echo' => 0,
                    'name' => 'commune',
                    'id' => 'commune',
                    'hierarchical' => FALSE,
                    'depth' => 1,
                    'taxonomy' => HADES_TAXO_COM,
                    'hide_if_empty' => true,
                    'value_field' => 'slug',
                );
                // Y-a-t'il une ville actuellement sélectionnée ?
                if (get_query_var('commune') && ( $t = term_exists(get_query_var('commune'), HADES_TAXO_COM) )) {
                    $args_com['selected'] = get_query_var('commune');
                }
                
                $listcom = wp_dropdown_categories($args_com);
                
                // Afficher la liste s'il existe des villes associées à des contenus
                if ($listcom) {
                    echo $listcom;
                }
                ?>
            </li>
            <li>
                <select name="loc_rayon" id="loc_rayon">
                <option 
                        value=""
                        <?php echo null == get_query_var('loc_rayon') ? "selected='selected'" : ""; ?>
                        >
                        Distance ?
                    </option>
                    <option 
                        value="10"
                        <?php echo 10 == get_query_var('loc_rayon') ? "selected='selected'" : ""; ?>
                        >
                        10 Km
                    </option>
                    <option 
                        value="15"
                        <?php echo 15 == get_query_var('loc_rayon') ? "selected='selected'" : ""; ?>
                        >
                        15 Km</option>
                    <option 
                        value="20"
                        <?php echo 20 == get_query_var('loc_rayon') ? "selected='selected'" : ""; ?>
                        >
                        20 Km
                    </option>
                    <option 
                        value="25"
                        <?php echo 25 == get_query_var('loc_rayon') ? "selected='selected'" : ""; ?>
                        >
                        25 Km
                    </option>
                    <option 
                        value="30"
                        <?php echo 30 == get_query_var('loc_rayon') ? "selected='selected'" : ""; ?>
                        >
                        30 Km
                    </option>
                </select>
            </li>
            <li>
			<button id="search-btn" type="submit" value="Rechercher"></button>
            </li>
        </ul>
    </form>
</div>




<div id="liste-theme">
	<h1>Ou par type d'évènement:
		<?php if($id == 52585): ?>
			<button onclick="location.href='<?php echo get_permalink(52585); ?>'" type="button" id="reset-btn" value="Reset">Réinitialiser</button>
		<?php endif; ?>
	</h1>
    <ul class="clearfix">

        <?php
        foreach ($link as $key => $value) {
            ?>

            <li class="grid-33 tablet-grid-50 mobile-grid-100">
                <a href="<?php echo get_site_url(); ?>/agenda/?cat=<?php echo($value["url"]); ?>">
                    <img class="picto" src="<?php echo get_template_directory_uri(); ?>/img/<?php echo($value["image"]); ?>" alt="picto">
                    <h3><?php echo($value["name"]); ?></h3>
                </a>
            </li>

            <?php
        }
        ?>
    </ul>
</div>