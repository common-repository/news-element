<?php
use News_Element\Khobish_Helper;

$excerpt = $settings['excerptf']['size'];
$posts = $settings['posts']['size'];
$imgf = $settings['imgf'];
$stylcls = '';
$metaf = Khobish_Helper::king_buildermeta_to_string($settings['metas']);

$query_args = Khobish_Helper::hero_slide_query($settings,'query');

$slider_options = [ 

    'item' => $settings['item']['size'],
    'item_tab' => $settings['item_tab']['size'],
    'auto' => ('yes' === $settings['auto']),
    'center' => ('yes' === $settings['center']),
    'speed' => $settings['speed']['size'],
    'margin' => $settings['margin']['size'],
];

$previkn = $settings['picon']['value'] ? '<div class="khbprnx khbprev"><i class="'.$settings['nicon']['value'].'"></i></div>' : '';
$nextikn = $settings['nicon']['value'] ? '<div class="khbprnx khbnxt"><i class="'.$settings['picon']['value'].'"></i></div>' : '';
$arrow   = $settings['arrow'] ? $previkn . $nextikn  : '';
$dot     = $settings['dots'] ? '<div class="swiper-pagination"></div>' : '';

$loop = new \WP_Query($query_args);
?>
<div class="khobish-slider-five-wrap">
  <?php echo '<div style="display:none;" class="khobish-slider-five swiper '.$stylcls.'" data-xld =\''.wp_json_encode($slider_options).'\'>';?>
    <div class="swiper-wrapper line-clip">

      <?php if ($loop->have_posts()) : ?>
              <?php $post_count = 0;while ($loop->have_posts()) : $loop->the_post();$post_count++;
                require dirname(__FILE__) .'/'. sanitize_key($settings['style']) .'.php';
                  endwhile;
                  wp_reset_postdata();
                endif;
              ?>
    </div>
      <?php echo $arrow.$dot;?>            
  </div>
</div>
