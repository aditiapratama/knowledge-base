<div class="meta">
		<time class="updated" datetime="<?php echo get_the_time('c'); ?>"><?php echo __('Last Updated:', 'knowledge-base'); ?> <?php echo get_the_date(); ?></time>
		<p class="byline author vcard"><?php echo __('By', 'knowledge-base'); ?> <a href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>" rel="author" class="fn"><?php echo get_the_author(); ?></a></p>
		<p class="cats"><?php echo get_the_category_list(', '); ?></p>
		<?php the_tags('<p class="tags"> ',' ','</p>'); ?>
</div>
