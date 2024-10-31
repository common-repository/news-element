<?php
use News_Element\Khobish_Helper;
$excerpt = $settings['excerptf']['size'];
$imgf = $settings['imgf'];
$metaf = Khobish_Helper::king_buildermeta_to_string($settings['metas']);

$query_args = Khobish_Helper::hero_slide_query($settings,'query');

$slider_options = [
    'arrows' => ('yes' === $settings['arrow']),
    'auto' => ('yes' === $settings['auto']),
    'transition' => $settings['transition'],
    'speed' => $settings['speed']['size'],
];

$previkn = $settings['picon']['value'] ? '<div class="khbprnx khbnxt"><i class="' . $settings['picon']['value'] . '"></i></div>' : '';
$nextikn = $settings['nicon']['value'] ? '<div class="khbprnx khbprev"><i class="' . $settings['nicon']['value'] . '"></i></div>' : '';
$arrow   = $settings['arrow'] ? '<div class="khbpnwrap">'.$previkn . $nextikn.'</div>' : '';
$dot     = $settings['dot'] ? '<div class="swiper-pagination"></div>' : '';

$loop = new \WP_Query($query_args);

?>
<div class="khobish-slider-four news24-swiper swiper">
  <?php echo '<div class="swiper-wrapper '.$settings['bordered'].'" data-slick =\''.wp_json_encode($slider_options).'\'>';?>
      <?php if ($loop->have_posts()) : ?>
              <?php while ($loop->have_posts()) : $loop->the_post();
               ?>

                  <div  class="swiper-slide inner">
                     <div class="inrwrapper lazyload" <?php echo Khobish_Helper::madmag_bg_images($imgf); ?>>   
                      <div class="excerpt-wrap">
                        <div class="inrexcerpt">
                          <?php Khobish_Helper::ae_build_postmeta($metaf,$excerpt);?>
                        </div>
                      </div>                                            
                    </div>
                  </div>
       
              <?php endwhile; ?>

              <?php wp_reset_postdata(); ?>
              
      <?php endif;?>
  </div>
  <?php echo $arrow.$dot;?>
</div>

