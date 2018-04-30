<?php
/**
 * The metaboxes for post formats.
 *
 * @link 		http://slushman.com
 * @since 		1.0.0
 *
 * @package 	TCCi
 */
class TCCI_Metabox_Post_Format {

	/**
	 * The capabilities required for saving these metaboxes.
	 *
	 * @since 		1.0.0
	 * @access 		protected
	 * @var 		string 			$caps 			The capability.
	 */
	protected $caps = 'edit_post';

	/**
	 * Array of fields used in these metaboxes.
	 *
	 * @since 		1.0.0
	 * @access 		protected
	 * @var 		array
	 */
	protected $fields = array();

	/**
	 * The post meta data
	 *
	 * @since 		1.0.0
	 * @access 		protected
	 * @var 		string 			$meta    			The post meta data.
	 */
	protected $meta = array();

	/**
	 * The nonces for all the metaboxes.
	 *
	 * @since 		1.0.0
	 * @access 		protected
	 * @var 		string 			$nonce 			The nonce.
	 */
	protected $nonce = '';

	/**
	 * The post type(s) for this set of metaboxes.
	 *
	 * @since 		1.0.0
	 * @access 		protected
	 * @var 		string|array 			$post_type 			This post type(s).
	 */
	protected $post_type = 'post';

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since 		1.0.0
	 */
	public function __construct() {

		$this->post_type 	= 'post';
		$this->nonce 		= 'nonce_tcci_post_format';

		$this->fields[] 	= array( 'post-audio', 'url', '' );
		$this->fields[] 	= array( 'post-image', 'url', '' );
		$this->fields[] 	= array( 'post-link', 'url', '' );
		$this->fields[] 	= array( 'post-video', 'url', '' );

	} // __construct()

	/**
	 * Registers all the WordPress hooks and filters for this class.
	 */
	public function hooks() {

		add_action( 'add_meta_boxes', 			array( $this, 'add_metaboxes' ), 10, 2 );
		add_action( 'add_meta_boxes', 			array( $this, 'set_meta' ), 10, 2 );
		add_action( 'save_post', 				array( $this, 'validate_meta' ), 10, 2 );
		add_action( 'edit_form_after_title', 	array( $this, 'promote_metaboxes' ), 10, 1 );

	} // hooks()

	/**
	 * Registers metaboxes with WordPress
	 *
	 * @hooked 		add_meta_boxes
	 * @since 		1.0.0
	 * @access 		public
	 * @param 		string 			$post_type		The post type.
	 * @param 		object 			$post_obj 			The post object.
	 */
	public function add_metaboxes( $post_type, $post_obj ) {

		if ( $post_type !== $this->post_type ) { return; }

		add_meta_box(
			'post_format_data',
			apply_filters( PARENT_THEME_SLUG . '-post-format-data-title', esc_html__( 'Post Format Data', 'tcci' ) ),
			array( $this, 'metabox' ),
			$this->post_type,
			'top',
			'default',
			array(
				'file' => 'post-format-data'
			)
		);

	} // add_metaboxes()

	/**
	 * Returns TRUE if the post type is correct.
	 *
	 * @exits 		If not the correct post type.
	 * @exits 		If $check is empty / no post type to check was passed.
	 * @param 		string 		$check 		The post type to check for.
	 * @return 		bool 					TRUE if the post type is correct, otherwise FALSE.
	 */
	private function check_post_type( $check ) {

		if ( empty( $this->post_type ) ) { return FALSE; }
		if ( empty( $check) ) { return FALSE; }

		if ( is_array( $this->post_type ) ) {

			return in_array( $this->post_type, $check );

		}

		return $this->post_type == $check;

	} // check_post_type()

	/**
	 * Calls a metabox file specified in the add_meta_box args.
	 *
	 * @exits 		Not in the admin.
	 * @exits 		Not on the correct post type.
	 * @since 		1.0.0
	 * @access 		public
	 */
	public function metabox( $post_obj, $params ) {

		if ( ! is_admin() ) { return FALSE; }
		if ( ! $this->check_post_type( $post_obj->post_type ) ) { return FALSE; }

		include( get_stylesheet_directory() . '/template-parts/metaboxes/' . $params['args']['file'] . '.php' );

	} // metabox()

