<?php
$post_array =['1','4','7','10','13','16','19'];
use News_Element\Khobish_Helper;
 echo '<div class="khobish-ajax-wrap">';
    if( $wp_query->have_posts() ) :
        $post_count = 0;while( $wp_query->have_posts() ) :
            $wp_query->the_post();$post_count++;

            if (in_array($post_count, $post_array)){
              $cls = 'khbig';
              $img = $imgf;
              $meta = $metaf;
              $excerpt = $excerptf;
            } else { 
              $cls = 'khbsmall';
              $img = $imgr;
              $meta = $metar;
              $excerpt = $excerptr;
            }

            ?>
            <div class="photonegrid <?php echo $cls;?>">
                <div class="bgholder lazyload" <?php echo Khobish_Helper::madmag_bg_images($img); ?>>
                    <a href="<?php the_permalink();?>" class="khbhvr"></a>  
                    <div class="metawrpr">
                      <div class="inrwrp">  
                        <?php Khobish_Helper::ae_build_postmeta($meta,$excerpt);?>                                
                       </div>   
                    </div>                           
                </div>
            </div>
     
            <?php   
        endwhile;
        wp_reset_postdata();
    endif;
echo '</div>';    
?> 