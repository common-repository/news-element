<?php
	use News_Element\Khobish_Helper;
    $metaf = Khobish_Helper::king_buildermeta_to_string($settings['meta']);
	$query_args = Khobish_Helper::hero_slide_query($settings,'query');
	$wp_query = new WP_Query($query_args);
	$excerptf = '';
?> 

<div class="khbtrending6">

<?php $post_count = 0; while ($wp_query->have_posts()) : $wp_query->the_post();
$post_count++; 
if( $post_count == '1') {?>

<div class="khb-big-block">
	<?php if ( has_post_thumbnail() ) : ?>
		<div class="ft-thumbwrap">
		<a href="<?php the_permalink();?>">
			<?php the_post_thumbnail($settings['img_size']);?>
		</a>
			<div class="khboverlaythumb"><?php echo Khobish_Helper::khobish_single_category_bg();?></div>
		</div>
	<?php endif; ?>

	<div class="excerpt-wrap">
		<span class="khbnumber"><?php echo sprintf("%02d", $post_count);?></span>
		<div class="inrexcerpt">
			<?php Khobish_Helper::ae_build_postmeta($metaf,$excerptf);?>
		</div>
	</div>
</div>
          
<?php } else { ?>

	<div class="khb-small-block">
		<div class="excerpt-wrap">
			<span class="khbnumber"><?php echo sprintf("%02d", $post_count);?></span>
			<div class="inrexcerpt">
				<?php Khobish_Helper::ae_build_postmeta($metaf,$excerptf);?>
			</div>
		</div>
	</div> 

 <?php } ?>  

<?php endwhile; wp_reset_postdata(); ?>
</div>
