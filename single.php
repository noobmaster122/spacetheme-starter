<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Spacetheme
 * @since Spacetheme 1.0
 */
get_header();//header template
(function (){

    $postID = get_queried_object_id();

    echo get_template_part('template-parts/theme', 'navbar');

    echo get_template_part( "template-parts/theme/blog-top-banner", "section",array(
        'landing_screen_height' => '50vh',
        'thumbnail' => get_the_post_thumbnail_url($postID, 'full'),
    ) );
    ?>
        <section class=" container-fluid" >
            <div class=" row flex-column flex-lg-row p-2 p-md-3 p-lg-5 justify-content-center" >
                <?php while ( have_posts() ) : the_post(); ?>
                    <?php echo get_template_part( 'template-parts/content/content-single' ); ?>
                <?php endwhile; ?>
                <div class="col-12 col-lg-4 col-xl-3 d-flex flex-column p-3 p-md-4 justify-content-center">
                    <?php get_sidebar();//get dynamic sidebar instead ?>
                </div>
            </div>
            <?php comments_template(); ?>
        </section>
    <?php
})();
get_footer();//footer template
?>