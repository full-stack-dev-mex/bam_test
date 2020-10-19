<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       http://example.com
 * @since      1.0.0
 *
 * @package    BAM_Ads_Test
 * @subpackage BAM_Ads_Test/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    BAM_Ads_Test
 * @subpackage BAM_Ads_Test/admin
 * @author     Your Name <email@example.com>
 */
class BAM_Ads_Test_Admin {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $bam_ads_test    The ID of this plugin.
	 */
	private $bam_ads_test;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $bam_ads_test       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $bam_ads_test, $version ) {

		$this->bam_ads_test = $bam_ads_test;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in BAM_Ads_Test_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The BAM_Ads_Test_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->bam_ads_test, plugin_dir_url( __FILE__ ) . 'css/bam-ads-test-admin.css', array(), $this->version, 'all' );

		wp_enqueue_style( $this->bam_ads_test, 'wp-color-picker', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in BAM_Ads_Test_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The BAM_Ads_Test_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->bam_ads_test, plugin_dir_url( __FILE__ ) . 'js/bam-ads-test-admin.js', array( 'jquery' ), $this->version, false );

		wp_enqueue_script(  'wp-color-picker', plugins_url('wp-color-picker-script.js', __FILE__ ), array( 'wp-color-picker' ), false, true );

	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function register_bam_ads_menu_page()
	{
		add_menu_page(
			'BAM Test Ads',
			'BAM Test Ads',
			'manage_options',
			'bam_ads',
			[$this, 'bam_ads_settings']
		);
	}

	

	public function register_bam_ad_post_type()
	{
		$labels = array(
			'name'               => _x( 'BAM Ads', 'post type general name' ),
			'singular_name'      => _x( 'BAM Ads', 'post type singular name' ),
			'add_new'            => _x( 'Add New', 'bam_ads' ),
			'add_new_item'       => __( 'Add New BAM Ads' ),
			'edit_item'          => __( 'Edit BAM Ads' ),
			'new_item'           => __( 'New BAM Ads' ),
			'all_items'          => __( 'All BAM Ads' ),
			'view_item'          => __( 'View BAM Ads' ),
			'search_items'       => __( 'Search BAM Ads' ),
			'not_found'          => __( 'No BAM Ads found' ),
			'not_found_in_trash' => __( 'No BAM Ads found in the Trash' ), 
			'menu_name'          => 'BAM Ads'
		);
		register_post_type( 'bam_test_ad', [
			'public' => true, 
			'labels' => $labels,
			'publicly_queryable' => true,  
			'show_ui' => true,   
			'show_in_menu' => true,   
			'query_var' => true,  
			'rewrite' => false,   
			'capability_type' => 'post',  
			'has_archive' => true,   
			'hierarchical' => false,  
			'supports' => array('title')
		] );
	}


	

	public function bam_ads_settings()
	{
		?>
		<div class="wrap">
			<h1>Your Plugin Name</h1>

			<form method="post" action="options.php">
				

				<?php submit_button(); ?>

			</form>
		</div>
		<?php
	}


	public function register_sport_type_type_categories() {
		$this->terms = array (
			'0' => array (
				'name'          => 'NFL',
				'slug'          => 'sport-type-nfl',
				'description'   => 'This is a Sport Type type NFL',
			),
			'1' => array (
				'name'          => 'NBA',
				'slug'          => 'sport-type-nba',
				'description'   => 'This is a Sport Type type NBA',
			),
			'2' => array (
				'name'          => 'MLB',
				'slug'          => 'sport-type-mlb',
				'description'   => 'This is a Sport Type type MLB',
			),
		);  

		foreach ( $this->terms as $term_key=>$term) {
			wp_insert_category(array(
				'cat_name' => $term['name'],
				'category_description' => $term['description'],
				'category_nicename' => $term['slug'],
				'taxonomy' => 'category'
			)
		);
		}
	}

	public function create_ad_type_taxonomy() {

		register_taxonomy(
			'ad_type',
			['bam_test_ad'],
			array(
				'labels' => array(
					'name' => 'Ad Type',
					'add_new_item' => 'Add New Ad Type',
					'new_item_name' => "New Ad Type"
				),
				"show_ui" => true,
		        "show_in_menu" => true,
		        "show_in_nav_menus" => true,
				'show_tagcloud' => false,
				'hierarchical' => true,
				'show_admin_column' => true
			)
		);
	}

	public function register_new_terms_for_ad_type_taxonomy() {
		$this->taxonomy = 'ad_type';
		$this->terms = array (
			'0' => array (
				'name'          => 'Ad type 1',
				'slug'          => 'ad-type-1',
				'description'   => 'This is a ad type one',
			),
			'1' => array (
				'name'          => 'Ad type 2',
				'slug'          => 'ad-type-2',
				'description'   => 'This is a ad type two',
			),
			'1' => array (
				'name'          => 'PICK',
				'slug'          => 'ad-type-pick',
				'description'   => 'This is a ad type pick',
			),
		);  

		foreach ( $this->terms as $term_key=>$term) {
			wp_insert_term(
				$term['name'],
				$this->taxonomy, 
				array(
					'description'   => $term['description'],
					'slug'          => $term['slug'],
				)
			);
			unset( $term ); 
		}
	}

	public function bam_add_template_meta_box() {

		add_meta_box(
			'bam_add_template',
			'Ad template',
			array($this , 'bam_add_meta_box_callback'),
			'bam_test_ad'
		);
	}

	public function bam_add_color_picker_meta_box() {

		add_meta_box( 
			'ad-background-metabox-options', 
			esc_html__('Ad Background Color', 'mytheme' ), 
			array( $this, 'ad_background_meta_box'), 
			'bam_test_ad', 
			'side', 
			'low'
		);	
	}

	public function ad_background_meta_box( $post ){
		$custom = get_post_custom( $post->ID );
		$bam_ad_background_color = (isset($custom["bam_ad_background_color"][0])) ? $custom["bam_ad_background_color"][0] : '';
		wp_nonce_field( 'ad_background_meta_box', 'ad_background_meta_box_nonce' );
		?>
		<script>
		jQuery(document).ready(function($){
			$('.color_field').each(function(){
        		$(this).wpColorPicker();
    		});
		});
		</script>
		<div class="pagebox">
			<p><?php esc_attr_e('Choosse a color for your add background.', 'mytheme' ); ?></p>
			<input class="color_field" type="hidden" name="bam_ad_background_color" value="<?php esc_attr_e($bam_ad_background_color); ?>"/>
		</div>
		<?php
	}

	function mytheme_save_background_color_meta_box( $post_id ){
		if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
			return;
		}
		if( !current_user_can( 'edit_pages' ) ) {
			return;
		}
		if ( !isset( $_POST['bam_ad_background_color'] ) || !wp_verify_nonce( $_POST['ad_background_meta_box_nonce'], 'ad_background_meta_box' ) ) {
			return;
		}
		$bam_ad_background_color = (isset($_POST["bam_ad_background_color"]) && $_POST["bam_ad_background_color"]!='') ? $_POST["bam_ad_background_color"] : '';
		update_post_meta($post_id, "bam_ad_background_color", $bam_ad_background_color);
	}

	public function bam_add_meta_box_callback( $post ) {

    	// Add a nonce field so we can check for it later.
		wp_nonce_field( 'bam_ad_template_meta_box', 'bam_ad_template_type_nonce' );

		$ad_templates = ['nba'=>'NBA template', 'nfl'=>'NFL template', 'mlb'=>'MLB template'];
		
		$bam_ad_template_type = get_post_meta($post->ID, 'bam_ad_template_type', true);
		?>
		<p>
			<label for="bam_ad_template_type">Select ad template: </label>
			<select name='bam_ad_template_type' id='bam_ad_template_type'>
				<?php foreach ($ad_templates as $ad_template_key => $ad_template_title): ?>
					<option value="<?php echo esc_attr($ad_template_key); ?>" <?php if($bam_ad_template_type == $ad_template_key) echo "selected"; ?>><?php echo esc_html($ad_template_title); ?></option>
				<?php endforeach; ?>
			</select>
		</p>
		<?php
		$title = get_the_title();

		$is_type_pick = has_term("PICK", "ad_type", $post->ID ) ?: false;
		if($is_type_pick) {
			$bam_ad_template_type = 'pick';
		}
		$bam_ad_background_color = get_post_meta($post->ID, 'bam_ad_background_color', true);

		if($bam_ad_background_color != ''){
			$bgcolor = $bam_ad_background_color;
		}


		require_once WP_PLUGIN_DIR."/bam-ads-test/public/partials/bam-ads-test-public-template-".$bam_ad_template_type.".php";
	}
 

	public function bam_ad_template_save_meta_box( $post_id ){
		if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
			return;
		}
		if( !current_user_can( 'edit_pages' ) ) {
			return;
		}
		if ( !isset( $_POST['bam_ad_template_type'] ) || !wp_verify_nonce( $_POST['bam_ad_template_type_nonce'], 'bam_ad_template_meta_box' ) ) {
			return;
		}

		$bam_ad_template_type = (isset($_POST["bam_ad_template_type"]) && $_POST["bam_ad_template_type"]!='') ? $_POST["bam_ad_template_type"] : '';

		update_post_meta($post_id, "bam_ad_template_type", $bam_ad_template_type);
	}

	public function show_shortcode_instructions_in_admin()
	{
		global $post;
		if($post->post_type != "bam_test_ad") {
			return;
		}
		echo "TO PLACE AD, COPY THIS SHORTCODE AND PASTE ANYHWERE IN YOUR POST: <br> <b>[show_bam_ad ad_slug='$post->post_name']</b> <br>
		IF YOU WANT TO OVERRIDE THE TITLE, YOU CAN ADD THE 'title' PROPERTY: <br>
		  <b>[show_bam_ad ad_slug='$post->post_name' title='My custom title']</b> ";
	}



}
