<?php
/*
 * Template Name: Candidates
 * Description: Displays the officials we support.
 */
?>

<?php get_header(); ?>

    <main class="page-main">

	    <div class="container main-container page-container">

	    	<div class="horizontal-line-holder">
	    		<h1 class="page-title horizontal-line-value"><?php the_title(); ?></h1>
	    	</div>

	 		<div class="row">
	 			<div class="col-md-12 page-content">

	 			<?php 
				  $args = array(
				      	'post_type' => 'official',
				      	'meta_key'	=> 'first_name',
						'orderby'	=> 'meta_value_num',
						'order'		=> 'DESC'
				    );

				  $officials = get_posts($args);

				  if($officials){
				    foreach ($officials as $official){

				      $postID = $official->ID;
				      ?>

				        <div class="featured-official">

				          <div class="official-image" style="background:url('<?php echo get_field('picture', $postID); ?>'); background-position: 50% 10%; background-size:cover;">

				          </div>
				          <div class="official-details">
				              <h3 class="official-name"><?php echo get_field('first_name', $postID); ?></h3>
				              <span class="official-title"><?php echo get_field('title', $postID); ?></span>
				              <?php if(get_field('district', $postID)): ?>
				                <span class="official-district"><?php echo get_field('district', $postID); ?></span>
				              <?php endif; ?>
				          </div>

				        </div>

				      <?php

				    }

				  }


				?>
	 					
	 				<?php the_post(); ?>
	 				<?php the_content(); ?>

	 			</div>
	 			<!--
	 			<div class="col-md-3 sidebar-content">
	 				
		 			<div class="sidebar-section get-involved-section">
						<?php // get_template_part('includes/snippet', 'get-involved'); ?>
					</div>

	 			</div>
	 			-->
	 		</div>

		</div>

    </main>

<?php get_footer() ?>
