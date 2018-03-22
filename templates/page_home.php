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
		<div class="home-video-container"><?php

			if ( ! empty( $fields['cta_logo'] ) && ! empty( $fields['cta_link'] ) && ! empty( $fields['cta_text'] ) ) :

				?><div class="home-call-to-action">
					<div class="home-cta-wrap">
						<img class="home-cta-logo" src="<?php echo esc_url( $fields['cta_logo'] ); ?>" />
						<p>
							<a class="home-cta-link" href="<?php echo esc_url( $fields['cta_link'] ); ?>"><?php echo esc_html( $fields['cta_text'] ); ?></a>
						</p>
					</div>
				</div><?php

			endif;


			?><video autoplay="autoplay" class="home-video" loop="loop" muted="muted" preload="auto"><?php

			if ( ! empty( $fields['video_url'] ) ) {

				?><source src="<?php echo esc_url( $fields['video_url'] ); ?>" type="video/mp4" /><?php

			}

			?></video>
		</div><?php

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

				?><ul class="home-pillars-list"><?php

					foreach ( $fields['pillars'] as $pillar ) :

						?><li class="home-pillar">
							<img class="home-pillar-icon" src="<?php echo esc_url( $pillar['pillar_icon'] ); ?>" />
						</li><?php

					endforeach;

				?></ul><?php

			endif;

			if ( ! empty( $fields['awards'][0] ) ) :

				?><ul class="home-awards"><?php

					foreach ( $fields['awards'] as $award ) :

						?><li class="home-award">
							<img src="<?php echo esc_url( $award['award'] ); ?>" />
						</li><?php

					endforeach;

				?></ul><?php

			endif;

		?></section>
		<section class="home-innovation clear">
			<div class="home-innovation-wrap"><?php

				if ( ! empty( $fields['innovation_content'] ) ) {

					?><div class="home-innovation-description"><?php

						echo apply_filters( 'the_content', $fields['innovation_content'] );

					?></div><?php

				}

				if ( ! empty( $fields['innovation_product'] ) && is_object( $fields['innovation_product'] ) ) :

					$media_dir = wp_upload_dir();
					$images = tcci_get_featured_images( $fields['innovation_product']->ID );

					?><img class="home-innovation-image" src="<?php echo esc_url( $media_dir['baseurl'] ); ?>/2018/03/innovation-spotlight-header.png" />
					<div class="home-innovation-content">
						<div>
							<img class="home-innovation-image" src="<?php echo esc_url( $images['sizes']['large']['url'] ); ?>" />
						</div>
						<div class="home-innovation-description">
							<a class="home-innovation-title-link" href="<?php echo esc_url( get_permalink( $fields['innovation_product']->ID ) ); ?>">
								<h2 class="home-innovation-title"><?php echo esc_html( $fields['innovation_product']->post_title ); ?></h2>
							</a><?php

							echo apply_filters( 'the_content', $fields['innovation_product']->post_content ); 
							
						?></div>
					</div><?php

				endif;

			?></div>
		</section>
		<section class="home-products clear">
			<div class="home-products-wrap">
				<h2 class="home-products-title"><?php

					echo esc_html( $fields['products_title'] );

				?></h2>
				<div class="home-products-description"><?php

					echo apply_filters( 'the_content', $fields['products_description'] );

				?></div><?php

				if ( ! empty( $fields['products'] ) && is_array( $fields['products'] ) ) :

					?><ul class="home-products-list"><?php

						foreach ( $fields['products'] as $product ) :

							?><li class="home-product"><?php

								if ( ! empty( $product['product_url'] ) ) :

									?><a class="home-product-link" href="<?php

										echo esc_url( get_term_link( $product['product_url']->term_id ) );

									?>"><?php

								endif;

								if ( ! empty( $product['product_image'] ) ) :

									?><img class="home-product-image" src="<?php

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
			<div class="home-facilities-wrap"><?php

				if ( ! empty( $fields['facilities_image'] ) ) {

					?><img class="home-facilities-image" src="<?php echo esc_url( $fields['facilities_image'] ); ?>" /><?php

				}

			?></div>
		</section>
		<section class="home-subscribe clear">
			<div class="home-subscribe-wrap">
				<h2 class="home-subscribe-title"><?php

					echo esc_html( $fields['subscription_title'] );

				?></h2>
				<div class="home-subscribe-content">
					<div class="home-subscribe-column subscribe-column-1"><?php

						if ( ! empty( $fields['contact_form'] ) ) {

							echo FrmFormsController::get_form_shortcode( array( 'id' => $fields['contact_form'], 'title' => false, 'description' => false ) );

						}

					?></div>
					<div class="home-subscribe-column subscribe-column-2">
						<ul class="home-subscribe-buttons">
							<li>
								<a class="home-subscribe-link home-subscribe-link__newsletters" href="/category/newsletters/"><?php esc_html_e( 'Newsletters', 'tcci' ); ?></a>
							</li>
							<li>
								<a class="home-subscribe-link home-subscribe-link__briefs" href="/category/engineering-briefs/"><?php esc_html_e( 'Engineering Briefs', 'tcci' ); ?></a>
							</li>
						</ul>
					</div>
				</div>
			</div>
		</section>
	</main><!-- #main -->
</div><!-- #primary --><?php

get_footer();
