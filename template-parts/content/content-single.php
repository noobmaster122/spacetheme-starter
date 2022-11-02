<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Spacetheme
 * 
 */

?>

<!-- article content template -->
<article  <?php post_class('col-12 col-lg-8 col-xl-7 p-2'); ?> style="" id="post-<?php the_ID(); ?>" >
	<?php the_title("<h1 class='text-center text-capitalize mx-auto mb-4 pb-2' >", "</h1>"); ?>
	<div class="spacetheme-breadcrumbs-container d-flex align-items-center"><?php echo do_shortcode( '[flexy_breadcrumb]'); ?></div>
	<div class="mt-4"> 
		<?php the_content(); ?>
		<p class="m-0"> <?php _e('écrit par', SPACETHEME_TEXTDOMAIN); ?> : <em><?php echo the_author(); ?></em></p>
		<?php 
			wp_link_pages(
				array(
					'before'   => '<nav class="page-links" aria-label="' . esc_attr__( 'Page', SPACETHEME_TEXTDOMAIN ) . '">',
					'after'    => '</nav>',
					/* translators: %: Page number. */
					'pagelink' => esc_html__( 'Page %', SPACETHEME_TEXTDOMAIN ),
				)
			);
		?>
	</div>
</article><!-- #post-<?php the_ID(); ?> -->
<?php
if ( is_attachment() ) {
		// Parent post navigation.
		the_post_navigation(
			array(
				/* translators: %s: Parent post link. */
				'prev_text' => sprintf( __( '<span class="meta-nav">Published in</span><span class="post-title">%s</span>', 'twentytwentyone' ), '%title' ),
			)
		);
	}
?>
