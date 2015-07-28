<?php
/*
 * Template Name: Board Members Page
 * Description: Shows the current board members and openings.
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
	 					
	 				<?php the_post(); ?>
	 				<?php the_content(); ?>

	 				<?php 
	 					$boardMembers = get_posts(array(
	 						'post_type' => 'board',
	 						'numberposts' => -1
	 						));

	 					if($boardMembers){
	 						foreach ($boardMembers as $member){
	 							$id = $member->ID;

	 							?>
										
								<?php echo get_field('bm_last_name', $id); ?>

	 							<?php

	 						}
	 					}
	 				?>


	 			</div>
	 		</div>

		</div>

    </main>

<?php get_footer() ?>
