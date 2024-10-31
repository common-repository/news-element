<?php
use News_Element\Khobish_Helper;
$i = 0;
?>

<div class="herogrid29 line-clip">

  <?php
      if( $wp_query->have_posts() ) :
          while( $wp_query->have_posts() ) :
              $wp_query->the_post();
              if( $i == 0) :
              ?>

                <div class="fw-col-md-12 firstblock">
                  <div class="inrwrp lazyload" <?php echo Khobish_Helper::madmag_bg_images($settings['img_size']); ?>>  
                  <div class="khboverlaythumb"><?php echo Khobish_Helper::khobish_single_category_bg();?></div>
                      <div class="excerpt-wrap">
                        <?php Khobish_Helper::ae_build_postmeta($metaf,$settings['excerpt']['size']);?>                        
                      </div> 
                  </div>
                </div>

              <?php   
              endif;
              $i = $i + 1;
          endwhile;
          $i = 1;
          wp_reset_postdata();
      endif;
  ?>

        <?php 
            if( $wp_query->have_posts() ) :
                while( $wp_query->have_posts() ) :
                    $wp_query->the_post();
                    if( $i > 1) : 
                    ?> 
                    <div class="fw-col-md-6 secondblock">
                      <div class="inrwrp lazyload" <?php echo Khobish_Helper::madmag_bg_images($settings['img_sizes']); ?>>  
                      <div class="khboverlaythumb"><?php echo Khobish_Helper::khobish_single_category_bg();?></div>
                          <div class="excerpt-wrap">
                            <?php Khobish_Helper::ae_build_postmeta($metas,$settings['excerpts']['size']);?>                        
                          </div> 
                      </div>
                    </div>

                    <?php
                    endif;
                    $i = $i + 1;
                endwhile;
            $i = 1;
            wp_reset_postdata();
            endif;
        ?>
</div> 

