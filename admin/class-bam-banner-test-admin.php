<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       http://example.com
 * @since      1.0.0
 *
 * @package    BAM_Banner_Test
 * @subpackage BAM_Banner_Test/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    BAM_Banner_Test
 * @subpackage BAM_Banner_Test/admin
 * @author     Your Name <email@example.com>
 */
class BAM_Banner_Test_Admin {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $bam_banner_test    The ID of this plugin.
	 */
	private $bam_banner_test;

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
	 * @param      string    $bam_banner_test       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $bam_banner_test, $version ) {

		$this->bam_banner_test = $bam_banner_test;
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
		 * defined in BAM_Banner_Test_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The BAM_Banner_Test_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->bam_banner_test, plugin_dir_url( __FILE__ ) . 'css/bam-banner-test-admin.css', array(), $this->version, 'all' );

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
		 * defined in BAM_Banner_Test_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The BAM_Banner_Test_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->bam_banner_test, plugin_dir_url( __FILE__ ) . 'js/bam-banner-test-admin.js', array( 'jquery' ), $this->version, false );

	}

}
