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

	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function register_bam_ads_menu_page()
	{
		// add_menu_page(
		// 	'BAM Test Ads',
		// 	'BAM Test Ads',
		// 	'manage_options',
		// 	'bam_ads',
		// 	[$this, 'bam_ads_settings']
		// );
	}

	

	public function register_bam_ads_post_type()
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
		register_post_type( 'bam_test_ads', [
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
			'supports' => array('title', 'thumbnail')
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

	public function create_sport_type_taxonomy() {

		register_taxonomy(
			'sport_type',
			['posts', 'page'],
			array(
				'labels' => array(
					'name' => 'Sport Type',
					'add_new_item' => 'Add New Sport Type',
					'new_item_name' => "New Sport Type"
				),
				'show_ui' => true,
				'show_tagcloud' => false,
				'hierarchical' => true
			)
		);
	}

	public function create_ads_type_taxonomy() {

		register_taxonomy(
			'ads_type',
			['bam_test_ads'],
			array(
				'labels' => array(
					'name' => 'BAM Ads Type',
					'add_new_item' => 'Add New BAM Ads Type',
					'new_item_name' => "New BAM Ads Type"
				),
				'show_ui' => true,
				'show_tagcloud' => false,
				'hierarchical' => true
			)
		);
	}

}
