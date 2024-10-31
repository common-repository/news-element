<?php

use News_Element\Khobish_Helper;
    $output = '';
    $icon = $settings['icon']['value'] ? '<i class="khbicon '.$settings['icon']['value'].'" aria-hidden="true"></i>  ' : '';
    foreach ( $settings['taxi'] as $item ) {

        $term = get_term((int)$item['meta']);
        $link = get_term_link((int)$item['meta']);
        if ( is_wp_error( $link ) ) {
            echo $link->get_error_message();
        } else {
            $meta = get_term_meta((int)$item['meta']);
            $count = $term->count;
            $tax_img = Khobish_Helper::khobish_tax_image($term,$settings['img']);
            $builder_img = Khobish_Helper::madmag_lazy_img($item['img']['id'],$settings['img']);
            $img = $builder_img ? $builder_img : $tax_img;
            $bgcolor = $item['color'] ? 'style=background:'.$item['color']. ';' : '';

            $output .='<article><div class="inr"><a class="bgtax-2" href="'.$link.'">'.$img.'<div class="taxdescription"><div class="wrapinr"><h3 class="title">'.$icon.$term->name.'</h3><span '.$bgcolor.' class="taxnum">'.$count.' '.$settings['prefix'].'</span></div></div></a></div></article>';

        }
    }

    echo '<div class="khbtaxlist3">'.$output.'</div>';

?>