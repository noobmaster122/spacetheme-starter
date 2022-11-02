<?php
/**
 * 
 * 
 */

namespace Spacetheme\widgets;

class SpecialOffer extends \WP_Widget {
    public function __construct() {


        // Add Widget scripts
        //add_action('admin_enqueue_scripts', array($this, 'scripts'));

        parent::__construct(
        // widget ID
        'special_offer_widget',
        // widget name
        __('spacetheme special offer Widget', SPACETHEME_TEXTDOMAIN),
        // widget description
        array( 'description' => __( 'Banner widget', SPACETHEME_TEXTDOMAIN ), )
        );
    }
    /**
     * 
     * @param array $data
     * @return void
     */
    private function widget_html(array $data):void {
        ?>
                <div class="position-relative rounded d-flex justify-content-center align-items-center flex-column my-5" style="height: 300px;overflow:hidden;
                box-shadow: rgba(0, 0, 0, 0.3) 0px 19px 38px, rgba(0, 0, 0, 0.22) 0px 15px 12px;background-color: rgba(0,0,0,0.3);">
                    <img src="<?php echo $data['banner-image']; ?>" height="100%" width="100%" alt=""
                    style="transform:scale(1.5);position:absolute;z-index:-1;object-fit:cover;transition:transform 1s ease-in-out;" />
                    <h2 class="text-light text-center" style="font-size:50px;"><?php echo $data['banner-price'] . ' DA'; ?></h2>
                    <span class="text-light px-2 pb-3 text-center" style="font-size:12px;">
                        <?php _e($data['banner-desc'], SPACETHEME_TEXTDOMAIN); ?>
                    </span>
                    <a href="<?php echo $data['banne-link']; ?>" class="shadow-none btn btn-sm text-light spacetheme__contact-us-btn mb-3 "
                        role="button" style="font-size:12px;">
                        <?php _e('Réserver aujourd\'hui', SPACETHEME_TEXTDOMAIN); ?>
                        <i class='fa-solid fa-arrow-right-long ml-2'></i>
                    </a>
                </div>
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

        $price = isset( $instance[ 'banner-price' ] ) ? $instance[ 'banner-price' ] : '12000';
        $desc = isset( $instance[ 'banner-desc' ] ) ? $instance[ 'banner-desc' ] : __( 'Default desc', SPACETHEME_TEXTDOMAIN );
        $link = isset( $instance[ 'banner-link' ] ) ? $instance[ 'banner-link' ] : '#';
        $image = ! empty( $instance['banner-image'] ) ? $instance['banner-image'] : '';

        ?>
            <!-- widget inner price -->
            <p>
                <label for="<?php echo $this->get_field_id( 'banner-price' ); ?>"><?php _e( 'Description:' ); ?></label>
                <input class="widefat" id="<?php echo $this->get_field_id( 'banner-price' ); ?>" name="<?php echo $this->get_field_name( 'banner-price' ); ?>" type="number" value="<?php echo esc_attr( $price ); ?>" />

            </p>
            <!-- widget inner text -->
            <p>
                <label for="<?php echo $this->get_field_id( 'banner-desc' ); ?>"><?php _e( 'Description:' ); ?></label>
                <textarea class="widefat" id="<?php echo $this->get_field_id( 'desc' ); ?>" name="<?php echo $this->get_field_name( 'banner-desc' ); ?>" >
                    <?php echo esc_attr( $desc ); ?>
                </textarea>
            </p>
            <!-- widget inner link -->
            <p>
                <label for="<?php echo $this->get_field_id( 'banner-link' ); ?>"><?php _e( 'Link:' ); ?></label>
                <input class="widefat" id="<?php echo $this->get_field_id( 'banner-link' ); ?>" name="<?php echo $this->get_field_name( 'banner-link' ); ?>" type="text" value="<?php echo esc_attr( $link ); ?>" />
            </p>
            <!-- banner img btn-->
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
        $instance['banner-price'] = ( ! empty( $new_instance['banner-price'] ) ) ? strip_tags( $new_instance['banner-price'] ) : '12000';
        $instance['banner-desc'] = ( ! empty( $new_instance['banner-desc'] ) ) ? strip_tags( $new_instance['banner-desc'] ) : '';
        $instance['banner-link'] = ( ! empty( $new_instance['banner-link'] ) ) ? strip_tags( $new_instance['banner-link'] ) : '#';
        $instance['banner-image'] = ( ! empty( $new_instance['banner-image'] ) ) ? $new_instance['banner-image'] : '';

        return $instance;
    }
}
?>