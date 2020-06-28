<?php global $pakb_helper; ?>
<div id="search-modal" class="uk-flex-top uk-modal-search uk-modal" data-uk-modal>

    <button class="uk-modal-close-full uk-close-large uk-close uk-icon" type="button" data-uk-close></button>
    <div class="uk-modal-dialog uk-padding-large">

      <?php if ( class_exists( 'Pressapps_Knowledge_Base' ) ) {
        echo $pakb_helper->the_search();
      } ?>

    </div>
</div>
