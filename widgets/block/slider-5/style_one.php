<?php
	use News_Element\Khobish_Helper;
?>

  <div  class="swiper-slide">
     <div class="inrwrapper">  
      <?php if ($post_count % 2 == 1){?>

      <div class="ft-thumbwrap even <?php echo Khobish_Helper::xl_post_format_icon();?>">
        <a href="<?php the_permalink();?>">
          <span class="khbmedia icon"></span>
          <?php the_post_thumbnail($imgf);?>
        </a>
        <?php echo Khobish_Helper::khobish_single_category_bg();?>
      </div> 

      <div class="excerpt-wrap">
        <div class="inrexcerpt">
          <?php Khobish_Helper::ae_build_postmeta($metaf,$excerpt);?>
        </div>
      </div>

      <?php } else { ?>

      <div class="excerpt-wrap">
        <div class="inrexcerpt">
          <?php Khobish_Helper::ae_build_postmeta($metaf,$excerpt);?>
        </div>
      </div>

      <div class="ft-thumbwrap odd <?php echo Khobish_Helper::xl_post_format_icon();?>">
        <a href="<?php the_permalink();?>">
          <span class="khbmedia icon"></span>
          <?php the_post_thumbnail($imgf);?>
        </a>
        <?php echo Khobish_Helper::khobish_single_category_bg();?>
      </div> 

      <?php } ?>                                              
    </div>
  </div>
                  