<?php
use News_Element\Khobish_Helper;
       
?> 
<div class="menubarwrp">
    <div class="header-flex-wrapper khbnav menubar">
        <div class="khbnavleft">
            <div class="leftwrpr">
            </div>
        </div>    

        <div class="khbnavcenter">
            <div class="listinr">
              <?php wp_nav_menu( $args );?>
            </div> 
        </div>

        <div class="khbnavright">
            <div class="inrwrpr">
            </div>    
        </div>    
    </div>
</div> 