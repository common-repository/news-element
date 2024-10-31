<?php
use News_Element\Khobish_Helper;
$i = '';
?>
<div class="firstblock">
<?php if( $wp_query->have_posts() ) :
    while( $wp_query->have_posts() ) :
        $wp_query->the_post();
        if( $i < 3 ) :
        ?>
        <div class="fw-col-md-4 first">
                <article class="post-item anim-fade <?php echo Khobish_Helper::xl_post_format_icon();?>">

                    <?php if ( has_post_thumbnail() ) : ?>
                        <div class="ft-thumbwrap">
                          <a href="<?php the_permalink();?>">
                            <?php the_post_thumbnail($imgf);?>
                            <span class="icon khbmedia"></span>
                            <div class="khboverlaythumb"><?php echo Khobish_Helper::khobish_single_category_bg();?></div>
                          </a>
                        </div>
                    <?php endif; ?>

                  <div class="excerpt-wrap">
                    <div class="inr">
                        <?php Khobish_Helper::ae_build_postmeta($metaf,$excerptf);?>
                    </div>
                  </div>

                </article>
        </div>
        <?php
        endif;
        $i = (int)$i + (int)1;
    endwhile;
    $i = 1;
    wp_reset_postdata();
endif;
?>

</div>

    <div class="rest restblock">
        <?php
            if( $wp_query->have_posts() ) :
                while( $wp_query->have_posts() ) :
                    $wp_query->the_post();
                    if( $i > 3 ) :?>

                        <div class="anim-fade">
                            <article class="post-item khobish-flex-inr <?php echo Khobish_Helper::xl_post_format_icon();?>">
                            <?php if ( has_post_thumbnail() ) : ?>
                                <div class="ft-thumbwrap">
                                  <a href="<?php the_permalink();?>">
                                    <?php the_post_thumbnail($imgs);?>
                                    <span class="icon khbmedia"></span>
                                    <div class="khboverlaythumb"><?php echo Khobish_Helper::khobish_single_category_bg();?></div>
                                  </a>
                                </div>
                            <?php endif; ?>

                              <div class="excerpt-wrap"><div class="inr">
                                <?php Khobish_Helper::ae_build_postmeta($metas,$excerpts);?>
                              </div></div>

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