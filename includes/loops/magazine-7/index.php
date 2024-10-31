<?php
use News_Element\Khobish_Helper;

    if( $wp_query->have_posts() ) :
        while( $wp_query->have_posts() ) :
            $wp_query->the_post();
            if( $i == 0 ) :
            ?>

            <div class="fw-col-md-6 first anim-fade">
                
                <article class="post-item <?php echo Khobish_Helper::xl_post_format_icon();?>">
                <?php if ( has_post_thumbnail() ) : ?>
                    <div class="ft-thumbwrap">
                      <a href="<?php the_permalink();?>">
                        <span class="icon"></span>
                        <?php the_post_thumbnail($imgf);?>
                      </a>
                      <?php  echo Khobish_Helper::khobish_single_category_bg();?>
                    </div>
                <?php endif; ?>

                  <div class="excerpt-wrap">
                    <?php Khobish_Helper::ae_build_postmeta($metaf,$excerptf);?>                        
                  </div>            

                </article>                      
                
            </div>

            <?php   
            endif;
            $i = $i + 1;
        endwhile;
        $i = 1;
        wp_reset_postdata();
    endif;
?>  
    <div class="fw-col-md-6 rest">
        <div class="xlpostwrap no-margin">
        <?php
            if( $wp_query->have_posts() ) :
                while( $wp_query->have_posts() ) :
                    $wp_query->the_post();
                    if( $i > 1 ) :?> 
                            
                        <div class="fw-col-md-12 anim-fade">
                            <article class="post-item <?php echo Khobish_Helper::xl_post_format_icon();?>">
                            <?php if ( has_post_thumbnail() ) : ?>
                                <div class="ft-thumbwrap">
                                  <a href="<?php the_permalink();?>">
                                    <span class="icon khbmedia xlsmall"></span>
                                    <?php the_post_thumbnail($imgr);?>
                                  </a>
                                  <?php // echo khobish_single_category_bg();?>
                                </div>
                            <?php endif; ?>
         
                              <div class="excerpt-wrap">
                                <?php Khobish_Helper::ae_build_postmeta($metar,$excerptr);?>                       
                              </div>

                            </article> 
                        </div>
                        
                    <?php
                    endif;
                    $i = $i + 1;
                endwhile;
                wp_reset_postdata();
            endif;
            ?>
        </div>
    </div>
    <div class="clear"></div>