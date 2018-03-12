<?php
/**
 * The template for displaying search results pages.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package TCCI
 */

get_header();

	?><section id="primary" class="content-area">
		<main id="main" role="main"><?php

		if ( have_posts() ) :

			?><header class="page-header">
				<h1 class="page-title"><?php

					printf( esc_html__( 'Search Results for: %s', 'tcci' ), '<span>' . get_search_query() . '</span>' );

				?></h1>
			</header><!-- .page-header --><?php

			/* Start the Loop */
			while ( have_posts() ) : the_post();

				/**
				 * Run the loop for the search to output the results.
				 * If you want to overload this in a child theme then include a file
				 * called content-search.php and that will be used instead.
				 */
				get_template_part( 'template-parts/content', 'search' );

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

		?></main><!-- #main -->
	</section><!-- #primary --><?php

get_sidebar();
get_footer();
