<?php
use News_Element\Khobish_Helper;
$breakn = $break - 1;
?>

<div class="post-grid-wrpr">
    <div class="firstblock comblock"> 
        <?php
            if( $wp_query->have_posts() ) :
                while( $wp_query->have_posts() ) :
                    $wp_query->the_post();
                    if( $i == 0 ) :
                    ?> 
                    <div class="fw-col-md-8 smtitle">
                      <article class="post-item <?php echo Khobish_Helper::xl_post_format_icon();?>">
                      <?php if ( has_post_thumbnail() ) : ?>
                          <div class="ft-thumbwrap">
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
                    </div>

                    <?php   
                    endif;
                    $i = (int)$i + (int)1;
                endwhile;
                $i = (int)1;
                wp_reset_postdata();
            endif;
        ?>

        <?php
            if( $wp_query->have_posts() ) :
                while( $wp_query->have_posts() ) :
                    $wp_query->the_post();
                    if( $i == 2 ) :
                    ?>
                    <div class="fw-col-md-4 smtitle xsmall">
                      <article class="post-item <?php echo Khobish_Helper::xl_post_format_icon();?>">
                      <?php if ( has_post_thumbnail() ) : ?>
                          <div class="ft-thumbwrap">
                            <a href="<?php the_permalink();?>">
                              <span class="icon"></span>
                              <?php the_post_thumbnail($imgs);?>
                            </a>
                            <div class="khboverlaythumb"><?php echo Khobish_Helper::khobish_single_category_bg();?></div>
                          </div>
                      <?php endif; ?>

                        <div class="excerpt-wrap">
                          <?php Khobish_Helper::ae_build_postmeta($metas,$excerpts);?>                        
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
        
    <div class="secondblock">
        <?php
            if( $wp_query->have_posts() ) :
                while( $wp_query->have_posts() ) :
                    $wp_query->the_post(); 
                    if( $i > 2 && $i < $break ) : 

                    ?> 

                      <article class="post-item bgtitle <?php echo Khobish_Helper::xl_post_format_icon();?>">

                          <div class="thumbwrp">
                            <?php if ( has_post_thumbnail() ) : ?>
                                <div class="ft-thumbwrap">
                                  <a href="<?php the_permalink();?>">
                                    <span class="icon"></span>
                                    <?php the_post_thumbnail($imgf);?>
                                  </a>
                                  <div class="khboverlaythumb"><?php echo Khobish_Helper::khobish_single_category_bg();?></div>
                                </div>
                            <?php endif; ?>
                          </div>                     
                          
                          <div class="excerptwrp">
                            <div class="excerpt-wrap">
                              <?php Khobish_Helper::ae_build_postmeta($metar,$excerptr);?>                        
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

    <div class="thirdblock comblock">
        <?php
            if( $wp_query->have_posts() ) :
                while( $wp_query->have_posts() ) :
                    $wp_query->the_post();
                    if( $i == $breakn + 1 ) :
                    ?> 
                    <div class="fw-col-md-6">
                      <article class="post-item <?php echo Khobish_Helper::xl_post_format_icon();?>">

                          <div class="thumbwrp">
                            <?php if ( has_post_thumbnail() ) : ?>
                                <div class="ft-thumbwrap">
                                  <a href="<?php the_permalink();?>">
                                    <span class="icon"></span>
                                    <?php the_post_thumbnail($imgr);?>
                                  </a>
                                  <div class="khboverlaythumb"><?php echo Khobish_Helper::khobish_single_category_bg();?></div>
                                </div>
                            <?php endif; ?>
                          </div>                     
                          
                          <div class="excerptwrp">
                            <div class="excerpt-wrap">
                              <?php Khobish_Helper::ae_build_postmeta($metar,$excerptr);?>                        
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

        <?php
            if( $wp_query->have_posts() ) :
                while( $wp_query->have_posts() ) :
                    $wp_query->the_post();
                    if( $i == $breakn + 2 ) :
                    ?> 
                    <div class="fw-col-md-6">
                      <article class="post-item <?php echo Khobish_Helper::xl_post_format_icon();?>">

                          <div class="thumbwrp">
                            <?php if ( has_post_thumbnail() ) : ?>
                                <div class="ft-thumbwrap">
                                  <a href="<?php the_permalink();?>">
                                    <span class="icon"></span>
                                    <?php the_post_thumbnail($imgr);?>
                                  </a>
                                  <div class="khboverlaythumb"><?php echo Khobish_Helper::khobish_single_category_bg();?></div>
                                </div>
                            <?php endif; ?>
                          </div>                     
                          
                          <div class="excerptwrp">
                            <div class="excerpt-wrap">
                              <?php Khobish_Helper::ae_build_postmeta($metar,$excerptr);?>                        
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

    </div> 

    <div class="fourthblock">
        <?php
            if( $wp_query->have_posts() ) :
                while( $wp_query->have_posts() ) :
                    $wp_query->the_post(); 
                    if( $i > $breakn + 2 ) : 
                    ?> 

                      <article class="post-item khobish-flex-inr <?php echo Khobish_Helper::xl_post_format_icon();?>">

                          <div class="thumbwrp">
                            <?php if ( has_post_thumbnail() ) : ?>
                                <div class="ft-thumbwrap">
                                  <a href="<?php the_permalink();?>">
                                    <span class="icon"></span>
                                    <?php the_post_thumbnail($imgr);?>
                                  </a>
                                  <div class="khboverlaythumb"><?php echo Khobish_Helper::khobish_single_category_bg();?></div>
                                </div>
                            <?php endif; ?>
                          </div>                     
                          
                          <div class="excerptwrp">
                            <div class="excerpt-wrap">
                              <?php Khobish_Helper::ae_build_postmeta($metar,$excerptr);?>                        
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
