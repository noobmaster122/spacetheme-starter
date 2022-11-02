<?php
/**
 * custom sidebar template
 * 
 */
?>
<?php
    (function($recent_posts){
        ?>
        <aside class="w-auto m-auto" style="max-width: 300px !important;">
            <div class="w-100 py-2"><?php get_search_form(); ?></div>
            <div class="w-100 recent-posts-container-styles mt-2">
                <h4><?php echo __('Articles récents', SPACETHEME_TEXTDOMAIN); ?></h4>
                <ul class="rounded">
                <?php foreach( $recent_posts as $post_item ) : ?>
                    <li class="px-2 py-1">
                        <a href="<?php echo get_permalink($post_item['ID']) ?>">
                            <?php echo $post_item['post_title']; ?>
                        </a>
                    </li>
                <?php endforeach; ?>
                </ul>
            </div>
            <div class="w-100">
                <?php if ( is_active_sidebar( 'special-offer-widget' ) ): ?>
		           <?php dynamic_sidebar( 'special-offer-widget' ); ?>
	            <?php endif; ?>
            </div>
        </aside>
        <?php
    })(wp_get_recent_posts(array(
        'numberposts' => 4, // Number of recent posts thumbnails to display
    )));
?>