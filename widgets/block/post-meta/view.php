<?php
use News_Element\Khobish_Helper;
$meta = Khobish_Helper::king_buildermeta_to_string($settings['metas']);
?>

    <div class="khobish-single-meta <?php echo $settings['emphasis'];?>">
        <div class="inr">
        <?php Khobish_Helper::ae_build_postmeta($meta,0);?>
        </div>
    </div>
