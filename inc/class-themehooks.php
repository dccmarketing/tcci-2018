<?php

/**
 * A class of methods using hooks in the theme.
 *
 * @package TCCI
 * @author Slushman <chris@slushman.com>
 */
class TCCI_Themehooks {

	/**
	 * Constructor
	 */
	public function __construct() {}

	/**
	 * Registers all the WordPress hooks and filters for this class.
	 */
	public function hooks() {

		add_action( 'tcci_while_before', 		array( $this, 'breadcrumbs' ), 10 );
		add_action( 'tcci_while_before', 		array( $this, 'title_single_post' ) );

		add_action( 'tcci_entry_content_after', array( $this, 'equal_features' ), 10 );
		add_action( 'tcci_entry_content_after', array( $this, 'four_features' ), 20 );

		add_action( 'entry_header_content', 	array( $this, 'posted_on' ), 10 );
		add_action( 'entry_header_content', 	array( $this, 'title_entry' ), 20 );
		add_action( 'entry_header_content', 	array( $this, 'title_page' ), 10 );
		add_action( 'entry_header_content', 	array( $this, 'title_link_post' ), 10 );

	} // hooks()

	/**
	 * Returns the appropriate breadcrumbs.
	 *
	 * @exits 		If on the front page.
	 * @hooked		tcci_while_before
	 * @return 		mixed 				WooCommerce breadcrumbs, then Yoast breadcrumbs
	 */
	public function breadcrumbs() {

		if ( is_front_page() ) { return; }

		?><div class="breadcrumbs">
			<div class="wrap-crumbs"><?php

				if ( function_exists( 'woocommerce_breadcrumb' ) ) {

					$args['after'] 			= '</span>';
					$args['before'] 		= '<span rel="v:child" typeof="v:Breadcrumb">';
					$args['delimiter'] 		= '&nbsp;>&nbsp;';
					$args['home'] 			= esc_html_x( 'Home', 'breadcrumb', 'tcci' );
					$args['wrap_after'] 	= '</span></span></nav>';
					$args['wrap_before'] 	= '<nav class="woocommerce-breadcrumb" ' . ( is_single() ? 'itemprop="breadcrumb"' : '' ) . '><span xmlns:v="http://rdf.data-vocabulary.org/#"><span typeof="v:Breadcrumb">';

					woocommerce_breadcrumb( $args );

				} elseif ( function_exists( 'yoast_breadcrumb' ) ) {

					yoast_breadcrumb();

				}

			?></div><!-- .wrap-crumbs -->
		</div><!-- .breadcrumbs --><?php

	} // breadcrumbs()

	/**
	 * Displays four feature boxes.
	 *
	 * @exits 		If this isn't the page_landing1.php page template.
	 * @exits 		If $fields['features'] is empty.
	 * @hooked 		tcci_entry_content_after
	 */
	public function equal_features() {

		$template = basename( get_page_template() );

		if ( 'page_landing.php' !== $template ) { return; }

		$fields = get_fields( get_the_ID() );

		if ( empty( $fields['equal-features'] ) ) { return; }

		?><ul class="features equal-features"><?php

		foreach ( $fields['equal-features'] as $feature ) :

			?><li><?php

			set_query_var( 'feature', $feature );
			get_template_part( 'template-parts/feature', 'equal' );

			?></li><?php

		endforeach;

		?></ul><?php

	} // equal_features()

	/**
	 * Displays four feature boxes.
	 *
	 * @exits 		If this isn't the page_landing1.php page template.
	 * @exits 		If $fields['features'] is empty.
	 * @hooked 		tcci_entry_content_after
	 */
	public function four_features() {

		$template = basename( get_page_template() );

		if ( 'page_landing.php' !== $template ) { return; }

		$fields = get_fields( get_the_ID() );

		if ( empty( $fields['features'] ) ) { return; }

		?><ul class="features four-features"><?php

		foreach ( $fields['features'] as $feature ) :

			?><li><?php

			set_query_var( 'feature', $feature );
			get_template_part( 'template-parts/feature', $feature['type'] );

			?></li><?php

		endforeach;

		?></ul><?php

	} // four_features()

