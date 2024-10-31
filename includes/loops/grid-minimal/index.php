<?php
use News_Element\Khobish_Helper;
if ( $wp_query->have_posts() ) {
	  while ( $wp_query->have_posts() ) {
		$wp_query->the_post();	
		?> 

      <div class="minimalgrid">
          
          <article class="post-item <?php echo Khobish_Helper::xl_post_format_icon();?>">

            <div class="excerpt-wrap">
              <?php Khobish_Helper::ae_build_postmeta($metaf,$excerptf);?>                        
            </div>            

          </article>                      
          
      </div>

	 <?php } wp_reset_postdata(); } else {
}