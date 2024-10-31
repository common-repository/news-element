<?php
use News_Element\Khobish_Helper;
if( $wp_query->have_posts() ) :
    $post_count = 0;while( $wp_query->have_posts() ) :
    $wp_query->the_post();$post_count++;
    if ($post_count % 3 == 1){
      $cls = 'khbeven';
      $img = $imgf;
    } else {
      $cls = 'khbodd';
      $img = $imgr;
    }

    if ($post_count % 3 == 0){ 
      $clss = 'secondlst';
    } else {
      $clss = '';
    }

    ?>

        <div class="anim-fade <?php echo $cls.' '.$clss;?>">
           <div class="inr">
            <div class="inrwrp lazyload" <?php echo Khobish_Helper::madmag_bg_images($img); ?>></div>
              <article class="post-item <?php echo Khobish_Helper::xl_post_format_icon();?>">                                                     
                  <div class="excerptwrp">
                    <div class="excerpt-wrap">
                      <?php Khobish_Helper::ae_build_postmeta($metaf,$excerptf);?>                        
                    </div> 
                  </div>  

              </article>                      
            </div>
        </div>

       <?php

    endwhile;
    wp_reset_postdata();
endif;