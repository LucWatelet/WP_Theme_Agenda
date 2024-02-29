<section class="separator pad-top-bot">
		<div class="wrapper clearfix">
			<div class="grid-100 tablet-grid-100 mobile-grid-100">
				<div class="separateur"></div>
			</div>
		</div>
</section>


<footer id="footer">
	<div id="footer-top">
		<div class="wrapper clearfix">
			<div class="bg-image-carte"></div>
			<div class="logo-agenda grid-30 tablet-grid-30 mobile-grid-50">
				<a id="logo" href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php echo get_template_directory_uri(); ?>/img/logo_agenda.svg" alt="L'Agenda Plus - Logo"></a>
			</div>
			<div class="logo-province grid-40 tablet-grid-40 mobile-grid-50">
				<a id="logo" href="http://www.province.luxembourg.be/" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/img/LOGO_PROVINCE.svg" alt="Province du Luxembourg - Logo"></a>
			</div>
			<div class="lien-legales grid-30 tablet-grid-30 mobile-grid-100">
				<nav class="navigation clearfix">
					<?php
						wp_nav_menu(
							array(
								'theme_location' => 'footer',
								'container' => false
							)
						);
					?>
				</nav>
				<ul class="social-network clearfix">
					<li>
						<a href="https://www.facebook.com/LaProvincedeLuxembourg" target="_blank"><img class="social" src="<?php echo get_template_directory_uri(); ?>/img/fb.svg" alt="Lien page facebook"></a>
					</li>
					<li>
						<a href="https://www.youtube.com/channel/UC_uupDOGO3e3hPX9DZFsHzQ/featured" target="_blank"><img class="social" src="<?php echo get_template_directory_uri(); ?>/img/youtube.svg" alt="Lien page youtube"></a>
					</li>
					<li>
						<a href="https://www.instagram.com/provlux/" target="_blank"><img class="social" src="<?php echo get_template_directory_uri(); ?>/img/instagram.svg" alt="Lien page instagram"></a>
					</li>
					<li>
					<a href="https://www.linkedin.com/organization-guest/company/province-de-luxembourg?challengeId=AQEWjRY8wn4OqAAAAXN1eun_SEdaNQUeuZaJl832gu0lZP1CoDfuSxgANU2IijG4IgckUyz70quROtxyTrs46fPYvaEeGNsUZQ&submissionId=20a030ba-5a03-2416-9ef8-2ce27bf47106" target="_blank"><img class="social" src="<?php echo get_template_directory_uri(); ?>/img/LINKEDIN.svg" alt="icon-linkedin"></a>
					</li>
				</ul>
			</div>
		</div>
	</div>
	<div id="footer-bottom">
		<div class="wrapper clearfix">
			<div class="grid-100 tablet-grid-100 mobile-grid-100">
				<p>© <?php echo date("Y"); ?> ● Province de Luxembourg ● All Rights Reserved ● <a href="<?php echo get_permalink(52762); ?>">Mentions légales</a> ● Website by <a href="https://graphisterie.lu" target="_blank">Graphisterie Générale</a></p>
			</div>
		</div>
	</div>
	<div class="bloc-scroll-top"><a href="#header"><img src="<?php echo get_template_directory_uri(); ?>/img/fleche-top.svg"></a></div>
</footer>


<?php wp_footer(); ?>
		<!--[if (gte IE 6)&(lte IE 8)]>
		  <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/vendor/selectivizr-min.js"></script>
		<![endif]-->
	</body>
</html>