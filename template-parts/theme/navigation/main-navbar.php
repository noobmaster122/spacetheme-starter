<?php 

use \Spacetheme\helpers\PostTypesRetriever;

  (function($menu){
      if(! $menu ) return;//cant parse menu!
      // languages dropdown menu items
      $languages = array(
          'fr' => 'Francais',
          'us' => 'English'
      );
      $contact_page = get_page_by_title('contact');

    ?>
      <!-- desktop navbar -->
      <nav id="main-navbar-container" class=" navbar navbar-expand-lg bg-primary navbar-light main-navbar-container d-flex justify-content-between justify-content-lg-around flex-column  w-100 px-1 px-lg-7 py-0" style="z-index:1030;" >
        <div class="d-flex w-100 justify-content-between align-items-center py-2 px-1 px-lg-3" style="">
            <!-- moblie vue menu -->
            <button class="navbar-toggler p-2 rounded-circle " id="mobile-nav-toggler" type="button" data-toggle="collapse" data-target=".collapse" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <a class="navbar-brand ml-4 ml-lg-0 d-flex" href="<?php echo site_url(); ?>" rel="home">
                <object style="" data="<?php echo PostTypesRetriever::get_theme_logo(); ?>" height="90px" width="auto" ></object>
            </a>
            <!-- mobile vue menu end -->
            <div id="main-menu-list-items-container" class="__spacetheme-main-menu-list-items-container d-flex flex-wrap justify-content-end align-items-end " id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto mr-0 mr-md-4 d-none d-sm-none d-md-none d-lg-flex">
                    <?php foreach($menu as $link): ?>
                    <li class="nav-item p-2">
                        <a class="nav-link active p-0 text-dark" style="font-weight: 500;" href="<?php echo $link->url; ?>"><?php _e($link->post_title, SPACETHEME_TEXTDOMAIN); ?></a>
                    </li>
                    <?php endforeach; ?>
                </ul>
                <div class="d-flex flex-column justify-content-center align-items-center" >
                    <!-- languages dropdown -->
                    <div id="main-menu-languages-dropdown" class="__spacetheme-main-menu-languages-dropdown dropdown">
                        <button class="btn dropdown-toggle shadow-none p-1" type="button" id="mainMenuLanguagesDropDown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                        style="">
                            <object data="<?php echo UNSLASHED_BASE_URL_PATH . "/assets/images/us.svg"; ?>" height="30px" width="30px"></object>
                        </button>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="mainMenuLanguagesDropDown">
                            <?php foreach($languages as $key => $value): ?>
                                <a class="dropdown-item d-flex justify-content-start align-items-center" style="gap:5px;" href="#">
                                    <object data="<?php echo UNSLASHED_BASE_URL_PATH . "/assets/images/$key.svg"; ?>" height="20px" width="20px"></object>
                                    <?php _e(" - $value", SPACETHEME_TEXTDOMAIN); ?>
                                </a>
                            <?php endforeach; ?>
                        </div>
                    </div>
                    <!-- contact us btn -->
                    <a href="<?php echo get_page_link("$contact_page->ID"); ?>" class="shadow-none bg-secondary btn btn-sm spacetheme__contact-us-btn text-white" role="button" style="font-weight: 600;"><?php _e('CONTACTER-NOUS', SPACETHEME_TEXTDOMAIN); ?></a>
                </div>
            </div>
        </div>
      </nav>
      <!-- mobile navbar -->
      <div class="container-fluid h-100 px-0 position-fixed  mobile-nav main-navbar-container d-none" style="opacity: 0.9;z-index:1050;top:0;background-color: rgba(89, 51, 37, 0.9);">
          <div class="row h-100 no-gutters d-flex m-0 p-0" >
              <div class="col-12 p-0 h-100 text-white d-md-flex " style="top: 0;"> 
                  <!-- fixed sidebar navbar-collapse collapse -->
                  <div class=" h-100 w-100 spacetheme-bg-dark" >
                      <div id="close-mobile-nav" class="d-flex justify-content-center align-items-center pt-2  " style="
                      margin-bottom: 100px;">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="#fff" viewBox="0 0 50 50" width="50px" height="50px"><path d="M 7.71875 6.28125 L 6.28125 7.71875 L 23.5625 25 L 6.28125 42.28125 L 7.71875 43.71875 L 25 26.4375 L 42.28125 43.71875 L 43.71875 42.28125 L 26.4375 25 L 43.71875 7.71875 L 42.28125 6.28125 L 25 23.5625 Z"/></svg>
                      </div>
                      <ul class="nav flex-column flex-nowrap text-truncate text-center" style="
                        font-size: 20px;
                        font-weight: 600;">
                          <?php foreach($menu as $link): ?>
                          <li class="nav-item">
                              <a class="nav-link active" href="<?php echo $link->guid; ?>" style="color: white;"><?php echo $link->post_title; ?></a>
                          </li>
                          <?php endforeach; ?>
                      </ul>
                  </div>
              </div>
          </div>
      </div>
    <?php
  })(wp_get_nav_menu_items( 'Menu Principal' ));
?>