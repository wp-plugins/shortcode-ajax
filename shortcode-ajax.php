<?php
/**
 * Plugin Name: Shortcode Loader
 * Description: This plugin helps to reload content with ajax. New button will appear to the editor. Should work almost all shortcodes.
 * Author: Märt Rang
 * Author email: rang501@gmail.com
 * Version: 1.0
 * Plugin URI: http://www.mrang.eu
 * License: GPLv2
 */

 class shortcode_ajax {
   function shortcode_ajax(){
     //add_action('init', array(&$this, 'fetch_content_call'));
     add_shortcode('shortcode_ajax', array(&$this, 'make_shortcode_data'));
     add_action('init', array(&$this, 'add_button'));

     // embed the javascript file that makes the AJAX request
     wp_enqueue_script( 'my-ajax-request', plugin_dir_url( __FILE__ ) . 'js/ajax.js', array( 'jquery' ) );

     // declare the URL to the file that handles the AJAX request (wp-admin/admin-ajax.php)
     wp_localize_script( 'my-ajax-request', 'MyAjax', array( 'ajaxurl' => $this->current_url() ) );

   }


   function fetch_content_call(){
     $code = $_POST['code'];
     $response = json_encode(array('html' => do_shortcode($code)));
     //header( "Content-Type: application/json" );
     echo $response;
     exit;
   }

   function make_shortcode_data($atts, $content=null){
     //ob_start();
     $html = do_shortcode($content);
     //$html = ob_get_clean();

     $out = '<div id="shortcode_ajax_wrapper">';
     $out .= '<script type="text/javascript">

     function data_refresh(){
       var shortcut = jQuery("#shortcode_ajax_shortcode").text();
       reload_shortcut(shortcut);
     }
     jQuery(document).ready(function(){

      setInterval(data_refresh, 10000);
     });
     </script>';
     $out .= '<span id="shortcode_ajax_shortcode" style="display:none;">'.$content.'</span>';

     $out .= '<div id="shortcode_ajax_content">'.$html.'</div>';
     $out .= '</div>';

     return $out;
   }

   function add_button() {
     if ( current_user_can('edit_posts') &&  current_user_can('edit_pages') )
     {
       add_filter('mce_external_plugins', array(&$this, 'add_plugin'));
       add_filter('mce_buttons', array(&$this,'register_button'));
     }
   }

   function register_button($buttons) {
    array_push($buttons, "shortcode_ajax");
    return $buttons;
   }

   function add_plugin($plugin_array) {
     $plugin_array['shortcode_ajax'] = plugins_url().'/shortcode-ajax/js/customcodes.js';
     return $plugin_array;
    }

  function current_url() {
   $pageURL = 'http';
   if ($_SERVER["HTTPS"] == "on") {$pageURL .= "s";}
   $pageURL .= "://";
   if ($_SERVER["SERVER_PORT"] != "80") {
    $pageURL .= $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"].$_SERVER["REQUEST_URI"];
   } else {
    $pageURL .= $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
   }
   return $pageURL;
  }
 }

$sa = new shortcode_ajax();

if(isset($_POST['code'])) {
    add_action('wp', array(&$sa, 'fetch_content_call'));
}

