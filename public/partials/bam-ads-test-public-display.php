<?php

/**
 * Provide a public-facing view for the plugin
 *
 * This file is used to markup the public-facing aspects of the plugin.
 *
 * @link       http://example.com
 * @since      1.0.0
 *
 * @package    BAM_Ads_Test
 * @subpackage BAM_Ads_Test/public/partials
 */
?>

<!-- This file should primarily consist of HTML with a little bit of PHP. -->


<?php

/*
Template Name: BAM Ads 1
Template Post Type: bam_test_ads
*/
 
?>

	<div id="primary" class="bam_ads-content">

			<?php

			// Start the Loop.
			while ( have_posts() ) :
				the_post();
aaa
				the_title();

			endwhile; // End the loop.
			?>

	</div><!-- #primary -->

<?php 
