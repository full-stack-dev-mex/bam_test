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

	public function insert_bam_ad_shortcode($atts)
	{
		$a = shortcode_atts( array(
			'title' => '',
			'ad_slug' => ''
		), $atts );

		if($a['ad_slug'] == '') {
			return 'you need to specify an ad_slug for your ad shortcode';
		}

		// SET Template 
		$bam_test_ad = get_page_by_path( $a['ad_slug'], OBJECT, 'bam_test_ad' );
		$bam_ad_template_type = get_post_meta($bam_test_ad->ID, 'bam_ad_template_type', true);

		// SET Title
		$title = ($a['title'] != '') ? $a['title'] : $bam_test_ad->post_title;

		// CHECK categories to SET color
		$post_categories = get_the_category();
		if(in_category('MLB')) $bgcolor = 'blue';
		if(in_category('NBA')) $bgcolor = 'orange';
		if(in_category('NFL')) $bgcolor = 'black';

		//CHECK Type
		$is_type_pick = has_term("PICK", "ad_type", $bam_test_ad->ID ) ?: false;
		if($is_type_pick) {
			$bam_ad_template_type = 'pick';
			unset($bgcolor);
		}
		$bam_ad_background_color = get_post_meta($bam_test_ad->ID, 'bam_ad_background_color', true);

		if($bam_ad_background_color != ''){
			$bgcolor = $bam_ad_background_color;
		}

		ob_start();

		require_once "partials/bam-ads-test-public-template-".$bam_ad_template_type.".php";

		$out = ob_get_contents();

		ob_end_clean();

		return $out;
		
	}



}
