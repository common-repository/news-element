<?php
use News_Element\Khobish_Helper;
if ( $wp_query->have_posts() ) {
	  while ( $wp_query->have_posts() ) {
		$wp_query->the_post();	
		?> 

    <div class="khbrelatedpost <?php echo Khobish_Helper::xl_post_format_icon();?> anim-fade">
 
          <div class="thumbwrp">
            <?php if ( has_post_thumbnail() ) : ?>
                <div class="ft-thumbwrap">
                  <a href="<?php the_permalink();?>">
                    <span class="icon"></span>
                    <?php the_post_thumbnail($imgf);?>
                  </a>
                  <?php echo Khobish_Helper::khobish_single_category_bg();?>
                </div>
            <?php endif; ?>
          </div>                     
          
          <div class="excerptwrp">
            <div class="excerpt-wrap">
              <?php Khobish_Helper::ae_build_postmeta($metaf,$excerptf);?>                        
            </div> 
          </div> 

    </div>

	 <?php } wp_reset_postdata(); } else {
}