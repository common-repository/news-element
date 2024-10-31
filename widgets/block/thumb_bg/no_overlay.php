<?php

    use Elementor\Plugin; 

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
    
    $thumb = ( isset($thumb) && $thumb ) ? 'background-image:url('.$thumb.');height:500px;':'';
    $style = ( isset($thumb) && $thumb ) ? 'style='.$thumb . '' : '';
    echo '<div class="bgpostthumb" '.$style.'>';
    echo '</div>';

?>
      