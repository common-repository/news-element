<?php
use News_Element\Khobish_Helper;
?>
 
<div class="post-grid-wrpr">
    <div class="firstblock fw-col-md-6"> 
        <?php
            if( $wp_query->have_posts() ) :
                while( $wp_query->have_posts() ) :
                    $wp_query->the_post();
                    if( $i == 0 ) :
                    ?> 
                      <article class="post-item anim-fade <?php echo Khobish_Helper::xl_post_format_icon();?>">
                      <?php if ( has_post_thumbnail() ) : ?>
                          <div class="ft-thumbwrap no-overflow">
                            <a href="<?php the_permalink();?>">
                              <span class="icon"></span>
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
                    $i = (int)$i + (int)1;
                endwhile;
                $i = (int)1;
                wp_reset_postdata();
            endif;
        ?>

    </div>
        
    <div class="secondblock fw-col-md-6">
        <div class="list anim-fade">
        <?php
            if( $wp_query->have_posts() ) :
                while( $wp_query->have_posts() ) :
                    $wp_query->the_post(); 
                    if( $i <= 3 && $i >= 2 ) : 

                    ?> 

                      <article class="post-item <?php echo Khobish_Helper::xl_post_format_icon();?>">
                            <?php if ( has_post_thumbnail() ) : ?>
                                <div class="ft-thumbwrap no-overflow">
                                  <a href="<?php the_permalink();?>">
                                    <span class="icon"></span>
                                    <?php the_post_thumbnail($imgs);?>
                                  </a>
                                </div>
                            <?php endif; ?>                       
                            <div class="excerpt-wrap">
                              <?php Khobish_Helper::ae_build_postmeta($metas,$excerpts);?>                        
                            </div>                               
                      </article> 

                    <?php
                    endif;
                    $i = $i + 1;
                endwhile;
            $i = 1;
            wp_reset_postdata();
            endif;
        ?>
      </div>
      <div class="grid">

      <?php
            if( $wp_query->have_posts() ) :
                while( $wp_query->have_posts() ) :
                    $wp_query->the_post(); 
                    if( $i >= 4 ) : 

                    ?> 

                      <article class="post-item anim-fade <?php echo Khobish_Helper::xl_post_format_icon();?>">
                            <?php if ( has_post_thumbnail() ) : ?>
                                <div class="ft-thumbwrap no-overflow">
                                  <a href="<?php the_permalink();?>">
                                    <span class="icon"></span>
                                    <?php the_post_thumbnail($imgs);?>
                                  </a>
                                  <div class="khboverlaythumb"><?php echo Khobish_Helper::khobish_single_category_bg();?></div>
                                </div>
                            <?php endif; ?>                       
                          <div class="excerptwrp">
                            <div class="excerpt-wrap">
                              <?php Khobish_Helper::ae_build_postmeta($metas,$excerpts);?>                        
                            </div> 
                          </div>                                
                      </article> 

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

</div> 

