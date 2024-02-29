<?php

	function create_post_type() {
		
		register_taxonomy(
			'filtres_blog',
			'blog',
			array(
				'label' => __( 'Filtres' ),
				'hierarchical' => true
			)
		);
		register_post_type( 'blog',
			array(
				'labels' => array(
					'name' => 'Blog'
				),
				'taxonomies' => array('filtres_blog'),
				'public' => true,
				'supports' => array('title','comments')
			)
		);

	}
	
	add_action( 'init', 'create_post_type' );

?>