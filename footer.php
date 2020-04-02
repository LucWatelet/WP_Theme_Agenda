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
			<div class="logo grid-30 tablet-grid-30 mobile-grid-100">
				<a id="logo" href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php echo get_template_directory_uri(); ?>/img/logo_agenda.svg" alt="L'Agenda Plus - Logo"></a>
			</div>
			<div class="coordonnees-contact grid-40 tablet-grid-40 mobile-grid-100">
				<a id="logo-province" href="http://www.province.luxembourg.be/fr/accueil.html?IDC=2775#.XUFy-5MzbWY" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/img/LOGO_PROVINCE.svg" alt="Province du Luxembourg - Logo"></a>
				<p>Service Culture et Sport<br>Place de l'Abbaye 12 - 6870 Saint-Hubert</p>
				<p><a href="tel:003261250153">+32 (0)61 250 153</a> ou <a href="tel:003261250159">+32 (0)61 250 159</a><br>
					<a href="mailto:lagenda.plus@province.luxembourg.be">lagenda.plus@province.luxembourg.be</a></p>
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
						<a href="#"><img class="social" src="<?php echo get_template_directory_uri(); ?>/img/fb.svg" alt="Lien page facebook"></a>
					</li>
					<li>
						<a href="#"><img class="social" src="<?php echo get_template_directory_uri(); ?>/img/youtube.svg" alt="Lien page youtube"></a>
					</li>
					<li>
						<a href="#"><img class="social" src="<?php echo get_template_directory_uri(); ?>/img/instagram.svg" alt="Lien page instagram"></a>
					</li>
					<li>
						<a href="#"><img class="social" src="<?php echo get_template_directory_uri(); ?>/img/google.svg" alt="Lien page google+"></a>
					</li>
				</ul>
			</div>
		</div>
	</div>
	<div id="footer-bottom">
		<div class="wrapper clearfix">
			<div class="grid-100 tablet-grid-100 mobile-grid-100">
				<p>© <?php echo date("Y"); ?> ● Province du Luxembourg ● All Rights Reserved ● <a href="<?php echo get_permalink(52762); ?>">Mentions légales</a> ● Website by <a href="https://graphisterie.lu" target="_blank">Graphisterie Générale</a></p>
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