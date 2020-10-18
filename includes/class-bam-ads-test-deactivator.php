<?php

/**
 * Fired during plugin deactivation
 *
 * @link       http://example.com
 * @since      1.0.0
 *
 * @package    BAM_Ads_Test
 * @subpackage BAM_Ads_Test/includes
 */

/**
 * Fired during plugin deactivation.
 *
 * This class defines all code necessary to run during the plugin's deactivation.
 *
 * @since      1.0.0
 * @package    BAM_Ads_Test
 * @subpackage BAM_Ads_Test/includes
 * @author     Your Name <email@example.com>
 */
class BAM_Ads_Test_Deactivator {

	/**
	 * Short Description. (use period)
	 *
	 * Long Description.
	 *
	 * @since    1.0.0
	 */
	public static function deactivate() {
		flush_rewrite_rules( true );
	}

}
