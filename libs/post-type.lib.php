<?php

	function create_post_type() {
		
//		register_taxonomy(
//			'filtres_faq',
//			'faq',
//			array(
//				'label' => __( 'Filtres' ),
////				'rewrite' => array( 'slug' => 'filtre' ),
//				'hierarchical' => true
//			)
//		);
		register_post_type( 'equipe',
			array(
				'labels' => array(
					'name' => 'Equipe'
				),
				'public' => true,
				'publicly_queryable' => false,
				'exclude_from_search' => true,
				'supports' => array('title')
			)
		);
		register_post_type( 'livres',
			array(
				'labels' => array(
					'name' => 'Livres'
				),
				'public' => true,
//				'publicly_queryable' => false,
//				'exclude_from_search' => true,
//				'supports' => array('title')
			)
		);
		register_post_type( 'services',
			array(
				'labels' => array(
					'name' => 'Services'
				),
				'public' => true,
//				'publicly_queryable' => false,
//				'exclude_from_search' => true,
//				'supports' => array('title')
			)
		);
		register_post_type( 'blog',
			array(
				'labels' => array(
					'name' => 'Blog'
				),
				'public' => true,
				'supports' => array('title','comments')
			)
		);
	}
	
	add_action( 'init', 'create_post_type' );

?>