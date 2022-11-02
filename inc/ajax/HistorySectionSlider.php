<?php
/**
 * collection of helper function
 * needed for the theme
 * 
 */

namespace Spacetheme\ajax; 
use \Spacetheme\helpers\PostTypesRetriever;
use \Spacetheme\traits\SingletonTrait; 


 class HistorySectionSlider{

    use SingletonTrait; 


     public function __construct(){
        /**
         * 
         * Ajax actions
         */
        add_action("wp_ajax_nopriv_" . SPACETHEME_AJAX_PREFIX . "_load_history_slides",[$this, 'ajax_script_wb_one_pager_theme_load_history_slides']);
        add_action("wp_ajax_" . SPACETHEME_AJAX_PREFIX . "_load_history_slides",[$this, 'ajax_script_wb_one_pager_theme_load_history_slides']);

     }

     /**
      * http://localhost/agencevoyage/wp-admin/admin-ajax.php?action=wb_one_pager_theme_load_activities
      * 
      * generate the swiper slider slides
      *
      * @param void
      * @return string json_response
      *
      */
     public function ajax_script_wb_one_pager_theme_load_history_slides():void {
      //authenticate nonce
        if( check_ajax_referer( SPACETHEME_NONCE, 'security', false ) ){

            //generate swiper slides and return
            $arr = PostTypesRetriever::get_post_data('history');
            if( !$arr ) wp_send_json_error('Unautherized action!');//return if no data
        
            \ob_start();
            ?>
                <!-- -->
                <div class=' swiper themeHistorySection' >
                    <div class='swiper-wrapper' >
                        <?php foreach( $arr as $history_slide ): ?>
                        <?php
                            $post_id = $history_slide->ID;
                            $title = get_field('title', $post_id) ? get_field('title', $post_id) : 'Djanet';
                            $thumbnail = get_field('image', $post_id);
                            if( ! $thumbnail ){
                                $thumbnail = UNSLASHED_BASE_URL_PATH . "/assets/images/door-wallpaper.jpeg";
                            }
                            if( $thumbnail ){
                                $thumbnail = $thumbnail['sizes']['large'];
                            }
                        ?>
                        <div class='swiper-slide d-flex flex-column justify-content-center align-items-center rounded spacetheme__destinations-single-container'
                        style='overflow:hidden;'>
                            <img class="" src="<?php echo $thumbnail; ?>" height="400px" width="100%" alt="" style="object-fit:cover;border-radius: 10px;"/>
                            <h4 class="my-3 text-secondary" style="font-weight:600;"><?php _e($title,SPACETHEME_TEXTDOMAIN); ?></h4>
                        </div>
                        <?php endforeach; ?>
                    </div>
                    <div class="swiper-pagination"></div>
                </div>
            <?php

            $output = \ob_get_clean();
            wp_send_json_success($output);
        }else{
            wp_send_json_error('Unautherized action!');
        }
     }
 }
?>