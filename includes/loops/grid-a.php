<?php
use News_Element\Khobish_Helper;
$column = Khobish_Helper::fw_grid_col( $col_num );
// The Loop
if ( $wp_query->have_posts() ) {
	$post_count = 0;
	while ( $wp_query->have_posts() ) {
		$wp_query->the_post();	
    $post_count++;
		?>   
      <div class="<?php echo $column;?> anim-fade">
          
          <article class="post-item <?php echo Khobish_Helper::xl_post_format_icon();?>">
          <?php if ( has_post_thumbnail() ) : ?>
              <div class="ft-thumbwrap">
                <a href="<?php the_permalink();?>">
                  <span class="icon"></span>
                  <?php the_post_thumbnail($imgf);?>
                </a>
                <?php echo Khobish_Helper::khobish_single_category_bg();?>
              </div>
          <?php endif; ?>

            <div class="excerpt-wrap">
              <?php Khobish_Helper::ae_build_postmeta($metaf,$excerptf);?>                        
            </div>           

          </article>                      
          
      </div>
      <?php  if( $post_count % $col_num == 0 ){echo '<div class="clear"></div>';}?>

	 <?php } wp_reset_postdata(); } else {
	//echo 'No Loadmore';
}