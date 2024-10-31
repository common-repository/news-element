<?php
	use News_Element\Khobish_Helper;
    use Elementor\Plugin; 

	$cat = $settings['previewcat'];
    $metaf = Khobish_Helper::king_buildermeta_to_string($settings['metaf']);
    $imgf = $settings['imgf'];
    $excerptf = $settings['excerptf']['size'];
    $thmbcls = $settings['thmbps'];
    $per_page = $settings['prevposts']['size']; 
    
	$query_args = array(
		'post_type' 			=> 'post',
		'posts_per_page' => $per_page,
		'post_status' 			=> 'publish',
        'tax_query' => array(
            array(
                'taxonomy' => 'category',
                'field' => 'term_id',
                'terms' => $cat,
            ) ,
        ) ,			
	);
 
	$wp_query = new WP_Query($query_args);
	$post_count = $wp_query->post_count;
	$post_found = $wp_query->found_posts;

    if (Plugin::instance()->editor->is_edit_mode() || get_post_type()=='elementor_library'){ 
        require dirname(__FILE__) .'/page-mode.php';
    } else {
        require dirname(__FILE__) .'/archive-mode.php';
    }
?> 	

