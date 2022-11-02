<?php
(function($main_menu, $community_menu, $about_us_menu, $copyrights_menu){
    if(! $main_menu ) return;//cant parse menu!
    ?>
        <footer id="main-footer-menu-container" class="spacetheme__main-footer bg-primary" style="background-color: olive;">
            <div class="container-fluid ">
                <div class="spacetheme__main-footer-menus-row row p-0 py-5  flex-column flex-lg-row justify-content-start align-items-center align-items-lg-stretch">
                    <!-- -->
                    <div class="col-8 col-md-3 pt-3 pb-0 py-lg-0 d-flex flex-column justify-content-start align-items-md-center align-items-lg-start text-center text-md-left pl-0 pl-lg-5"> 
                        <h4 class="text-center font-weight-bold text-md-left mb-3 text-dark"><?php _e('Contact', SPACETHEME_TEXTDOMAIN ); ?></h4>
                        <ul class="list-unstyled">
                            <?php foreach($main_menu as $link): ?>
                            <li class="p-0 text-center text-md-left">
                                <a class=" p-0 text-dark" href="<?php echo $link->url; ?>"><?php _e($link->title, SPACETHEME_TEXTDOMAIN); ?></a>
                            </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                    <!-- -->
                    <div id="" class="col-8 col-md-3 py-3 py-lg-0 d-flex flex-column justify-content-start align-items-md-center align-items-lg-start spacetheme__social-network-menu-container text-center text-lg-left pl-0 pl-lg-5">
                        <h4 class="text-center font-weight-bold text-md-left mb-3 text-dark"><?php _e('Communauté', SPACETHEME_TEXTDOMAIN ); ?></h4>
                        <ul class="list-unstyled">
                            <?php foreach($community_menu as $link): ?>
                            <li class="p-0 text-center text-md-left">
                                <a class=" p-0 text-dark" href="<?php echo $link->url; ?>"><?php _e($link->title, SPACETHEME_TEXTDOMAIN); ?></a>
                            </li>
                            <?php endforeach; ?>
                        </ul>
                        <div class="d-flex justify-content-center justify-content-md-start" style="gap:20px;">
                            <a href="#" style="color: #000; font-size:25px;"><i class="fa-brands fa-facebook"></i></a>
                            <a href="#" style="color: #000;font-size:25px;"><i class="fa-brands fa-instagram"></i></a>
                            <a href="#" style="color: #000;font-size:25px;"><i class="fa-brands fa-twitter"></i></a>
                            <a href="#" style="color: #000;font-size:25px;"><i class="fa-brands fa-youtube"></i></a>
                        </div>
                    </div> 
                    <!-- -->
                    <div class="col-8 col-md-3 py-3 py-lg-0 d-flex flex-column justify-content-start align-items-md-center align-items-lg-start text-center text-md-left pl-0 pl-lg-5"> 
                        <h4 class="text-center font-weight-bold text-md-left mb-3 text-dark"><?php _e('About', SPACETHEME_TEXTDOMAIN ); ?></h4>
                        <ul class="list-unstyled">
                            <?php foreach($about_us_menu as $link): ?>
                            <li class="p-0 text-center text-md-left">
                                <a class=" p-0 text-dark" href="<?php echo $link->url; ?>"><?php _e($link->title, SPACETHEME_TEXTDOMAIN); ?></a>
                            </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                    <!-- -->  
                    <div class="col-8 col-md-3 py-3 py-lg-0 d-flex flex-column justify-content-start align-items-center  text-center text-md-left pl-0 pl-lg-5">
                        <object data="<?php echo UNSLASHED_BASE_URL_PATH . '/assets/images/default-logo.png'; ?>"  width="auto" height="150px" ></object>
                    </div>
                </div>
                <!-- -->
                <div class="row justify-content-center">
                    <div class="col-10 px-4 py-3 d-flex flex-column flex-lg-row justify-content-between align-items-center">
                        <div class="d-flex justify-content-start align-items-center mb-3 mb-lg-0">
                            <p class="m-0 mr-1 mr-md-5 text-center text-dark"><?php printf( esc_html__( '© %s SPACECOWBOYS', SPACETHEME_TEXTDOMAIN ), date('Y') ); ?></p>
                            <ul class="list-unstyled m-0 d-flex">
                                <?php foreach($copyrights_menu as $link): ?>
                                <li class="p-0 text-center text-md-left mx-2">
                                    <a class=" p-0 text-dark" href="<?php echo $link->url; ?>"><?php _e($link->title, SPACETHEME_TEXTDOMAIN); ?></a>
                                </li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
    <?php 
})(wp_get_nav_menu_items( 'Menu principal' ),
 wp_get_nav_menu_items( 'Communaute' ),
 wp_get_nav_menu_items( 'About' ), 
 wp_get_nav_menu_items( 'copyrights menu' ));
?>
<?php wp_footer(); ?>
