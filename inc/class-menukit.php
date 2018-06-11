<?php

/**
 * A class of helpful menu-related functions
 *
 * @package TCCI
 * @author Slushman <chris@slushman.com>
 */
class TCCI_Menukit {

	/**
	 * Constructor
	 */
	public function __construct() {} // __construct()

	/**
	 * Registers all the WordPress hooks and filters for this class.
	 */
	public function hooks() {

		add_filter( 'wp_nav_menu_items', 					array( $this, 'add_search_to_menu' ), 10, 2 );
		add_filter( 'nav_menu_item_title', 					array( $this, 'submenu_toggle' ), 10, 4 );
		add_filter( 'wp_nav_menu_container_allowedtags', 	array( $this, 'allow_section_tags_as_containers' ), 10, 1 );

	} // hooks()

	/**
	 * Adds a search form to the menu.
	 *
	 * @exits 		If not on the correct menu.
	 * @hooked 		wp_nav_menu_items 			10
	 * @param 		array 		$items 			The current menu items.
	 * @param 		array 		$args 			The menu args.
	 * @return 		array 						The menu items plus a search form.
	 */
	public function add_search_to_menu( $items, $args ) {

		if ( 'social' !== $args->theme_location ) { return $items; }

		$search = '';
		$search .= '<li class="menu-item search">';
		$search .= '<span class="btn-search">';
		$search .= tcci_get_svg( 'search' );
		$search .= '</span>';
		$search .= get_search_form( false );
		$search .= '</li>';


		return $items . $search;

	} // add_search_to_menu()

	/**
	 * Adds more allowed tags for WP menu containers.
	 *
	 * @hooked 		wp_nav_menu_container_allowedtags
	 * @param 		array 			$tags 			The current allowed tags
	 * @return 		array 							The modified allowed tags
	 */
	public function allow_section_tags_as_containers( $tags ) {

		$tags[] = 'section';

		return $tags;

	} // allow_section_tags_as_containers()

	/**
	 * Adds the "+" menu-primary-submenu-toggle trigger for mobile menus and the down caret for laptop menus.
	 *
	 * @exits 		If $args is empty or an array.
	 * @exits 		If not on the primary menu.
	 * @exits 		If 'menu-item-has-children' is not in the $classes array.
	 * @hooked 		nav_menu_item_title 			10
	 * @param 		string 		$title 				The menu item title.
	 * @param 		object 		$item				The current menu item.
	 * @param 		array 		$args 				The wp_nav_menu args.
	 * @param 		int 		$depth 				The menu item depth.
	 * @return 		string 							The modified menu item title.
	 */
	public function submenu_toggle( $title, $item, $args, $depth ) {

		if ( empty( $args ) || is_array( $args ) ) { return $title; }
		if ( 'primary' !== $args->theme_location ) { return $title; }
		if ( ! in_array( 'menu-item-has-children', $item->classes ) ) { return $title; }

		$output = $title . '<button class="menu-primary-submenu-toggle flex-center">+</button>';

		return $output;

	} // submenu_toggle()

} // class
