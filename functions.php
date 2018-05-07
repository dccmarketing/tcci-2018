<?php
/**
 * T/CCI 2018 functions and definitions
 *
 * @link https://codex.wordpress.org/Functions_File_Explained
 *
 * @package TCCI
 */

 /**
  * Set the constants used throughout.
  */
 define( 'PARENT_THEME_SLUG', 'tcci' );
 define( 'PARENT_THEME_VERSION', '1.0.2' );

/**
 * Custom template tags for this theme.
 */
require get_stylesheet_directory() . '/inc/template-tags.php';

/**
 * Load The image function library
 */
require get_stylesheet_directory() . '/inc/imagekit.php';

/**
 * Load Slushman Themekit
 */
require get_stylesheet_directory() . '/inc/themekit.php';

/**
 * Load Autoloader
 */
require get_stylesheet_directory() . '/inc/class-autoloader.php';

/**
 * Create an instance of each class and load the hooks function.
 */
$classes[] = new TCCI_Automattic();
$classes[] = new TCCI_Customizer();
$classes[] = new TCCI_Menukit();
$classes[] = new TCCI_Menu_Styles();
$classes[] = new TCCI_Slushicons();
$classes[] = new TCCI_Metabox_Post_Format();
$classes[] = new TCCI_Shortcode_Listmenu();
$classes[] = new TCCI_Shortcode_Search();
$classes[] = new TCCI_Now_Hiring();
$classes[] = new TCCI_Themehooks();
$classes[] = new TCCI_Utilities();
$classes[] = new TCCI_WooCommerce();

foreach ( $classes as $class ) {

	add_action( 'after_setup_theme', array( $class, 'hooks' ) );

}
