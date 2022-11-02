<?php 
//@see https://stackoverflow.com/questions/33973967/why-do-i-have-to-run-composer-dump-autoload-command-to-make-migrations-work-in
//update composer classmaps on each class addition/deletion

if( ! defined('SPACETHEME_DIR_PATH')){
    define('SPACETHEME_DIR_PATH', untrailingslashit( get_template_directory() ));
}
// to use with filemtime()
if( ! defined('UNSLASHED_BASE_ABSOLUTE_PATH')){
    define('UNSLASHED_BASE_ABSOLUTE_PATH', untrailingslashit( get_template_directory() ) );
}
if( ! defined('UNSLASHED_BASE_URL_PATH')){
    define('UNSLASHED_BASE_URL_PATH', untrailingslashit( get_template_directory_uri() ) );
}
if( ! defined('SPACETHEME_TEXTDOMAIN')){
    define('SPACETHEME_TEXTDOMAIN', 'spacetheme' );
}
if( ! defined('SPACETHEME_NONCE')){
    define('SPACETHEME_NONCE', 'spacetheme_nonce' );
}
if( ! defined('SPACETHEME_AJAX_PREFIX')){
    define('SPACETHEME_AJAX_PREFIX', 'spacetheme_ajax_prefix' );
}
// import the autoloader
require_once(SPACETHEME_DIR_PATH . '/vendor/autoload.php');
//load entry point
use \Spacetheme\classes\Base;
use \Spacetheme\helpers\DebugHelpers;
use \Spacetheme\helpers\PostTypesRetriever;

Base::get_instance();


// print('<pre>am in funcs' . print_r(array(
//     PostTypesRetriever::get_post_data('destinations'),
// ), true) . '</pre>' );
// $files = scandir(get_template_directory() . "/dist");
// if( isset($files) ){
//     foreach($files as $index => $file ){
//         if( DebugHelpers::fileExtension($file) === "js" ){
//             print("<pre>" . $file . "</pre>");
//         }
//     }
// }
?>