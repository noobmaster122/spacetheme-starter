<?php

namespace Spacetheme\helpers;


 class PostTypesRetriever{

    public function __construct() {
        /**
         * @note load theme hooks
         *
         *
         */
    }

    /**
     * @note get posts data as array of objects
     *
     * @param string $post_type
     * @param int $posts_to_retrieve
     *
     * @return array
     */
    public static function get_post_data(string $post_type, int $posts_to_retrieve = 4):array {
        $args = array(
            'post_type' => $post_type,
            'posts_per_page' => $posts_to_retrieve
        );
        $query = new \WP_Query( $args );

        wp_reset_query();

        if( empty( $query->posts ) ) return array();
        if( ! empty($query->posts) ) return $query->posts;
    }
    
    /**
     * @note helper funcion that takes array returned from image repeater field
     * @note and spits out array of links
     *
     * @note you can change the size of the image by changing thumbnail key
     * @note used in structure shortcode
     *
     * @param array $arr
     * @return array $output
     */
    public static function get_images_links(array $arr):array {

        if( empty($arr) ) return false;

        $output = array();

        foreach ($arr as $cell) {

            array_push($output, $cell['image']['sizes']['thumbnail']);
        }

        return $output;
    }
    /**
     * @note get intro section background
     *
     * @param void
     * @return void
     *
     */
    public static function get_intro_bg():void {
        $thumbnail = get_field('intro_section_background', 'option');

        if ( ! $thumbnail ){
            //alert admin
            //load default bg
            echo UNSLASHED_BASE_URL_PATH . '/assets/images/logo.jpeg';
        }else {
            echo $thumbnail['sizes']['2048x2048'];
        }
    }
    /**
     * @note get section logo
     * 
     * @param void
     * @return void
     * 
     */
    public static function get_section_logo():void {
        $thumbnail = get_field('section_logo', 'option');

        if ( ! $thumbnail ){
            //alert admin
            //load default bg
            echo UNSLASHED_BASE_URL_PATH . '/assets/images/default-logo.png';
        }else {
            echo $thumbnail['sizes']['large'];
        }
    }

    public static function get_theme_logo():string {

        $custom_logo_id = get_theme_mod( 'custom_logo' );
        $theme_logo = wp_get_attachment_image_src( $custom_logo_id , 'full' );

        return isset( $theme_logo[0] ) ? $theme_logo[0] : UNSLASHED_BASE_URL_PATH . '/assets/images/default-logo.png';
    }
	 

 }


?>