<?php
/*
Plugin Name: Equal Height Shortcode
Plugin URI: 
Description: The plugin adds a shortcodes which sets the height of contained elements to the height of the largest contained element.
Version: 0.1
Author: Michael W. Delaney
Author URI: 
License: GPL2
*/

/*  Copyright 2014  Michael W. Delaney  (email : michael@michael-delaney.com)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License, version 2, as
    published by the Free Software Foundation.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

/* ============================================================= */

require_once( dirname( __FILE__ ) . '/includes/defaults.php' );

// Begin Shortcodes
class EqualHeightShortcodes {

  function __construct() {
    add_action( 'init', array( $this, 'add_shortcodes' ) );
    add_action( 'wp_enqueue_scripts', array( $this, 'equalheight_shortcodes_scripts' ), 9999 ); // Register this fxn and allow Wordpress to call it automatcally in the header
  }

  function equalheight_shortcodes_scripts()  { 

    // Bootstrap tooltip js
    wp_enqueue_script( 'equalheight', EQUALHEIGHT_SHORTCODES_URL . 'js/jQuery.equalHeights/jquery.equalheights.min.js', array( 'jquery' ), false, true );
    wp_enqueue_script( 'equalheight-shortcodes', EQUALHEIGHT_SHORTCODES_URL . 'js/equalheight-shortcodes.js', array( 'jquery' ), false, true );

  }


  /*--------------------------------------------------------------------------------------
    *
    * add_shortcodes
    *
    *-------------------------------------------------------------------------------------*/
  function add_shortcodes() {

    add_shortcode('equal-height', array( $this, 'equalheight' ));

  }

  /*--------------------------------------------------------------------------------------
    *
    * equal-height
    *
    *-------------------------------------------------------------------------------------*/
  function equalheight($atts, $content = null) {
      
    extract( shortcode_atts( array(
      "target"     => false
    ), $atts ) );
      
    $class  = 'equal-height';
    $class .= ( $target )     ? ' equal-height-target' : ' equal-height-auto';
      
    return sprintf( 
      '<div class="%s"%s>%s</div>',
      esc_attr( $class ),
      ( $target ) ? ' data-equal="' . $target. '"' : '',
      do_shortcode( $content )

    );
  }
}

new EqualHeightShortcodes();