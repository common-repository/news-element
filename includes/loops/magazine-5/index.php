<?php
use News_Element\Khobish_Helper;
$i = 0;

?>

          <div class="firstblock">
                <?php if( $wp_query->have_posts() ) :
                    while( $wp_query->have_posts() ) :
                        $wp_query->the_post();
                        if( $i == 0 || $i == 1 ) :
                        ?>

                        <div class="fw-col-md-6 anim-fade">

                            <article class="post-item <?php echo Khobish_Helper::xl_post_format_icon();?>">
                                    <div class="bgholder lazyload" <?php echo Khobish_Helper::madmag_bg_images($imgf); ?>>
                                    <a href="#" class="khbhvr"></a> 
                                    <?php echo Khobish_Helper::khobish_single_category_bg();?> 
                                      <div class="inrwrp">  
                                          <div class="topmeta">
                                            <?php Khobish_Helper::ae_build_postmeta($metaf,$excerptf);?>
                                                
                                            </div>  
                                        </div> 
                                    </div>                                                                

                            </article>                     
                            
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
                  <div class="inr">
          
                          <?php
                              if( $wp_query->have_posts() ) :
                                  while( $wp_query->have_posts() ) :
                                      $wp_query->the_post();                           
                                      if( $i > 2 ) : 

                                      if ($i % 2 == 0){
                                        $cls = 'khbeven';
                                      } else {
                                        $cls = 'khbodd';
                                      }   

                                      ?>                                     
                                      <div class="fw-col-md-6 anim-fade <?php echo $cls;?>">
                                            <div class="inrcont">
                                              <?php if ( has_post_thumbnail() ) : ?>
                                                  <div class="ft-thumbwrap <?php echo Khobish_Helper::xl_post_format_icon();?>">
                                                    <a href="<?php the_permalink();?>">
                                                      <span class="icon khbmedia xlsmall"></span>
                                                      <?php the_post_thumbnail($imgr);?>
                                                    </a>
                                                  </div>
                                              <?php endif; ?>

                                              <div class="excerpt-wrap">
                                                <?php Khobish_Helper::ae_build_postmeta($metar,$excerptr);?>                        
                                              </div> 
                                          </div>
                                      </div>
                                      <?php  if( $i % 2 == 0 ){echo '<div class="clear"></div>';}?>
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

