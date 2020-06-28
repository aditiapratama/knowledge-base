<?php while (have_posts()) : the_post(); ?>
  <?php
  if ( !get_post_meta( get_the_ID(), 'pakb_hero', true ) ) {
    get_template_part('templates/page', 'header');
  }
  ?>
  <?php get_template_part('templates/content', 'page'); ?>
<?php endwhile; ?>
