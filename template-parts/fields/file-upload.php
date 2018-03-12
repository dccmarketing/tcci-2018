<?php

/**
 * Provides the markup for an upload field
 *
 * @package    TCCi
 */
$defaults['class'] 			= 'widefat';
$defaults['data']['id'] 	= 'url-file';
$defaults['description'] 	= __( '', 'tcci' );
$defaults['id'] 			= '';
$defaults['label'] 			= __( '', 'tcci' );
$defaults['label-remove'] 	= __( 'Remove file', 'tcci' );
$defaults['label-upload'] 	= __( 'Choose/Upload file', 'tcci' );
$defaults['name'] 			= '';
$defaults['placeholder'] 	= __( '', 'tcci' );
$defaults['value'] 			= '';
$atts 						= wp_parse_args( $atts, $defaults );
$remove_class 				= ( empty( $atts['value'] ) ? 'hide' : '' );
$upload_class 				= ( empty( $atts['value'] ) ? '' : 'hide' );

?><div class="file-upload-field">

	<label for="<?php echo esc_attr( $atts['id'] ); ?>"><?php echo wp_kses( $atts['label'], array( 'code' => array() ) ); ?>: </label>
	<input
		class="<?php echo esc_attr( $atts['class'] ); ?>"<?php

		if ( ! empty( $atts['data'] ) ) {

			foreach ( $atts['data'] as $key => $value ) {

				?>data-<?php echo $key; ?>="<?php echo esc_attr( $value ); ?>"<?php

			}

		}

		?>id="<?php echo esc_attr( $atts['id'] ); ?>"
		name="<?php echo esc_attr( $atts['name'] ); ?>"
		placeholder="<?php echo esc_attr( $atts['placeholder'] ); ?>"
		type="url"
		value="<?php echo esc_url( $atts['value'] ); ?>" />
	<a href="#" class="<?php echo esc_attr( $upload_class ); ?>" id="upload-file"><?php
		echo wp_kses( $atts['label-upload'], array( 'code' => array() ) );
	?></a>
	<a href="#" class="<?php echo esc_attr( $remove_class ); ?>" id="remove-file"><?php
		echo wp_kses( $atts['label-remove'], array( 'code' => array() ) );
	?></a>
</div><!-- .file-upload-field -->
<p class="description"><?php echo wp_kses( $atts['description'], array( 'code' => array() ) ); ?></p>
