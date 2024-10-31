<?php
use News_Element\Khobish_Helper;
$column = Khobish_Helper::fw_grid_col( $col_num );
// The Loop
if( $wp_query->have_posts() ) :
  echo '<ul class="timeline-widget">';
    $post_count = 0;while( $wp_query->have_posts() ) :
        $wp_query->the_post();$post_count++;
        ?>

            <li class="anim-fade">
                <article class="post-item">
        <?php //echo Khobish_Helper::khobish_posted_on();?>
                  <div class="excerpt-wrap">
                    <?php Khobish_Helper::ae_build_postmeta($metaf,$excerptf);?>                       
                  </div>

                </article> 
            </li>
        <?php   
    endwhile;
    wp_reset_postdata();
    echo '</div>';
endif;