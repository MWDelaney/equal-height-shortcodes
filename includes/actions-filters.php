<?php

/*  Include the styling for the help tab in the admin
*/

function bootstrap_shortcodes_help_styles() {
  wp_register_style( 'bs-font', plugins_url( 'bootstrap-3-shortcodes/includes/help/bs-font.css' ) );
  wp_enqueue_style( 'bs-font' );
  wp_register_style( 'bootstrap-shortcodes-help', plugins_url( 'bootstrap-3-shortcodes/includes/help/css/bootstrap-shortcodes-help.css' ) );
  wp_enqueue_style( 'bootstrap-shortcodes-help' );
}
add_action( 'admin_enqueue_scripts', 'bootstrap_shortcodes_help_styles' );

?>