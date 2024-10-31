<?php
use News_Element\Khobish_Helper;
$i = 0;
?>

<div class="herogrid24">

  <?php
      if( $wp_query->have_posts() ) :
          while( $wp_query->have_posts() ) :
              $wp_query->the_post();
              if( $i == 0|| $i == 1 ) :
              ?>

                <div class="fw-col-md-4 secondblock">
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
        <div class="fw-col-md-4 firstblock">
        <?php 
            if( $wp_query->have_posts() ) :
                while( $wp_query->have_posts() ) :
                    $wp_query->the_post();
                    if( $i > 2) : 
                    ?> 

                    <div class="post-item ">
                      <?php if ( has_post_thumbnail() ) : ?>
                          <div class="ft-thumbwrap">
                            <a href="<?php the_permalink();?>">
                              <span class="icon"></span>
                              <?php the_post_thumbnail($settings['img_size']);?>
                            </a>               
                          </div>
                      <?php endif; ?>

                      <div class="excerpt-wrap">
                        <?php Khobish_Helper::ae_build_postmeta($metaf,$settings['excerpt']['size']);?>                        
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

</div> 

