<?php
use \Spacetheme\helpers\DebugHelpers;

?>
<?php get_header(); ?>
<?php
(function () {
    // get theme setting
    $link = get_field('home_page_thumbnail', 'option');
    $link= $link['sizes']['2048x2048'];

    echo get_template_part("template-parts/theme/navigation/main", "navbar");
    echo get_template_part( "template-parts/theme/sections/intro", "section" );
    echo get_template_part( "template-parts/theme/sections/history", "section" );
    echo get_template_part( "template-parts/theme/sections/destinations", "section" );
    echo get_template_part( "template-parts/theme/sections/activities", "section" );
    echo get_template_part( "template-parts/theme/sections/reviews", "section" );
    echo get_template_part( "template-parts/theme/sections/trips-slider", "section" );
    echo get_template_part( "template-parts/theme/sections/subscription", "section" );
    
})();
?>
<?php get_footer(); ?>

