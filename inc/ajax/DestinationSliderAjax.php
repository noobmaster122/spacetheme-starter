<?php
/**
 * collection of helper function
 * needed for the theme
 * 
 */

namespace Spacetheme\ajax; 
use \Spacetheme\helpers\PostTypesRetriever;
use \Spacetheme\traits\SingletonTrait; 

 class DestinationSliderAjax{

    use SingletonTrait; 

     public function __construct() {
        /**
         * 
         * Ajax actions
         */
        add_action("wp_ajax_nopriv_" . SPACETHEME_AJAX_PREFIX . "_load_destinations",[$this, 'ajax_script_wb_one_pager_theme_load_destinations']);
        add_action("wp_ajax_" . SPACETHEME_AJAX_PREFIX . "_load_destinations",[$this, 'ajax_script_wb_one_pager_theme_load_destinations']);

     }

     /**
      * http://localhost/agencevoyage/wp-admin/admin-ajax.php?action=spacetheme_load_destinations
      * 
      * generate the swiper slider slides
      *
      * @param void
      * @return string json_response
      *
      */
     public function ajax_script_wb_one_pager_theme_load_destinations():void {
        //authenticate nonce
        if( check_ajax_referer( SPACETHEME_NONCE, 'security', false ) ){
            //generate swiper slides and return
            $arr = PostTypesRetriever::get_post_data('destinations');

            if( !$arr ) wp_send_json_error('Unautherized action!');
    
        \ob_start();
        ?>
            <div class="col-12 col-lg-11 col-xl-9" style="margin: auto;">
                <div class=' swiper spacethemeDestinationSlider' >
                    <div class='swiper-wrapper' style="height: 400px;">
                        <?php foreach( $arr as $index => $destinations_slide ): ?>
                        <?php
                            $post_id = $destinations_slide->ID;
                            $title = get_field('title', $post_id) ? get_field('title', $post_id) : 'Djanet';
                            $desc = get_field('desc', $post_id) ? get_field('desc', $post_id) : 'lorem ipsumlorem ipsumlorem ipsumlorem ipsum';
                            $thumbnail = get_field('image', $post_id);
                            $slide_bg = ($index + 1) % 2 === 0 ? "spacetheme-bg-light" : "spacetheme-bg-dark";
                            $slide_text_color = ($index + 1) % 2 === 0 ? "text-secondary" : "text-primary";
                            if( ! $thumbnail ){
                                $thumbnail = UNSLASHED_BASE_URL_PATH . "/assets/images/door-wallpaper.jpeg";
                            }
                            if( $thumbnail ){
                                $thumbnail = $thumbnail['sizes']['large'];
                            }
                        ?>
                            <div class="swiper-slide d-flex <?php echo $slide_bg; ?> rounded flex-column justify-content-center align-items-center rounded spacetheme__destinations-single-container"
                            style='overflow:hidden;'>
                                <div style="height: 50%;width:100%;">
                                    <img src="<?php echo $thumbnail; ?>" height="100%" width="100%" alt="" style="object-fit:cover;"/>
                                </div>
                                <div class="d-flex flex-column d-flex flex-column p-3 justify-content-around align-items-center" style="height:50%;">
                                    <h4 class="<?php echo $slide_text_color; ?> align-self-start"><?php _e($title, SPACETHEME_TEXTDOMAIN); ?></h4>
                                    <p class="<?php echo $slide_text_color; ?>"><?php _e($desc,SPACETHEME_TEXTDOMAIN); ?></p>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                    <div class="swiper-pagination"></div>
                </div>
            </div>
        <?php
        $output = \ob_get_clean();

        wp_send_json_success( $output );
        }else {
            wp_send_json_error('Unautherized action!');
        }
     }
 }
?>