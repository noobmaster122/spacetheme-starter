<?php
/**
 * collection of helper function
 * needed for the theme
 * 
 */

namespace Spacetheme\ajax; 
use \Spacetheme\helpers\PostTypesRetriever;
use \Spacetheme\traits\SingletonTrait; 



 class ActivitieSectionAjax{

   use SingletonTrait;

     public function __construct(){
        /**
         * 
         * Ajax actions
         */
        add_action("wp_ajax_nopriv_" . SPACETHEME_AJAX_PREFIX . "_load_activities",[$this, 'ajax_script_wb_one_pager_theme_load_activities']);
        add_action("wp_ajax_" . SPACETHEME_AJAX_PREFIX . "_load_activities",[$this, 'ajax_script_wb_one_pager_theme_load_activities']);
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
     public function ajax_script_wb_one_pager_theme_load_activities():void {
      //authenticate nonce
      if( check_ajax_referer( SPACETHEME_NONCE, 'security', false ) ){

         //generate swiper slides and return
         $arr = PostTypesRetriever::get_post_data('activities');
         if( !$arr ) wp_send_json_error('Unautherized action!');//return if no data
      
        \ob_start();
        ?>
            <?php foreach( $arr as $index => $activity_slide ): ?>
            <?php
               $post_id = $activity_slide->ID;
               $title = get_field('title', $post_id) ? get_field('title', $post_id) : 'Visiter l\'oasis';
               $thumbnail = get_field('image', $post_id);
               if( ! $thumbnail ){
                  $thumbnail = UNSLASHED_BASE_URL_PATH . "/assets/images/door-wallpaper.jpeg";
               }
               if( $thumbnail ){
                  $thumbnail = $thumbnail['sizes']['large'];
               }
            ?>
               <?php if(($index + 1) % 2 !== 0): ?>
                  <div class="offset-0 offset-md-1 offset-xl-2"></div>
               <?php endif; ?>
               <div class="wd-onepager-theme-activity-block col-11 col-md-5 col-xl-4 d-flex flex-column" style="height: 600px;">
                  <div class="rounded " style="height: 85%;width:100%;overflow:hidden;">
                        <img src="<?php echo $thumbnail; ?>" height="100%"
                           width="100%" alt="" style="object-fit:cover;" />
                  </div>
                  <div class="d-flex flex-column d-flex flex-column p-3 justify-content-evenly align-items-center"
                        style="height:15%;">
                        <h4 class="text-secondary align-self-start" style="font-weight:700;"><?php _e($title, SPACETHEME_TEXTDOMAIN); ?></h4>
                  </div>
               </div>
            <?php endforeach; ?>
        <?php

        $output = \ob_get_clean();
         wp_send_json_success($output);
      }
     }
 }
?>