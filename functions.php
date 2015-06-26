<?php
	/* removes tabs on left admin menu */
	function remove_menus(){
		//remove_menu_page( 'edit.php' );   
		//remove_menu_page( 'edit-comments.php' ); 
		//remove_menu_page( 'themes.php' ); 
		//remove_menu_page('plugins.php');
		//remove_menu_page('tools.php');
	}
	add_action('admin_menu', 'remove_menus');
	
	// hide the admin bar on all pages
	add_filter('show_admin_bar', '__return_false');

	/* removes widgets on dashboard */
	function remove_dashboard_meta() {
        //remove_meta_box( 'dashboard_primary', 'dashboard', 'normal' );
        //remove_meta_box( 'dashboard_quick_press', 'dashboard', 'side' );
        //remove_meta_box( 'dashboard_right_now', 'dashboard', 'normal' );
        //remove_meta_box( 'dashboard_activity', 'dashboard', 'side' );
        //remove_meta_box( 'pageparentdiv', 'page', 'normal');
	}
	add_action('admin_init', 'remove_dashboard_meta');

	function enqueue_my_scripts_and_styles(){

		// register the Google font Fjalla
		wp_register_style('fjalla', 'http://fonts.googleapis.com/css?family=Average|Fjalla+One');
		wp_register_style('custom-style', get_template_directory_uri() . '/styles/style.css', array('fjalla'), '1');

		// register jQuery with CDN
		wp_deregister_script( 'jquery' );
		wp_register_script('jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js', array(), '2.1.3', true);

		// register custom JavaScript
	    wp_register_script( 'custom-script', get_template_directory_uri() . '/js/scripts.js', array('jquery'), '1', true);

	    // Enqueue my custom script, which depends on jQuery, which means jQuery is automatically loaded as well. 
	    wp_enqueue_script( 'custom-script' );

	    // Enqueue Fjalla font
	    wp_enqueue_style('custom-style');
	}

	add_action( 'wp_enqueue_scripts', 'enqueue_my_scripts_and_styles' );

	/* custom logo on login screen */
	function my_login_logo() { ?>
	
	    <style type="text/css">
	        body.login div#login h1 a {
	            background-image: url('<?php echo get_template_directory_uri(); ?>/img/LOGO')!important;
	            padding-bottom: 30px;
				width: 82%;
				background-size: contain;
	        }
			#loginform #wp-submit{
				background: rgb(63, 63, 63);
				border-color: black;
				-webkit-box-shadow: inset 0 1px 0 rgba(203, 203, 203, 0.5),0 1px 0 rgba(0,0,0,.15);
				box-shadow: inset 0 1px 0 rgba(231, 231, 231, 0.5),0 1px 0 rgba(0,0,0,.15);
			}
			 .login input:focus{
				border-color: rgba(169, 169, 169, 0.6);
				-webkit-box-shadow: 0 0 2px rgba(205, 205, 205, 0.8);
				box-shadow: 0 0 2px rgba(226, 226, 226, 0.8);
			}
	    </style>
	
	<?php }
	add_action( 'login_enqueue_scripts', 'my_login_logo' );

	function register_menu() {
		register_nav_menu('primary-menu', __('Primary Menu'));
	}
	add_action('init', 'register_menu');
?>