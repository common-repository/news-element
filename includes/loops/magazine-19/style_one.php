<?php
use News_Element\Khobish_Helper;
?>

<div class="firstblock">
      <?php if( $wp_query->have_posts() ) :
          while( $wp_query->have_posts() ) :
              $wp_query->the_post();
              if( $i == 0 ) :
              ?>
                  <article class="post-item anim-fade <?php echo Khobish_Helper::xl_post_format_icon();?>">
                    <?php if ( has_post_thumbnail() ) : ?>
                        <div class="ft-thumbwrap">
                          <a href="<?php the_permalink();?>">
                            <span class="icon khbmedia"></span>
                            <?php the_post_thumbnail($imgf);?>
                          </a>
                           <?php echo Khobish_Helper::khobish_single_category_bg();?>
                        </div>
                    <?php endif; ?>
                    <div class="excerpt-wrap">
                      <?php Khobish_Helper::ae_build_postmeta($metaf,$excerptf);?>
                    </div>
                  </article>
                  <?php
                  endif;
                  $i = $i + 1;
              endwhile;
              $i = 1;
              wp_reset_postdata();
          endif;?>
     </div>
      <div class="secondblock">
        <div class="inr">
          <?php
              if( $wp_query->have_posts() ) :
                  while( $wp_query->have_posts() ) :
                      $wp_query->the_post();
                      if( $i == 2 || $i == 3  ) : ?>
                        <article class="fw-col-md-6 post-item anim-fade <?php echo Khobish_Helper::xl_post_format_icon();?>">
                          <div class="postinr">
                          <?php if ( has_post_thumbnail() ) : ?>
                              <div class="ft-thumbwrap">
                                <a href="<?php the_permalink();?>">
                                  <span class="icon khbmedia"></span>
                                  <?php the_post_thumbnail($imgr);?>
                                </a>
                                 <?php echo Khobish_Helper::khobish_single_category_bg();?>
                              </div>
                          <?php endif; ?>
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


      <div class="thirdblock">
        <?php
            if( $wp_query->have_posts() ) :
                while( $wp_query->have_posts() ) :
                    $wp_query->the_post();
                    if( $i > 3  ) : ?>

                      <article class="post-item khobish-flex-inr <?php echo Khobish_Helper::xl_post_format_icon();?>">
                        <?php if ( has_post_thumbnail() ) : ?>
                            <div class="ft-thumbwrap">
                              <a href="<?php the_permalink();?>">
                                <span class="icon khbmedia"></span>
                                <?php the_post_thumbnail($imgs);?>
                              </a>
                               <?php echo Khobish_Helper::khobish_single_category_bg();?>
                            </div>
                        <?php endif; ?>
                        <div class="excerpt-wrap">
                          <div class="inr">
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
