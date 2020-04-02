<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 * 
 * $arg = array(
 * "datefork" => fourchette de dates, ex:datefork=2020022120200223
 * "localite" => slug de taxonomie localité
 * "loc_rayon" => km entier de distance à la localité
 * "cat" => id de catégorie
 * );
 * 
 */

function query_hades_events($arg=array()) {
    
    $query = array();
    
    

    $query['post_type'] = 'hades_offre';

        // On crée un tableau $meta_queries avec des valeurs initiales
        $meta_queries = array(
            'date_fin_clause' => array('key' => 'date_fin'),
            'date_deb_clause' => array('key' => 'date_deb'),
            'date_long_clause' => array('key' => 'date_long'),
            'localite_commune_clause' => array('key' => 'localite_commune'),
            'date_tjaff_clause' => array('key' => 'date_tjaff')
        );
        
        $meta_queries['relation'] = 'AND';

        if ($arg["datefork"]) {
            $dates = get_details_from_hades_agenda($arg["datefork"]);

            $meta_queries['date_fin_clause'] = array(
                'key' => 'date_fin',
                'value' => $dates->date_deb,
                'compare' => '>=',
                'type' => 'DATETIME',
            );

            $meta_queries['date_deb_clause'] = array(
                'key' => 'date_deb',
                'value' => $dates->date_fin,
                'compare' => '<=',
                'type' => 'DATETIME',
            );

           
        }

        $tax_queries = array();

        if ($arg["localite"] && strlen($arg["localite"]) > 1 && !$arg["loc_rayon"]) {
            $tax_queries[] = array(
                'taxonomy' => 'localite', //(string) - Taxonomy.
                'field' => 'slug', //(string) - Select taxonomy term by ('id' or 'slug')
                'terms' => get_query_var("localite"), //(int/string/array) - Taxonomy term(s).
            );
        }

        if ($arg["cat"]) {
            $tax_queries[] = array(
                'taxonomy' => 'category',
                'field' => 'id',
                'terms' => $arg["cat"],
                'include_children' => true,
                'operator' => 'IN'
            );
        }

        if (count($tax_queries) > 0) {
            $tax_queries["relation"] = "AND";
        }

        
        if($arg["localite"] &&  $arg["loc_rayon"]>1) 
        {
            $query["extend_where"]= distance_from_where( $where ) ;
 
        }

        // On crée un tableau $order_queries avec des valeurs initiales
        $order_queries = array(
            'date_tjaff_clause' => 'ASC',
            'date_fin_clause' => 'ASC',
            'date_deb_clause' => 'ASC',
            'date_long_clause' => 'ASC',
            'localite_commune_clause' => 'ASC'
        );
        
        $query['meta_query'] = $meta_queries;
        $query['tax_query'] = $tax_queries;
        $query['orderby'] = $order_queries;
        
        return $query;
    
}
