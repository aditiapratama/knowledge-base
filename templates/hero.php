<?php global $pakb_helper;
if ( !get_post_meta( get_the_ID(), 'pakb_hero', true ) ) {
  return;
}
$hero_image = get_post_meta( get_the_ID(), 'pakb_hero_image', true );
$hero_bg = get_post_meta( get_the_ID(), 'pakb_hero_bg', true );
?>
<div class="hero uk-background-blend-soft-light uk-background-cover" style="background-image: url(<?php echo wp_get_attachment_url( $hero_image ); ?>); background-color: <?php echo $hero_bg; ?>;">
    <div class="uk-container uk-container-xsmall">
        <div class="uk-section uk-section-large">
            <div class="uk-text-center">
              <?php get_template_part('templates/page', 'header'); ?>
            </div>
            <?php if ( class_exists( 'Pressapps_Knowledge_Base' ) && get_post_meta( get_the_ID(), 'pakb_hero_search', true ) ) {
              echo '<div class="uk-margin-medium-top">';
              echo $pakb_helper->the_search();
              echo '</div>';
            } ?>
        </div>
    </div>
</div>
