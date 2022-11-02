<?php
/**
 * @note base class
 * ## table of content ##
 * theme_setup() 
 * 
 * @author spacetheme
 * 
 */

namespace Spacetheme\classes;
use \Spacetheme\traits\SingletonTrait;


 class Setup{

	use SingletonTrait;

    public function __construct(){
        /**
         * @note load theme hooks
         * 
         * 
         */
        add_action('after_setup_theme', [$this, 'theme_setup']);
		add_filter('wp_title', [$this, 'theme_wp_title'], 10, 2);
    } 
    /**
	 * @see https://developer.wordpress.org/reference/functions/add_theme_support/
     * 
     * @param void
     * @return void
     */
    public function theme_setup(): void{

	load_theme_textdomain(SPACETHEME_TEXTDOMAIN, get_template_directory() . '/languages');// add languages dir

	add_theme_support('widgets');
	// Add RSS feed links to <head> for posts and comments.
	add_theme_support('automatic-feed-links');
	// Enable support for Post Thumbnails, and declare two sizes.
	add_theme_support('post-thumbnails');
	set_post_thumbnail_size(300, 9999, true);
	add_image_size('realisation', 300, 300, array( 'center', 'top' ));
	add_image_size('cover', 99999, 350, true);
	add_image_size('avatar', 80, 80, true);
	// This theme uses wp_nav_menu() in two locations.
	register_nav_menus(array(
		'primary' => __('Menu Principal', SPACETHEME_TEXTDOMAIN),
		'social' => __('Menu des reseaux sociaux', SPACETHEME_TEXTDOMAIN),
		'footer' => __('Menu du pied de page', SPACETHEME_TEXTDOMAIN),
	));
	add_theme_support('html5', array('search-form','comment-form','comment-list','gallery','caption'));
	add_theme_support('post-formats', array('aside','image','video','audio','quote','link','gallery'));
	add_theme_support( 'custom-logo', array(
		'height'      => 80,
		'width'       => 150,
		'flex-height' => true,
		'flex-width'  => true,
		'header-text' => array( 'site-title', SPACETHEME_TEXTDOMAIN ),
	) );
	add_theme_support('custom-background', apply_filters('theme_custom_background_args', array('default-color' => 'ffffff')));

    }
    /**
     * 
     * @param string $title
     * @param string $sep
     * @return string $title
     */
	public function theme_wp_title(string $title, string $sep): string{
		global $paged, $page;
		if (is_feed()) {
			return $title;
		}
		// Add the site name.
		$title .= get_bloginfo('name', 'display');
		// Add the site description for the home/front page.
		$site_description = get_bloginfo('description', 'display');
		if ($site_description && (is_home() || is_front_page())) {
			$title = "$title $sep $site_description";
		}
		// Add a page number if necessary.
		if ($paged >= 2 || $page >= 2) {
			$title = "$title $sep " . sprintf(__('Page %s', 'spacetheme'), max($paged, $page));
		}
		return $title;
	}
 }


?>