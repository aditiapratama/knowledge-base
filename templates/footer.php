<footer class="uk-margin-large-top footer">
    <?php if ( is_active_sidebar('sidebar-footer') ) { ?>
    <div class="uk-section uk-section-muted">
        <div class="uk-container">
            <div class="uk-grid-large uk-child-width-expand@m" data-uk-grid>
                <?php dynamic_sidebar('sidebar-footer'); ?>
            </div>
        </div>
    </div>
    <?php } ?>
    <div class="uk-section uk-section-small">
        <div class="uk-container">
            <div class="uk-child-width-1-2@m uk-flex-middle " data-uk-grid>
                <div class="uk-flex uk-flex-center uk-flex-left@m">
                <?php if ( get_option( 'options_pakb_footer_social' ) ) {
                    echo get_social_bar();
                } ?>
                </div>
                <div class="uk-text-center uk-text-right@m uk-grid-margin"><?php echo !is_null( get_field( 'pakb_footer_copyright', 'option' ) ) ? get_field( 'pakb_footer_copyright', 'option' ) : 'Copyright 2019 PressApps'; ?></div>
            </div>
        </div>
    </div>
</footer>
