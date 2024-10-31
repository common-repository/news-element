<?php
use News_Element\Khobish_Helper;
?>

  <div class="herogrid6wrp">
      
    <div class="firstblock anim-fade">
          <?php if( $wp_query->have_posts() ) :
              while( $wp_query->have_posts() ) :
                  $wp_query->the_post();
                  if( $i == 0 ) :
                  ?>

                  <?php if ( has_post_thumbnail() ) : ?>
                      <div class="ft-thumbwrap <?php echo Khobish_Helper::xl_post_format_icon();?>">
                        <a href="<?php the_permalink();?>">
                          <span class="icon"></span>
                          <?php the_post_thumbnail($imgf);?>
                        </a>
                      </div>
                  <?php endif; ?>

                  <div class="excerpt-wrap">
                    <?php Khobish_Helper::ae_build_postmeta($metaf,$excerptf);?>                        
                  </div> 

                      <?php   
                      endif;
                      $i = $i + 1;
                  endwhile;
                  $i = 1;
                  wp_reset_postdata();
              endif;?>
         </div>     
      <div class="secondblock">
          <?php
              if( $wp_query->have_posts() ) :
                  while( $wp_query->have_posts() ) :
                      $wp_query->the_post();                           
                      if( $i > 1 ) : 
                      ?> 

                        <div class="inrwrp lazyload" <?php echo Khobish_Helper::madmag_bg_images($imgr); ?>> 
                          <div class="excerpt-wrap">
                            <?php Khobish_Helper::ae_build_postmeta($metar,$excerptr);?>                        
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
        
