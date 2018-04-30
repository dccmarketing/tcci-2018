<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package TCCI
 */

//if ( ! defined( 'ABSPATH' ) ); exit; // Exit if accessed directly

get_header();

	?><div id="primary" class="content-area">
		<main id="main" role="main"><?php

			/**
			 * The tcci_while_before action hook
			 */
			do_action( 'tcci_while_before' );

			while ( have_posts() ) : the_post();

				get_template_part( 'template-parts/content', get_post_format() );

			endwhile; // End of the loop.

		?></main><!-- #main -->
	</div><!-- #primary --><?php

get_footer();
