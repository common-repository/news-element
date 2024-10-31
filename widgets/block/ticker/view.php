<?php
use News_Element\Khobish_Helper;
$excerpt= '';
$metaf = Khobish_Helper::king_buildermeta_to_string($settings['metas']);
$query_args = Khobish_Helper::hero_slide_query($settings,'query');

$slider_options = [
    'arrows' => ('yes' === $settings['arrow']),
    'auto' => ('yes' === $settings['auto']),
    'transition' => ('yes' === $settings['transition']),
    'vertical' => ('yes' === $settings['vertical']),
    'var_width' => ('yes' === $settings['var_width']),
    'speed' => $settings['speed']['size'],
    'items' => $settings['items']['size'],
];

$previkn = $settings['picon']['value'] ? '<div class="newsticker-prev prnx"><i class="' . $settings['picon']['value'] . '"></i></div>' : '';
$nextikn = $settings['nicon']['value'] ? '<div class="newsticker-next prnx"><i class="' . $settings['nicon']['value'] . '"></i></div>' : '';
$arrow   = $settings['arrow'] ? '<div class="newsticker-buttons">'.$previkn . $nextikn.'</div>' : '';

$loop = new \WP_Query($query_args);
$label = '<i class="'.$settings['head_icon']['value'].'"></i><span class="khblabel">'.$settings['heading'].'</span>';
?>
  <div class="trending-now">
    <span class="trending-now-label">
      <?php echo $label;?> 
    </span>  
    <div class="newsticker">
      <?php echo '<ul style="display:none;" class="post-ticker" data-slick =\''.wp_json_encode($slider_options).'\'>';?>
      <?php if ($loop->have_posts()) :while ($loop->have_posts()) : $loop->the_post();?>
        <li class="newsticker-item item"><?php Khobish_Helper::ae_build_postmeta($metaf,$excerpt);?></li>   
      <?php endwhile; ?>  
      <?php endif;?>       
      </ul>
    </div>
    <?php echo $arrow;?>
  </div>
