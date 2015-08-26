<?php
/*
 * Template Name: All Officials
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
					      	'post_type' => 'all_official',
					      	'posts_per_page' 	=> -1
					    );

						$allOfficialsPage = get_posts($args);

						$officialPositions = ['U.S. President','U.S. Vice President','U.S. Senator','U.S. Representative','MN Senator','MN Representative'];

						foreach($officialPositions as $position){
						  	foreach($allOfficialsPage as $official){
						  		$postID = $official->ID;
						  		if(get_field('AO_position', $postID) == $position){
						  			?>

									<div class="col-md-4 featured-official">

							        <div class="official-image" style="background:url('<?php echo get_field('AO_profile_image', $postID); ?>'); background-position: 50% 10%; background-size:cover;">
							        	<?php 
							        		if(get_field('AO_party', $postID) == 'Republican'){
							        			$partyClass = 'republican';
							        			$partyLabel = 'Republican Party';
							        		}elseif(get_field('AO_party', $postID) == 'Democrat'){
							        			$partyClass = 'democrat';
							        			$partyLabel = 'Democratic Party';
							        		}else{
							        			$partyClass = 'other';
							        			$partyLabel = get_field('AO_other_party', $postID);
							        		}
							        	?>
							        	<div class="party-circle <?php echo $partyClass; ?>">
											<?php echo $partyLabel; ?>
							        	</div>
							        </div>

							        <div class="official-details">
							            <h3 class="official-name"><?php echo get_field('AO_first_name', $postID) . ' ' . get_field('AO_last_name', $postID); ?></h3>
							            <span class="official-title"><?php echo get_field('AO_position', $postID); ?></span>
							            <?php if(get_field('AO_website', $postID)): ?>
							                <span class="official-link"><a target="_blank" class="official-info" href="<?php echo get_field('AO_website', $postID); ?>">Official Website</a></span>
							            <?php endif; ?>
							            <?php if(get_field('AO_contact_online', $postID)): ?>
							              	<span class="official-link"><a target="_blank" class="official-info red-button" href="<?php echo get_field('AO_contact_online', $postID); ?>">Contact Online</a></span>
							            <?php endif; ?>
							            <?php if(get_field('AO_phone_number', $postID)): ?>
							                <span class="official-phone"><i class="fa fa-phone"></i><a href="tel:<?php echo get_field('AO_phone_number', $postID); ?>"><?php echo get_field('AO_phone_number', $postID); ?></a></span>
							            <?php endif; ?>

							        </div>

							        </div>

						  			<?php
						  		}
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