	/**
	 * Checks conditions before validating metabox submissions.
	 *
	 * Returns FALSE under these conditions:
	 * 		Doing autosave.
	 * 		User doesn't have the capabilities.
	 * 		Not on the correct post type.
	 * 		Nonce isn't set.
	 * 		Nonce does't validate.
	 *
	 * @param 		object 		$posted 		The submitted data.
	 * @param 		int 		$post_id 		The post ID.
	 * @param 		object 		$post_obj 			The post object.
	 * @return 		bool 						FALSE if any conditions are met, otherwise TRUE.
	 */
	private function pre_validation_checks( $posted, $post_id, $post_obj ) {

		if ( wp_is_post_autosave( $post_id ) ) { return FALSE; }
		if ( wp_is_post_revision( $post_id ) ) { return FALSE; }
		if ( ! current_user_can( $this->caps, $post_id ) ) { return FALSE; }
		if ( ! $this->check_post_type( $post_obj->post_type ) ) { return FALSE; }
		if ( ! isset( $posted[$this->nonce] ) ) { return FALSE; }
		if ( isset( $posted[$this->nonce] ) && ! wp_verify_nonce( $posted[$this->nonce], PARENT_THEME_SLUG ) ) { return FALSE; }

		return TRUE;

	} // pre_validation_checks()

	/**
	 * Adds all metaboxes in the "top" priority to just under the title field.
	 *
	 * @exits 		If not on the correct post type.
	 * @hooked 		edit_form_after_title
	 * @param `		object 		$post_obj 		The post object.`
	 */
	public function promote_metaboxes( $post_obj ) {

		if ( ! $this->check_post_type( $post_obj->post_type ) ) { return FALSE; }

		global $wp_meta_boxes;

		do_meta_boxes( get_current_screen(), 'top', $post_obj );

		unset( $wp_meta_boxes[$this->post_type]['top'] );

	} // promote_metaboxes()

	/**
	 * Saves the metadata to the database.
	 *
	 * @exits 		If $meta is empty.
	 * @exits 		If $posted is empty.
	 * @param 		array 		$meta 			The field info.
	 * @param 		array 		$posted 		Data posted by the form.
	 * @param 		int 		$post_id		The post ID.
	 * @return 		bool 						The result from update_post_meta().
	 */
	private function save_meta( $meta, $posted, $post_id ) {

		if ( empty( $meta ) ) { return FALSE; }
		if ( empty( $posted ) ) { return FALSE; }

		$value 		= ( empty( $this->meta[$meta[0]][0] ) ? '' : $this->meta[$meta[0]][0] );
		$sanitizer 	= new TCCI_Sanitize();
		$new_value 	= $sanitizer->clean( $posted[$meta[0]], $meta[1] );
		$updated 	= update_post_meta( $post_id, $meta[0], $new_value );

		return $updated;

	} // save_meta()

	/**
	 * Sets the class variable $options
	 *
	 * @exits 		Post is empty.
	 * @exits 		Not on the correct post type.
	 * @hooked 		add_meta_boxes
	 * @param 		string 			$post_type		The post type.
	 * @param 		object 			$post_obj 			The post object.
	 */
	public function set_meta( $post_type, $post_obj ) {

		if ( empty( $post_obj ) ) { return FALSE; }
		if ( ! $this->check_post_type( $post_type ) ) { return FALSE; }

		$this->meta = get_post_custom( $post_obj->ID );

	} // set_meta()

	/**
	 * Saves metabox data
	 *
	 * @hooked 		save_post 		10
	 * @since 		1.0.0
	 * @access 		public
	 * @param 		int 			$post_id 		The post ID
	 * @param 		object 			$post_obj 			The post object
	 */
	public function validate_meta( $post_id, $post_obj ) {

		$validate = $this->pre_validation_checks( $_POST, $post_id, $post_obj );

		if ( ! $validate ) { return $post_id; }

		foreach ( $this->fields as $meta ) {

			$this->save_meta( $meta, $_POST, $post_id );

		} // foreach

	} // validate_meta()

} // class
