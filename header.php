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
		<script type="text/javascript" src="https://addevent.com/libs/atc/1.6.1/atc.min.js" async defer></script>
		<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAWmENJTWzYyGkA1cADcdpXJ1lYkTDzSTU"></script>
		<script src="<?php echo get_template_directory_uri(); ?>/js/vendor/modernizr-3.3.1-respond-1.4.2.min.js"></script>
		<!-- Matomo -->
		<script type="text/javascript">
		  var _paq = window._paq = window._paq || [];
		  /* tracker methods like "setCustomDimension" should be called before "trackPageView" */
		  _paq.push(['trackPageView']);
		  _paq.push(['enableLinkTracking']);
		  (function() {
			var u="//statistics.luxembourg.be/";
			_paq.push(['setTrackerUrl', u+'matomo.php']);
			_paq.push(['setSiteId', '5']);
			var d=document, g=d.createElement('script'), s=d.getElementsByTagName('script')[0];
			g.type='text/javascript'; g.async=true; g.src=u+'matomo.js'; s.parentNode.insertBefore(g,s);
		  })();
		</script>
		<!-- End Matomo Code -->
	</head>
	<body>
		
	<header id="header">
		<div class="wrapper clearfix">
			<div class="grid-100 tablet-grid-100 mobile-grid-100 grid-parent">
				<div class="grid-55 tablet-grid-50 mobile-grid-70">
					<div class="liste-logo">
						<a id="logo-agenda" href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php echo get_template_directory_uri(); ?>/img/logo_agenda.svg" alt="L'Agenda Plus - Logo"></a>
						<a id="logo-province" target="_blank" href="http://www.province.luxembourg.be/"><img src="<?php echo get_template_directory_uri(); ?>/img/LOGO_PROVINCE.svg" alt="Province de Luxembourg - Logo"></a>
					</div>
				</div>
				<div class="grid-45 tablet-grid-50 mobile-grid-30 mobile-alignright">
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
						<button class="hamburger hamburger--arrowturn" type="button">
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
				<ul>
					<li><a href="<?php echo get_permalink(63574); ?>">Poster une annonce</a></li>

					<?php if ( ! is_user_logged_in() ) { ?>

					<li><a href="<?php echo get_permalink(61188); ?>">Connexion</a></li>

					<?php } else { ?>

					<li><a href="<?php echo get_permalink(61196); ?>">Profil</a></li>

					<?php } ?>
				</ul>
			</nav>
		</div>
	</header>
	
		<?php include 'bouton-annonce.php'; ?>
		