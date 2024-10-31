<?php
	use News_Element\Khobish_Helper;
    $metaf = Khobish_Helper::king_buildermeta_to_string($settings['meta']);
	$query_args = Khobish_Helper::hero_slide_query($settings,'query');
	$stcls = $settings['altbg'];
	$wp_query = new WP_Query($query_args);
	$excerptf = '';
?>

<div class="khbtrending4 tpoverflow <?php echo $stcls;?>">

	<?php $post_count = 0; while ($wp_query->have_posts()) : $wp_query->the_post();$post_count++;
		if ($post_count%2 == 1){
			$cls = 'knbeven';
		} else {
			$cls = 'khbodd';
		}
	?>

	<div class="khbtrendinginr <?php echo $cls;?>">
		<div class="inr">
			<?php if ( has_post_thumbnail() ) : ?>
				<div class="ft-thumbwrap">
					<a href="<?php the_permalink();?>">
					<?php echo the_post_thumbnail($settings['img_size']);?>
					</a>
				</div>
			<?php endif; ?>
			<div class="excerpt-wrap">
				<span class="khbnumber"><?php echo $post_count;?></span>
				<?php Khobish_Helper::ae_build_postmeta($metaf,$excerptf);?>
			</div>
		</div>
	</div>

	<?php endwhile; wp_reset_postdata(); ?>

</div>
		
