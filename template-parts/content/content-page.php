<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Spacetheme
 * 
 */

?>

<article <?php post_class('col-12 col-lg-8 col-xl-7 p-2'); ?> style="" id="page-<?php the_ID(); ?>">
    <?php the_title("<h1 class='text-center text-capitalize mx-auto mb-4 pb-2' >", "</h1>"); ?>
    <div class="spacetheme-breadcrumbs-container d-flex align-items-center">
        <?php echo do_shortcode( '[flexy_breadcrumb]'); ?></div>
    <div class="mt-4">
        <?php the_content(); ?>       
    </div>
    <?php if ( get_edit_post_link() ) : ?>
    <footer class="entry-footer default-max-width">
        <?php
			edit_post_link(
				sprintf(
					/* translators: %s: Name of current post. Only visible to screen readers. */
					esc_html__( 'Edit %s', 'twentytwentyone' ),
					'<span class="screen-reader-text">' . get_the_title() . '</span>'
				),
				'<span class="edit-link">',
				'</span>'
			);
			?>
    </footer><!-- .entry-footer -->
    <?php endif; ?>
</article><!-- #post-<?php the_ID(); ?> -->