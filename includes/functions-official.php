<?php 
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

	add_filter( 'manage_edit-official_sortable_columns', 'manage_official_sortable_columns' );
	function manage_official_sortable_columns( $sortable_columns ) {

	   $sortable_columns[ 'first_name' ] = 'first_name';
	   $sortable_columns[ 'last_name' ] = 'last_name';
	   $sortable_columns[ 'title_position' ] = 'title_position';

	   return $sortable_columns;

	}
?>