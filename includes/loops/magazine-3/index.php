<?php
use News_Element\Khobish_Helper;
$column = Khobish_Helper::fw_grid_col( $col_num );
    if( $wp_query->have_posts() ) :
        while( $wp_query->have_posts() ) :
            $wp_query->the_post();
            if( $i == 0 ) :
            ?>

                <div class="first no-pad anim-fade">

                    <article class="post-item <?php echo Khobish_Helper::xl_post_format_icon();?>">
                        
                        <?php if ( has_post_thumbnail() ) : ?>
                            <div class="ft-thumbwrap">
                              <a href="<?php the_permalink();?>">
                                <span class="icon khbmedia xlsmall"></span>
                                <?php the_post_thumbnail($imgf);?>
                              </a>
                              <div class="khboverlaythumb"><?php echo Khobish_Helper::khobish_single_category_bg();?></div>
                            </div>
                        <?php endif; ?>

                        <div class="thumb-inr">
                            <div class="thumb-content">
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
    <div class="rest">
        <div class="xlpostwrap">
        <?php
            if( $wp_query->have_posts() ) :
                while( $wp_query->have_posts() ) :
                    $wp_query->the_post();
                    if( $i > 1 ) :?> 

                          <div class="<?php echo $column;?> anim-fade">
                              <article class="post-item <?php echo Khobish_Helper::xl_post_format_icon();?>">
                              <?php if ( has_post_thumbnail() ) : ?>
                                  <div class="ft-thumbwrap">
                                    <a href="<?php the_permalink();?>">
                                      <span class="icon khbmedia xlsmall"></span>
                                      <?php the_post_thumbnail($imgr);?>
                                    </a>
                                    <div class="khboverlaythumb"><?php echo Khobish_Helper::khobish_single_category_bg();?></div>
                                  </div>
                              <?php endif; ?>
           
                                <div class="excerpt-wrap">
                                  <?php Khobish_Helper::ae_build_postmeta($metar,$excerptr);?>                       
                                </div>

                              </article> 
                          </div>

                        <?php  if( $i % $col_num == 1 ){echo '<div class="clear"></div>';}?>
                    <?php
                    endif;
                    $i = $i + 1;
                endwhile;
                wp_reset_postdata();
            endif;
            ?>
        </div>
    </div>