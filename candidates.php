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
	    		<i class="fa fa-star left"></i>
	    		<h1 class="page-title horizontal-line-value"><?php the_title(); ?></h1>
	    		<i class="fa fa-star right"></i>
	    	</div>

	 		<div class="row">
	 			<div class="col-md-9 page-content">

	 				<div class="row">

	 				<?php the_post(); ?>
	 				<?php the_content(); ?>

		 			<?php 
					  $args = array(
					      	'post_type' => 'official',
					      	'posts_per_page' => -1,
					      	'meta_key'			=> 'last_name',
							'orderby'			=> 'meta_value_num',
							'order'				=> 'ASC'
					    );

					  $officialsPage = get_posts($args);

					  if($officialsPage){
					    foreach ($officialsPage as $official){

					      $postID = $official->ID;
					      ?>

					        <div class="col-md-4 featured-official">

					          <div class="official-image" style="background:url('<?php echo get_field('picture', $postID); ?>'); background-position: 50% 10%; background-size:cover;">

					          </div>
					          <div class="official-details">
					              <h3 class="official-name"><?php echo get_field('first_name', $postID) . ' ' . get_field('last_name', $postID); ?></h3>
					              <span class="official-title"><?php echo get_field('title', $postID); ?></span>
					              <?php if(get_field('district', $postID)): ?>
					                <span class="official-district"><?php echo get_field('district', $postID); ?></span>
					              <?php endif; ?>
					              <?php if(get_field('link', $postID)): ?>
					                <span class="official-link"><a class="official-info" href="<?php echo get_field('link', $postID); ?>">More Info</a></span>
					              <?php endif; ?>
					          </div>

					        </div>

					      <?php

					    }

					  }


					?>

					</div>
	 					
	 			</div>
	 			
	 			<div class="col-md-3 sidebar-content">
	 				
					<div class="sidebar-box">
		 				<h4>Sign up for our mailing list</h4>
		 				<span class="signup-description">Get updates on upcoming events, related news, and opportunities to get involved.</span>
		 				<?php echo smlsubform(); ?>
	 				<div class="sidebar-box">

	 				<?php get_template_part('includes/sidebar','involved'); ?>

	 			</div>
	 			
	 		</div>

		</div>

    </main>

<?php get_footer() ?>
