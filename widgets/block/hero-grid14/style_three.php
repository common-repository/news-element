<?php
use News_Element\Khobish_Helper;
?>
    <div class="xldhero14 line-clip">

        <?php $post_count = 0; while ($wp_query->have_posts()) : $wp_query->the_post();
        $post_count++; 
        if( $post_count == '1') {?>

          <div class="firsthero <?php echo Khobish_Helper::xl_post_format_icon();?>">  

                  <?php if ( has_post_thumbnail() ) : ?>
                      <div class="ft-thumbwrap">
                        <a href="<?php the_permalink();?>">
                          <span class="icon"></span>
                          <?php the_post_thumbnail($settings['imgf']);?>
                        </a>
                        <div class="khboverlaythumb"><?php echo Khobish_Helper::khobish_single_category_bg();?></div>
                      </div>
                  <?php endif; ?>
                                            
                  <div class="excerpt-wrap">
                    <div class="inrexcrpt">
                        <?php Khobish_Helper::ae_build_postmeta($metaf,$settings['excerptf']['size']);?> 
                    </div>
                  </div> 

          </div>

        <?php } elseif ( $post_count == '2' ) {?>

          <div class="firsthero <?php echo Khobish_Helper::xl_post_format_icon();?>">
              <?php if ( has_post_thumbnail() ) : ?>
                  <div class="ft-thumbwrap">
                    <a href="<?php the_permalink();?>">
                      <span class="icon"></span>
                      <?php the_post_thumbnail($settings['imgf']);?>
                    </a>
                    <div class="khboverlaythumb"><?php echo Khobish_Helper::khobish_single_category_bg();?></div>
                  </div>
              <?php endif; ?>
                                        
              <div class="excerpt-wrap">
                <div class="inrexcrpt">
                    <?php Khobish_Helper::ae_build_postmeta($metaf,$settings['excerptf']['size']);?> 
                </div>
              </div>  
          </div>
                         
        <?php } else { ?>

          <div class="resthero <?php echo Khobish_Helper::xl_post_format_icon();?>">   
              <div class="inrwrp lazyload" <?php echo Khobish_Helper::madmag_bg_images($settings['imgr']); ?>>
                  <a href="<?php the_permalink();?>" class="full-thumb-link"></a>
                    <span class="icon khbmedia"></span>
                    <div class="khboverlaythumb"><?php echo Khobish_Helper::khobish_single_category_bg();?></div>                
                  <div class="excerpt-wrap">
                    <div class="inrexcrpt">
                        <?php Khobish_Helper::ae_build_postmeta($metas,$settings['excerptr']['size']);?> 
                    </div>
                  </div> 
              </div>    
          </div>

         <?php } ?>  

        <?php endwhile; wp_reset_postdata(); ?>
    </div>