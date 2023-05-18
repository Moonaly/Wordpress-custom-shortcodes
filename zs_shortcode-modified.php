<?php
/*
Plugin Name: 	ZS Shortcodes
Description: 	ZS Custom Shortcode
Version: 		2.0.0
Text Domain: 	zs-services
Domain Path:	/languages
License: 		GPLv2 or later
License URI:	http://www.gnu.org/licenses/gpl-2.0.html

*/

if ( !is_admin() ) {
	include_once('template/zs_empty_space.php');
	include_once('template/youtube_iframe.php'); 
	include_once('template/template.php'); 
	include_once('template/casinolist.php'); 
	include_once('template/casinolistdisplay.php'); 
	include_once('template/thumbnail_display.php'); 
    include_once('template/footer_display_posts.php');  
    include_once('template/betdetails.php'); 
    include_once('template/bottom_rating.php'); 
    include_once('template/bet_bonuses.php'); 
    
}
if( is_admin() ) {
	include_once('admin/zs_empty_space.php');
	include_once('admin/youtube_iframe.php');
	
	add_action('admin_head', 'hide_param_field');
	function hide_param_field() {
	  echo '<style>
		.wpb_zs_empty_space .wpb_vc_param_value, .wpb_youtube_iframe .wpb_vc_param_value {
		  display: none;
		} 
		.vc_ui-panel.vc_active[data-vc-shortcode="youtube_iframe"] .wpb_el_type_checkbox.vc_wrapper-param-type-checkbox {
			display: inline-block;
			width: auto;
		}
		.zs_icon.vc_element-icon {
		  background-image: url( '.plugins_url( 'img/zs_plugin-icon.png', __FILE__ ).');
		}
	  </style>';
	}
}


//Add Custom CSS
function zs_plugin_css_script() {
	wp_enqueue_style( 'zsp-style', plugins_url('assets/zs_style.css', __FILE__).'?v='.rand(1,999999999) );
	wp_enqueue_script( 'zsp-script', plugins_url('assets/zs_script.js', __FILE__).'?v='.rand(1,999999999) , array(), '', true );
	
}
add_action( 'wp_enqueue_scripts', 'zs_plugin_css_script', 100 );