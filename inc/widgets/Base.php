<?php

namespace Spacetheme\widgets;
use \Spacetheme\widgets\Banner;
use \Spacetheme\widgets\SpecialOffer;



class Base{
    public function __construct(){

        // Add Widget scripts
        add_action('admin_enqueue_scripts', array($this, 'scripts'));

        add_action( 'widgets_init', function(){
            register_sidebar( array(
                'name'          => __( 'banner Sidebar first', SPACETHEME_TEXTDOMAIN ),
                'id'            => 'banner-sidebar-1',
            ) );
            register_sidebar( array(
                'name'          => __( 'banner Sidebar second', SPACETHEME_TEXTDOMAIN ),
                'id'            => 'banner-sidebar-2',
            ) );
            register_sidebar( array(
                'name'          => __( 'sidebar special offer panel', SPACETHEME_TEXTDOMAIN ),
                'id'            => 'special-offer-widget',
            ) );
            register_widget( '\Spacetheme\widgets\Banner' );
            register_widget( '\Spacetheme\widgets\SpecialOffer' );

        } );


    }
    /**
     * Load js scripts
     * 
     * @param void
     * @return void
     * 
     */
    public function scripts(){
        wp_enqueue_script( 'media-upload' );
        wp_enqueue_media();
        wp_enqueue_script('spacetheme_admin_scripts', UNSLASHED_BASE_URL_PATH . '/dist/adminScripts.bundle.js', array('jquery'));
    }
}

?>