	/**
	 * Adds the posted_on post meta.
	 *
	 * @exits 		If not the 'post' post type.
	 * @exits 		If this is a single post.
	 * @exits 		If post has a format.
	 * @hooked 		entry_header_content
	 * @return 		mixed 			The posted_on post meta.
	 */
	public function posted_on() {

		if ( 'post' != get_post_type() ) { return; }
		if ( is_single() ) { return; }
		if ( has_post_format() ) { return; }
		if ( is_woocommerce() ) { return; }

		?><div class="entry-meta"><?php

			tcci_posted_on();

		?></div><!-- .entry-meta --><?php

	} // posted_on()

	public function sae_ad() {

		$template = basename( get_page_template() );

		if ( 'page_sae-landing.php' !== $template ) { return; }

		$fields = get_fields( get_the_ID() );

		if ( empty( $fields['wind_image'] ) && empty( $fields['cnc_image'] ) ) { return; }

		?><div class="sae-ad-imgs">
			<a class="track" href="<?php echo esc_url( $fields['wind_page'] ); ?>">
				<img src="<?php echo esc_url( $fields['wind_image'] ); ?>" />
				<p><?php echo esc_html( $fields['wind_text'] ); ?></p>
			</a>
			<a class="track" href="<?php echo esc_url( $fields['cnc_page'] ); ?>">
				<img src="<?php echo esc_url( $fields['cnc_image'] ); ?>" />
				<p><?php echo esc_html( $fields['cnc_text'] ); ?></p>
			</a>
		</div><?php

	} // sae_ad()

	/**
	 * Returns the entry title
	 *
	 * @exits 		If on the front page.
	 * @exits 		If this is a page.
	 * @exits 		If has the link post format.
	 * @hooked 		entry_header_content 			10
	 * @return 		mixed 							The entry title
	 */
	public function title_entry() {

		if ( is_front_page() ) { return; }
		if ( is_page() ) { return; }
		if ( has_post_format( 'link' ) ) { return; }
		if ( is_woocommerce() ) { return; }

		if ( is_single() ) {

			the_title( '<h1 class="entry-title">', '</h1>' );

		} else {

			the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' );

		}

	} // title_entry()

	/**
	 * Displays the post title for the link post format.
	 *
	 * @exits 		If on the front page.
	 * @exits 		If not on an archive page.
	 * @exits 		If not the link post format.
	 * @exits 		If the link is empty.
	 * @hooked 		entry_header_content
	 * @return 		mixed 							The entry title
	 */
	public function title_link_post() {

		if ( is_front_page() ) { return; }
		if ( ! is_archive() ) { return; }
		if ( ! has_post_format( 'link' ) ) { return; }

		$meta = get_post_custom( get_the_ID() );
		$link = $meta['post-link'][0];

		if ( empty( $link ) ) { return; }

		?><div class="dashwrap">
			<span class="dashicons dashicons-admin-links"></span>
		</div>
		<h2 class="entry-title link-post">
			<a href="<?php echo esc_url( $link ); ?>" target="_blank"><?php the_title(); ?></a>
		</h2><?php

	} // title_link_post()

	/**
	 * Returns the page title
	 *
	 * @exits 		If on the front page.
	 * @exits 		If on the blog page;
	 * @exits 		If this is not a page.
	 * @hooked 		tcci_while_before 		10
	 * @return 		mixed 							The entry title
	 */
	public function title_page() {

		if ( is_front_page() || is_home() ) { return; }
		if ( ! is_page() ) { return; }
		if ( is_woocommerce() ) { return; }

		the_title( '<h1 class="page-title">', '</h1>' );

	} // title_page()

	/**
	 * Adds the single post title to the index
	 *
	 * @exits 		If this is no the home page.
	 * @exits 		If this is the front page.
	 * @hooked 		tcci_while_before
	 * @return 		mixed 							The single post title
	 */
	public function title_single_post() {

		if ( ! is_home() || is_front_page() ) { return; }

		?><header class="page-header">
			<h1 class="page-title"><?php single_post_title(); ?></h1>
		</header><?php

	} // title_single_post()

} // class
