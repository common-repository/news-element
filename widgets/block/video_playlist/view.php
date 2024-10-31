<?php
use News_Element\Khobish_Helper;

$slider_options = [
    'auto' => ('yes' === $settings['auto']),
    'vertical' => ('yes' === $settings['vertical']),
    'speed' => $settings['speed']['size'],
    'item' => $settings['item']['size'],
    'item_tab' => $settings['item_tab']['size'],
];                
$vertical = $settings['vertical'] ? 'vertical-slide' : 'horizontal-slide';
$css_class = $vertical.' '.$settings['style'];
$first=0;
$thmb = '';
foreach ($settings['urls'] as $a){
    $first++;
    if($first==1){
        $class='current';
    } else {
        $class='';
    }   
    $url = $a['meta'];
    $duration = $a['duration'] ? '<span class="duration">'.$a['duration'].'</span>' : '';
    $title = $a['title'] ? '<div class="content"><span class="title">'.$a['title'].'</span></div>' : '';  
    $thmb .= '<div class="slider__item format-video" data-url="'.$url.'"><div class="thumbwrapper"><span class="icon khbmedia xlsmall"></span>'.Khobish_Helper::process_video_thumbnail($url).$duration.'</div>'.$title.'</div>';  
    if($first==1){
        $preview = wp_oembed_get($url);
    }
}

    echo '<div class="khobishvidplaylist '.$css_class.'" data-xld ='.wp_json_encode($slider_options).'>'; 
    require dirname(__FILE__) .'/'. sanitize_key($settings['style']) .'.php';
?>
</div>