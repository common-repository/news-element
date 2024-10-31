<?php
use News_Element\Khobish_Helper;
$search = $settings['searchicon']['value'] ? '<span class="search-toggle"><i class="'.$settings['searchicon']['value'].'"></i></span>' : '';        
?> 
<div class="xlm-center-logo">
    <div class="header-flex-wrapper khbnav">
        <div class="khbnavleft">
            <div class="leftwrpr">
                <?php echo $this->out_subs_btn($settings['sub-btn'],$settings['sub-link']);?>
            </div>
        </div>     

        <div class="khbnavcenter">
            <div class="listinr">
              <?php echo Khobish_Helper::thepack_get_builder_image($settings['logo']['url'],'logotb');?>
            </div> 
        </div>

        <div class="khbnavright">
            <div class="inrwrpr">
                <span class="search-toggle"><?php echo $search;?></span>
            </div>    
        </div>    
 
    </div>
</div>