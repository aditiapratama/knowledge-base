<?php global $pakb_helper; ?>
<div class="not-found">
  <h1><i class="icon icon-Close"></i></h1>
  <h1><?php _e('Sorry, but the page you were trying to view does not exist.', 'knowledge-base'); ?></h1>
  <div class="row">
    <div class="col-md-8 col-md-offset-2">
      <?php if ( class_exists( 'Pressapps_Knowledge_Base' ) ) {
        echo $pakb_helper->the_search();
      } ?>
    </div>
  </div>
</div>
