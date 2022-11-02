<?php
/**
 * @note spacetheme base class
 * 
 * @author spacecowboy
 * @timestamp 03/01/22
 * 
 */

 namespace  Spacetheme\post_types;
 use \Spacetheme\traits\SingletonTrait;


 class CustomPostTypes{

    use SingletonTrait;
    
    public function __construct(){
        /**
         * @note load theme hooks
         * 
         * 
         */
        add_action('init', [$this, 'load_post_types']);

        //add theme settings page
        if (function_exists('acf_add_options_page')) {
            acf_add_options_page(array(
                'menu_title'    => 'Theme Settings',
                'menu_slug'     => 'theme-general-settings',
                'redirect'        => true
            ));
            acf_add_options_sub_page(array(
                'page_title'     => 'Configuration Page d&rsquo;accueil',
                'menu_title'    => 'Page d&rsquo;accueil',
                'parent_slug'    => 'theme-general-settings',
            ));
        }
    }
    /**
     * 
     * @param void
     * @return void
     */
    public function load_post_types():void {

        $this->register_post_type(_x('intro',SPACETHEME_TEXTDOMAIN));
        $this->register_post_type(_x('history',SPACETHEME_TEXTDOMAIN));
        $this->register_post_type(_x('destinations',SPACETHEME_TEXTDOMAIN));
        $this->register_post_type(_x('activities',SPACETHEME_TEXTDOMAIN));
        $this->register_post_type(_x('reviews',SPACETHEME_TEXTDOMAIN));
        $this->register_post_type(_x('reservation',SPACETHEME_TEXTDOMAIN));
    }
    /**
     * generate a custom post type
     * @see https://developer.wordpress.org/reference/functions/register_post_type/
     * 
     * @param string $handler
     * @return void
     */
    private function register_post_type(string $handler):void {
        $capitilized_handler = ucfirst($handler);
        $labels = array(
            'name'               => $capitilized_handler,
            'singular_name'      => $capitilized_handler,
            'menu_name'          => $capitilized_handler,
            'name_admin_bar'     => $capitilized_handler,
            'add_new'            => "Add new {$capitilized_handler}",
            'add_new_item'       => "Add new {$capitilized_handler}",
            'new_item'           => "New {$capitilized_handler}",
            'edit_item'          => "Edit {$capitilized_handler}",
            'view_item'          => "View {$capitilized_handler}",
            'all_items'          => "All {$capitilized_handler}",
            'search_items'       => "Find {$capitilized_handler}",
            'not_found'          => "No {$capitilized_handler} found!",
            'not_found_in_trash' => "No {$capitilized_handler} found in trash.",
            );
        $args = array(
            'labels'             => $labels, 
            'public'             => false,
            'show_ui'            => true,
            'show_in_menu'       => true,
            'show_in_admin_bar'  => false,
            'publicly_queryable' => true,
            'query_var'          => false,
            'capability_type'    => 'post',
            'hierarchical'       => false,
            'menu_position'      => 5,
            'supports'           => array( 'title' )
        );
        register_post_type( $handler, $args );
    }
 }