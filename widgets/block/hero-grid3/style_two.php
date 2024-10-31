<?php
use News_Element\Khobish_Helper;
$i = 0;
?>

<div class="herogrid3 style2 tpoverflow">
    <div class="fw-col-md-4 firstblock bgtitle">
        <?php 
            if( $wp_query->have_posts() ) :
                while( $wp_query->have_posts() ) :
                    $wp_query->the_post();
                    if( $i == 0 ) :
                    ?>

                      <div class="inrwrp lazyload" <?php echo Khobish_Helper::madmag_bg_images($settings['img_size']); ?>> 
                        <a class="khobishoverlaylink" href="<?php the_permalink();?>"></a>
                        <div class="catoverlay"><?php echo Khobish_Helper::khobish_single_category_bg();?></div> 
                          <div class="excerpt-wrap">
                            <div class="inrexcrpt">
                                <?php Khobish_Helper::ae_build_postmeta($metaf,$settings['excerpt']['size']);?> 
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

    <div class="fw-col-md-4 thirdblock bgtitle">
        <?php
            if( $wp_query->have_posts() ) :
                while( $wp_query->have_posts() ) :
                    $wp_query->the_post();
                    if( $i == 4 ) : 
                    ?>

                      <div class="inrwrp lazyload" <?php echo Khobish_Helper::madmag_bg_images($settings['img_size']);?>> 
                        <a class="khobishoverlaylink" href="<?php the_permalink();?>"></a>
                        <div class="catoverlay"><?php echo Khobish_Helper::khobish_single_category_bg();?></div> 
                          <div class="excerpt-wrap">
                            <div class="inrexcrpt">
                                <?php Khobish_Helper::ae_build_postmeta($metaf,$settings['excerpt']['size']);?> 
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

    <div class="fw-col-md-4 secondblock smtitle">
        <?php
            if( $wp_query->have_posts() ) :
                while( $wp_query->have_posts() ) :
                    $wp_query->the_post();
                    if( $i == 2 || $i == 3) : 
                    ?> 

                      <div class="inrwrp lazyload" <?php echo Khobish_Helper::madmag_bg_images($settings['img_sizes']); ?>>  
                        <a class="khobishoverlaylink" href="<?php the_permalink();?>"></a>
                        <div class="catoverlay"><?php echo Khobish_Helper::khobish_single_category_bg();?></div>
                          <div class="excerpt-wrap">
                            <div class="inrexcrpt">
                                <?php Khobish_Helper::ae_build_postmeta($metas,$settings['excerpt']['size']);?> 
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



