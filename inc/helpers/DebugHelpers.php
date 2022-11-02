<?php
/**
 * 
 * @author spacetheme
 * 
 */

namespace Spacetheme\helpers;

 class DebugHelpers{

    public function __construct(){
        /**
         * @note load theme hooks
         * 
         * 
         */

    } 
    /**
     * @note console.log in the front end
     * @warning calling this method will break any ajax request
     * 
     * @param mixed $output
     * @param bool $with_script_tags wrap in <script> tags
     * @return void the package is echoed
     * 
     */
    public static function console_log( $output, bool $with_script_tags = true): void{
      $js_code = 'console.log(' . json_encode($output, JSON_HEX_TAG) . 
    ');';
      if ($with_script_tags) {
          $js_code = '<script>' . $js_code . '</script>';
      }
      echo $js_code;
    }

    /**
     *
     * @param string $file_name
     * @return string file extension
     * 
     */
    public static function fileExtension(string $file_name): string{
      $n = strrpos($file_name, '.');
      return ($n === false) ? '' : substr($file_name, $n+1);
    }
 }


?>