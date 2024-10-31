<?php
use News_Element\Khobish_Helper;
       
?> 
<div class="xlm-logo-ad">
    <div class="header-flex-wrapper khbnav">
        <div class="khbnavleft khbnormal">
            <div class="leftwrpr">
                <?php echo Khobish_Helper::thepack_get_builder_image($settings['logo']['url'],'logotb');?>
            </div>
        </div>    

        <div class="khbnavcenter">
            <div class="listinr">
              
            </div> 
        </div>

        <div class="khbnavright">
            <div class="inrwrpr">
                <?php echo Khobish_Helper::thepack_process_ads($settings['ad']['id'],$settings['adurl']);?>
            </div>    
        </div>    

    </div>
</div>
