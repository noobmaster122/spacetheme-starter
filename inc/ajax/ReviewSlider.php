<?php
/**
 * collection of helper function
 * needed for the theme
 * 
 */

namespace Spacetheme\ajax; 
use \Spacetheme\helpers\PostTypesRetriever;
use \Spacetheme\traits\SingletonTrait; 

 class ReviewSlider{

    use SingletonTrait; 

     public function __construct(){
        /**
         * 
         * Ajax actions
         */
        add_action("wp_ajax_nopriv_" . SPACETHEME_AJAX_PREFIX . "_load_reviews",[$this, 'ajax_script_wb_one_pager_theme_load_reviews']);
        add_action("wp_ajax_" . SPACETHEME_AJAX_PREFIX . "_load_reviews",[$this, 'ajax_script_wb_one_pager_theme_load_reviews']);

     }

     /**
      * http://localhost/agencevoyage/wp-admin/admin-ajax.php?action=spacetheme_load_activities
      * 
      * generate the swiper slider slides
      *
      * @param void
      * @return string json_response
      *
      */
     public function ajax_script_wb_one_pager_theme_load_reviews():void {
      //authenticate nonce
      if( check_ajax_referer( SPACETHEME_NONCE, 'security', false ) ){

         //generate swiper slides and return
         $arr = PostTypesRetriever::get_post_data('reviews', '20');
         if( !$arr ) wp_send_json_error('Unautherized action!');//return if no data
      
        \ob_start();
        ?>
            <?php foreach( $arr as $review ): ?>
            <?php 
                $post_id = $review->ID;
                $review = get_field('review', $post_id) ? get_field('review', $post_id) : 'j\'ai beaucoup apprécié mon voyage à d\'anet, le service était excellent';
                $thumbnail = get_field('image', $post_id);
                if( ! $thumbnail ){
                    $thumbnail = UNSLASHED_BASE_URL_PATH . "/assets/images/door-wallpaper.jpeg";
                }
                if( $thumbnail ){
                    $thumbnail = $thumbnail['sizes']['large'];
                }                
            ?>
            <div class="wd-onepager-theme-review-block col-12 col-md-5 col-xl-3 mb-3 mb-lg-5 mx-xl-2  p-0 d-flex flex-column " style="background: #F6F4FF;box-shadow: 0px 9.73808px 29.2142px rgba(0, 0, 0, 0.12);border-bottom: maroon;    overflow: hidden;border-top-right-radius: 10px ;border-top-left-radius: 10px ;">
                <div class="d-flex p-2 align-items-center">
                    <img src="<?php echo $thumbnail; ?>" height="50px" width="50px" alt="" style="border-radius: 50%;object-fit:cover;"/>
                    <p class="m-0 pl-2" style="font-size:0.8rem;"><?php _e($review, SPACETHEME_TEXTDOMAIN); ?></p>
                </div>
                <div style="height: 5px;border-radius: 7px;width: 100%;background-color: #593325;"></div>
            </div>
            <?php endforeach; ?>

        <?php

        $output = \ob_get_clean();
         wp_send_json_success($output);
      }else if( ! check_ajax_referer( 'spacetheme_nonce', 'security', false ) ){
        wp_send_json_error('Unautherized action!');
      }
     }
 }
?>