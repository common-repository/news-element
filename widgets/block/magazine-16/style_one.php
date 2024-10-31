<?php
    use News_Element\Khobish_Helper;
    if( $wp_query->have_posts() ) :
        $post_count = 0;while( $wp_query->have_posts() ) :
            $wp_query->the_post();$post_count++;
            if( $post_count == 1 ){?> 
            <div class="fw-col-md-6 bgtitle">    
                <article class="post-item <?php echo Khobish_Helper::xl_post_format_icon();?>">
                    
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
            </div>                                           
            <?php   
            } else {?>

            <div class="fw-col-md-3 fw-col-sm-6 smtitle">    
                <article class="post-item <?php echo Khobish_Helper::xl_post_format_icon();?>">
                    
                        <?php if ( has_post_thumbnail() ) : ?>
                            <div class="ft-thumbwrap">
                              <a href="<?php the_permalink();?>">
                                <span class="icon khbmedia"></span>
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

           <?php }
        endwhile;
        wp_reset_postdata();
    endif; 
?>