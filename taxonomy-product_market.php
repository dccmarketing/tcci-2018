<?php
/**
 * Template Name: Markets
 *
 * Description: Page template with sidebar on the left-side
 *
 * @package TCCI
 */

get_header();

	?><div class="wrap-market"><?php

		get_sidebar( 'market' );

		?><div id="primary" class="content-area sidebar-content">
			<main id="main" role="main">
				<header class="page-header"><?php

					the_archive_title( '<h1 class="page-title title-archive">', '</h1>' );
					the_archive_description( '<div class="taxonomy-description">', '</div>' );

				?></header><!-- .page-header --><?php

				?><div class="market-products"><?php

				while ( have_posts() ) : the_post();

					get_template_part( 'template-parts/content', 'market_product' );

				endwhile; // loop

				?></div><?php

				echo FrmFormsController::get_form_shortcode( array( 'id' => 30, 'title' => false, 'description' => false ) );

			?></main><!-- #main -->
		</div><!-- #primary -->
	</div><?php

get_footer();
