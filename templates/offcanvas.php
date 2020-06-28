<div id="offcanvas" data-uk-offcanvas="flip: true; overlay: true" class="uk-offcanvas">
    <div class="uk-offcanvas-bar uk-flex uk-flex-column">

        <button class="uk-offcanvas-close" type="button" data-uk-close></button>

        <?php if ( get_option('options_pakb_logo') ) { ?>
          <a class="uk-logo" title="<?php bloginfo('name'); ?>" href="<?php echo home_url(); ?>"><img src="<?php echo wp_get_attachment_url( get_option('options_pakb_logo') ); ?>" alt="<?php bloginfo('name'); ?>"/></a>
        <?php } else { ?>
          <a class="uk-navbar-item uk-logo uk-text-small" href="<?php echo esc_url(home_url('/')); ?>"><?php bloginfo('name'); ?></a>
        <?php } ?>

        <?php
          if (has_nav_menu('offcanvas_navigation')) :
            wp_nav_menu(array('theme_location' => 'offcanvas_navigation', 'menu_class' => 'uk-nav uk-nav-primary', 'depth' => 1));
          endif;
        ?>

    </div>
</div>
