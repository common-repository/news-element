<?php

use News_Element\Khobish_Helper;
 echo '<div class="khobish-ajax-wrap">';
    if( $wp_query->have_posts() ) :
        while( $wp_query->have_posts() ) :
            $wp_query->the_post();?>
            
            <div class="photonegrid khbig">
                <div class="bgholder lazyload" <?php echo Khobish_Helper::madmag_bg_images($imgf); ?>>
                    <a href="<?php the_permalink();?>" class="khbhvr"></a>  
                    <div class="metawrpr">
                      <div class="inrwrp">  
                        <?php Khobish_Helper::ae_build_postmeta($metaf,$excerptf);?>                                
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