<?php
use News_Element\Khobish_Helper;
?>

<div class="firstblock">
      <?php if( $wp_query->have_posts() ) :
          while( $wp_query->have_posts() ) :
              $wp_query->the_post();
              if( $i <= 0 ) :
              ?> 
                  <article class="post-item anim-fade <?php echo Khobish_Helper::xl_post_format_icon();?>">
                  <?php if ( has_post_thumbnail() ) : ?>
                      <div class="ft-thumbwrap">
                        <a href="<?php the_permalink();?>">
                          <span class="icon khbmedia"></span>
                          <?php the_post_thumbnail($imgf);?>
                        </a>
                         <div class="khboverlaythumb"><?php echo Khobish_Helper::khobish_single_category_bg();?></div>
                      </div>
                  <?php endif; ?>
                    <div class="excerpt-wrap">
                      <?php Khobish_Helper::ae_build_postmeta($metaf,$excerptf);?>                        
                    </div>            
                  </article>                      
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
                    if( $i > 1 ) : ?>                                     
                    <div class="fw-col-md-6 anim-fade">
                          <div class="inrcont <?php echo Khobish_Helper::xl_post_format_icon();?>">
                            <div class="inrwrp lazyload" <?php echo Khobish_Helper::madmag_bg_images($imgr); ?>></div><a href="<?php the_permalink();?>" class="full-thumb-link"></a>
                            <span class="icon khbmedia"></span>
                            <div class="khboverlaythumb"><?php echo Khobish_Helper::khobish_single_category_bg();?></div>                            
                            <div class="excerpt-wrap">
                              <div class="inr">
                                <?php Khobish_Helper::ae_build_postmeta($metar,$excerptr);?>  
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