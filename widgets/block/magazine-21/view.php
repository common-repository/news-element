<?php
	use News_Element\Khobish_Helper;
 
		$cat = explode(',' , Khobish_Helper::king_buildermeta_to_string($settings['terms']));
		$per_page = $settings['post_perpage']['size'];
		$template = 'magazine-21/index'; 
    $metaf = Khobish_Helper::king_buildermeta_to_string($settings['metaf']);
    $metar = Khobish_Helper::king_buildermeta_to_string($settings['metar']);
    $imgf = $settings['imgf'];
    $imgr = $settings['imgr'];
    $excerptf = $settings['excerptf']['size'];
    $excerptr = $settings['excerptt']['size'];
    $query_args = Khobish_Helper::query_arg($settings);
    $options = Khobish_Helper::filter_options ($template,$settings);

    $filters = Khobish_Helper::filter_nav_label($settings);
		
		$wp_query = new WP_Query($query_args);
		$post_count = $wp_query->post_count;
		$post_found = $wp_query->found_posts;
		
		Khobish_Helper::xlmag_filter_nav($filters,$options,$cat);
						
			echo'<div class="khbmag21">';
			
			echo '<div class="khobish-ajax-wrap">'; ?>
            <?php
                if( $wp_query->have_posts() ) :
                    $post_count = 0;while( $wp_query->have_posts() ) :
                        $wp_query->the_post();$post_count++;
                        if ($post_count % 3 == 1){
                        ?>

                        <article class="post-item bgtitle <?php echo Khobish_Helper::xl_post_format_icon();?>">
                        <?php if ( has_post_thumbnail() ) : ?>
                            <div class="ft-thumbwrap">
                              <a href="<?php the_permalink();?>">
                                <span class="icon"></span>
                                <?php the_post_thumbnail($imgf);?>
                              </a>
                              <?php echo Khobish_Helper::khobish_single_category_bg();?>
                            </div>
                        <?php endif; ?>
     
                          <div class="excerpt-wrap">
                            <?php Khobish_Helper::ae_build_postmeta($metaf,$excerptf);?>                        
                          </div>            

                        </article> 
                 
                        <?php } else { ?>

                        <article class="post-item smtitle <?php echo Khobish_Helper::xl_post_format_icon();?>">
                        <?php if ( has_post_thumbnail() ) : ?>
                            <div class="ft-thumbwrap">
                              <a href="<?php the_permalink();?>">
                                <span class="icon"></span>
                                <?php the_post_thumbnail($imgr);?>
                              </a>
                              <?php echo Khobish_Helper::khobish_single_category_bg();?>
                            </div>
                        <?php endif; ?>
     
                          <div class="excerpt-wrap">
                            <?php Khobish_Helper::ae_build_postmeta($metar,$excerptr);?>                        
                          </div>            

                        </article> 

                       <?php }

                    endwhile;
                    wp_reset_postdata();
                endif;
            ?>  

			<?php echo '</div>';

			echo Khobish_Helper::xl_ajax_pagination($settings['pagination'],$post_count,$post_found);
			echo '</div>';
		echo '</div>';?>	
