<?php
use \Spacetheme\helpers\DebugHelpers;

?>
<?php get_header(); ?>
<?php
(function () {
    // get theme setting
    $link = get_field('home_page_thumbnail', 'option');

    $link= $link['sizes']['2048x2048'];

    echo get_template_part('template-parts/theme', 'navbar');
    echo get_template_part( "template-parts/theme/intro", "section" );
    echo get_template_part( "template-parts/theme/history", "section" );
    echo get_template_part( "template-parts/theme/destinations", "section" );
    echo get_template_part( "template-parts/theme/activities", "section" );
    echo get_template_part( "template-parts/theme/reviews", "section" );
    echo get_template_part( "template-parts/theme/trips-slider", "section" );
    echo get_template_part( "template-parts/theme/subscription", "section" );
    
})();
?>
<?php get_footer(); ?>

