<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package TCCI
 */

get_header();

	?><div id="primary" class="content-area">
		<main id="main" role="main">
			<header class="page-header">
				<h1 class="page-title"><?php single_post_title(); ?></h1>
			</header><?php

			while ( have_posts() ) : the_post();

				get_template_part( 'template-parts/content', get_post_format() );

			endwhile; // End of the loop.

		?></main><!-- #main -->
	</div><!-- #primary --><?php

get_sidebar();
get_footer();
