<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="fr"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang="fr"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang="fr"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="fr"> <!--<![endif]-->
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<title><?php wp_title(''); ?></title>

		<link rel="icon" type="image/x-icon" href="/favicon.gif" />

		<meta name="viewport" content="width=device-width, initial-scale=1">

		<script type="text/javascript">
			var tarteaucitronForceLanguage = 'fr';
		</script>

		<?php wp_head(); ?>
		
		<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAWmENJTWzYyGkA1cADcdpXJ1lYkTDzSTU"></script>
		<script src="<?php echo get_template_directory_uri(); ?>/js/vendor/modernizr-3.3.1-respond-1.4.2.min.js"></script>
		
		<header id="header">
			<div class="wrapper clearfix">
				<div class="grid-100 tablet-grid-100 mobile-grid-100 grid-parent">
					<div class="grid-55 tablet-grid-50 mobile-grid-50">
						<div class="encadrer-logo">
							<a id="logo" href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php echo get_template_directory_uri(); ?>/img/logo_agenda.svg" alt="L'Agenda Plus - Logo"></a>
							<a id="logo-province" class="hide-on-mobile" target="_blank" href="http://www.province.luxembourg.be/fr/accueil.html?IDC=2775#.XUFy-5MzbWY"><img src="<?php echo get_template_directory_uri(); ?>/img/LOGO_PROVINCE.svg" alt="Province du Luxembourg - Logo"></a>
						</div>
					</div>
					<div class="grid-45 tablet-grid-50 mobile-grid-50 mobile-alignright">
						<div class="navigation-secondaire clearfix hide-on-mobile">
							<nav class="navigation clearfix">
								<?php
									wp_nav_menu(
										array(
											'theme_location' => 'secondary',
											'container' => false
										)
									);
								?>
							</nav>
						</div>
						<div class="border hide-on-mobile"></div>
						<div class="navigation-principal clearfix hide-on-mobile">
							<nav class="navigation clearfix">
								<?php
									wp_nav_menu(
										array(
											'theme_location' => 'main',
											'container' => false
										)
									);
								?>
							</nav>
						</div>
						<div class="hide-on-desktop hide-on-portable hide-on-tablet">
							<button class="hamburger hamburger--slider" type="button">
								<span class="hamburger-box">
									<span class="hamburger-inner"></span>
								</span>
							</button>
						</div>
					</div>
				</div>
			</div>
			<div id="affichage-navigation">
					<nav>
						<?php
							wp_nav_menu(
								array(
									'theme_location' => 'main',
									'container' => false
								)
							);
						?>
						<?php
							wp_nav_menu(
								array(
									'theme_location' => 'secondary',
									'container' => false
								)
							);
						?>
					</nav>
				</div>
		</header>
	</head>
	<body>
	
		