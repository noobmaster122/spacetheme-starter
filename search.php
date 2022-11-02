<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package Spacetheme
 */

get_header();
(function(){
    
    echo get_template_part('template-parts/theme', 'navbar');

    echo get_template_part( "template-parts/theme/blog-top-banner", "section",array(
        'landing_screen_height' => '50vh'
    ) );
    ?>
        <section class="spacetheme__single-page-content-container rounded mb-5">
            <main class="row w-auto">
                <?php if ( have_posts() ) : ?>
                    <div class="col-12 col-md-9 col-lg-8">
                        <header class="mt-3">
                            <h1 class="">
                                <?php _e( 'Résultats pour:', 'spacetheme' ); ?>
                                <em><?php echo get_search_query(); ?></em>
                            </h1>
                            <div class="spacetheme-breadcrumbs-container d-flex align-items-center"><?php echo do_shortcode( '[flexy_breadcrumb]'); ?></div>
                        </header><!-- .page-header -->

                        <?php while ( have_posts() ): the_post(); ?>
                        <?php
                            /*
                            * Include the Post-Format-specific template for the content.
                            * If you want to override this in a child theme, then include a file
                            * called content-___.php (where ___ is the Post Format name) and that will be used instead.
                            */
                            get_template_part( 'template-parts/content/content', 'excerpt' );
                        ?>
                        <?php endwhile; ?>
                    </div>
                    <div class="col-12 col-md-3 col-lg-4 d-flex flex-column p-3 p-md-4 justify-content-center">
                        <?php get_sidebar(); ?>
                    </div>
                    <?php //twentynineteen_the_posts_navigation(); ?>
                <?php else : ?>
                    <div class="col-12">
                        <?php get_template_part( 'template-parts/content/content', 'none' ); ?>
                    </div>
                <?php endif; ?>
            
            </main><!-- #main -->
        </section><!-- #primary -->
    <?php
    
})();
get_footer();
