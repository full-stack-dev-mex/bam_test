<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       http://example.com
 * @since      1.0.0
 *
 * @package    BAM_Ads_Test
 * @subpackage BAM_Ads_Test/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    BAM_Ads_Test
 * @subpackage BAM_Ads_Test/public
 * @author     Your Name <email@example.com>
 */
class BAM_Ads_Test_Public {

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
	 * @param      string    $bam_ads_test       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $bam_ads_test, $version ) {

		$this->bam_ads_test = $bam_ads_test;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
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

		wp_enqueue_style( $this->bam_ads_test, plugin_dir_url( __FILE__ ) . 'css/bam-ads-test-public.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the public-facing side of the site.
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

		wp_enqueue_script( $this->bam_ads_test, plugin_dir_url( __FILE__ ) . 'js/bam-ads-test-public.js', array( 'jquery' ), $this->version, false );

	}

	public function bam_test_ads_custom_template($single) {

		global $post;

		/* Checks for single template by post type */
		if ( $post->post_type == 'bam_test_ads' ) {
			if ( file_exists( PLUGIN_PATH . '/single-bam_test_ads-template1.php' ) ) {
				return PLUGIN_PATH . '/single-bam_test_ads-template1.php';
			}
		}

		return $single;

	}

}
