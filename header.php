<?php

/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package TCCI
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
	<head>
		<meta charset="<?php bloginfo( 'charset' ); ?>">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="profile" href="http://gmpg.org/xfn/11">
		<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>"><?php

		wp_head();

		?><script>
			(function(h,o,t,j,a,r){
				h.hj=h.hj||function(){(h.hj.q=h.hj.q||[]).push(arguments)};
				h._hjSettings={hjid:704933,hjsv:6};
				a=o.getElementsByTagName('head')[0];
				r=o.createElement('script');r.async=1;
				r.src=t+h._hjSettings.hjid+j+h._hjSettings.hjsv;
				a.appendChild(r);
			})(window,document,'https://static.hotjar.com/c/hotjar-','.js?sv=');
		</script><!-- Hotjar Tracking Code for http://www.tccimfg.com/ --><!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-TBBMVD');</script>
<!-- End Google Tag Manager -->
	</head>
	<body <?php body_class(); ?>><!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-TBBMVD"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) --><a class="skip-link screen-reader-text" href="#main"><?php esc_html_e( 'Skip to content', 'tcci' ); ?></a>
		<header class="site-header" role="banner"><?php

			$logo = get_custom_logo();

			if ( ! empty( $logo ) ) :

				if ( is_front_page() && is_home() ) :

					?><h1 class="site-title"><?php echo $logo; ?></h1><?php

				else :

					?><span class="site-title"><?php echo $logo; ?></span><?php

				endif;

			endif;

			?><nav id="site-navigation" class="main-navigation" role="navigation">
				<button aria-controls="primary-menu" aria-expanded="false" class="menu-primary-toggle menu-toggle" id="primary-toggle">
					<span class="btn-text"><?php esc_html_e( 'Menu', 'tcci' ); ?></span>
				</button><?php

				$primary_menu_args['container'] 		= FALSE;
				$primary_menu_args['container_class'] 	= 'menu-primary-wrap';
				$primary_menu_args['items_wrap'] 		= '<ul id="%1$s" class="%2$s"><button class="close-tablet-menu-btn"><span class="close-btn-text">Close Menu</span></button>%3$s</ul>';
				$primary_menu_args['menu_class']      	= 'primary-menu-items primary-menu-items-0';
				$primary_menu_args['menu_id'] 			= 'primary-menu';
				$primary_menu_args['theme_location'] 	= 'primary';

				wp_nav_menu( $primary_menu_args );

			?></nav><!-- #site-navigation --><?php

			if ( has_nav_menu( 'social' ) ) {

				$social_menu_args['theme_location']		= 'social';
				$social_menu_args['container'] 			= 'div';
				$social_menu_args['container_id']    	= 'menu-social-media';
				$social_menu_args['container_class'] 	= 'menu nav-social';
				$social_menu_args['menu_id']         	= 'menu-social-media-items';
				$social_menu_args['menu_class']      	= 'menu-items';
				$social_menu_args['depth']           	= 1;
				$social_menu_args['fallback_cb']     	= '';

				wp_nav_menu( $social_menu_args );

			}

		?></header>
		<div id="content" class="site-content"><?php

			if ( is_tax( 'product_market' ) ) :

				?><div class="market-img"></div><?php

			endif;
