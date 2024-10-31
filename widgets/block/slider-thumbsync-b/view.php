<?php
use News_Element\Khobish_Helper;
$excerpt= $settings['excerpt']['size'];
$metaf = Khobish_Helper::king_buildermeta_to_string($settings['metas']);

$query_args = Khobish_Helper::hero_slide_query($settings,'query');
$slider_options = [
    'auto' => ('yes' === $settings['auto']),
    'center' => ('yes' === $settings['center']),
    'fade' => ('yes' === $settings['fade']),
    'speed' => $settings['speed']['size'],
    'item' => $settings['item']['size'],
    'item_tab' => $settings['item_tab']['size'],
    'item_mob' => $settings['item_mob']['size'],
];                

$previkn = $settings['picon']['value'] ? '<div class="khbprnx khbnxt"><i class="'.$settings['picon']['value'].'"></i></div>' : '';
$nextikn = $settings['nicon']['value'] ? '<div class="khbprnx khbprev"><i class="'.$settings['nicon']['value'].'"></i></div>' : '';
$arrow   = $settings['arrow'] ? '<div class="arrowrp">' . $previkn . $nextikn . '</div>' : '';

$loop = new \WP_Query($query_args);?>

<?php echo '<div class="khobishthumbsync '.$settings['style'].'" data-xld =\''.wp_json_encode($slider_options).'\'>';?>
<?php require dirname(__FILE__) .'/'. sanitize_key($settings['style']) .'.php';?>
</div>