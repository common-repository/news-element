<?php
namespace News_Element\Widgets;
use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Background;
use Elementor\Group_Control_Border;
use Elementor\Utils;
use News_Element\Khobish_Helper;

if (!defined('ABSPATH'))
    exit;

class khbvidplaylist extends Widget_Base {

    public function get_name() {
        return 'khbvidplay';
    }

    public function get_title() {
        return __('Video Playlist', 'news-element');
    }

    public function get_icon() {
        return 'eicon-posts-group';
    }

    public function get_categories() {
        return array('khobish-element');
    }

    protected function register_controls() {

        $this->start_controls_section(
            'section_posts_carousel',
            [
                'label' => __('Content', 'news-element'),
            ]
        );
 
        $r1 = new \Elementor\Repeater();
        $r1->add_control(
            'meta', [
                'type' => Controls_Manager::TEXT,
                'label' => __('Urls', 'news-element'),
                'label_block' => true
            ]
        );

        $r1->add_control(
            'title', [
                'type' => Controls_Manager::TEXT,
                'label' => __('Title', 'news-element'),
                'label_block' => true
            ]
        );

        $r1->add_control(
            'duration', [
                'type' => Controls_Manager::TEXT,
                'label' => __('Duration', 'news-element'),
                'label_block' => true
            ]
        );

        $this->add_control(
            'urls',
            [
                'type' => Controls_Manager::REPEATER,
                'fields' => $r1->get_controls(),
                'prevent_empty' => false,
                'title_field' => '{{{ meta }}}',
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'section_style',
            [
                'label' => __('General', 'news-element'),
                'tab' => Controls_Manager::TAB_SETTINGS,
            ]
        );

        $this->add_control(
            'style',
            [
                'label' => __('Style', 'news-element'),
                'type' => Controls_Manager::CHOOSE,
                'options' => [
                    'style_one' => [
                        'title' => __('Style One', 'news-element'),
                        'icon' => 'eicon-text-align-left',
                    ],
                    'style_two' => [
                        'title' => __('Style Two', 'news-element'),
                        'icon' => 'eicon-text-align-center',
                    ]
                ],
                'default' => 'style_one',
            ]
        );

        $this->add_control(
            'hidemedia_overlay',
            [
                'label' => __( 'Hide media overlay', 'news-element' ),
                'type' => Controls_Manager::SWITCHER,
                'selectors' => [
                    '{{WRAPPER}} .khbmedia' => 'display: none;',
                ],
            ]
        );

        $this->add_control(
            'hidecat_durattion',
            [
                'label' => __( 'Hide duration', 'news-element' ),
                'type' => Controls_Manager::SWITCHER,
                'selectors' => [
                    '{{WRAPPER}} .duration' => 'display: none;',
                ],
            ]
        );

        $this->start_controls_tabs('gtfs');

        $this->start_controls_tab(
            'g1',
            [
                'label' => esc_html__( 'Main', 'news-element' ),
            ]
        );

        $this->add_responsive_control(
            'height',
            [
                'label' => __('Height', 'news-element'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'range' => [
                    'px' => [
                        'max' => 1200,
                        'min' => 1,
                        'step' => 1,
                    ],
                ],

                'selectors' => [
                    '{{WRAPPER}} .slider--images .slider__item' => 'height: {{SIZE}}{{UNIT}};',
                ]
            ]
        );

        $this->end_controls_tab();

        $this->start_controls_tab(
            'g2',
            [
                'label' => esc_html__( 'Sync', 'news-element' ),
            ]
        );

        $this->add_responsive_control(
            'tmbtsp',
            [
                'label' => __('Item spacing', 'news-element'),
                'type' => Controls_Manager::SLIDER,
                'selectors' => [
                    '{{WRAPPER}} .horizontal-slide .slick-slide>div' => 'padding:0px {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .horizontal-slide .slick-list' => 'margin:0px -{{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .vertical-slide .slick-slide>div' => 'padding:{{SIZE}}{{UNIT}} 0px;',
                    '{{WRAPPER}} .vertical-slide .slick-list' => 'margin:-{{SIZE}}{{UNIT}} 0px;',                    
                ]
            ]
        );

        $this->add_responsive_control(
            'itsp',
            [
                'label' => __('Item top spacing', 'news-element'),
                'type' => Controls_Manager::SLIDER,
                'selectors' => [
                    '{{WRAPPER}} .secondblock' => 'margin-top:{{SIZE}}{{UNIT}};',
                ]
            ]
        ); 

        $this->add_control(
            'thmbg',
            [
                'label' => __( 'Content background', 'news-element' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .secondblock .content' => 'background: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'thmwid',
            [
                'label' => __( 'Thumbnail width', 'news-element' ),
                'type' =>  Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 1000,
                        'step' => 1,
                    ],

                ],
                'size_units' => [ 'px'],
                'selectors' => [
                    '{{WRAPPER}} .thumbwrapper' => 'width: {{SIZE}}{{UNIT}};',
                ],

            ]
        );

        $this->add_responsive_control(
            'thmht',
            [
                'label' => __( 'Thumbnail height', 'news-element' ),
                'type' =>  Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 1000,
                        'step' => 1,
                    ],

                ],
                'size_units' => [ 'px'],
                'selectors' => [
                    '{{WRAPPER}} .thumbwrapper' => 'height: {{SIZE}}{{UNIT}};',
                ],

            ]
        );

        $this->end_controls_tab();

        $this->end_controls_tabs();

        $this->end_controls_section();

        $this->start_controls_section(
            'section_titles',
            [
                'label' => __('Title', 'news-element'),
                'tab' => Controls_Manager::TAB_SETTINGS,
            ]
        );

        $this->add_control(
            'f1tcolor',
            [
                'label' => __( 'Color', 'news-element' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .secondblock .title' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'f1tcfolor',
            [
                'label' => __( 'Hover color', 'news-element' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .secondblock .title' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
          't1-mr',
          [
             'label' =>   esc_html__( 'Margin', 'news-element' ),
             'type' => Controls_Manager::DIMENSIONS,
             'size_units' => [ 'em','px'],

             'selectors' => [
                    '{{WRAPPER}} .secondblock .title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
             ],
          ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'tmtypo',
                'selector' => '{{WRAPPER}} .secondblock .title',
                'label' => __( 'Typography', 'news-element' ),
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'section_numg',
            [
                'label' => __('Duration', 'news-element'),
                'tab' => Controls_Manager::TAB_SETTINGS,
                'condition' => [
                    'hidecat_durattion!' => 'yes',
                ],
            ]
        );

        $this->add_control(
            'cbrde',
            [
                'label' => __( 'Border radius', 'news-element' ),
                'type' =>  Controls_Manager::SLIDER,
                'selectors' => [
                    '{{WRAPPER}} .duration' => 'border-radius: {{SIZE}}{{UNIT}};',
                ],

            ]
        );

        $this->add_control(
            'pthec',
            [
                'label' => __('Background', 'news-element'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .duration' => 'background: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'sthec',
            [
                'label' => __('Text color', 'news-element'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .duration' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'dupad',
            [
                'label' => __('Content padding', 'news-element'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .duration' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ]
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'cntypo',
                'selector' => '{{WRAPPER}} .duration',
                'label' => __( 'Typography', 'news-element' ),
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'section_carousel',
            [
                'label' => __('Slider Settings', 'news-element'),
                'tab' => Controls_Manager::TAB_SETTINGS,
            ]
        );

        $this->add_control(
            'auto',
            [
                'label' => __('Autoplay', 'news-element'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => __('Yes', 'news-element'),
                'label_off' => __('No', 'news-element'),
                'return_value' => 'yes',
                'default' => 'no',
            ]
        );

        $this->add_control(
            'vertical',
            [
                'label' => __('Vertical', 'news-element'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => __('Yes', 'news-element'),
                'label_off' => __('No', 'news-element'),
                'return_value' => 'yes',
                'default' => 'no',
            ]
        );

        $this->add_control(
            'speed',
            [
                'label' => __( 'Autoplay Speed', 'news-element' ),
                'type' =>  Controls_Manager::SLIDER,
                'default' => [
                    'size' => 3500,
                ],
                'condition' => [
                    'auto' => 'yes',
                ],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 8000,
                        'step' => 1,
                    ],
                ],
                'size_units' => [ 'px'],
            ]
        );

        $this->add_responsive_control(
            'item',
            [
                'label' => __('Items', 'news-element'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'default' => [
                    'size' => 3,
                ],
                'range' => [
                    'px' => [
                        'max' => 6,
                        'min' => 1,
                        'step' => 1,
                    ],
                ],
            ]
        );

        $this->add_responsive_control(
            'item_tab',
            [
                'label' => __('Items tab', 'news-element'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'default' => [
                    'size' => 3,
                ],
                'range' => [
                    'px' => [
                        'max' => 6,
                        'min' => 1,
                        'step' => 1,
                    ],
                ],
            ]
        );

        $this->end_controls_section();

    }

    protected function render() {

        $settings = $this->get_settings();
        require dirname(__FILE__) .'/view.php';

    }

    protected function content_template() {
    }

}

if ( defined( 'ELEMENTOR_VERSION' ) && version_compare( ELEMENTOR_VERSION, '3.5.0', '>=' ) ) {
    $widgets_manager->register(new \News_Element\Widgets\khbvidplaylist());
} else {
    $widgets_manager->register_widget_type(new \News_Element\Widgets\khbvidplaylist());
}
