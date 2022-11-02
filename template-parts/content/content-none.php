<?php
/**
 * Template part for displaying a message that posts cannot be found
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Twenty_Nineteen
 * @since Twenty Nineteen 1.0
 */

?>

<div class="no-results not-found search-not-found-template-styles rounded p-3" style="">
	<header class="page-header">
		<h1 class="page-title"><?php _e( 'Nothing Found', 'twentynineteen' ); ?></h1>
        <div class="spacetheme-breadcrumbs-container d-flex align-items-center"><?php echo do_shortcode( '[flexy_breadcrumb]'); ?></div>
	</header><!-- .page-header -->

	<div class="d-flex justify-content-center align-items-center flex-column">
		<?php
		if ( is_home() && current_user_can( 'publish_posts' ) ) :

			printf(
				'<p>' . wp_kses(
					/* translators: %s: Link to WP admin new post page. */
					__( 'Prêt à publier votre premier article? <a href="%s">Cliquer ici</a>.', 'spacetheme' ),
					array(
						'a' => array(
							'href' => array(),
						),
					)
				) . '</p>',
				esc_url( admin_url( 'post-new.php' ) )
			);

		elseif ( is_search() ) :
			?>
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/404.jpg" width="100%" height="400px" alt="" style="object-fit:contain;"/>
			<p><?php _e( 'Désolé, mais rien ne correspond à vos termes de recherche. Veuillez réessayer avec d\'autres mots-clés.', 'spacetheme' ); ?></p>
            <div><?php echo get_search_form(); ?> </div>
            <?php else : ?>
			<p><?php _e( 'Il semble que nous ne puissions pas trouver ce que vous cherchez. Peut-être qu\'une recherche peut vous aider.', 'spacetheme' ); ?></p>
            <div><?php echo get_search_form(); ?> </div>
            <?php endif; ?>
	</div><!-- .page-content -->
</div><!-- .no-results -->
