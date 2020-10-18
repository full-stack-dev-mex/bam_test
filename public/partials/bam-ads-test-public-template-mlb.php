
<style type="text/css">
	.bam_ads-content { 
		position: relative;
		width: 100%;
		height: 100px;
		overflow: hidden;
		<?php if(isset($bgcolor)) echo "background-color: $bgcolor;"; ?>
		color: LightGray;

	}

</style>
<div class="bam_ads-content" style="background-image: url('<?php echo plugin_dir_url( __FILE__ );  ?>../img/mlb.jpg'); background-size: contain; background-repeat: no-repeat;">
	<h3 style="margin-left: 35%;" ><?php echo $a['title'] ?></h3>
</div><!-- #primary -->

<?php 

