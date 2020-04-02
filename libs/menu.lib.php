<?php

	function register_my_menu() {
		register_nav_menu( 'main', __( 'Main Menu' ) );
		register_nav_menu( 'secondary', __( 'Secondary Menu' ) );
		register_nav_menu( 'footer', __( 'Footer Menu' ) );
	}
	
	add_action( 'init', 'register_my_menu' );
	
?>