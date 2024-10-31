<?php
use News_Element\Khobish_Helper;
?>

<div class="firstblock">
    <div style="display:none" class="slider slider--images">
      <?php if ($loop->have_posts()) : ?>
        <?php while ($loop->have_posts()) : $loop->the_post(); ?>
          <div class="slider__item">
 
            <div class="slide-bg lazyload" <?php echo Khobish_Helper::madmag_bg_images($settings['img_size']); ?>></div>
            <a href="<?php the_permalink();?>" class="full-thumb-link"></a>
            <div class="thumb-overlay-center">
                <div class="thumb-content">
                    <div class="inr">
                        <?php Khobish_Helper::ae_build_postmeta($metaf,$excerpt);?>
                    </div>
                </div>
            </div>

          </div>
        <?php endwhile; ?>
        <?php wp_reset_postdata(); ?>
      <?php endif;?>
    </div>
    <?php echo $arrow;?>
</div>

<div class="secondblock"> 
    <div class="inr">

            <div style="display:none" class="slider slider--thumbnails">
              <?php $loop = new \WP_Query($query_args);if ($loop->have_posts()) : ?>
                <?php while ($loop->have_posts()) : $loop->the_post(); ?>
                  <div class="slider__item <?php echo Khobish_Helper::xl_post_format_icon();?>">
                        <div class="thumb-content">
                            <?php the_post_thumbnail($settings['img_sizer']);?>
                            <span class="icon khbmedia xlsmall"></span>
                        </div>   
                    </div>
                <?php endwhile; ?>
                <?php wp_reset_postdata(); ?>
              <?php endif;?>
            </div>
    
    </div>
</div>

