<?php
/**
 * Template used for displaying page content in page.php
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package TCCI
 */

?><article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="page-header contentpage"><?php

		/**
		 * @hooked 		title_page 		10
		 */
		do_action( 'entry_header_content' );

	?></header><!-- .entry-header --><?php

	do_action( 'tcci_entry_content_before' );

	?><div class="page-content"><?php

		the_content();

		wp_link_pages( array(
			'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'tcci' ),
			'after'  => '</div>',
		) );

	?></div><!-- .entry-content --><?php

	do_action( 'tcci_entry_content_after' );

	?><footer class="entry-footer"><?php

		edit_post_link( esc_html__( 'Edit', 'tcci' ), '<span class="edit-link">', '</span>' );

	?></footer><!-- .entry-footer --><?php

	do_action( 'tcci_entry_bottom' );

?></article><!-- #post-## -->