<?php
use News_Element\Khobish_Helper;
  $post_array = ['1','6','7','12','13','18','19','24'];
  if( $wp_query->have_posts() ) :
      $post_count = 0;while( $wp_query->have_posts() ) :
          $wp_query->the_post();$post_count++;
          if (in_array($post_count, $post_array)){
            $cls = 'khbbggrid';
            $img = $imgf;
          } else {
            $cls = 'khbsmgrid'; 
            $img = $imgr;
          }                        
          ?>
          <div class="photonegrid anim-fade <?php echo $cls;?>">
              <div class="inr <?php echo Khobish_Helper::xl_post_format_icon();?>">
                  <div class="bgholder lazyload" <?php echo Khobish_Helper::madmag_bg_images($img); ?>>
                      <div class="khboverlaythumb"><?php echo Khobish_Helper::khobish_single_category_bg();?></div>
                      <a href="<?php the_permalink();?>" class="khbhvr"></a>  
                      <span class="khbmedia icon"></span> 
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