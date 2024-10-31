<?php
namespace News_Element\Widgets;
use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Border;
use Elementor\Group_Control_Background;
use Elementor\utils;
use News_Element\Khobish_Helper;

if (!defined('ABSPATH'))
    exit; // Exit if accessed directly

class khb_promobx extends Widget_Base {

    public function get_name() {
        return 'khb_prbx';
    }

    public function get_title() {
        return   esc_html__('Promo Box', 'news-element');
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

        $repeater1 = new \Elementor\Repeater();

        $repeater1->add_control(
            'label', [
                'label' =>   esc_html__( 'Label', 'news-element' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
            ]
        );

        $repeater1->add_control(
            'sub', [
                'label' =>   esc_html__( 'Sub title', 'news-element' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
            ]
        );

        $repeater1->add_control(
            'url', [
                'label' =>   esc_html__('Link', 'news-element'),
                'type' => Controls_Manager::URL,
                'label_block' => true,
                'placeholder' =>   esc_html__('http://your-link.com', 'news-element'),
            ]
        );

        $repeater1->add_control(
            'img',
            [
                'label' =>   esc_html__('Image', 'news-element'),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $this->add_control(
            'items',
            [
                'type' => Controls_Manager::REPEATER,
                'fields' => $repeater1->get_controls(),
                'prevent_empty' => false,
                'default' => [
                    [
                        'label' =>   esc_html__( 'Home', 'news-element' ),
                    ]
                ],
                'title_field' => '{{label}}',
            ]
        );

        $this->add_control(
            'size',
            [
                'label' => __('Image size', 'news-element'),
                'type' => Controls_Manager::SELECT,
                'label_block' => true,
                'options' =>  Khobish_Helper::ae_image_size_choose(),
                'multiple' => false,
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
            'width',
            [
                'label' =>   esc_html__( 'Column width', 'news-element' ),
                'type' =>  Controls_Manager::NUMBER,
                'default' => '33.33',
                 'selectors' => [
                        '{{WRAPPER}} .inr li' => 'width: {{VALUE}}%;',
                 ],
            ]
        );

        $this->add_responsive_control(
            'gitsp',
            [
                'label' => __( 'Grid spacing', 'news-element' ),
                'type' =>  Controls_Manager::SLIDER,
                'selectors' => [
                    '{{WRAPPER}} .inr li' => 'padding: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .inr' => 'margin-right: -{{SIZE}}{{UNIT}};margin-left: -{{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'cpclr',
            [
                'label' =>   esc_html__( 'Border color', 'news-element' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .ovly' => 'border-color: {{VALUE}};'
                ],
            ]
        );


        $this->add_responsive_control(
            'bdrsp',
            [
                'label' => __( 'Border spacing', 'news-element' ),
                'type' =>  Controls_Manager::SLIDER,
                'selectors' => [
                    '{{WRAPPER}} .ovly' => 'top: {{SIZE}}{{UNIT}};bottom: {{SIZE}}{{UNIT}};left: {{SIZE}}{{UNIT}};right: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'thmwidg',
            [
                'label' => __( 'Height', 'news-element' ),
                'type' =>  Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 800,
                        'step' => 1,
                    ]
                ],
                'size_units' => ['px'],
                'selectors' => [
                    '{{WRAPPER}} .khobish-promobox .inrwrp' => 'height: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
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
                    '{{WRAPPER}} .ovly' => 'text-align: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'fr',
            [
                'label' => __( 'Background Overlay', 'plugin-name' ),
                'type' => Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'hovrg',
                'label' =>   esc_html__( 'Background', 'elementor' ),
                'types' => [ 'none', 'classic','gradient' ],
                'selector' => '{{WRAPPER}} .ovly:after',
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'section_title',
            [
                'label' =>   esc_html__('Title', 'news-element'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'stclr',
            [
                'label' => __( 'Color', 'news-element' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .label' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'stmr',
            [
                'label' => __('Margin', 'news-element'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .label' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ]
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'sttl',
                'label' => __('Typography', 'news-element'),
                'selector' => '{{WRAPPER}} .label',
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'section_sub',
            [
                'label' =>   esc_html__('Sub title', 'news-element'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'slr',
            [
                'label' => __( 'Color', 'news-element' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .subtitle' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'sr',
            [
                'label' => __('Margin', 'news-element'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .subtitle' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ]
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'stl',
                'label' => __('Typography', 'news-element'),
                'selector' => '{{WRAPPER}} .subtitle',
            ]
        );

        $this->end_controls_section();

    }

    protected function render() {
        $settings = $this->get_settings();
        require dirname(__FILE__) .'/view.php';
    }

    private function content($content,$size) {
        $out1 = '';
        foreach ($content as $item){

            $label = $item['label'] ? '<h3 class="label">'.$item['label'].'</h3>' : '';
            $sub = $item['sub'] ? '<p class="subtitle">'.$item['sub'].'</p>' : '';
            $cout = '<div class="khbcontent">'.$label.$sub.'</div>';
            $url = $item['url']['url'];
            $ext = $item['url']['is_external'];
            $nofollow = $item['url']['nofollow'];
            $img = Khobish_Helper::madmag_lazy_img($item['img']['id'],$size);
            $url = ( isset($url) && $url ) ? 'href='.esc_url($url). '' : '';
            $ext = ( isset($ext) && $ext ) ? 'target= _blank' : '';
            $nofollow = ( isset($url) && $url ) ? 'rel=nofollow' : '';
            $link = $url.' '.$ext.' '.$nofollow;
            $out1 .= '
                <li><div class="inrwrp"><div class="ovly">'.$cout.'</div>'.$img.'<a class="linksocial" '.$link.'></a></div></li>
            ';

        }

        return '<ul class="inr">'.$out1.'</ul>';
    }

}

 if ( defined( 'ELEMENTOR_VERSION' ) && version_compare( ELEMENTOR_VERSION, '3.5.0', '>=' ) ) {
    $widgets_manager->register(new \News_Element\Widgets\khb_promobx());
} else {
    $widgets_manager->register_widget_type(new \News_Element\Widgets\khb_promobx());
}