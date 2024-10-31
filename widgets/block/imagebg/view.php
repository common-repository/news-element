<?php
	use News_Element\Khobish_Helper;

		$cat = explode(',' , Khobish_Helper::king_buildermeta_to_string($settings['terms']));
		$per_page = $settings['post_perpage']['size'];
        $template = 'imagebg/'.$settings['tmpl'].'';
        $metaf = Khobish_Helper::king_buildermeta_to_string($settings['metaf']);
        $imgf = $settings['imgf'];
        $excerptf = $settings['excerptf']['size'];

        $metar = Khobish_Helper::king_buildermeta_to_string($settings['metar']);
        $imgr = $settings['imgr'];
        $excerptr = $settings['excerptr']['size'];

        $options = Khobish_Helper::filter_options ($template,$settings);
        $filters = Khobish_Helper::filter_nav_label($settings);
        $query_args = Khobish_Helper::query_arg($settings);
		
        $designcls = $settings['tmpl'];

		$wp_query = new WP_Query($query_args);
		$post_count = $wp_query->post_count;
		$post_found = $wp_query->found_posts;
		
		Khobish_Helper::xlmag_filter_nav($filters,$options,$cat);
						
		echo'<div class="bgimgwrp '.$designcls.'">';?>
		
        <?php require dirname(__FILE__) .'/'. sanitize_key($settings['tmpl']) .'.php';?>    
 
		<?php echo Khobish_Helper::xl_ajax_pagination($settings['pagination'],$post_count,$post_found);
		echo '</div>';		
		echo '</div>';?>
	
