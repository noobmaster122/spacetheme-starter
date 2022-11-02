<?php
/**
 * collection of helper function
 * needed for the theme
 * 
 */

namespace Spacetheme\ajax; 
use \Spacetheme\helpers\PostTypesRetriever;
use \Spacetheme\traits\SingletonTrait; 

 class TripSlider{

    use SingletonTrait; 

     public function __construct(){
        /**
         * 
         * Ajax actions
         */
        add_action("wp_ajax_nopriv_" . SPACETHEME_AJAX_PREFIX . "_load_reservations",[$this, 'ajax_script_wb_one_pager_theme_load_reservations']);
        add_action("wp_ajax_" . SPACETHEME_AJAX_PREFIX . "_load_reservations",[$this, 'ajax_script_wb_one_pager_theme_load_reservations']);

     }

     /**
      * 
      * generate the swiper slider slides
      *
      * @param void
      * @return string json_response
      *
      */
     public function ajax_script_wb_one_pager_theme_load_reservations():void {
        //authenticate nonce
        if( check_ajax_referer( SPACETHEME_NONCE, 'security', false ) ){
            //generate swiper slides and return
            $arr = PostTypesRetriever::get_post_data('reservation');
            $contact_page = get_page_by_title('contact');

            if( !$arr ) wp_send_json_error('Unautherized action!');
    
        \ob_start();
        ?>
            <!-- slider -->
            <div class='swiper spacethemetripSwiper col-12'>
                <div class='swiper-wrapper ' style="height: 500px;">
                    <?php foreach( $arr as $index => $trip_slide ): ?>
                    <?php
                        $post_id = $trip_slide->ID;
                        $thumbnail = get_field('image', $post_id);
                        if( ! $thumbnail ){
                            $thumbnail = UNSLASHED_BASE_URL_PATH . "/assets/images/door-wallpaper.jpeg";
                        }
                        if( $thumbnail ){
                            $thumbnail = $thumbnail['sizes']['large'];
                        }
                    ?>
                        <div class="swiper-slide d-flex flex-column flex-lg-row justify-content-center align-items-center position-relative" style="overflow:hidden;">
                            <img src="<?php echo $thumbnail; ?>" height="100%" width="100%" alt="" style="position:absolute;object-fit:cover;"/>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
            <!-- reservation header and button -->
            <div class="position-absolute d-flex flex-column justify-content-between " style="z-index:2;top:0;left:0;width: 100%;height:100%;">
                <h2 class="p-3" style=""><?php _e('Découvrez <br> le systeme <span class="text-secondary">solaire</span> ',SPACETHEME_TEXTDOMAIN); ?></h2>
                <div class="p-3 d-flex justify-content-end">
                    <a href="<?php echo get_page_link("$contact_page->ID"); ?>" class="shadow-none bg-secondary btn btn-lg spacetheme__contact-us-btn text-white" role="button" style="font-weight: 600;">
                        <?php _e('Contacter-nous',SPACETHEME_TEXTDOMAIN); ?>
                    </a>
                </div>
            </div>
            <!-- -->
        <?php
        $output = \ob_get_clean();

            wp_send_json_success( $output ); 
        }else{
            wp_send_json_error('Unautherized action!');
        }
     }
 }
?>