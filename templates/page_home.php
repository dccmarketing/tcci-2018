<?php
/**
 * Template Name: Home Page
 *
 * Description: A full-width template for the home page
 *
 * @package TCCI
 */

$fields = get_fields();

get_header();

?><div id="primary" class="content-area full-width">
	<main id="main" role="main">
		<video autoplay="autoplay" class="home-video" loop="loop" muted="muted" preload="auto"><?php

		if ( ! empty( $fields['video_url'] ) ) {

			?><source src="<?php echo esc_url( $fields['video_url'] ); ?>" type="video/mp4" /><?php

		}

		?></video><?php

		while ( have_posts() ) : the_post();

			get_template_part( 'template-parts/content', 'page' );

		endwhile; // loop

		?><section class="home-pillars clear"><?php

			if ( ! empty( $fields['pillars_content'][0] ) ) :

				?><div class="home-pillars__description"><?php

					echo apply_filters( 'the_content', $fields['pillars_content'] );

				?></div><?php

			endif;

			if ( ! empty( $fields['pillars'][0] ) ) :

				?><ul class="pillars"><?php

					foreach ( $fields['pillars'] as $pillar ) :

						?><li class="pillar">
							<img class="pillar-icon" src="<?php echo esc_url( $pillar['pillar_icon'] ); ?>" />
						</li><?php

					endforeach;

				?></ul><?php

			endif;

			if ( ! empty( $fields['awards'][0] ) ) :

				?><ul class="awards"><?php

					foreach ( $fields['awards'] as $award ) :

						?><li class="award">
							<img src="<?php echo esc_url( $award['award'] ); ?>" />
						</li><?php

					endforeach;

				?></ul><?php

			endif;

		?></section>
		<section class="home-innovation clear">
			<div class="innovation-wrap"><?php

				if ( ! empty( $fields['innovation_content'] ) ) {

					?><div class="innovation-description"><?php

						echo apply_filters( 'the_content', $fields['innovation_content'] );

					?></div><?php

				}

				if ( ! empty( $fields['innovation_image'] ) ) {

					?><img class="innovation-image" src="<?php echo esc_url( $fields['innovation_image'] ); ?>" /><?php

				}

			?></div>
		</section>
		<section class="home-products clear">
			<div class="products-wrap">
				<h2 class="products-title"><?php

					echo esc_html( $fields['products_title'] );

				?></h2>
				<div class="products-description"><?php

					echo apply_filters( 'the_content', $fields['products_description'] );

				?></div><?php

				if ( ! empty( $fields['products'] ) && is_array( $fields['products'] ) ) :

					?><ul class="products-list"><?php

						foreach ( $fields['products'] as $product ) :

							?><li class="product"><?php

								if ( ! empty( $product['product_url'] ) ) :

									?><a class="product-link" href="<?php

										echo esc_url( get_term_link( $product['product_url']->term_id ) );

									?>"><?php

								endif;

								if ( ! empty( $product['product_image'] ) ) :

									?><img class="product-image" src="<?php

										echo esc_url( $product['product_image'] );

									?>" /><?php

								endif;

								if ( ! empty( $product['product_url'] ) ) :

									?></a><?php

								endif;

							?></li><?php

						endforeach;

					?></ul><?php

				endif;

			?></div>
		</section>
		<section class="home-facilities clear">
			<div class="facilities-wrap"><?php

				if ( ! empty( $fields['facilities_image'] ) ) {

					?><img class="facilities-image" src="<?php echo esc_url( $fields['facilities_image'] ); ?>" /><?php

				}

			?></div>
		</section>
		<section class="home-subscribe clear">
			<div class="subscribe-wrap">
				<h2 class="subscribe-title"><?php

					echo esc_html( $fields['subscription_title'] );

				?></h2>
				<div class="subscribe-content">
					<div class="subscribe-column subscribe-column-1"><?php

						echo FrmFormsController::get_form_shortcode( array( 'id' => 31, 'title' => false, 'description' => false ) );

					?></div>
					<div class="subscribe-column subscribe-column-2">
						<ul class="subscribe-buttons">
							<li>
								<a class="subscribe-link subscribe-link__newsletters"><?php esc_html_e( 'Newsletters', 'tcci' ); ?></a>
							</li>
							<li>
								<a class="subscribe-link subscribe-link__briefs"><?php esc_html_e( 'Engineering Briefs', 'tcci' ); ?></a>
							</li>
						</ul>
					</div>
				</div>
			</div>
		</section>
	</main><!-- #main -->
</div><!-- #primary --><?php

get_footer();
