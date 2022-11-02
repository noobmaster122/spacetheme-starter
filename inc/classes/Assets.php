<?php
/**
 * ## table of content ##
 * theme_scripts() 
 * theme_styles()
 * 
 * @author spacetheme
 * 
 */

namespace Spacetheme\classes;
use \Spacetheme\traits\SingletonTrait;


 class Assets{

    use SingletonTrait;

    public function __construct(){
        /**
         * @note load theme hooks
         * 
         * 
         */
        add_action('wp_enqueue_scripts', [$this, 'theme_scripts']);
        add_action('wp_enqueue_scripts', [$this, 'theme_styles']);


    } 
    /**
     * 
     * @param void
     * @return void
     */
    public function theme_scripts(): void{
        /**
         * 
         * Scripts
         */
        wp_enqueue_script('spacetheme-bootstrap-js-bundle',UNSLASHED_BASE_URL_PATH . '/dist/bootsBundle.bundle.js', array('jquery'), filemtime(UNSLASHED_BASE_ABSOLUTE_PATH . "/dist/bootsBundle.bundle.js"), true);
        wp_enqueue_script('spacetheme-scripts-bundle',UNSLASHED_BASE_URL_PATH . '/dist/index.bundle.js', array('jquery'), filemtime(UNSLASHED_BASE_ABSOLUTE_PATH . "/dist/index.bundle.js"), true);

        wp_localize_script( 'spacetheme-scripts-bundle', 'siteConfig', [
            'spacetheme_AjaxUrl'    => admin_url( 'admin-ajax.php' ),
            'spacetheme_ajax_nonce' => wp_create_nonce( SPACETHEME_NONCE ),//create a hash and send to the front end 
        ] );
    }
    /**
     * @uses constant UNSLASHED_BASE_ABSOLUTE_PATH
     * @uses constant UNSLASHED_BASE_URL_PATH
     * @param void
     * @return void
     */
    public function theme_styles(): void{
        /**
         * 
         * Styles
         */
        wp_enqueue_style('spacetheme-styles-bundle', UNSLASHED_BASE_URL_PATH . '/dist/themeStyles.css', array(), filemtime(UNSLASHED_BASE_ABSOLUTE_PATH . "/dist/themeStyles.css"));	
        wp_enqueue_style('spacetheme-bootstrap-bundle', UNSLASHED_BASE_URL_PATH . '/dist/bootsBundle.css', array(), filemtime(UNSLASHED_BASE_ABSOLUTE_PATH . "/dist/bootsBundle.css"));	
        wp_enqueue_style('spacetheme-animate-bundle', UNSLASHED_BASE_URL_PATH . '/dist/animateStyles.css', array(), filemtime(UNSLASHED_BASE_ABSOLUTE_PATH . "/dist/animateStyles.css"));	
        wp_enqueue_style('spacetheme-index-bundle', UNSLASHED_BASE_URL_PATH . '/dist/index.css', array(), filemtime(UNSLASHED_BASE_ABSOLUTE_PATH . "/dist/index.css"));	
        /**
         * 
         * Load fonts
         */
        wp_enqueue_style( 'spacetheme-googlefonts', 'https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400;500;700&display=swap', array(), null );
    }
 }


?>