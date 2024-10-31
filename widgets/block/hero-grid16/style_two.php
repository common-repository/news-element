<?php
use News_Element\Khobish_Helper;
$i = 0;
?>

<div class="khobishhero16">
    <div class="fw-col-md-4">
        <?php
            if( $wp_query->have_posts() ) :
                while( $wp_query->have_posts() ) :
                    $wp_query->the_post();
                    if( $i == 0){ ?>

                        <article class="post-item firstblock <?php echo Khobish_Helper::xl_post_format_icon();?>">
                        <?php if ( has_post_thumbnail() ) : ?>
                            <div class="ft-thumbwrap">
                              <a href="<?php the_permalink();?>">
                                <span class="icon khbicon"></span>
                                <?php the_post_thumbnail($settings['fimg']);?>
                              </a>
                              <?php echo Khobish_Helper::khobish_single_category_bg();?>
                            </div>
                        <?php endif; ?>
     
                          <div class="excerpt-wrap">
                            <?php Khobish_Helper::ae_build_postmeta($fmeta,$settings['fex']['size']);?>                        
                          </div>            

                        </article>

                    <?php }
                    
                    $i = $i + 1;
                    
                endwhile;
                $i = 1;
                wp_reset_postdata();
            endif;
        ?>
    </div>
        
    <div class="fw-col-md-4">
        <?php
            if( $wp_query->have_posts() ) :
                while( $wp_query->have_posts() ) :
                    $wp_query->the_post();
                    if($i == 2){ ?> 
                    <article class="post-item firstblock <?php echo Khobish_Helper::xl_post_format_icon();?>">
                    <?php if ( has_post_thumbnail() ) : ?>
                        <div class="ft-thumbwrap">
                          <a href="<?php the_permalink();?>">
                            <span class="icon khbicon"></span>
                            <?php the_post_thumbnail($settings['fimg']);?>
                          </a>
                          <?php echo Khobish_Helper::khobish_single_category_bg();?>
                        </div>
                    <?php endif; ?>
 
                      <div class="excerpt-wrap">
                        <?php Khobish_Helper::ae_build_postmeta($fmeta,$settings['fex']['size']);?>                        
                      </div>            

                    </article>

                    <?php }
                    $i = $i + 1;
                endwhile;
            $i = 1;
            wp_reset_postdata();
            endif;
        ?>
    </div>    

    <div class="fw-col-md-4">
        <?php
            if( $wp_query->have_posts() ) :
                while( $wp_query->have_posts() ) :
                    $wp_query->the_post();
                    if( $i == 4 || $i== 3 ) { ?>
                    <article class="post-item secondblock <?php echo Khobish_Helper::xl_post_format_icon();?>">
                    <?php if ( has_post_thumbnail() ) : ?>
                        <div class="ft-thumbwrap">
                          <a href="<?php the_permalink();?>">
                            <span class="icon khbicon"></span>
                            <?php the_post_thumbnail($settings['simg']);?>
                          </a>
                          <?php echo Khobish_Helper::khobish_single_category_bg();?>
                        </div>
                    <?php endif; ?>
 
                      <div class="excerpt-wrap">
                        <?php Khobish_Helper::ae_build_postmeta($smeta,0);?>                        
                      </div>            

                    </article>
                    <?php } 
                    $i = $i + 1;
                endwhile;
                $i = 1;
                wp_reset_postdata();
            endif;
        ?>
    </div>

</div> 



