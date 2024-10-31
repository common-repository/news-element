<?php
use News_Element\Khobish_Helper;

if( $wp_query->have_posts() ) :
    while( $wp_query->have_posts() ) :
        $wp_query->the_post();
        if( $i == 0 ) :
        ?>
        <div class="fw-col-md-6">
            <div class="anim-fade first">

                <article class="post-item <?php echo Khobish_Helper::xl_post_format_icon();?>">
                <?php if ( has_post_thumbnail() ) : ?>
                    <div class="ft-thumbwrap">
                      <a href="<?php the_permalink();?>">
                        <span class="icon xlsmall khbmedia"></span>
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
        </div>
        <?php
        endif;
        $i = $i + 1;
    endwhile;
    $i = 1;
    wp_reset_postdata();
endif;
?>
<div class="fw-col-md-6">
    <div class="rest restblock">
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
                    $i = $i + 1;
                endwhile;
                $i = 1;
                wp_reset_postdata();
            endif;
            ?>
    </div>

    <div class="middle restblock">
        <?php
            if( $wp_query->have_posts() ) :
                while( $wp_query->have_posts() ) :
                    $wp_query->the_post();
                    if( $i > 2 ) :?>

                        <div class="anim-fade">
                            <article class="post-item <?php echo Khobish_Helper::xl_post_format_icon();?>">
                            <?php if ( has_post_thumbnail() ) : ?>
                                <div class="ft-thumbwrap no-translate">
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
                    $i = $i + 1;
                endwhile;
                $i = 1;
                wp_reset_postdata();
            endif;
            ?>
    </div>
</div>