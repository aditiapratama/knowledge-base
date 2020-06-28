<?php get_template_part('templates/head'); ?>
<body <?php body_class(); ?>>

    <?php if ( !class_exists( 'Pressapps_Knowledge_Base' ) ) {
        echo '<h2 style="color: red;">Install and activate PressApps Knowledge Base Plugin</h2>';
    } ?>
        
    <?php
    do_action('get_header');
    get_template_part('templates/header');
    ?>

    <?php if ( is_page() ) {
        get_template_part('templates/hero');
    } ?>

    <?php
    $page_layout = get_post_meta( get_the_ID(), 'pakb_sidebar', true );
    $page_width = !is_null( get_field( 'pakb_width' ) ) ? get_field( 'pakb_width' ) : 0;

    if ( isset( $page_layout ) && $page_layout != 0 ) {
      $layout = $page_layout;
    } else {
      $layout = !is_null( get_field( 'pakb_sidebar', 'option' ) ) ? get_field( 'pakb_sidebar', 'option' ) : 1;
    }

    if ( $layout == 2 ) {
        $cols = ' uk-width-2-3@m uk-flex-last@m';
        $container = $page_width == '1' ? ' uk-container-small' : '';
    } elseif ( $layout == 3 ) {
        $cols = ' uk-width-2-3@m';
        $container = $page_width == '1' ? ' uk-container-small' : '';
    } else {
        $cols = ' uk-width-1-1';
        $container = $page_width != '2' ? ' uk-container-small' : '';
    } ?>
    <div class="uk-container<?php echo esc_html( $container ); ?> uk-margin-large-top" role="document">
        <div data-uk-grid class="uk-flex uk-grid-large">

            <div class="main<?php echo esc_html( $cols ); ?>" role="main">
                <?php include roots_template_path(); ?>
            </div><!-- /.main -->

            <?php if (roots_display_sidebar()) : ?>
                <div class="sidebar uk-width-1-3@m" role="complementary">
                    <?php include roots_sidebar_path(); ?>
                </div><!-- /.sidebar -->
            <?php endif; ?>

        </div>
    </div>

    <?php get_template_part('templates/footer'); ?>

    <?php get_template_part('templates/offcanvas'); ?>

    <?php wp_footer(); ?>

</body>
</html>
