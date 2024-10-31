<?php
if (empty($settings['lists']))
    return;

?>
<div class="khb-socialwrap">
    <ul class="xl-social-follow style-three">
        <?php
        foreach ($settings['lists'] as $a) :
            $icon = $a['icon']['value'];
            $url = (empty($a['url']['url'])) ? ' ' : esc_url($a['url']['url']);
            $target = $a['url']['is_external'] ? 'target="_blank"' : '';  
            $style = $a['color'] ? 'style="color:'.$a['color'].'"' : ''; 
            $count = $a['count'] ? '<span class="count">'.$a['count'].'</span>' : '';
            $sub = $a['sub'] ? '<span class="sub">'.$a['sub'].'</span>' : ''; 
            $txt = '<span class="txt-wrap">'.$count.$sub.'</span>';    
            ?>
            <li><a <?php echo $target;?> href="<?php echo $url;?>"><i <?php echo $style ?> class="<?php echo $icon;?>" aria-hidden="true"></i><?php echo $txt;?></a></li>

            <?php endforeach;?>

    </ul>    
</div>