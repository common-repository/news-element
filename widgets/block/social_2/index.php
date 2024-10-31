<?php
namespace News_Element\Widgets;
use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Border;
use Elementor\utils;

if (!defined('ABSPATH'))
    exit; // Exit if accessed directly

class khobish_socia2 extends Widget_Base {

    public function get_name() {
        return 'khb_socia2';
    }

    public function get_title() {
        return   esc_html__('Social 2', 'news-element');
    }

    public function get_icon() {
        return 'dashicons dashicons-editor-paragraph';
    }

    public function get_categories() {
        return [ 'khobish-element' ];
    }

    protected function register_controls() {

        $this->start_controls_section(
            'section_process_1',
            [
                'label' =>   esc_html__('Content', 'news-element'),
            ]
        );

        $this->add_control(
            'type',
            [
                'label' => __('Show as', 'news-element'),
                'type' => Controls_Manager::CHOOSE,
                'default' => 'style_one',
                'options' => [

                    'style_one' => [
                        'title' => __('One', 'news-element'),
                        'icon' => 'eicon-folder',
                    ],
                    'style_two' => [
                        'title' => __('Two', 'news-element'),
                        'icon' => 'eicon-lightbox',
                    ],
                ],
            ]
        );

        $repeater1 = new \Elementor\Repeater();

        $repeater1->add_control(
            'icon', [
                'label' =>   esc_html__( 'Icon', 'news-element' ),
                'type' => Controls_Manager::ICONS,
				'default'     => [
					'value'   => 'fas fa-search',
					'library' => 'solid',
				], 
            ]
        ); 

        $repeater1->add_control(
            'text', [
                'label' =>   esc_html__( 'Label', 'news-element' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default' => 'facebook',
            ]
        );

        $repeater1->add_control(
            'color', [
                'label' =>   esc_html__('Theme', 'news-element'),
                'type' => Controls_Manager::COLOR,
            ]
        );

        $repeater1->add_control(
            'url', [
                'label' =>   esc_html__('Social link url', 'news-element'),
                'type' => Controls_Manager::URL,
                'label_block' => true,
                'placeholder' =>   esc_html__('http://your-link.com', 'news-element'),
            ]
        );

        $this->add_control(
            'items',
            [
                'type' => Controls_Manager::REPEATER,
                'fields' => $repeater1->get_controls(),
                'prevent_empty' => false,
                'title_field' => '{{{ elementor.helpers.renderIcon( this, icon, {}, "i", "panel" ) || \'<i class="{{ icon }}" aria-hidden="true"></i>\' }}}',
            ]
        );


        $this->end_controls_section();

        $this->start_controls_section(
            'section_lbl',
            [
                'label' =>   esc_html__('General', 'news-element'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_responsive_control(
            'align',
            [
                'label' =>   esc_html__('Alignment', 'news-element'),
                'type' => Controls_Manager::CHOOSE,
                'options' => [
                    'left' => [
                        'title' =>   esc_html__('Left', 'news-element'),
                        'icon' => 'eicon-text-align-left',
                    ],
                    'center' => [
                        'title' =>   esc_html__('Center', 'news-element'),
                        'icon' => 'eicon-text-align-center',
                    ],
                    'right' => [
                        'title' =>   esc_html__('Right', 'news-element'),
                        'icon' => 'eicon-text-align-right',
                    ]
                ],
                'selectors' => [
                    '{{WRAPPER}} .khbsocial2wrap ul' => 'text-align: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'ibgcol',
            [
                'label' =>   esc_html__('Background', 'news-element'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .khbicon' => 'background: {{VALUE}} !important;',
                ],
            ]
        );

        $this->add_control(
            'icol',
            [
                'label' =>   esc_html__('Color', 'news-element'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .khbicon' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'ibghcol',
            [
                'label' =>   esc_html__('Background hover color', 'news-element'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .khbicon:hover' => 'background: {{VALUE}} !important;',
                ],
            ]
        );

        $this->add_control(
            'icohl',
            [
                'label' =>   esc_html__('Hover Color', 'news-element'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .khbicon:hover' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'ifs',
            [
                'label' =>   esc_html__( 'Social font size', 'news-element' ),
                'type' =>  Controls_Manager::SLIDER,
                'selectors' => [
                    '{{WRAPPER}} .khbicon' => 'font-size:{{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'iwid',
            [
                'label' =>   esc_html__( 'Icon width & height', 'news-element' ),
                'type' =>  Controls_Manager::SLIDER,
                'selectors' => [
                    '{{WRAPPER}} .khbnolabel .linksocial' => 'width:{{SIZE}}{{UNIT}};height:{{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .khblabel .khbicon' => 'width:{{SIZE}}{{UNIT}};height:{{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'iwspv',
            [
                'label' =>   esc_html__( 'Icon spacing', 'news-element' ),
                'type' =>  Controls_Manager::SLIDER,
                'selectors' => [
                    '{{WRAPPER}} .khbsocial2wrap li' => 'padding-left:{{SIZE}}{{UNIT}};padding-right:{{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .khbsocial2wrap ul' => 'margin-left:-{{SIZE}}{{UNIT}};margin-right:-{{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'ilt',
            [
                'label' =>   esc_html__( 'Line-height', 'news-element' ),
                'type' =>  Controls_Manager::SLIDER,
                'selectors' => [
                    '{{WRAPPER}} .khbicon' => 'line-height:{{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'btbdr',
                'label' =>   esc_html__( 'Border', 'news-element' ),
                'selector' => '{{WRAPPER}} .khbnolabel .linksocial,{{WRAPPER}} .khblabel .khbicon',
            ]
        );

        $this->add_responsive_control(
            'ibrad',
            [
                'label' =>   esc_html__( 'Border radius', 'news-element' ),
                'type' =>  Controls_Manager::SLIDER,
                'selectors' => [
                    '{{WRAPPER}} .khbnolabel .linksocial,{{WRAPPER}} .khblabel .khbicon' => 'border-radius:{{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();

         $this->start_controls_section(
            'section_lblf',
            [
                'label' => __('Label', 'news-element'),
                'tab' => Controls_Manager::TAB_STYLE,
                'condition'     => [
                    'type' => 'style_two',
                ],
            ]
        );

        $this->add_responsive_control(
            'leftlmar',
            [
                'label' => __('Text left spacing', 'news-element'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'selectors' => [
                    '{{WRAPPER}} .khblabel .khbicon' => 'margin-right: {{SIZE}}{{UNIT}};',
                ]
            ]
        );

        $this->add_control(
            'txtclr',
            [
                'label' =>   esc_html__('Color', 'news-element'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .khbtxt' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'lblty',
                'selector' => '{{WRAPPER}} .khbtxt',
                'label' => __( 'Typography', 'news-element' ),
            ]
        );

        $this->end_controls_section();

    }

    protected function render() {
        $settings = $this->get_settings();
        require dirname(__FILE__) .'/'. sanitize_key($settings['type']) .'.php';
    }


    private function content($content,$type) {
        $out1 = '';
        foreach ($content as $item){

            $url = $item['url']['url'];
            $ext = $item['url']['is_external'];
            $nofollow = $item['url']['nofollow'];

            $url = ( isset($url) && $url ) ? 'href='.esc_url($url). '' : '';
            $ext = ( isset($ext) && $ext ) ? 'target= _blank' : '';
            $nofollow = ( isset($url) && $url ) ? 'rel=nofollow' : '';
            $link = $url.' '.$ext.' '.$nofollow;
            $bgclr = $item['color'] && $type=='style_one' ? 'style=background:'.$item['color'].';' : '';
            $label = $item['text'] ? '<span class="khbtxt">'.$item['text'].'</span>' : '';
            $out1 .= '
                <li><a '.$bgclr.' class="linksocial" '.$link.'>
                    <span class="khbicon '.$item['icon']['value'].'"></span>'.$label.'
                </a></li>
            ';

        }

        return '<ul>'.$out1.'</ul>';
    }

}

 if ( defined( 'ELEMENTOR_VERSION' ) && version_compare( ELEMENTOR_VERSION, '3.5.0', '>=' ) ) {
    $widgets_manager->register(new \News_Element\Widgets\khobish_socia2());
} else {
    $widgets_manager->register_widget_type(new \News_Element\Widgets\khobish_socia2());
}
