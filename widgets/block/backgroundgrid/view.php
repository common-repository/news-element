<?php
	use News_Element\Khobish_Helper;

        $cat = explode(',' , Khobish_Helper::king_buildermeta_to_string($settings['terms']));
		$template = 'backgroundgrid/index'; 
        $metaf = Khobish_Helper::king_buildermeta_to_string($settings['metaf']);
        $imgf = $settings['imgf'];
        $excerptf = $settings['excerptf']['size'];

        $query_args = Khobish_Helper::query_arg($settings);
		$options = Khobish_Helper::filter_options ($template,$settings);
		$filters = Khobish_Helper::filter_nav_label($settings);
		$wp_query = new WP_Query($query_args);
		$post_count = $wp_query->post_count;
		$post_found = $wp_query->found_posts;

		$post_array =['2','3','6','7','10','11','14','15','18','19','22','23','26','27','30','31'];

		Khobish_Helper::xlmag_filter_nav($filters,$options,$cat);
						
			echo'<div class="khobishbackgroundwrp">';
			
			echo '<div class="khobish-ajax-wrap">'; ?>
            <?php
                if( $wp_query->have_posts() ) :
                    $post_count = 0;while( $wp_query->have_posts() ) :
                        $wp_query->the_post();$post_count++;
                        if (in_array($post_count, $post_array)){
                          $cls = 'khbsmgrid';
                        } else {
                          $cls = '';
                        }                        
                        ?>
                        <div class="photonegrid <?php echo $cls;?>">
                            <div class="inr">
                                <div class="bgholder lazyload" <?php echo Khobish_Helper::madmag_bg_images($imgf); ?>>
                                    <div class="khboverlaythumb"><?php echo Khobish_Helper::khobish_single_category_bg();?></div>
                                    <a href="<?php the_permalink();?>" class="khbhvr"></a>  
                                    <div class="metawrpr">                          
                                        <?php Khobish_Helper::ae_build_postmeta($metaf,$excerptf);?>  
                                    </div>                           
                                </div>
                            </div>
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
	
