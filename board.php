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
	 			<div class="col-md-9 page-content">
	 					
	 				<?php the_post(); ?>
	 				<?php the_content(); ?>

	 				<?php 
	 					$boardMembers = get_posts(array(
	 						'post_type' => 'board',
	 						'numberposts' => -1
	 						));

	 					// $boardPositions = ['Co-Chair','Treasurer','Secretary','District 1 Representative','District 2 Representative','District 3 Representative','District 4 Representative','District 5 Representative','Auxiliary','At Large Representative'];

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

						$CoChair = 0;
						$Treasurer = 0;
						$Secretary = 0;
						$District1Representative = 0;
						$District2Representative = 0;
						$District3Representative = 0;
						$District4Representative = 0;
						$District5Representative = 0;
						$Auxiliary = 0;
						$AtLargeRepresentative = 0;

	 					if($boardMembers){
	 						echo '<ul class="board-members-list">';

	 						foreach($boardPositions as $position){

	 							foreach ($boardMembers as $member){
		 							$id = $member->ID;
		 								if(get_field('bm_title', $id) == $position['title']):
		 							?>

									<li class="board-member-list-item">
										<h4><?php echo get_field('bm_first_name', $id); ?> <?php echo get_field('bm_last_name', $id); ?></h4>
										<span><?php echo get_field('bm_title', $id); ?></span>
										<a href="mailto:lyoncountygop@gmail.com?subject=Message for <?php echo get_field('bm_first_name', $id); ?>">Message <?php echo get_field('bm_first_name', $id); ?></a>

									</li>

		 							<?php
		 								endif;
		 						}

	 						}

	 						echo '</ul>';
	 					}
	 				?>

	 			</div>

	 			<div class="col-md-3 sidebar-content">

	 			<?php
	 			
	 				if(checkForOpenings()){
	 					get_template_part('includes/sidebar','joinboard');
	 				}
	 				
	 				get_template_part('includes/sidebar','involved');
	 				

	 			?>

	 			</div>
	 		</div>

		</div>

    </main>

<?php get_footer() ?>
