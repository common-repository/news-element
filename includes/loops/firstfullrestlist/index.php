<?php
use News_Element\Khobish_Helper;
if( $wp_query->have_posts() ) :
    $post_count = 0;while( $wp_query->have_posts() ) :
        $wp_query->the_post();$post_count++;
        if ($post_count % $break == 1){
        ?>
        <div class="bgholderwrp anim-fade">

            <div class="bgholder">
                <div class="inrbg lazyload" <?php echo Khobish_Helper::madmag_bg_images($imgf); ?>>
                <a href="<?php the_permalink();?>" class="khbhvr"></a>  
                <div class="metawrpr">
                  <div class="inrwrp">  
                      <div class="topmeta">
                        <?php Khobish_Helper::ae_build_postmeta($metaf,$excerptf);?>                                
                       </div>  
                   </div>   
                </div> 
                </div>                          
            </div>

        </div>
 
        <?php } else { ?>

        <div class="listwrpr khobish-flex-inr <?php echo Khobish_Helper::xl_post_format_icon();?>">

        <?php if ( has_post_thumbnail() ) : ?>
            <div class="ft-thumbwrap">
              <a href="<?php the_permalink();?>">
                <span class="icon khbmedia"></span>
                <?php the_post_thumbnail($imgr);?>
              </a>
              <div class="khboverlaythumb"><?php echo Khobish_Helper::khobish_single_category_bg();?></div>
              </div>
              <div class="excerptwrp">
                <div class="metawrpr">
                  <?php Khobish_Helper::ae_build_postmeta($metar,$excerptr);?>                                
                 </div> 
               </div>

            
        <?php endif; ?> 
                                    
        </div>


       <?php }

    endwhile;
    wp_reset_postdata();
  endif;
  
?> 
