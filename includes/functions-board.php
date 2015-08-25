<?php
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

	add_filter( 'manage_edit-board_sortable_columns', 'manage_board_sortable_columns' );
	function manage_board_sortable_columns( $sortable_columns ) {

	   $sortable_columns[ 'bm_first_name' ] = 'bm_first_name';
	   $sortable_columns[ 'bm_last_name' ] = 'bm_last_name';
	   $sortable_columns[ 'bm_title' ] = 'bm_title';

	   return $sortable_columns;

	}

?>