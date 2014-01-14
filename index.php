<?php
/**
 * Plugin Name: Simple Tabbed Content
 * Plugin URI: http://URI_Of_Page_Describing_Plugin_and_Updates
 * Description: Just a simple tabbed content plugin.
 * Version: The Plugin's Version Number, e.g.: 1.0
 * Author: Craig Fox
 * Author URI: http://cwraigwfox.com
 * License: MIT License
*/
  

  // Load Scripts and CSS
    wp_enqueue_script('jquery');

    function stc_scripts() {
      wp_enqueue_style( 'stc_css', plugins_url('css/stc.css',__FILE__));
      wp_enqueue_script( 'stc_js', plugins_url('js/stc.js',__FILE__ ), array(), '1.0.0', true );
    }
    add_action( 'wp_enqueue_scripts', 'stc_scripts' );
    

// Shortcodes for the Plugin
    function stc_wrap_shortcode($atts, $content = null) {
      return '<div class="stc-wrap">'.do_shortcode($content).'</div></div>';}
    add_shortcode('stc_wrap', 'stc_wrap_shortcode');

    function stc_nav_shortcode($atts, $content = null) {
      return '<div class="stc-nav">'.do_shortcode($content).'</div><div class="stc-content-wrap">';}
    add_shortcode('stc_nav_wrap', 'stc_nav_shortcode');

    function stc_nav_item_shortcode($atts, $content = null) {
      extract(shortcode_atts( array(
        'nav_id' => '',
        'nav_content' => '',
      ), $atts));
      return '<li class="stc-nav-item" data-stc-nav="'.esc_attr($nav_id).'">'.esc_attr($nav_content).'</li>';
    }
    add_shortcode('stc_nav_item', 'stc_nav_item_shortcode');

    function stc_content_shortcode($atts, $content = null) {
      extract(shortcode_atts( array(
        'content_id' => '',
      ), $atts));
      return '<div class="stc-content" data-stc-content="'.esc_attr($content_id).'">'.do_shortcode($content).'</div>';
    }
    add_shortcode('stc_content', 'stc_content_shortcode');