<div class="sidebar-box">

	<h3>Interested in Joining Our Board?</h3>
	<p>You could be a part of an active, passionate organization seeking to make positive change in the SW region of the state and beyond.</p>

		<span class="bold">Current Open Positions:</span>
		<ul class="openings-list">

			<?php 

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

				foreach($boardPositions as $position){

					$boardMembersCount = get_posts(array(
					'post_type' => 'board',
					'numberposts' => -1,
					'meta_key' => 'bm_title',
					'meta_value' => (string)trim($position['title'])
					));

					$positionCount = count($boardMembersCount);

					if($positionCount < $position['number']){
						$difference = $position['number'] - $positionCount;
						?>
						<li>
								
							<?php echo $position['title']; ?>
							
							<?php if($difference > 1){
								echo '('.$difference.')'; 
							}?>

						</li>

						<?php
					}
				}

			?>

			</ul>

	<a class="red-button full-width" href="#">Contact Us!</a>

</div>