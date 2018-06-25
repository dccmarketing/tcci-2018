<?php
/**
 * The template for displaying all pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package TCCI
 */

get_header();

do_action( 'tcci_before_page_content' );

?><div id="primary" class="content-area full-width">
	<main id="main" role="main"><?php

	/**
	 * The tcci_while_before action hook
	 */
	do_action( 'tcci_while_before' );

	while ( have_posts() ) : the_post();

		get_template_part( 'template-parts/content', 'page' );

	endwhile; // End of the loop.

	?></main><!-- #main -->
</div><!-- #primary --><?php

do_action( 'tcci_after_page_content' );

get_footer();
