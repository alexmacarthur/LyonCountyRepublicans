<?php 
  $args = array(
      'post_type' => 'official',
      'orderby'=>'rand',
      'posts_per_page'   => 1
      
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
              <h3 class="official-name"><?php echo get_field('first_name', $postID) . ' ' . get_field('last_name', $postID); ?></h3>
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
   
