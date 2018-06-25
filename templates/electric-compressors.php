<?php
/**
 * Template Name: Electric Compressors Landing Page
 *
 * Description: Landing page template created for Electric Compressors campaign
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
		<section class="landing-section landing-section-white landing-section-white-gray-text">
			<div class="landing-margin">
				<div class="row">
					<div class="column">
						<p class="top-line">More Efficient.</p>
						<p class="second-line">Less Energy.</p> 
						<p class="orange-line">Introducing T/CCI Electric Scroll Compressors.</p>
						<p class="last-line">18cc and 24cc Models Available In a Range of Voltage.</p>
					</div>
					<div class="column">
						<p class="samples">Samples are now available for testing. <br>Request a sample.</p><?php 
						
						echo FrmFormsController::get_form_shortcode( array( 'id' => $fields['form'], 'title' => false, 'description' => false ) ); 
							
					?></div>
				</div>
			</div>
		</section>
		<section class="landing-section landing-margin2">
			<h1 class="compressor-title"><?php 
			
				the_title(); 
				
			?></h1><?php
			
			while ( have_posts() ) : the_post();

				?><div class="entry-content-page content-electric-landing"><?php 
				
					the_content(); 
					
				?></div><!-- .entry-content-page --><?php

			endwhile; //resetting the page loop

			wp_reset_query(); //resetting the page query

		?></section>
		<section class="landing-section landing-section-orange">
			<a class="btn btn-white marg-center" href="mailto:sales@tccimfg.com">Request a Sample</a>
		</section>
	</main><!-- #main -->
</div><!-- #primary --><?php

get_footer();
