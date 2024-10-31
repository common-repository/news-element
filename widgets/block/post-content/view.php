<?php
use News_Element\Khobish_Helper;
use Elementor\Plugin;

if ( Plugin::instance()->editor->is_edit_mode() || get_post_type()=='elementor_library' ){
    $id = $settings['prev_id'];
} else {
    global $wp_query; 
    $id = $wp_query->post->ID; 
} 

/* $gal_option = [
    'img' => $settings['img'],
    'imgth' => $settings['imgth'],
    'id' => $id,
    'galins'=> $settings['galins']['size'], //insert after p tag
    'enabled' => $settings['postgal'],
    'auto' => ('yes' === $settings['galauto']),
    'speed' => $settings['galspeed']['size'],  
    'items' => $settings['galitems']['size'], 
    'itemstab' => $settings['galitemstab']['size'],  
]; */


/* add_filter( 'the_content', function( $content ) use ( $gal_option ) {

    $ad_code = khb_thumb_gallery( $gal_option);

    if ( is_single() && $gal_option['enabled'] ) {
        if ( $GLOBALS['post']->ID == get_the_ID() ) {
            return prefix_insert_after_paragraph( $ad_code, $gal_option['galins'], $content );
        }
    }    
        return $content;
    }, 12
); */

/* $relmeta = Khobish_Helper::king_buildermeta_to_string($settings['metaf']);

$rel_option = [

    'id' => $id,  
    'label' => $settings['related_label'],
    'meta' => $relmeta,
    'img'=> $settings['imgf'],
    'relhidethumb'=> $settings['relhidethmb'],
    'enabled' => $settings['postrel'],
];

add_filter( 'the_content', function( $content ) use ( $rel_option ) {

    $ad_code = khb_related_post($rel_option);
 
    if ( is_single() && $rel_option['enabled'] ) {
        if ( $GLOBALS['post']->ID == get_the_ID() ) {
            return prefix_insert_after_paragraph( $ad_code, 8, $content );
        }
    }    
        return $content;
    }, 12
);

$rev_option = [

    'id' => $id, 
    'proicon' => $settings['revproic'],
    'conicon' => $settings['revconic'],
    'enabled' => $settings['posreview'],
];

add_filter( 'the_content', function( $content ) use ( $rev_option ) {

    $ad_code = khb_review_post($rev_option);

    if ( is_single()&& $rev_option['enabled'] ) {
        if ( $GLOBALS['post']->ID == get_the_ID() ) {
            return prefix_insert_after_paragraph( $ad_code, 1, $content );
        }
    }    
        return $content;
    }, 12
); */


echo '<div class="content-builder '.$settings['dropcap'].'">';
$args = array(
  'p' => $id, // ID of a page, post, or custom type
  'post_type' => 'post',
  //'posts_per_page' => 1,
);
//echo khb_floating_social($id,$settings['floatshare']);
 
$loop = new WP_Query($args);     
if ($loop->have_posts()) : ?>
        <?php while ($loop->have_posts()) : $loop->the_post(); ?>
        <?php the_content(); ?>
        <?php endwhile; ?>

        <?php wp_reset_postdata(); ?>
        
<?php endif;

echo '</div>';?>
