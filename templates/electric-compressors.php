<?php
/**
 * Template Name: Electric Compressors Landing Page
 *
 * Description: Landing page template created for Electric Compressors campaign
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
		<div class="white-section-landing">
			<div class="landing-margin">
				<div class="row">
					<div class="column">
						<p class="top-line">More Efficient.</p>
						<p class="second-line">Less Energy.</p> 
						<p class="orange-line">Introducing T/CCI Electric Scroll Compressors.</p>
						<p class="last-line">18cc and 24cc Models Available In a Range of Voltage.</p>
					</div>
					<div class="column">
						<p class="samples">Samples are now available for testing.
							<br>Request a sample.
						</p><?php 
						
						echo FrmFormsController::get_form_shortcode( array( 'id' => 38, 'title' => false, 'description' => false ) ); 
							
					?></div>
				</div>
			</div>
		</div>
		<div class="landing-margin2"><?php 

			if( $fields['compressors_gallery'] ): 
			
				?><ul><?php 
				
					foreach( $images as $image ): 
					
						?><li><?php 
						
							echo wp_get_attachment_image( $image['ID'], 'medium' ); 
							
						?></li><?php 
						
					endforeach; 
					
				?></ul><?php 
				
			endif; 
			
			?><h1 class="compressor-title"><?php 
			
				the_title(); 
				
			?></h1><?php
			
			while ( have_posts() ) : the_post();

				?><div class="entry-content-page"><?php 
				
					the_content(); 
					
				?></div><!-- .entry-content-page --><?php

			endwhile; //resetting the page loop

			wp_reset_query(); //resetting the page query

		?></div>
		<div class="orange-section-landing">
			<div class="r-button-marg">
				<a href="mailto:sales@tccimfg.com">
					<img src="/wp-content/uploads/2018/05/requestbutton.png" class="r-button-padding">
				</a>
			</div>
		</div>
	</main><!-- #main -->
</div><!-- #primary --><?php

get_footer();
