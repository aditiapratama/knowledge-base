<?php
if (post_password_required()) {
  return;
}

$reply = false;
if(comments_open()) {
  $reply = true;
}
?>

<?php if (have_comments()) : ?>
  <div id="comments" class="comments module uk-margin-large-top theme-knowledgebase">
    <h2><?php printf(__('Comments on %s', 'knowledge-base'), get_the_title()); ?></h2>

    <ol class="comment-list uk-comment-list">
      <?php wp_list_comments(array('style' => 'ol', 'short_ping' => true, 'reply_text' => __('Reply', 'knowledge-base'), 'avatar_size' => 38)); ?>
    </ol>

    <?php if (get_comment_pages_count() > 1 && get_option('page_comments')) : ?>
      <nav>
        <ul class="pager">
          <?php if (get_previous_comments_link()) : ?>
            <li class="previous"><?php previous_comments_link(__('&larr; Older comments', 'knowledge-base')); ?></li>
          <?php endif; ?>
          <?php if (get_next_comments_link()) : ?>
            <li class="next"><?php next_comments_link(__('Newer comments &rarr;', 'knowledge-base')); ?></li>
          <?php endif; ?>
        </ul>
      </nav>
    <?php endif; ?>
  <?php endif; // have_comments() ?>

  <?php if (!comments_open() && get_comments_number() != '0' && post_type_supports(get_post_type(), 'comments')) : ?>
    <div class="alert alert-warning">
      <?php _e('Comments are closed.', 'knowledge-base'); ?>
    </div>
  </div>
<?php endif; ?>

<?php if($reply) : ?>
  <div id="respond" class="uk-margin-large-top module">
    <h3><?php comment_form_title(__('Leave a Reply', 'knowledge-base'), __('Leave a Reply to %s', 'knowledge-base')); ?></h3>
    <p class="cancel-comment-reply"><?php cancel_comment_reply_link(); ?></p>
    <?php if (get_option('comment_registration') && !is_user_logged_in()) : ?>
      <p><?php printf(__('You must be <a href="%s">logged in</a> to post a comment.', 'knowledge-base'), wp_login_url(get_permalink())); ?></p>
    <?php else : ?>
      <form class="uk-form-stacked" action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">
        <?php if (is_user_logged_in()) : ?>
          <p>
            <?php printf(__('Logged in as <a href="%s/wp-admin/profile.php">%s</a>.', 'knowledge-base'), get_option('siteurl'), $user_identity); ?>
            <a href="<?php echo wp_logout_url(get_permalink()); ?>" title="<?php _e('Log out of this account', 'knowledge-base'); ?>"><?php _e('Log out &raquo;', 'knowledge-base'); ?></a>
          </p>
        <?php else : ?>
          <div class="uk-margin">
            <label class="uk-form-label" for="author"><?php _e('Name', 'knowledge-base'); if ($req) _e(' (required)', 'knowledge-base'); ?></label>
            <input type="text" class="uk-input uk-form-controls" name="author" id="author" value="<?php echo esc_attr($comment_author); ?>" size="22" <?php if ($req) echo 'aria-required="true"'; ?>>
          </div>
          <div class="uk-margin">
            <label class="uk-form-label" for="email"><?php _e('Email (will not be published)', 'knowledge-base'); if ($req) _e(' (required)', 'knowledge-base'); ?></label>
            <input type="email" class="uk-input uk-form-controls" name="email" id="email" value="<?php echo esc_attr($comment_author_email); ?>" size="22" <?php if ($req) echo 'aria-required="true"'; ?>>
          </div>
          <div class="uk-margin">
            <label class="uk-form-label" for="url"><?php _e('Website', 'knowledge-base'); ?></label>
            <input type="url" class="uk-input uk-form-controls" name="url" id="url" value="<?php echo esc_attr($comment_author_url); ?>" size="22">
          </div>
        <?php endif; ?>
        <div class="uk-margin">
          <label class="uk-form-label" for="comment"><?php _e('Comment', 'knowledge-base'); ?></label>
          <textarea name="comment" id="comment" class="uk-textarea uk-form-controls" rows="5" aria-required="true"></textarea>
        </div>
        <p><input name="submit" class="uk-button uk-button-primary" type="submit" id="submit" value="<?php _e('Submit Comment', 'knowledge-base'); ?>"></p>
        <?php comment_id_fields(); ?>
        <?php do_action('comment_form', $post->ID); ?>
      </form>
    <?php endif; ?>
  </div><!-- /#respond -->
<?php endif; ?>
