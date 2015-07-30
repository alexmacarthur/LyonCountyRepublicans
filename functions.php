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

	add_theme_support( 'post-thumbnails' ); 

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
		wp_register_style('font-awesome', '//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css', array(), '1');
		wp_register_style('custom-style', get_template_directory_uri() . '/styles/style.css', array('fjalla','font-awesome'), '1');

		// register jQuery with CDN
		wp_deregister_script( 'jquery' );
		wp_register_script('jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js', array(), '2.1.3', true);

		// register custom JavaScript
	    wp_register_script( 'custom-script', get_template_directory_uri() . '/js/scripts.js', array('jquery'), '1', true);
	    wp_register_script( 'dropit', get_template_directory_uri() . '/js/dropit.js', array('jquery'), '1', true);

	    // Enqueue my custom script, which depends on jQuery, which means jQuery is automatically loaded as well. 
	    wp_enqueue_script( 'custom-script' );
	    wp_enqueue_script( 'dropit' );

	    // Enqueue custom styles
	    wp_enqueue_style('custom-style');
	}

	add_action( 'wp_enqueue_scripts', 'enqueue_my_scripts_and_styles' );

	/* custom logo on login screen */
	function my_login_logo() { ?>
	
	    <style type="text/css">
	        body.login div#login h1 a {
	            background-image: url('<?php echo get_template_directory_uri(); ?>/img/logo.svg')!important;
	            padding-bottom: 3px;
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

	add_action('init', 'register_menu');
	function register_menu() {
		register_nav_menu('primary-menu', __('Primary Menu'));
	}

	add_action( 'init', 'create_post_type' );
	function create_post_type() {
	  register_post_type( 'official',
	    array(
	      'labels' => array(
			    'name'               => _x( 'Officials', 'post type general name' ),
			    'singular_name'      => _x( 'Official', 'post type singular name' ),
			    'add_new'            => _x( 'Add New', 'Official' ),
			    'add_new_item'       => __( 'Add New Official' ),
			    'edit_item'          => __( 'Edit Official' ),
			    'new_item'           => __( 'New Official' ),
			    'all_items'          => __( 'All Official' ),
			    'view_item'          => __( 'View Official' ),
			    'search_items'       => __( 'Search Officials' ),
			    'not_found'          => __( 'No official found' ),
			    'not_found_in_trash' => __( 'No official found in the trash' ), 
			    'parent_item_colon'  => '',
			    'menu_name'          => 'Officials'
	      ),
	      	'public' => true,
	      	'has_archive' => true,
	      	'menu_position' => 5,
	    	'supports'      => array('')
	    )
	  );
	  register_post_type( 'board',
	    array(
	      'labels' => array(
			    'name'               => _x( 'Board Members', 'post type general name' ),
			    'singular_name'      => _x( 'Board Member', 'post type singular name' ),
			    'add_new'            => _x( 'Add New', 'Board Member' ),
			    'add_new_item'       => __( 'Add New Board Member' ),
			    'edit_item'          => __( 'Edit Board Member' ),
			    'new_item'           => __( 'New Board Member' ),
			    'all_items'          => __( 'All Board Member' ),
			    'view_item'          => __( 'View Board Member' ),
			    'search_items'       => __( 'Search Board Members' ),
			    'not_found'          => __( 'No board found' ),
			    'not_found_in_trash' => __( 'No board found in the trash' ), 
			    'parent_item_colon'  => '',
			    'menu_name'          => 'Board Members'
	      ),
	      	'public' => true,
	      	'has_archive' => true,
	      	'menu_position' => 5,
	    	'supports'      => array('')
	    )
	  );
	}

	add_filter('manage_official_posts_columns' , 'official_cpt_columns');
	function official_cpt_columns($columns) {
	
		unset(
			$columns['title'],
			$columns['date']
		);

		$new_columns['first_name']  = 'First Name';
		$new_columns['last_name']  = 'Last Name';
        $new_columns['title_position']  = 'Title/Position';
        $new_columns['district']  = 'District';

	    return array_merge($columns, $new_columns);
	}

	add_action( 'manage_official_posts_custom_column', 'my_manage_official_columns', 10, 2 );

	function my_manage_official_columns( $column, $post_id ) {

		global $post;

		switch( $column ) {

			case 'first_name' :

				?>	

				<a href="<?php echo get_site_url(); ?>/wp-admin/post.php?post=<?php echo $post_id; ?>&action=edit"><?php echo get_field('first_name', $post_id); ?></a>
				
				<?php

				break;

			case 'last_name' :

				?>	

				<a href="<?php echo get_site_url(); ?>/wp-admin/post.php?post=<?php echo $post_id; ?>&action=edit"><?php echo get_field('last_name', $post_id); ?></a>
				
				<?php

				break;

			case 'title_position' :

				?>	

				<a href="<?php echo get_site_url(); ?>/wp-admin/post.php?post=<?php echo $post_id; ?>&action=edit"><?php echo get_field('title', $post_id); ?></a>
				
				<?php

				break;

			case 'district' :

				?>	

				<a href="<?php echo get_site_url(); ?>/wp-admin/post.php?post=<?php echo $post_id; ?>&action=edit"><?php echo get_field('district', $post_id); ?></a>
				
				<?php

				break;

			/* Just break out of the switch statement for everything else. */
			default :
				break;
		}
	}
	add_filter('manage_board_posts_columns' , 'board_cpt_columns');
	function board_cpt_columns($columns) {
	
		unset(
			$columns['title'],
			$columns['date']
		);

		$new_columns['bm_first_name']  = 'First Name';
		$new_columns['bm_last_name']  = 'Last Name';
        $new_columns['bm_title']  = 'Title/Position';

	    return array_merge($columns, $new_columns);
	}

	add_action( 'manage_board_posts_custom_column', 'my_manage_board_columns', 10, 2 );

	function my_manage_board_columns( $column, $post_id ) {

		global $post;

		switch( $column ) {

			case 'bm_first_name' :

				?>	

				<a href="<?php echo get_site_url(); ?>/wp-admin/post.php?post=<?php echo $post_id; ?>&action=edit"><?php echo get_field('bm_first_name', $post_id); ?></a>
				
				<?php

				break;

			case 'bm_last_name' :

				?>	

				<a href="<?php echo get_site_url(); ?>/wp-admin/post.php?post=<?php echo $post_id; ?>&action=edit"><?php echo get_field('bm_last_name', $post_id); ?></a>
				
				<?php

				break;

			case 'bm_title' :

				?>	

				<a href="<?php echo get_site_url(); ?>/wp-admin/post.php?post=<?php echo $post_id; ?>&action=edit"><?php echo get_field('bm_title', $post_id); ?></a>
				
				<?php

				break;

			/* Just break out of the switch statement for everything else. */
			default :
				break;
		}
	}

	function checkForOpenings(){
		$boardPositions = array(
			0 => array(
				'title' => 'Co-Chair',
				'number' => 2
				),  
			1 => array(
				'title' => 'Treasurer',
				'number' => 1
				),
			2 => array(
				'title' => 'Secretary',
				'number' => 1
				),
			3 => array(
				'title' => 'District 1 Representative',
				'number' => 1
				),
			4 => array(
				'title' => 'District 2 Representative',
				'number' => 1
				),
			5 => array(
				'title' => 'District 3 Representative',
				'number' => 1
				),
			6 => array(
				'title' => 'District 4 Representative',
				'number' => 1
				),
			7 => array(
				'title' => 'District 5 Representative',
				'number' => 1
				),
			8 => array(
				'title' => 'Auxiliary',
				'number' => 1
				),
			9 => array(
				'title' => 'At Large Representative',
				'number' => 5
				)
		);

		$openingsCheck = false;

		foreach($boardPositions as $position){

			$boardMembersCount = get_posts(array(
				'post_type' => 'board',
				'numberposts' => -1,
				'meta_key' => 'bm_title',
				'meta_value' => (string)trim($position['title'])
				));

			$positionCount = count($boardMembersCount);

			if($positionCount < $position['number']){
				$openingsCheck = true;
			}
		}

		return $openingsCheck;

	}

?>