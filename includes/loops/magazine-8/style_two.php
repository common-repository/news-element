<?php
use News_Element\Khobish_Helper;

    if( $wp_query->have_posts() ) :
        while( $wp_query->have_posts() ) :
            $wp_query->the_post();
            if( $i == 0 ) :
            ?>

            <div class="fw-col-md-12 first anim-fade no-pad">
                
                <article class="post-item <?php echo Khobish_Helper::xl_post_format_icon();?>">
                    <div class="fw-col-md-6 ">
                        <?php if ( has_post_thumbnail() ) : ?>
                            <div class="ft-thumbwrap">
                              <a href="<?php the_permalink();?>">
                                <span class="icon"></span>
                                <?php the_post_thumbnail($imgf);?>
                              </a>
                              <div class="overlaycat"><?php echo Khobish_Helper::khobish_single_category_bg();?></div>
                            </div>
                        <?php endif; ?>
                      </div>
                    <div class="fw-col-md-6 ">
                      <div class="excerpt-wrap">
                        <?php Khobish_Helper::ae_build_postmeta($metaf,$excerptf);?>                        
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
    endif; 
?>  
<div class="fw-col-md-12">
    <div class="xlpostwrap rest no-margin">
    <?php
        if( $wp_query->have_posts() ) :
            while( $wp_query->have_posts() ) :
                $wp_query->the_post();
                if( $i > 1 ) :?> 
                        
                    <div class="fw-col-md-4 anim-fade">
                        <article class="post-item <?php echo Khobish_Helper::xl_post_format_icon();?>">
                        <?php if ( has_post_thumbnail() ) : ?>
                            <div class="ft-thumbwrap">
                              <a href="<?php the_permalink();?>">
                                <span class="icon xlsmall"></span>
                                <?php the_post_thumbnail($imgr);?>
                              </a>
                              <div class="overlaycat"><?php echo Khobish_Helper::khobish_single_category_bg();?></div>
                            </div>
                        <?php endif; ?>
     
                          <div class="excerpt-wrap">
                            <?php Khobish_Helper::ae_build_postmeta($metar,$excerptr);?>                       
                          </div>

                        </article> 
                    </div>
                    <?php  if( $i % 3 == 1 ){echo '<div class="clear"></div>';}?>
                <?php
                endif;
                $i = $i + 1;
            endwhile;
            wp_reset_postdata();
        endif;
        ?>
    </div>
</div>
