<?php
/**
 * 
 * 
 */

namespace Spacetheme\widgets;

class Destinations extends \WP_Widget {
    public function __construct() {


        // Add Widget scripts
        //add_action('admin_enqueue_scripts', array($this, 'scripts'));

        parent::__construct(
        // widget ID
        'spacetheme_destinations_widget',
        // widget name
        __('spacetheme Destinations Widget', SPACETHEME_TEXTDOMAIN),
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
            <div class="w-100 d-flex justify-content-center" style="min-height: 90px;">
                <div class="d-flex spacetheme-bg-light p-3 justify-content-center align-items-center" style="flex:2;border-top-left-radius: 30px;border-bottom-left-radius: 30px;"><p class="text-secondary m-0"><?php _e($data['banner-desc'],SPACETHEME_TEXTDOMAIN); ?></p></div>
                <div class="d-flex spacetheme-bg-dark p-3 justify-content-center align-items-center" style="flex:1;border-top-right-radius: 30px;border-bottom-right-radius: 30px;">
                    <h4 class="text-primary m-0"><?php _e($data['banner-link-title'],SPACETHEME_TEXTDOMAIN); ?></h4>
                </div>
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

        $desc = isset( $instance[ 'banner-desc' ] ) ? $instance[ 'banner-desc' ] : __( 'Default desc', SPACETHEME_TEXTDOMAIN );
        $link = isset( $instance[ 'banner-link' ] ) ? $instance[ 'banner-link' ] : '#';
        $link_title = isset( $instance[ 'banner-link-title' ] ) ? $instance[ 'banner-link-title' ] : '#';

        ?>
            <!-- widget inner text -->
            <p>
                <label for="<?php echo $this->get_field_id( 'banner-desc' ); ?>"><?php _e( 'Description:' ); ?></label>
                <textarea class="widefat" id="<?php echo $this->get_field_id( 'banner-desc' ); ?>" name="<?php echo $this->get_field_name( 'banner-desc' ); ?>" >
                    <?php echo esc_attr( $desc ); ?>
                </textarea>
            </p>
            <!-- widget inner link -->
            <p>
                <label for="<?php echo $this->get_field_id( 'banner-link' ); ?>"><?php _e( 'Link:' ); ?></label>
                <input class="widefat" id="<?php echo $this->get_field_id( 'banner-link' ); ?>" name="<?php echo $this->get_field_name( 'banner-link' ); ?>" type="text" value="<?php echo esc_attr( $link ); ?>" />
            </p>
            <!-- widget link title -->
            <p>
                <label for="<?php echo $this->get_field_id( 'banner-link-title' ); ?>"><?php _e( 'Title:' ); ?></label>
                <textarea class="widefat" id="<?php echo $this->get_field_id( 'banner-link-title' ); ?>" name="<?php echo $this->get_field_name( 'banner-link-title' ); ?>" >
                    <?php echo esc_attr( $link_title ); ?>
                </textarea>
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
        $instance['banner-desc'] = ( ! empty( $new_instance['banner-desc'] ) ) ? strip_tags( $new_instance['banner-desc'] ) : 'Default description...';
        $instance['banner-link'] = ( ! empty( $new_instance['banner-link'] ) ) ? strip_tags( $new_instance['banner-link'] ) : '#';
        $instance['banner-link-title'] = ( ! empty( $new_instance['banner-link-title'] ) ) ? strip_tags( $new_instance['banner-link-title'] ) : 'Default title';

        return $instance;
    }
}
?>