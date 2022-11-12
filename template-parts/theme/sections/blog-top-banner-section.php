<?php
(function($args){
    $default_thumbnail = UNSLASHED_BASE_URL_PATH . '/assets/images/djanet6.jpg';
    $thumbnail = isset($args['thumbnail']) && $args['thumbnail'] ? $args['thumbnail'] : $default_thumbnail;
    ?>
    <section id="introduction-section-container" class="spacetheme__landing-section d-flex flex-column justify-content-end w-100 position-relative" 
    style="height:<?php echo $args['landing_screen_height'] ?>;"
        class="d-flex flex-column justify-content-end ">
        <img src="<?php echo $thumbnail; ?>" height="100%" width="100%" alt="" 
            style="transform:scale(1.5);position:absolute;z-index:-1;object-fit:cover;transition:transform 1s ease-in-out;" />
        <h2 class="d-none text-white pl-1 pl-md-4 spacetheme-main-font" style="font-size:60px;">
            <?php _e('Djanet', SPACETHEME_TEXTDOMAIN); ?>
        </h2>
        <h5 class="d-none text-light pl-2 pl-md-5 pb-5 spacetheme-main-font">
            <em><?php _e('Un monde à découvrir', SPACETHEME_TEXTDOMAIN); ?></em>
        </h5>
    </section>
    <?php
})($args);
?>