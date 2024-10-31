<?php
use News_Element\Khobish_Helper;

if( $wp_query->have_posts() ) :
    while( $wp_query->have_posts() ) :
        $wp_query->the_post();
        if( $i == 0 ) :
        ?>
        <div class="first">

            <article class="post-item <?php echo Khobish_Helper::xl_post_format_icon();?>">
            <?php if ( has_post_thumbnail() ) : ?>
                <div class="ft-thumbwrap">
                  <a href="<?php the_permalink();?>">
                    <span class="icon xlsmall khbmedia"></span>
                    <?php the_post_thumbnail($imgf);?>
                  </a>
                </div>
            <?php endif; ?>

              <div class="excerpt-wrap">
                <?php Khobish_Helper::ae_build_postmeta($metaf,$excerptf);?>                       
              </div>

            </article>                      
            
        </div>

        <?php   
        endif;
        $i = (int)$i + (int)1;
    endwhile;
    $i = (int)1;
    wp_reset_postdata();
endif; 
?>  
<div class="middle restblock">
    <?php
        if( $wp_query->have_posts() ) :
            while( $wp_query->have_posts() ) :
                $wp_query->the_post();
                if( $i == 2 ) :?> 
                        
                    <div class="anim-fade">
                        <article class="post-item <?php echo Khobish_Helper::xl_post_format_icon();?>">
                        <?php if ( has_post_thumbnail() ) : ?>
                            <div class="ft-thumbwrap">
                              <a href="<?php the_permalink();?>">
                                <span class="icon xlsmall khbmedia"></span>
                                <?php the_post_thumbnail($imgr);?>
                              </a>
                            </div>
                        <?php endif; ?>
     
                          <div class="excerpt-wrap">
                            <?php Khobish_Helper::ae_build_postmeta($metar,$excerptr);?>                       
                          </div>

                        </article> 
                    </div>
                <?php
                endif;
                $i = (int)$i + (int)1;
            endwhile;
            $i = (int)1;
            wp_reset_postdata();
        endif;
        ?>
</div>

<div class="rest restblock">
    <?php
        if( $wp_query->have_posts() ) :
            while( $wp_query->have_posts() ) :
                $wp_query->the_post();
                if( $i > 2 ) :?> 
                        
                    <div class="anim-fade">
                        <article class="post-item">
                          <div class="excerpt-wrap">
                            <?php echo Khobish_Helper::khobish_post_title();?>                       
                          </div>

                        </article> 
                    </div>
                <?php
                endif;
                $i = (int)$i + (int)1;                              
            endwhile;
            $i = (int)1;
            wp_reset_postdata();
        endif;
        ?>
</div>