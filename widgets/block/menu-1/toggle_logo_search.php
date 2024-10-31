<?php
use News_Element\Khobish_Helper;
$toggle = $settings['tapicon']['value'] ? '<span class="navbar-toggle"><i class="'.$settings['tapicon']['value'].'"></i></span>' : '';
$search = $settings['searchicon']['value'] ? '<span class="search-toggle"><i class="'.$settings['searchicon']['value'].'"></i></span>' : '';
?>  
<div class="menubarwrp">
    <div class="header-flex-wrapper khbnav menubar">
        <div class="khbnavleft">
            <div class="leftwrpr">
            	<?php echo $toggle;?>
            </div>
        </div>    

        <div class="khbnavcenter">
            <div class="listinr">
              <?php echo Khobish_Helper::thepack_get_builder_image($settings['logo']['url'],'logotb');?>
            </div> 
        </div>

        <div class="khbnavright">
            <div class="inrwrpr">
                <?php echo $search;?>
            </div>    
        </div>    

    </div>
</div>