<?php
 get_header();

(function(){
    $postID = get_queried_object_id();

    echo get_template_part('template-parts/theme', 'navbar',array(
        'landing_screen_height' => '100vh'
    )); 

    echo get_template_part( "template-parts/theme/blog-top-banner", "section",array(
        'landing_screen_height' => '50vh',
        'thumbnail' => get_the_post_thumbnail_url($postID, 'full'),
    ) );
    
    ?>
        <section class=" container-fluid">
            <div class=" row flex-column flex-lg-row p-2 p-md-3 p-lg-5 justify-content-center" >
                <?php while ( have_posts() ) : the_post();?>
                    <?php echo get_template_part( 'template-parts/content/content-page' ); ?>
                <?php endwhile; // End of the loop. ?>
                <div class="col-12 col-lg-4 col-xl-3 d-flex flex-column p-3 p-md-4 justify-content-center">
                    <?php get_sidebar(); ?>
                </div>
            </div>
        </section>
    <?php

})();

get_footer(); 


?>