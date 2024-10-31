<?php
use News_Element\Khobish_Helper;
?>

<div class="post-grid-wrpr">
    <div class="firstblock comgrid">
        <?php
            if( $wp_query->have_posts() ) :
                while( $wp_query->have_posts() ) :
                    $wp_query->the_post();
                    if( $i == 0 ) :
                    ?>
                    <div class="fw-col-md-8 smtitle <?php echo Khobish_Helper::xl_post_format_icon();?>">

                      <div class="inr anim-fade">
                          <div class="bgholder lazyload" <?php echo Khobish_Helper::madmag_bg_images($imgf); ?>>
                              <div class="khboverlaythumb"><?php echo Khobish_Helper::khobish_single_category_bg();?></div>
                              <a href="<?php the_permalink();?>" class="khbhvr"></a> 
                              <span class="icon khbmedia"></span> 
                              <div class="metawrpr">                          
                                  <?php Khobish_Helper::ae_build_postmeta($metaf,$excerptf);?>  
                              </div>                           
                          </div>
                      </div>
                    </div>

                    <?php   
                    endif;
                    $i = (int)$i + (int)1;
                endwhile;
                $i = (int)1;
                wp_reset_postdata();
            endif;
        ?>

        <?php
            if( $wp_query->have_posts() ) :
                while( $wp_query->have_posts() ) :
                    $wp_query->the_post();
                    if( $i == 2 ) :
                    ?>
                    <div class="fw-col-md-4 smtitle <?php echo Khobish_Helper::xl_post_format_icon();?>">

                      <div class="inr anim-fade">
                          <div class="bgholder lazyload" <?php echo Khobish_Helper::madmag_bg_images($imgt); ?>>
                              <div class="khboverlaythumb"><?php echo Khobish_Helper::khobish_single_category_bg();?></div>
                              <a href="<?php the_permalink();?>" class="khbhvr"></a>  
                              <span class="icon khbmedia"></span>
                              <div class="metawrpr">                          
                                  <?php Khobish_Helper::ae_build_postmeta($metat,$excerptt);?>  
                              </div>                           
                          </div>
                      </div>
                    </div>

                    <?php   
                    endif;
                    $i = (int)$i + (int)1;
                endwhile;
                $i = (int)1;
                wp_reset_postdata();
            endif;
        ?>

    </div>
        
    <div class="secondblock comgrid">
      <div class="fw-col-md-4">
        <?php
            if( $wp_query->have_posts() ) :
                while( $wp_query->have_posts() ) :
                    $wp_query->the_post(); 
                    if( $i == 3 || $i == 4 ) : 

                    ?> 
                      <div class="inr anim-fade smtitle <?php echo Khobish_Helper::xl_post_format_icon();?>">
                          <div class="bgholder lazyload" <?php echo Khobish_Helper::madmag_bg_images($imgt); ?>>
                              <div class="khboverlaythumb"><?php echo Khobish_Helper::khobish_single_category_bg();?></div>
                              <a href="<?php the_permalink();?>" class="khbhvr"></a> 
                              <span class="icon khbmedia"></span> 
                              <div class="metawrpr">                          
                                  <?php Khobish_Helper::ae_build_postmeta($metat,$excerptt);?>  
                              </div>                           
                          </div>
                      </div>
                    

                    <?php
                    endif;
                    $i = $i + 1;
                endwhile;
            $i = 1;
            wp_reset_postdata();
            endif;
        ?>
    </div>  

      <div class="fw-col-md-8">
        <?php
            if( $wp_query->have_posts() ) :
                while( $wp_query->have_posts() ) :
                    $wp_query->the_post(); 
                    if( $i == 5 ) : 

                    ?>  
                      <div class="inr anim-fade bgtitle <?php echo Khobish_Helper::xl_post_format_icon();?>">
                          <div class="bgholder lazyload" <?php echo Khobish_Helper::madmag_bg_images($imgr); ?>>
                              <div class="khboverlaythumb"><?php echo Khobish_Helper::khobish_single_category_bg();?></div>
                              <a href="<?php the_permalink();?>" class="khbhvr"></a>  
                              <span class="icon khbmedia"></span>
                              <div class="metawrpr">                          
                                  <?php Khobish_Helper::ae_build_postmeta($metar,$excerptr);?>  
                              </div>                           
                          </div>
                      </div>
                    

                    <?php
                    endif;
                    $i = $i + 1;
                endwhile;
            $i = 1;
            wp_reset_postdata();
            endif;
        ?>
    </div> 

  </div>
    
    <div class="thirdblock comgrid">
        <?php
            if( $wp_query->have_posts() ) :
                while( $wp_query->have_posts() ) :
                    $wp_query->the_post();
                    if( $i > 5 ) :
                    ?> 
                    <div class="fw-col-md-6">
                      <div class="inr anim-fade smtitle <?php echo Khobish_Helper::xl_post_format_icon();?>">
                          <div class="bgholder lazyload" <?php echo Khobish_Helper::madmag_bg_images($imgf); ?>>
                              <div class="khboverlaythumb"><?php echo Khobish_Helper::khobish_single_category_bg();?></div>
                              <a href="<?php the_permalink();?>" class="khbhvr"></a> 
                              <span class="icon khbmedia"></span> 
                              <div class="metawrpr">                          
                                  <?php Khobish_Helper::ae_build_postmeta($metaf,$excerptf);?>  
                              </div>                           
                          </div>
                      </div>
                    </div>
                    <?php
                    endif;
                    $i = $i + 1;
                endwhile;
            $i = 1;
            wp_reset_postdata();
            endif;
        ?>

    </div> 

</div> 

<style type="text/css">

</style>
