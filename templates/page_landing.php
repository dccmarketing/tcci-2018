<?php
/**
 * Template Name: Four-Features Landing Page
 *
 * Description: A full-width template with four content boxes below.
 *
 * @package TCCI
 */

get_header();

	?><div id="primary" class="content-area full-width">
		<main id="main" role="main"><?php

			/**
			 * The tcci_while_before action hook
			 */
			do_action( 'tcci_while_before' );

			while ( have_posts() ) : the_post();

				get_template_part( 'template-parts/content', 'page' );

			endwhile; // loop

		?></main><!-- #main -->
	</div><!-- #primary --><?php

get_footer();
