<?php

	function ess_my_scripts() {
		$template_url = get_template_directory_uri();

		wp_register_style('font-google', "//fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i", array(), null, 'all');

		if(current_user_can('activate_plugins')) {
			$handle = 'css-main';
			$src =  $template_url."/css/main.css";
			$deps = '';
			$ver = filemtime(get_template_directory()."/css/main.css");
			$media = 'all';
			wp_register_style( $handle, $src, $deps, $ver, $media );
		} else {
			$handle = 'css-main';
			$src =  $template_url."/css/main.min.css";
			$deps = '';
			$ver = filemtime(get_template_directory()."/css/main.min.css");
			$media = 'all';
			wp_register_style( $handle, $src, $deps, $ver, $media );
		}
		
//		$handle = 'css-dynamic';
//		$src =  $template_url."/css/dynamic.php";
//		$deps = '';
//		$ver = filemtime(get_template_directory()."/css/dynamic.php");
//		$ver = rand();
//		$media = 'screen';
//		wp_register_style( $handle, $src, $deps, $ver, $media );
		
		wp_enqueue_style('font-google');
		wp_enqueue_style('dashicons');
		wp_enqueue_style('css-main');
//		wp_enqueue_style('css-dynamic');

		wp_deregister_script('jquery');
		
		wp_register_script('citron', $template_url.'/js/vendor/tarteaucitron/tarteaucitron.js', false, '1.2', false);

		wp_register_script('jquery', $template_url.'/js/vendor/jquery-3.2.1.min.js', false, '3.2.1', false);
//		wp_register_script('gmap', '//maps.google.com/maps/api/js?v=3.exp&libraries=places&key=AIzaSyDLHN3tnen1zSpuwZOptmu2nie5cGQhZjs', false, null, true);
//		wp_register_script('snap', $template_url.'/js/vendor/snap.svg-min.js', false, '0.4.1', false);

		if(current_user_can('activate_plugins')) {
			$ver = filemtime(get_template_directory()."/js/function.js");
			wp_register_script('js-function', $template_url.'/js/function.js', array('jquery'), $ver, true);
		} else {
			$ver = filemtime(get_template_directory()."/js/function.min.js");
			wp_register_script('js-function', $template_url.'/js/function.min.js', array('jquery'), $ver, true);
		}

		if(current_user_can('activate_plugins')) {
			$ver = filemtime(get_template_directory()."/js/main.js");
			wp_register_script('js-main', $template_url.'/js/main.js', array('jquery'), $ver, true);
		} else {
			$ver = filemtime(get_template_directory()."/js/main.min.js");
			wp_register_script('js-main', $template_url.'/js/main.min.js', array('jquery'), $ver, true);
		}
		
//		$ver = filemtime(get_template_directory()."/js/lang.".pll_current_language().".js");
//		wp_register_script('js-lang', $template_url.'/js/lang.'.pll_current_language().'.js', false, $ver, true);
		
		//wp_register_script('retina', $template_url.'/js/vendor/retina.min.js', false, '1.3.0', true);
//		wp_register_script('isotope', $template_url.'/js/vendor/isotope.pkgd.min.js', false, '3.0.4', true);
		//wp_register_script('js-map', $template_url.'/js/map.min.js', array('jquery', 'gmap'), '1', true);
//		wp_register_script('jquery-ui', $template_url.'/js/vendor/jquery-ui.min.js', array('jquery'), '1.12.0', true);
//		wp_register_script('jquery-nivoslider', $template_url.'/js/vendor/jquery.nivo.slider.pack.js', array('jquery'), '3.2c', true);
		//wp_register_script('jquery-easing', $template_url.'/js/vendor/jquery.easing.1.3.js', array('jquery'), '1.3', true);
		wp_register_script('jquery-fancybox', $template_url.'/js/vendor/jquery.fancybox.min.js', array('jquery'), '3.5.7', true);
//		wp_register_script('jquery-jcarousel', $template_url.'/js/vendor/jquery.jcarousel.min.js', array('jquery'), '0.3.4', true);
//		wp_register_script('jquery-scrollto', $template_url.'/js/vendor/jquery.scrollTo.min.js', array('jquery'), '2.1.3', true);
		//wp_register_script('jquery-ytplayer', $template_url.'/js/vendor/jquery.mb.YTPlayer.min.js', array('jquery'), '1', true);
//		wp_register_script('jquery-sticky', $template_url.'/js/vendor/jquery.sticky-kit.min.js', array('jquery'), '1.1.2', true);
//		wp_register_script('jquery-dotdotdot', $template_url.'/js/vendor/jquery.dotdotdot.min.js', array('jquery'), '1.8.1', true);
		//wp_register_script('jquery-formalize', $template_url.'/js/vendor/jquery.formalize.min.js', array('jquery'), '1.0', true);
		//wp_register_script('jquery-cookie', $template_url.'/js/vendor/jquery.cookie.js', array('jquery'), '1.3.1', true);
		//wp_register_script('jquery-jqprint', $template_url.'/js/vendor/jquery.jqprint-0.3.js', array('jquery'), '1.3', true);
		//wp_register_script('jquery-number', $template_url.'/js/vendor/jquery.number.min.js', array('jquery'), '2.1.0', true);
		//wp_register_script('jquery-waitforimages', $template_url.'/js/vendor/jquery.waitforimages.min.js', array('jquery'), '1', true);
//		wp_register_script('jquery-mousewheel', $template_url.'/js/vendor/jquery.mousewheel.min.js', array('jquery'), '3.1.13', true);
//		wp_register_script('jquery-transit', $template_url.'/js/vendor/jquery.transit.min.js', array('jquery'), '0.9.12', true);
//		wp_register_script('jquery-touchSwipe', $template_url.'/js/vendor/jquery.touchSwipe.min.js', array('jquery'), '1.6', true);
//		wp_register_script('jquery-bxslider', $template_url.'/js/vendor/jquery.bxslider.min.js', array('jquery'), '4.2.12', true);
//		wp_register_script('jquery-matchHeight', $template_url.'/js/vendor/jquery.matchHeight-min.js', array('jquery'), '0.7.2', true);
//		wp_register_script('jquery-calendar', $template_url.'/js/vendor/responsive-calendar.min.js', array('jquery'), '0.9.9', true);
//		wp_register_script('jquery-viewportchecker', $template_url.'/js/vendor/jquery.viewportchecker.min.js', array('jquery'), '1.8.8', true);
//		wp_register_script('jquery-form-validator', $template_url.'/js/vendor/form-validator/jquery.form-validator.min.js', array('jquery'), '2.3.41', true);
//		wp_register_script('parallax', $template_url.'/js/vendor/parallax.min.js', array('jquery'), '1.1', true);
		wp_register_script('jquery-customselect', $template_url.'/js/vendor/jquery.custom-select.min.js', array('jquery'), '1.6.3', true);
		wp_register_script('jquery-mixitup', $template_url.'/js/vendor/mixitup.min.js', array('jquery'), '3.3.1', true);
		wp_register_script('fastclick', $template_url.'/js/vendor/fastclick.js', false, '1.2', true);
//
//		wp_register_script('jquery-history', $template_url.'/js/vendor/jquery.history.min.js', array('jquery'), '1.8', true);
		//wp_register_script('ajaxify', $template_url.'/js/ajaxify-html5.js', array('jquery'), '1', true);

		wp_enqueue_script('citron');
		wp_enqueue_script('jquery');
//		wp_enqueue_script('snap');
//		wp_enqueue_script('jquery-ui');
//		wp_enqueue_script('jquery-nivoslider');
		//wp_enqueue_script('jquery-easing');
		wp_enqueue_script('jquery-fancybox');
//		wp_enqueue_script('jquery-jcarousel');
//		wp_enqueue_script('jquery-scrollto');
		//wp_enqueue_script('jquery-ytplayer');
//		wp_enqueue_script('jquery-sticky');
//		wp_enqueue_script('jquery-dotdotdot');
		//wp_enqueue_script('jquery-formalize');
		//wp_enqueue_script('jquery-cookie');
		//wp_enqueue_script('jquery-jqprint');
		//wp_enqueue_script('jquery-number');
		//wp_enqueue_script('jquery-waitforimages');
//		wp_enqueue_script('jquery-mousewheel');
//		wp_enqueue_script('jquery-transit');
//		wp_enqueue_script('jquery-touchSwipe');
//		wp_enqueue_script('jquery-bxslider');
//		wp_enqueue_script('jquery-matchHeight');
//		wp_enqueue_script('jquery-calendar');
//		wp_enqueue_script('jquery-viewportchecker');
//		wp_enqueue_script('jquery-form-validator');
//		wp_enqueue_script('parallax');
		wp_enqueue_script('jquery-customselect');
		wp_enqueue_script('jquery-mixitup');
		wp_enqueue_script('fastclick');

//		wp_enqueue_script('jquery-history');
		//wp_enqueue_script('ajaxify');

		//wp_enqueue_script('retina');

//		if(is_page_template("template-map1.php") || is_page_template("template-map2.php")) {
//			wp_enqueue_script('gmap');
			//wp_enqueue_script('js-map');
//		}

//		wp_enqueue_script('isotope');
		
//		wp_enqueue_script('js-lang');
		wp_enqueue_script('js-function');
		wp_enqueue_script('js-main');
	}

	if(!is_admin()){
		add_action('wp_enqueue_scripts', 'ess_my_scripts');
	}

?>
