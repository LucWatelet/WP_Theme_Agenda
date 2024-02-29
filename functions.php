<?php

	include(get_template_directory() . "/libs/js.lib.php");
	include(get_template_directory() . "/libs/post-type.lib.php");
	include(get_template_directory() . "/libs/menu.lib.php");
	include(get_template_directory() . "/libs/img.lib.php");

	//load function defined in folder /hades/functions
	$files = new \FilesystemIterator(__DIR__ . '/hades/functions', \FilesystemIterator::SKIP_DOTS);
	foreach ($files as $file) {
		!$files->isDir() and include $files->getRealPath();
	}

	function wpc_show_admin_bar() {
		return false;
	}
	add_filter('show_admin_bar' , 'wpc_show_admin_bar');


	add_action( 'template_redirect', 'private_page' );
	function private_page() {
		if ( is_page(61196) && ! is_user_logged_in() || is_page(61192) && ! is_user_logged_in() ) {
			wp_redirect( site_url( '/login/' ) );
			exit();
		}
	}

	// affichage lien du mot de passe perdu
	add_filter( 'login_form_bottom', 'lien_mot_de_passe_perdu' );
	function lien_mot_de_passe_perdu( $formbottom ) {
		$formbottom .= '<a href="' . wp_lostpassword_url() . '">Mot de passe perdu ?</a>';
		return $formbottom;
	}

	// Formulaire d'inscription
	function register_user_form() {
		echo '<form action="' . admin_url( 'admin-post.php?action=nouvel_utilisateur' ) . '" method="post" id="register-user">';

		// Les champs requis
		echo '<p class="login"><label for="nom-user">Pseudo</label><input type="text" name="username" id="nom-user" required></p>';
		echo '<p class="login"><label for="email-user">Email</label><input type="email" name="email" id="email-user" required></p>';
		echo '<p class="login"><label for="pass-user">Mot de passe</label><input type="password" name="pass" id="pass-user" required></p>';
//		echo '<p class="login-password"><input type="checkbox" id="show-password"><label for="show-password">Voir le mot de passe</label></p>';

		// Nonce (pour vérifier plus tard que l'action a bien été initié par l'utilisateur)
		wp_nonce_field( 'create-' . $_SERVER['REMOTE_ADDR'], 'user-front', false );
		
		echo '<input type="submit" value="Créer mon compte">';
		echo '</form>';

		// Enqueue de scripts qui vont nous permettre de vérifier les champs
		wp_enqueue_script( 'inscription-front' );
	}

	add_action( 'admin_post_nopriv_nouvel_utilisateur', 'ajouter_utilisateur' );
	function ajouter_utilisateur() {
		// Vérifier le nonce (et n'exécuter l'action que s'il est valide)
		if( isset( $_POST['user-front'] ) && wp_verify_nonce( $_POST['user-front'], 'create-' . $_SERVER['REMOTE_ADDR'] ) ) {

			// Vérifier les champs requis
			if ( ! isset( $_POST['username'] ) || ! isset( $_POST['email'] ) || ! isset( $_POST['pass'] ) ) {
				wp_redirect( site_url( '/message/?message=not-user' ) );
				exit();
			}

			$nom = $_POST['username'];
			$email = $_POST['email'];
			$pass = $_POST['pass'];

			// Vérifier que l'user (email ou nom) n'existe pas
			if ( is_email( $email ) && ! username_exists( $nom )  && ! email_exists( $email ) ) {
				// Création de l'utilisateur
				$user_id = wp_create_user( $nom, $pass, $email );
				$user = new WP_User( $user_id );
				// On lui attribue un rôle
				$user->set_role( 'subscriber' );
				// Envoie un mail de notification au nouvel utilisateur
				wp_new_user_notification( $user_id, $pass );
			} else {
				wp_redirect( site_url( '/message/?message=already-registered' ) );
				exit();
			}

			// Connecter automatiquement le nouvel utilisateur
			$creds = array();
			$creds['user_login'] = $nom;
			$creds['user_password'] = $pass;
			$creds['remember'] = false;
			$user = wp_signon( $creds, false );

			// Redirection
			wp_redirect( site_url( '/message/?message=welcome' ) );
			exit();
		}
	}

	add_action( 'wp_enqueue_scripts', 'register_login_script' );
	function register_login_script() {
		// Ce script sera chargé sur toutes les pages du site, afin d'afficher les messages d'erreur
		wp_enqueue_script( 'message' );
	}


