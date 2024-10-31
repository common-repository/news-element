<?php
use News_Element\Khobish_Helper;
if( $wp_query->have_posts() ) :
    $post_count = 0;while( $wp_query->have_posts() ) :
        $wp_query->the_post();$post_count++;
        if ($post_count % 3 == 1){
        ?>

        <article class="post-item bgtitle anim-fade <?php echo Khobish_Helper::xl_post_format_icon();?>">
        <?php if ( has_post_thumbnail() ) : ?>
            <div class="ft-thumbwrap">
              <a href="<?php the_permalink();?>">
                <span class="icon"></span>
                <?php the_post_thumbnail($imgf);?>
              </a>
              <?php echo Khobish_Helper::khobish_single_category_bg();?>
            </div>
        <?php endif; ?>

          <div class="excerpt-wrap">
            <?php Khobish_Helper::ae_build_postmeta($metaf,$excerptf);?>
          </div>

        </article>

        <?php } else { ?>

        <article class="post-item smtitle anim-fade <?php echo Khobish_Helper::xl_post_format_icon();?>">
        <?php if ( has_post_thumbnail() ) : ?>
            <div class="ft-thumbwrap">
              <a href="<?php the_permalink();?>">
                <span class="icon"></span>
                <?php the_post_thumbnail($imgr);?>
              </a>
              <?php echo Khobish_Helper::khobish_single_category_bg();?>
            </div>
        <?php endif; ?>

          <div class="excerpt-wrap">
            <?php Khobish_Helper::ae_build_postmeta($metar,$excerptr);?>
          </div>

        </article>

       <?php }

    endwhile;
    wp_reset_postdata();
endif;
?>
