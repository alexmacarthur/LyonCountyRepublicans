<?php 
  $args = array(
      'post_type' => 'tribe_events',
          'meta_key'=>'_EventStartDate',
  'orderby'=>'_EventStartDate',
  'order'=>'DESC'
    );
  $events = get_posts($args);

  if($events){
    foreach ($events as $event){
      $timestamp = strtotime(tribe_get_event_meta( $event->ID, '_EventStartDate', true ));
      $theDate = date('d', $timestamp);
      $theMonth = date('M', $timestamp);
      ?>

      <div class="row upcoming-event-row">
        <div class="col-md-4 date-details">
          <div class="date-box-holder">
            <div class="date-box">
              <span class="date-only"><?php echo $theDate; ?></span>
            </div>
            <span class="month-only"><?php echo $theMonth; ?></span>
          </div>
       </div>

       <div class="col-md-8 event-details">
          
          <a href="<?php the_permalink(); ?>"><h4 class="event-title"><?php echo get_the_title($event->ID); ?></h4></a>
          <span class="event-detail"><?php echo tribe_get_venue($event->ID); ?></span>
          <span class="event-detail"><?php echo tribe_get_start_time($event->ID); ?></span>
          
       </div>

      </div>

      <?php
    }
  }
?>
   
