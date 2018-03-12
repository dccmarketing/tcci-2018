<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package TCCI
 */

		?></div><!-- #content -->
		<footer class="site-footer" id="colophon" role="contentinfo">
			<div class="wrap wrap-footer"><?php

			$description = get_bloginfo( 'description', 'display' );

			if ( $description || is_customize_preview() ) :

				?><p class="site-description"><?php echo $description; /* WPCS: xss ok. */ ?></p><?php

			endif;

				?><div class="site-info">
					<ul>
						<li class="copyright">
							&copy <?php echo date( 'Y' ); ?> <a href="<?php echo esc_url( get_admin_url() ); ?>"><?php echo get_bloginfo( 'name' ); ?></a>
						</li>
						<li>
							<a href="tel:12174220055">+1 217.422.0055 tel</a>
						</li>
						<li>+1 217.422.4323 fax</li>
						<li class="credits"><?php

							printf( esc_html__( 'Site created by %1$s', 'tcci' ), '<a href="https://www.demanddcc.com/" rel="nofollow" target="_blank">DCC</a>' );

						?></li>
					</ul>
				</div><!-- .site-info -->
			</div><!-- wrap-footer -->
		</footer><!-- #colophon --><?php

		wp_footer();

		/*?><script data-subdomain="tccimfg" data-name="pushowl" src="https://cdn.pushowl.com/static/cdn/widget.js"></script><?php */

	?></body>
</html>
