<?php
use News_Element\Khobish_Helper;

$args2 = array(
    'menu'            => $settings['menu2'],
    'fallback_cb'     => '',
    'container'       => 'div',
    'container_class' => 'xlmega-menu-container',
    'menu_class'      => 'htmega-megamenu',
    'items_wrap'      => $items_wrap,
    'walker'          => new \News_Element_Nav_Walker(),
);

?> 
<div class="menubarwrp">
    <div class="header-flex-wrapper khbnav menubar menu-logo-menu">
        <div class="khbnavleft">
            <div class="leftwrpr">                
                <?php wp_nav_menu( $args );?>
            </div>
        </div>    

        <div class="khbnavcenter">
            <div class="listinr">
              <?php echo Khobish_Helper::thepack_get_builder_image($settings['logo']['url'],'logotb');?>
            </div> 
        </div>

        <div class="khbnavright">
            <div class="inrwrpr">
                <?php wp_nav_menu( $args2 );?>
            </div>    
        </div>    

    </div>
</div>
