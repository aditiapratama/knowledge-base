<?php $navbar_search = !is_null( get_field( 'pakb_navbar_search', 'option' ) ) ? get_field( 'pakb_navbar_search', 'option' ) : true; ?>
<nav class="uk-navbar-container" role="navigation">
    <div class="uk-container">
        <div data-uk-navbar class="uk-navbar">
            <div class="nav-overlay uk-navbar-left">
                <?php if ( get_option('options_pakb_logo') ) { ?>
                  <a class="navbar-brand-img" title="<?php bloginfo('name'); ?>" href="<?php echo home_url(); ?>"><img src="<?php echo wp_get_attachment_url( get_option('options_pakb_logo') ); ?>" alt="<?php bloginfo('name'); ?>"/></a>
                <?php } else { ?>
                  <a class="uk-logo" href="<?php echo esc_url(home_url('/')); ?>"><?php bloginfo('name'); ?></a>
                <?php } ?>
                  <div class="site-description">
                    <?php bloginfo('description'); ?>
                  </div>
            </div>
            <div class="nav-overlay uk-navbar-item uk-navbar-right">
              <div class="uk-visible@m">
                  <?php
                    if (has_nav_menu('primary_navigation')) :
                      wp_nav_menu(array('theme_location' => 'primary_navigation', 'menu_class' => 'uk-margin-medium-left uk-navbar-nav'));
                    endif;
                  ?>
              </div>
              <?php if ( $navbar_search && class_exists( 'Pressapps_Knowledge_Base' ) ) { ?>
                <a class="uk-navbar-toggle" data-uk-search-icon data-uk-toggle="target: .nav-overlay; animation: uk-animation-fade" href="#"></a>
              <?php } ?>
              <a class="uk-navbar-toggle uk-hidden@m uk-navbar-toggle-icon uk-icon" href="#offcanvas" data-uk-navbar-toggle-icon data-uk-toggle></a>
            </div>
            <?php if ( $navbar_search && class_exists( 'Pressapps_Knowledge_Base' ) ) {
              $search_placeholder = !is_null( get_field( 'pakb_search_placeholder', 'option' ) ) ? trim( strip_tags( get_field( 'pakb_search_placeholder', 'option' ) ) ) : 'Search for answers';
              $live_search = !is_null( get_field( 'pakb_search_live', 'option' ) ) ? get_field( 'pakb_search_live', 'option' ) : true;
            ?>
            <div class="nav-overlay uk-navbar-left uk-flex-1" hidden>
              <div class="uk-navbar-item uk-width-expand">
                <?php
                echo '<form role="search" class="uk-search uk-search-navbar uk-width-1-1" method="post" id="kbsearchform" action="' . home_url( '/' ) . '">';
                echo '<input type="search" value="' . ( is_search() ? get_search_query() : '') . '" name="s" placeholder="' . ( ! empty( $search_placeholder ) ? $search_placeholder : '' ) . '" id="kb-s" class="uk-search-input' . ( $live_search ? ' autosuggest' : '' ) . '" autofocus />';
                echo '<input type="hidden" name="post_type" value="knowledgebase"/>';
                echo wp_nonce_field( 'knowedgebase-search', 'search_nonce', false, false );
                echo '</form>';
                ?>
              </div>
              <a class="uk-navbar-toggle" data-uk-close data-uk-toggle="target: .nav-overlay; animation: uk-animation-fade" href="#"></a>
            </div>
            <?php } ?>
        </div>
    </div>
</nav>
