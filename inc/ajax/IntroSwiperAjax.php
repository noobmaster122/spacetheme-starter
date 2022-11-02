<?php
/**
 * collection of helper function
 * needed for the theme
 * 
 */

namespace Spacetheme\ajax; 
use \Spacetheme\helpers\PostTypesRetriever;
use \Spacetheme\traits\SingletonTrait; 

 class IntroSwiperAjax{

    use SingletonTrait; 

     public function __construct(){
        /**
         * 
         * Ajax actions
         */
        add_action("wp_ajax_nopriv_" . SPACETHEME_AJAX_PREFIX . "_load_intro_swiper",[$this, 'ajax_script_wb_one_pager_theme_load_intro_swiper']);
        add_action("wp_ajax_" . SPACETHEME_AJAX_PREFIX . "_load_intro_swiper",[$this, 'ajax_script_wb_one_pager_theme_load_intro_swiper']);
     }

     /**
      * http://localhost/agencevoyage/wp-admin/admin-ajax.php?action=wb_one_pager_theme_load_intro_swiper
      * 
      * generate the swiper slider slides
      *
      * @param void
      * @return string json_response
      *
      */
     public function ajax_script_wb_one_pager_theme_load_intro_swiper():void {
        //authenticate nonce
        if( check_ajax_referer( SPACETHEME_NONCE, 'security', false ) ){
            //generate swiper slides and return
            $arr = PostTypesRetriever::get_post_data('intro');

            if( !$arr ) wp_send_json_error('Unautherized action!');
    
        \ob_start();
        ?>
            <h2 class="text-primary" style="align-self:start;font-weight: 700;"><?php _e('Nos découvertes',SPACETHEME_TEXTDOMAIN); ?></h2>
            <!-- -->
            <div class=' swiper introSectionSwiper' style="max-width: 100%;display: flex;" >
                <div class='swiper-wrapper' style='max-width: 100%;flex-shrink: 0;height: auto;display: flex;'>
                    <?php foreach($arr as $index => $single_post): ?>
                        <?php 
                            $post_id = $single_post->ID;
                            $desc = get_field('desc', $post_id) ? get_field('desc', $post_id) : 'n publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lore';
                        ?>
                        <div class='swiper-slide d-flex justify-content-center align-items-center rounded spacetheme__destinations-single-container' style='overflow:hidden; width: auto;flex-shrink: 0;flex-grow: 1;display: block;height: 100%;'> 
                            <p class="text-primary"><?php _e($desc,SPACETHEME_TEXTDOMAIN); ?></p>
                        </div>
                    <?php endforeach; ?>
                </div>
                <div class="swiper-pagination"></div>
            </div>
        <?php
        $output = \ob_get_clean();

            wp_send_json_success( $output ); 
        }else{
            wp_send_json_error('Unautherized action!');
        }
     }
 }
?>