//	add_action( 'wp_footer', 'show_user_registration_message' );
	function show_user_registration_message() {
		if ( isset( $_GET['message'] ) ) {
			$wrapper = '<div class="message">%s</div>';
			switch ( $_GET['message'] ) {
				case 'already-registred':
					echo wp_sprintf( $wrapper, 'Un utilisateur possède la même adresse.' );
					break;
				case 'not-user':
					echo wp_sprintf( $wrapper, 'Votre inscription a échouée.' );
					break;
				case 'user-updated':
					echo wp_sprintf( $wrapper, 'Votre profil a été mis à jour.' );
					break;
				case 'need-email':
					echo wp_sprintf( $wrapper, 'Votre profil \'a pas été mis à jour. L\'email doit être renseignée.' );
					break;
				case 'email-exist':
					echo wp_sprintf( $wrapper, 'Votre profil \'a pas été mis à jour. L\'adresse email est déjà utilisée.' );
					break;
				case 'welcome':
					echo wp_sprintf( $wrapper, 'Votre compte a été créé. Vous allez recevoir un email de confirmation.' );
					break;
				default :
			}
		}
	}

	add_action( 'current_screen', 'redirect_non_authorized_user' );
	function redirect_non_authorized_user() {
		// Si t'es pas admin, tu vires
		$user = wp_get_current_user();
		$allowed_roles = array('editor', 'administrator');
		if ( is_user_logged_in() && ! array_intersect($allowed_roles, $user->roles ) ) {
			wp_redirect( home_url( '/' ) );
			exit();
		}
	}

	
	function edit_user_form() {
		if ( is_user_logged_in() ) {
			$userdata = get_userdata( get_current_user_id() );
			echo '<form action="' . admin_url( 'admin-post.php?action=update_utilisateur' ) . '" method="post" id="update-utilisateur">';

			// Pseudo (ne peut pas être changé)
			echo '<p class="login-username"><label for="pseudo-user">Username</label>';
			echo '<input type="text" name="username" id="pseudo-user" value="' . $userdata->user_login . '" disabled></p>';

			// Nom
			echo '<p class="login-name"><label for="nom-user">Nom</label>';
			echo '<input type="text" name="nom" id="nom-user" value="' . $userdata->last_name . '"></p>';

			// Prénom
			echo '<p class="login-prenom"><label for="prenom-user">Prénom</label>';
			echo '<input type="text" name="prenom" id="prenom-user" value="' . $userdata->first_name . '"></p>';

	//		// Nom d'affichage
	//		echo '<p><label for="display_name-user">Nom d\'affichage</label>';
	//		echo '<input type="text" name="display_name" id="display_name-user" value="' . $userdata->display_name . '" required></p>';

	//		// Biographie
	//		echo '<p><label for="nom-user">Description</label>';
	//		echo '<textarea name="bio" id="bio-user">' . $userdata->user_description . '</textarea></p>';
	//		
	//		// Site
	//		echo '<p><label for="site-user">Site web</label>';
	//		echo '<input type="text" name="site" id="site-user" value="' . $userdata->user_url . '"></p>';

			// Email
			echo '<p class="login-mail"><label for="email-user">Email</label>';
			echo '<input type="email" name="email" id="email-user" value="' . $userdata->user_email . '" required></p>';

			// Mot de passe (Mis à jour uniquement si présent)
			echo '<p class="login-password"><label for="pass-user">Mot de passe</label>';
			echo '<input type="password" name="pass" id="pass-user"></p>';
//			echo '<p class="login-see"><input type="checkbox" id="show-password"><label for="show-password">Voir le mot de passe</label></p>';

			// Nonce
			wp_nonce_field( 'update-' . get_current_user_id(), 'user-front' );

			//Validation
			echo '<input type="submit" value="Mettre à jour">';

			echo '</form>';

			// Enqueue de scripts qui vont nous permettre de vérifier les champs
			wp_enqueue_script( 'inscription-front' );
		}
	}

	add_action( 'admin_post_update_utilisateur', 'update_utilisateur' );
	function update_utilisateur() {
		// Vérifier le nonce
		if( isset( $_POST['user-front'] ) && wp_verify_nonce( $_POST['user-front'], 'update-' . get_current_user_id() ) ) {

			// Vérifier les champs requis
			if ( ! isset( $_POST['email'] ) || ! is_email( $_POST['email'] ) ) {
				wp_redirect( site_url( '/message/?message=need-email' ) );
				exit();
			}

			// Si l'email change, alors on vérfie qu'elle n'est pas déjà utilisée
			if ( ( $emailuser = email_exists( $_POST['email'] ) ) && get_current_user_id() != $emailuser ) {
				wp_redirect( site_url( '/message/?message=email-exist' ) );
				exit();
			}

			// Nouvelles valeurs
			$userdata = array(
				'ID' => get_current_user_id(),
				'first_name' => sanitize_text_field( $_POST['prenom'] ),
				'last_name' => sanitize_text_field( $_POST['nom'] ),
	//			'display_name' => sanitize_text_field( $_POST['display_name'] ),
	//			'description' => esc_textarea( $_POST['bio'] ),
				'user_email' => sanitize_email( $_POST['email'] ),
	//			'user_url' => sanitize_url( $_POST['url'] ),
			);

			// On ne met à jour le mot de passe que si un nouveau à été renseigné
			if ( isset( $_POST['pass'] ) && ! empty( $_POST['pass'] ) ) {
				$userdata[ 'user_pass' ] = trim( $_POST['pass'] );
			}

			// Mise à jour de l'utilisateur
			wp_update_user( $userdata );

			// Redirection
			wp_redirect( site_url( '/message/?message=user-updated' ) );
			exit();
		}
	}

	// remove version in public html
	remove_action("wp_head", "wp_generator");


/*    function dn_add_rss_image() {
        global $post;

        $output = '';
        if ( has_post_thumbnail( $post->ID ) ) {
            $thumbnail_ID = get_post_thumbnail_id( $post->ID );
            $thumbnail = wp_get_attachment_image_src( $thumbnail_ID, 'thumbnail' );

            $output .= '<media:content xmlns:media="http://search.yahoo.com/mrss/" medium="image" type="image/jpeg"';
            $output .= ' url="'. $thumbnail[0] .'"';
            $output .= ' width="'. $thumbnail[1] .'"';
            $output .= ' height="'. $thumbnail[2] .'"';
            $output .= ' />';
        }
        echo $output;
    }

	add_action( 'rss2_item', 'dn_add_rss_image' );*/

function add_my_rss_node() {
    global $post;
    if(has_post_thumbnail($post->ID)){
        $thumbnail = get_attachment_link(get_post_thumbnail_id($post->ID));
		echo '<enclosure url="'.$thumbnail.'" type="image/jpeg" length="1" />';

	}
}
add_action('rss2_item', 'add_my_rss_node');

?>