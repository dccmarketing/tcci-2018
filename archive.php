<?php
/**
 * The template for displaying archive pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package TCCI
 */

get_header();

	?><div id="primary" class="content-area">
		<main id="main" role="main"><?php

		if ( have_posts() ) :

			/**
			 * The tcci_while_before action hook
			 */
			do_action( 'tcci_while_before' );

			?><header class="page-header archive"><?php

				the_archive_title( '<h1 class="page-title title-archive">', '</h1>' );
				the_archive_description( '<div class="taxonomy-description">', '</div>' );

			?></header><!-- .page-header --><?php

			/* Start the Loop */
			while ( have_posts() ) : the_post();

				if ( has_post_format() ) {

					/*
					 * Include the Post-Format-specific template for the content.
					 * If you want to override this in a child theme, then include a file
					 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
					 */
					get_template_part( 'template-parts/content', get_post_format() );

				} else {

					get_template_part( 'template-parts/content', 'news' );

				}

			endwhile;

			$post_nav_args = array();

			if ( is_category( 'press' ) ) {

				$post_nav_args['prev_text'] = __( 'Older Press', 'tcci' );
				$post_nav_args['next_text'] = __( 'More Recent Press', 'tcci' );

			}

			if ( is_category( 'news' ) ) {

				$post_nav_args['prev_text'] = __( 'Older News', 'tcci' );
				$post_nav_args['next_text'] = __( 'More Recent News', 'tcci' );

			}

			the_posts_navigation( $post_nav_args );

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif;

		?></main><!-- main -->
	</div><!-- .content-area --><?php

get_sidebar();
get_footer();
