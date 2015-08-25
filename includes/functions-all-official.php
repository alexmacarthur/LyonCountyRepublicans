<?php 
	add_filter('manage_all_official_posts_columns' , 'all_official_cpt_columns');
	function all_official_cpt_columns($columns) {
	
		unset(
			$columns['title'],
			$columns['date']
		);

		$new_columns['AO_first_name']  = 'First Name';
		$new_columns['AO_last_name']  = 'Last Name';
        $new_columns['AO_position']  = 'Position';
        $new_columns['AO_party']  = 'Party';

	    return array_merge($columns, $new_columns);
	}

	add_action( 'manage_all_official_posts_custom_column', 'my_manage_all_official_columns', 10, 2 );

	function my_manage_all_official_columns( $column, $post_id ) {

		global $post;

		switch( $column ) {

			case 'AO_first_name' :

				?>	

				<a href="<?php echo get_site_url(); ?>/wp-admin/post.php?post=<?php echo $post_id; ?>&action=edit"><?php echo get_field('AO_first_name', $post_id); ?></a>
				
				<?php

				break;

			case 'AO_last_name' :

				?>	

				<a href="<?php echo get_site_url(); ?>/wp-admin/post.php?post=<?php echo $post_id; ?>&action=edit"><?php echo get_field('AO_last_name', $post_id); ?></a>
				
				<?php

				break;

			case 'AO_position' :

				?>	

				<a href="<?php echo get_site_url(); ?>/wp-admin/post.php?post=<?php echo $post_id; ?>&action=edit"><?php echo get_field('AO_position', $post_id); ?></a>
				
				<?php

				break;

			case 'AO_party' :

				?>	

				<a href="<?php echo get_site_url(); ?>/wp-admin/post.php?post=<?php echo $post_id; ?>&action=edit"><?php echo get_field('AO_party', $post_id); ?></a>
				
				<?php

				break;

			/* Just break out of the switch statement for everything else. */
			default :
				break;
		}
	}

	add_filter( 'manage_edit-all_official_sortable_columns', 'manage_all_official_sortable_columns' );
	function manage_all_official_sortable_columns( $sortable_columns ) {

	   	$sortable_columns['AO_first_name']  = 'First Name';
		$sortable_columns['AO_last_name']  = 'Last Name';
	    $sortable_columns['AO_position']  = 'Position';
	    $sortable_columns['AO_party']  = 'Party';

	   	return $sortable_columns;

	}
?>