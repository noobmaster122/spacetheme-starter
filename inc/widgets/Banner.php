<?php
/**
 * 
 * 
 */

namespace Spacetheme\widgets;

class Banner extends \WP_Widget {
    public function __construct() {

        parent::__construct(
        // widget ID
        'banner_widget',
        // widget name
        __('spacetheme banner Widget', SPACETHEME_TEXTDOMAIN),
        // widget description
        array( 'description' => __( 'Banner widget', SPACETHEME_TEXTDOMAIN ), )
        );
    }
    /**
     * 
     * @param array $data
     * @param bool $img_in_left
     * @return void
     */
    private function widget_html(array $data, bool $img_in_left=false):void {
        ?>
            <section id="banner-one-section" class="spacetheme__banner-one-container container-fluid pt-5 pb-2 px-0  ">
                <div class="row justify-content-center  rounded m-auto " style="overflow:hidden;">
                    <div class="col-12 col-md-6 p-0 d-flex flex-column justify-content-center position-relative"
                        style="height: 300px;/*background-color:rgba(128, 128, 0,0.4);*/">
                        <object data="<?php echo UNSLASHED_BASE_URL_PATH . '/assets/images/wave.svg'; ?>" width="100%" height="100%"
                            style="object-fit:cover;position:absolute;z-index:-1;"></object>
                        <h2 class="mb-3 px-2 px-md-4"><?php _e($data['banner-title'], SPACETHEME_TEXTDOMAIN); ?></h2>
                        <p class="m-0 px-2 px-md-4"><?php echo $data['banner-desc']; ?></p>
                    </div>
                    <div class="col-12 p-0 col-md-6 position-relative d-flex align-items-end justify-content-center"
                        style="height: 300px;">
                        <img src="<?php echo $data['banner-image']; ?>" height="100%" width="100%"
                            alt="" style="object-fit:cover;position:absolute;z-index:-1;" />
                        <a href="<?php echo $data['banner-link']; ?>" class="shadow-none btn btn-sm text-light spacetheme__contact-us-btn mb-3 font-weight-bold"
                            role="button" style="">
                            <?php _e('Voir plus', SPACETHEME_TEXTDOMAIN); ?>
                            <i class='fa-solid fa-arrow-right-long ml-2'></i>
                        </a>

                    </div>
                </div>
            </section>
        <?php
    }
	/**
	 * Outputs the content of the widget
	 *
	 * @param array $args
	 * @param array $instance
	 */
    public function widget($args, $instance ){
        //output
        $this->widget_html($instance);
    }
	/**
	 * Outputs the options form on admin
	 *
	 * @param array $instance The widget options
	 */
    public function form( $instance ){

        $title = isset( $instance[ 'banner-title' ] ) ? $instance[ 'banner-title' ] : __( 'Default Title', SPACETHEME_TEXTDOMAIN );
        $desc = isset( $instance[ 'banner-desc' ] ) ? $instance[ 'banner-desc' ] : __( 'Default desc', SPACETHEME_TEXTDOMAIN );
        $link = isset( $instance[ 'banner-link' ] ) ? $instance[ 'banner-link' ] : '#';
        $image = ! empty( $instance['banner-image'] ) ? $instance['banner-image'] : '';

        ?>
            <!-- widget inner title -->
            <p>
                <label for="<?php echo $this->get_field_id( 'banner-title' ); ?>"><?php _e( 'Title:' ); ?></label>
                <input class="widefat" id="<?php echo $this->get_field_id( 'banner-title' ); ?>" name="<?php echo $this->get_field_name( 'banner-title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
            </p>
            <!-- widget inner text -->
            <p>
                <label for="<?php echo $this->get_field_id( 'banner-desc' ); ?>"><?php _e( 'Description:' ); ?></label>
                <textarea class="widefat" id="<?php echo $this->get_field_id( 'desc' ); ?>" name="<?php echo $this->get_field_name( 'banner-desc' ); ?>" >
                    <?php echo esc_attr( $desc ); ?>
                </textarea>
            </p>
            <!-- widget inner text -->
            <p>
                <label for="<?php echo $this->get_field_id( 'banner-link' ); ?>"><?php _e( 'Link:' ); ?></label>
                <input class="widefat" id="<?php echo $this->get_field_id( 'banner-link' ); ?>" name="<?php echo $this->get_field_name( 'banner-link' ); ?>" type="text" value="<?php echo esc_attr( $link ); ?>" />
            </p>
            <!-- -->
            <p style="margin-top:20px;">
                <label for="<?php echo $this->get_field_id( 'banner-image' ); ?>"><?php _e( 'Image:' ); ?></label>
                <input class="widefat" id="<?php echo $this->get_field_id( 'banner-image' ); ?>" name="<?php echo $this->get_field_name( 'banner-image' ); ?>" type="text" value="<?php echo esc_url( $image ); ?>" style="display:none;"/>
                <button class="upload_image_button button button-primary">Upload Image</button>
            </p>
        <?php
    }
	/**
	 * Processing widget options on save
	 *
	 * @param array $new_instance The new options
	 * @param array $old_instance The previous options
	 *
	 * @return array
	 */
    public function update( $new_instance, $old_instance ){
        $instance = array();
        $instance['banner-title'] = ( ! empty( $new_instance['banner-title'] ) ) ? strip_tags( $new_instance['banner-title'] ) : '';
        $instance['banner-desc'] = ( ! empty( $new_instance['banner-desc'] ) ) ? strip_tags( $new_instance['banner-desc'] ) : '';
        $instance['banner-link'] = ( ! empty( $new_instance['banner-link'] ) ) ? strip_tags( $new_instance['banner-link'] ) : '#';
        $instance['banner-image'] = ( ! empty( $new_instance['banner-image'] ) ) ? $new_instance['banner-image'] : '';

        return $instance;
    }
}
?>