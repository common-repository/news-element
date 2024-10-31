<?php
use News_Element\Khobish_Helper;
$search = $settings['searchicon']['value'] ? '<span class="search-toggle"><i class="'.$settings['searchicon']['value'].'"></i></span>' : '';   
?>  

<div class="menubarwrp">
    <div class="header-flex-wrapper khbnav menubar">
        <div class="khbnavleft leftlogomenu">
            <div class="leftwrpr">
            	<?php echo Khobish_Helper::thepack_get_builder_image($settings['logo']['url'],'logotb');?>
                <?php wp_nav_menu( $args );?>
            </div>
        </div>    

        <div class="khbnavcenter">
            <div class="listinr">
              
            </div> 
        </div>

        <div class="khbnavright">
            <div class="inrwrpr">
                <span class="search-toggle"><?php echo $search;?></span>
            </div>    
        </div>    

    </div>
</div>