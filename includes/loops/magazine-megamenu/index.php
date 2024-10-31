<?php
use News_Element\Khobish_Helper;

// The Loop
if ( $wp_query->have_posts() ) {
	while ( $wp_query->have_posts() ) {
		$wp_query->the_post();
		?>
            <div class="fw-col-md-3">
                <article class="post-item <?php echo Khobish_Helper::xl_post_format_icon();?>">

                        <?php if ( has_post_thumbnail() ) : ?>
                            <div class="ft-thumbwrap">
                              <a href="<?php the_permalink();?>">
                                <?php the_post_thumbnail($imgf);?>
                              </a>
                              <div class="khboverlaythumb"><?php echo Khobish_Helper::khobish_single_category_bg();?></div>
                            </div>
                        <?php endif; ?>
                      <div class="excerpt-wrap">
                        <?php Khobish_Helper::ae_build_postmeta($metaf,$excerptf);?>

                      </div>
                </article>
            </div>

	 <?php } wp_reset_postdata(); } else {
	//echo 'No Loadmore';
}