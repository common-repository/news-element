<?php
use News_Element\Khobish_Helper;
  $post_array =['1','2','6','7','11','12','16','17','21','22'];
  if( $wp_query->have_posts() ) :
      $post_count = 0;while( $wp_query->have_posts() ) :
          $wp_query->the_post();$post_count++;
          if (in_array($post_count, $post_array)){
            $cls = 'khbsmgrid';
            $img = $imgf;
            $meta = $metaf;
            $excerpt = $excerptf;
          } else {
            $cls = 'khbgrid';
            $img = $imgs;
            $meta = $metas;
            $excerpt = $excerpts;
          }
          ?>
          <div class="photonegrid anim-fade <?php echo $cls;?>">
              <div class="inr">
                  <div class="bgholder lazyload" <?php echo Khobish_Helper::madmag_bg_images($img); ?>>
                      <div class="khboverlaythumb"><?php echo Khobish_Helper::khobish_single_category_bg();?></div>
                      <a href="<?php the_permalink();?>" class="khbhvr"></a>
                      <div class="metawrpr">
                          <?php Khobish_Helper::ae_build_postmeta($meta,$excerpt);?>
                      </div>
                  </div>
              </div>
          </div>

          <?php
      endwhile;
      wp_reset_postdata();
  endif;
?>