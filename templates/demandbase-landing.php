<?php
/**
 * Template Name: DemandBase Landing Page
 *
 * Description: Landing page template created for DemandBase campaigns
 *
 * @package TCCI
 */

get_header();

$fields = get_fields( get_the_ID() );

/**
 * The tcci_while_before action hook
 */
do_action( 'tcci_while_before' ); 

?><div id="primary" class="full-width">
	<main id="main" role="main">
		<div class="container-message">
			<img src="<?php echo esc_url($fields['featured_image']); ?>" class="landing-image">
			<div class="image-overlay">
				<div class="text-message">
					<h1 class="landing-title"><?php

						the_title(); 
						
					?></h1>
					<div class="subtext"><?php 
							
						echo apply_filters( 'the_content', $fields['landing_subtext'] );

					?></div>
					<a href="#request">
						<img src="/wp-content/uploads/2018/06/request3.png" class="button-padding">
					</a>
				</div>
			</div>
		</div>
		<div class="orange-bar">
			<br>
			<div id="products" class="landing-content"><?php

				// TO SHOW THE PAGE CONTENTS
				while ( have_posts() ) : the_post(); 
					
					?><div class="entry-content-page"><?php 
					
						the_content(); 
						
					?></div><!-- .entry-content-page --><?php

				endwhile; //resetting the page loop

				wp_reset_query(); //resetting the page query
		
			?></div>
		</div>
		<div class="white-section-landing">
			<div class="section-landing-margin">
				<div class="row"><?php

					if( have_rows('product_1') ): 
						
						while( have_rows('product_1') ): the_row(); 

							?><div class="column2">
								<a href="<?php echo esc_attr( $fields['product_1'][0]['product_1_link'] ); ?>">
									<img src="<?php echo esc_url( $fields['product_1'][0]['featured_product_1']['url'] ); ?>" width="400" height="400"/>
								</a>
							</div>
							<div class="column2">
								<a href="<?php echo $fields['product_1'][0]['featured_product_1']; ?>">
									<h1 class="white-section-header"><?php 
									
										echo esc_html( $fields['product_1'][0]['product_1_name'] ); 
										
									?></h1>
								</a>
								<div class="description"><?php 
								
									echo apply_filters( 'the_content', $fields['product_1'][0]['product_1_description'] ); 
									
								?></div>
								<a href="<?php echo esc_url( $fields['product_1'][0]['product_1_link'] ); ?>">
									<img src="<?php echo esc_url( $fields['product_1'][0]['product_1_button'] ); ?>" class="landing-button">
								</a>
								<a href="<?php echo esc_url( $fields['product_1'][0]['product_1_second'] ); ?>">
									<img src="<?php echo esc_url( $fields['product_1'][0]['product_1_button_second'] ); ?>" class="landing-button">
								</a>
							</div><?php 
					
						endwhile;

					endif;

				?></div>
			</div>
		</div>
		<div class="orange-section-landing">
			<div class="section-landing-margin">
				<div class="row"><?php 
				
					if( have_rows('product_2') ): 
					
						while( have_rows('product_2') ): the_row();

							?><div class="column2">
								<a href="<?php echo esc_url( $fields['product_2'][0]['product_2_link'] ); ?>">
									<img src="<?php echo esc_url( $fields['product_2'][0]['featured_product_2']['url'] ); ?>" width="400" height="400"/>
								</a>
							</div>
							<div class="column2">
								<a href="<?php echo esc_url( $fields['product_2'][0]['product_2_link'] ); ?>">
									<h1 class="orange-section-header"><?php 
									
										echo esc_html( $fields['product_2'][0]['product_2_name'] ); 
										
									?></h1>
								</a>
								<div class="description"><?php 
								
									echo apply_filters( 'the_content', $fields['product_2'][0]['product_2_description'] ); 
									
								?></div>
								<a href="<?php echo esc_url( $fields['product_2'][0]['product_2_link'] ); ?>">
									<img src="<?php echo esc_url( $fields['product_2'][0]['product_2_button'] ); ?>" class="landing-button">
								</a>
								<a href="<?php echo esc_url( $fields['product_2'][0]['product_2_second'] ); ?>">
									<img src="<?php echo esc_url( $fields['product_2'][0]['product_2_button_second'] ); ?>" class="landing-button">
								</a>
							</div><?php 
						
						endwhile; 
						
					endif;
				
				?></div>
			</div>
		</div>
		<div class="white-section-landing">
			<div class="section-landing-margin">
				<div class="row"><?php 
				
					if( have_rows('product_3') ):
					
						while( have_rows('product_3') ): the_row();

							?><div class="column2">
								<a href="<?php echo esc_url( $fields['product_3'][0]['product_3_link'] ); ?>">
									<img src="<?php echo esc_url( $fields['product_3'][0]['featured_product_3']['url'] ); ?>" width="400" height="400" />
								</a>
							</div>
							<div class="column2">
								<a href="<?php echo esc_url( $fields['product_3'][0]['product_3_link'] ); ?>">
									<h1 class="white-section-header"><?php 
									
										echo esc_html( $fields['product_3'][0]['product_3_name'] ); 
									
									?></h1>
								</a>
								<div class="description"><?php 
								
									echo apply_filters( 'the_content', $fields['product_3'][0]['product_3_description'] ); 
									
								?></div>
								<a href="<?php echo esc_url( $fields['product_3'][0]['product_3_link'] ); ?>">
									<img src="<?php echo esc_url( $fields['product_3'][0]['product_3_button'] ); ?>" class="landing-button">
								</a>
								<a href="<?php echo esc_url( $fields['product_3'][0]['product_3_second'] ); ?>">
									<img src="<?php echo esc_url( $fields['product_3'][0]['product_3_button_second'] ); ?>" class="landing-button">
								</a>
							</div><?php 
					
						endwhile;
				
					endif; 
			
				?></div>
			</div>
		</div>
		<div id="request" class="orange-section-landing">
			<br>
			<div class="ending-content-style"><?php 
			
				echo apply_filters( 'the_content', $fields['ending_content'] );
				
			?></div>
			<br>
		</div>
	</main><!-- #main -->
</div><!-- #primary --><?php

get_footer();
