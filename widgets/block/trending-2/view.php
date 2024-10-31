<?php
	use News_Element\Khobish_Helper;

		$cat = explode(',' , Khobish_Helper::king_buildermeta_to_string($settings['terms']));
		$per_page = $settings['post_perpage']['size'];
		$template = 'trending-2/index';

    $metaf = Khobish_Helper::king_buildermeta_to_string($settings['metaf']);
    $excerptf = $settings['excerptf']['size'];

		$query_args = Khobish_Helper::query_arg($settings);
		$options = Khobish_Helper::filter_options ($template,$settings);
		$filters = Khobish_Helper::filter_nav_label($settings);
		$wp_query = new WP_Query($query_args);
		$post_count = $wp_query->post_count;
		$post_found = $wp_query->found_posts;
		$i = 0;
		$paged = '';
		Khobish_Helper::xlmag_filter_nav($filters,$options,$cat);
			echo'<div class="magazine-1 trending-post-2">';			
			echo '<div class="khobish-ajax-wrap rest">'; ?>
            <?php

                if( $wp_query->have_posts() ) :
                    while( $wp_query->have_posts() ) :
                        $wp_query->the_post();$i++;    
                        if (($wp_query->current_post +1) == ($wp_query->post_count)) {
                          //$last_cls = 'last-class';
                        }
                        ?>

                            <div class="anim-fade">
                                <article class="post-item <?php echo Khobish_Helper::xl_post_format_icon();?>">
                                    <div class="excerpt-wrap">
                                      <?php Khobish_Helper::ae_build_postmeta($metaf,0);?>                       
                                    </div>
                                    <?php Khobish_Helper::counter($per_page,$paged,$i);?>
                                </article> 
                            </div>
                        <?php   
                    endwhile;
                    wp_reset_postdata();
                endif;
            ?>  

			<?php echo '</div>';

			echo Khobish_Helper::xl_ajax_pagination($settings['pagination'],$post_count,$post_found);
			echo '</div>';

		
		echo '</div>';?>
