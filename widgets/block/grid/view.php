<?php
	use News_Element\Khobish_Helper;

		$cat = explode(',' , Khobish_Helper::king_buildermeta_to_string($settings['terms']));
		$per_page = $settings['post_perpage']['size'];
		$template = 'grid-a';

    $col_num = $settings['column']['size'];
    $column = Khobish_Helper::fw_grid_col( $col_num );
    $metaf = Khobish_Helper::king_buildermeta_to_string($settings['metaf']);
    $imgf = $settings['imgf'];
    $excerptf = $settings['excerptf']['size'];

    $options = Khobish_Helper::filter_options ($template,$settings);
    $filters = Khobish_Helper::filter_nav_label($settings);
    $query_args = Khobish_Helper::query_arg($settings);
		
		$wp_query = new WP_Query($query_args);
		$post_count = $wp_query->post_count;
		$post_found = $wp_query->found_posts;
		 
		Khobish_Helper::xlmag_filter_nav($filters,$options,$cat);
			
			
			echo'<div class="khbgrid line-clip">';
			
			echo '<div class="khobish-ajax-wrap no-margin">'; ?>
            <?php
                if( $wp_query->have_posts() ) :
                    $post_count = 0;while( $wp_query->have_posts() ) :
                        $wp_query->the_post();$post_count++;
                        ?>

                        <div class="<?php echo $column; ?> anim-fade">
                            
                            <article class="post-item <?php echo Khobish_Helper::xl_post_format_icon();?>">
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
                            
                        </div>
                        <?php  if( $post_count % $col_num == 0 ){echo '<div class="clear"></div>';}?>
                        <?php   
                    endwhile;
                    wp_reset_postdata();
                endif;
            ?>  

			<?php echo '</div>';

			echo Khobish_Helper::xl_ajax_pagination($settings['pagination'],$post_count,$post_found);
			echo '</div>';
		echo '</div>';?>


