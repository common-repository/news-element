<?php
use News_Element\Khobish_Helper;
?>

<?php
    if( $wp_query->have_posts() ) :
        while( $wp_query->have_posts() ) :
            $wp_query->the_post();$i++;?>
                <?php if( $i < $break){?>

                <div class="smtitle anim-fade">
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
                        <div class="inr">
                          <?php Khobish_Helper::ae_build_postmeta($metaf,$excerptf);?>
                        </div>
                      </div>

                    </article>
                </div>


                <?php } elseif ( $i == $break ) { ?>
                <div class="bgtitle anim-fade">
                    <article class="post-item <?php echo Khobish_Helper::xl_post_format_icon();?>">
                    <?php if ( has_post_thumbnail() ) : ?>
                        <div class="ft-thumbwrap">
                          <a href="<?php the_permalink();?>">
                            <span class="icon khbmedia"></span>
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

                <?php } else {?>

                <div class="smtitle anim-fade">
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
                        <div class="inr">
                        <?php Khobish_Helper::ae_build_postmeta($metaf,$excerptf);?>
                        </div>
                      </div>

                    </article>
                </div>

                <?php } ?>

            <?php
        endwhile;
        wp_reset_postdata();
    endif;
?>