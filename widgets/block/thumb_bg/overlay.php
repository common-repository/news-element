<?php

	use News_Element\Khobish_Helper;
	use Elementor\Plugin; 

    $meta = Khobish_Helper::king_buildermeta_to_string($settings['metas']);

    if(Plugin::instance()->editor->is_edit_mode() || get_post_type()=='elementor_library'){

       $id = $settings['prev_id']; 
       $thumb = wp_get_attachment_image_src( get_post_thumbnail_id($id), $settings['img_size']);
       $thumb = $thumb[0];

    } else {

        global $wp_query; 
        $id = $wp_query->post->ID;
                
        $thumb = wp_get_attachment_image_src( get_post_thumbnail_id($id), $settings['img_size']); 
        $thumb = $thumb[0];
    }

    $thumb = ( isset($thumb) && $thumb ) ? 'background-image:url('.$thumb.');':'';
    $style = ( isset($thumb) && $thumb ) ? 'style='.$thumb . '' : '';
    echo '<div class="khbginr"><div class="bgpostthumb" '.$style.'><div class="overlaymeta"><div class="inr">';
      Khobish_Helper::ae_build_postmeta($meta,$ex='');
    echo '</div></div>';
    echo '</div></div>';
?>
 
        
