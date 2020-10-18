<?php


/*
Template Name: BAM Ads 1
Template Post Type: bam_test_ads
*/

?>
<style type="text/css">
	.bam_ads-content {
		background-color: blue;
		position: relative;
		width: 100%;
		height: 100px;
		overflow: hidden;
		color: white;
	}

</style>
<div class="bam_ads-content" style="background-image: url('<?php echo plugin_dir_url( __FILE__ );  ?>../img/mlb.jpg'); background-size: contain; background-repeat: no-repeat;">
	TITLE: <?php echo $a['title'] ?>
</div><!-- #primary -->

<?php 

