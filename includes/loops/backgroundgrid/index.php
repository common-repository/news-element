<?php
use News_Element\Khobish_Helper;
  $post_array =['2','3','6','7','10','11','14','15','18','19','22','23','26','27','30','31'];
  if( $wp_query->have_posts() ) :
      $post_count = 0;while( $wp_query->have_posts() ) :
          $wp_query->the_post();$post_count++;
          if (in_array($post_count, $post_array)){
            $cls = 'khbsmgrid';
          } else {
            $cls = '';  
          }                        
          ?>
          <div class="photonegrid anim-fade <?php echo $cls;?>">
              <div class="inr">
                  <div class="bgholder lazyload" <?php echo Khobish_Helper::madmag_bg_images($imgf); ?>>
                      <div class="khboverlaythumb"><?php echo Khobish_Helper::khobish_single_category_bg();?></div>
                      <a href="<?php the_permalink();?>" class="khbhvr"></a>  
                      <div class="metawrpr">                          
                          <?php Khobish_Helper::ae_build_postmeta($metaf,$excerptf);?>  
                      </div>                           
                  </div>
              </div>
          </div>
   
          <?php   
      endwhile;
      wp_reset_postdata();
  endif;
?>  