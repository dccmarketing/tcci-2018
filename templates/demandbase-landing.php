<?php
/**
 * Template Name: DemandBase Landing Page
 *
 * Description: Landing page template created for DemandBase campaigns
 *
 * @package TCCI
 */

$fields = get_fields( get_the_ID() );

get_header();

/**
 * The tcci_while_before action hook
 */
do_action( 'tcci_while_before' ); 

?><div id="primary" class="full-width">
	<main id="main" role="main">
		<div class="container-message">
			<img src="<?php echo esc_url( get_the_post_thumbnail_url( get_the_ID() ) );; ?>" class="landing-image">
			<div class="image-overlay">
				<div class="text-message">
					<h1 class="landing-title"><?php

						the_title(); 
						
					?></h1>
					<div class="subtext"><?php 
							
						echo apply_filters( 'the_content', $fields['landing_subtext'] );

					?></div>
					<a class="btn btn-orange" href="#request">Request a Drawing</a>
				</div>
			</div>
		</div>
		<section class="landing-section landing-section-orange">
			<div id="products" class="landing-content"><?php

				// TO SHOW THE PAGE CONTENTS
				while ( have_posts() ) : the_post(); 
					
					?><div class="entry-content-page"><?php 
					
						the_content(); 
						
					?></div><!-- .entry-content-page --><?php

				endwhile; //resetting the page loop

				wp_reset_query(); //resetting the page query
		
			?></div>
		</section>
		<section class="landing-section landing-section-white">
			<div class="section-landing-margin">
				<div class="row"><?php

					if( have_rows('product_1') ): 

						?><div class="column2">
							<a href="<?php echo esc_attr( $fields['product_1'][0]['product_1_link'] ); ?>">
								<img src="<?php echo esc_url( $fields['product_1'][0]['featured_product_1'] ); ?>" width="400" height="400"/>
							</a>
						</div>
						<div class="column2">
							<h2 class="section-header section-header-white">
								<a class="section-header-link" href="<?php echo esc_attr( $fields['product_1'][0]['featured_product_1'] ); ?>"><?php 
								
									echo esc_html( $fields['product_1'][0]['product_1_name'] ); 
									
								?></a>	
							</h2>
							<div class="description"><?php 
							
								echo apply_filters( 'the_content', $fields['product_1'][0]['product_1_description'] ); 
								
							?></div>
							<ul class="landing-page-product-links">
								<li class=" landing-page-product-link-item">
									<a class="btn landing-page-product-link" href="<?php echo esc_url( $fields['product_1'][0]['product_1_link'] ); ?>"><?php 
									
										echo esc_html( $fields['product_1'][0]['product_1_button_1_text'] ); 
										
									?></a>
								</li>
								<li class=" landing-page-product-link-item">
									<a class="btn landing-page-product-link" href="<?php echo esc_url( $fields['product_1'][0]['product_1_second'] ); ?>"><?php 
									
										echo esc_html( $fields['product_1'][0]['product_1_button_2_text'] ); 
										
									?></a>
								</li>
							</ul>
						</div><?php 
				
					endif;

				?></div>
			</div>
		</section>
		<section class="landing-section landing-section-orange">
			<div class="section-landing-margin">
				<div class="row"><?php 
				
					if( have_rows('product_2') ): 
					
						?><div class="column2">
							<a href="<?php echo esc_url( $fields['product_2'][0]['product_2_link'] ); ?>">
								<img src="<?php echo esc_url( $fields['product_2'][0]['featured_product_2'] ); ?>" width="400" height="400"/>
							</a>
						</div>
						<div class="column2">
							<a href="<?php echo esc_url( $fields['product_2'][0]['product_2_link'] ); ?>">
								<h2 class="section-header section-header-orange"><?php 
								
									echo esc_html( $fields['product_2'][0]['product_2_name'] ); 
									
								?></h2>
							</a>
							<div class="description"><?php 
							
								echo apply_filters( 'the_content', $fields['product_2'][0]['product_2_description'] ); 
								
							?></div>
							<ul class="landing-page-product-links">
								<li class=" landing-page-product-link-item">
									<a class="btn landing-page-product-link" href="<?php echo esc_url( $fields['product_2'][0]['product_2_link'] ); ?>"><?php 
									
										echo esc_html( $fields['product_2'][0]['product_2_button_1_text'] ); 
										
									?></a>
								</li>
								<li class=" landing-page-product-link-item">
									<a class="btn landing-page-product-link" href="<?php echo esc_url( $fields['product_2'][0]['product_2_second'] ); ?>"><?php 
									
										echo esc_html( $fields['product_2'][0]['product_2_button_2_text'] ); 
										
									?></a>
								</li>
							</ul>
						</div><?php 
						
					endif;
				
				?></div>
			</div>
		</section>
		<section class="landing-section landing-section-white">
			<div class="section-landing-margin">
				<div class="row"><?php 
				
					if( have_rows('product_3') ):

						?><div class="column2">
							<a href="<?php echo esc_url( $fields['product_3'][0]['product_3_link'] ); ?>">
								<img src="<?php echo esc_url( $fields['product_3'][0]['featured_product_3'] ); ?>" width="400" height="400" />
							</a>
						</div>
						<div class="column2">
							<a href="<?php echo esc_url( $fields['product_3'][0]['product_3_link'] ); ?>">
								<h2 class="section-header section-header-white"><?php 
								
									echo esc_html( $fields['product_3'][0]['product_3_name'] ); 
								
								?></h2>
							</a>
							<div class="description"><?php 
							
								echo apply_filters( 'the_content', $fields['product_3'][0]['product_3_description'] ); 
								
							?></div>
							<ul class="landing-page-product-links">
								<li class=" landing-page-product-link-item">
									<a class="btn landing-page-product-link" href="<?php echo esc_url( $fields['product_3'][0]['product_3_link'] ); ?>"><?php 
									
										echo esc_html( $fields['product_3'][0]['product_3_button_1_text'] ); 
										
									?></a>
								</li>
								<li class=" landing-page-product-link-item">
									<a class="btn landing-page-product-link" href="<?php echo esc_url( $fields['product_3'][0]['product_3_second'] ); ?>"><?php 
									
										echo esc_html( $fields['product_3'][0]['product_3_button_2_text'] ); 
										
									?></a>
								</li>
							</ul>
						</div><?php 
					
					endif; 
			
				?></div>
			</div>
		</section>
		<section id="request" class="landing-section landing-section-orange">
			<div class="ending-content-style"><?php 
			
				echo apply_filters( 'the_content', $fields['ending_content'] );
				
			?></div>
		</section>
	</main><!-- #main -->
</div><!-- #primary --><?php

get_footer();
