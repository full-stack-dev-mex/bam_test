<?php

/*
Template Name: MLB
Template Post Type: bam_test_ads
*/
 
?>

	<div id="primary" class="bam_ads-content" style="background-image: ">

			<?php

			// Start the Loop.
			while ( have_posts() ) :
				the_post();

				the_title();

			endwhile; // End the loop.
			?>

	</div><!-- #primary -->

<?php 
