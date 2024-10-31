<?php
namespace News_Element\Widgets;
use Elementor;
use Elementor\Plugin;
use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Border;
use Elementor\Group_Control_Background;
use News_Element\Khobish_Helper;
use Elementor\Utils;
use WP_Query;

if (!defined('ABSPATH'))
    exit; // Exit if accessed directly

class khobish_taxlyst3 extends Widget_Base {

    public function get_name() {
        return 'khbtxlyst3';
    }

    public function get_title() {
        return   esc_html__('Taxonomy 3', 'news-element');
    }

    public function get_icon() {
        return 'dashicons dashicons-update';
    }

    public function get_categories() {
        return ['khobish-builder'];
    }

    protected function register_controls() {

        $this->start_controls_section(
            'section_heading',
            [
                'label' =>   esc_html__('Taxonomy', 'news-element'),
            ]
        );

        $r1 = new \Elementor\Repeater();
        $r1->add_control(
            'meta', [
                'label' =>   esc_html__( 'Taxonomy', 'news-element' ),
                'type' => Controls_Manager::SELECT2,
                'label_block' => true,
                'multiple' => false,
                'options' =>  Khobish_Helper::khobish_all_terms(),
            ]
        );

        $r1->add_control(
            'color', [
                'label' =>   esc_html__( 'Color', 'news-element' ),
                'type' => Controls_Manager::COLOR,
                'label_block' => true,
            ]
        );

        $r1->add_control(
            'img', [
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
                'label' => __('Image', 'news-element'),
                'label_block' => true
            ]
        );

        $this->add_control(
            'taxi',
            [
                'type' => Controls_Manager::REPEATER,
                'fields' => $r1->get_controls(),
                'prevent_empty' => false,
                'title_field' => '{{{ meta }}}',
            ]
        );

        $this->add_control(
            'prefix',
            [
                'label' => __( 'Counter suffix', 'news-element' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true
            ]
        );

        $this->add_control(
            'img',
            [
                'label' => __('Image size', 'news-element'),
                'type' => Controls_Manager::SELECT,
                'label_block' => true,
                'options' =>  Khobish_Helper::ae_image_size_choose(),
                'multiple' => false,
            ]
        );

        $this->add_control(
            'icon', [
                'label' =>   esc_html__( 'Icon', 'news-element' ),
                'type' => Controls_Manager::ICONS,
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'section_gnrl',
            [
                'label' =>   esc_html__('General', 'news-element'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'hdcntr',
            [
                'label' => __( 'Hide counter', 'news-element' ),
                'type' => Controls_Manager::SWITCHER,
                'selectors' => [
                    '{{WRAPPER}} .taxnum' => 'display: none;',
                ],
            ]
        );

        $this->add_control(
            'hvraised',
            [
                'label' => __( 'Hover raised', 'news-element' ),
                'type' => Controls_Manager::SWITCHER,
            ]
        );

        $this->add_control(
            'evenodd',
            [
                'label' => __( 'Even odd styling', 'news-element' ),
                'type' => Controls_Manager::SWITCHER,
            ]
        );

        $this->add_responsive_control(
            'hraiam',
            [
                'label' => __( 'Hover raised amount', 'news-element' ),
                'type' =>  Controls_Manager::SLIDER,
                'condition' => [
                    'hvraised' => 'yes',
                ],
                'selectors' => [
                    '{{WRAPPER}} article:hover' => 'top: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'oddevam',
            [
                'label' => __( 'Even odd top spacing', 'news-element' ),
                'type' =>  Controls_Manager::SLIDER,
                'condition' => [
                    'evenodd' => 'yes',
                ],
                'selectors' => [
                    '{{WRAPPER}} article.even' => 'margin-top: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'width',
            [
                'label' =>   esc_html__( 'Column width in %', 'news-element' ),
                'type' =>  Controls_Manager::NUMBER,
                'default' => '100',
                 'selectors' => [
                        '{{WRAPPER}} .khbtaxlist3 article' => 'width: {{VALUE}}%;',
                 ],
            ]
        );

        $this->add_responsive_control(
            'cht',
            [
                'label' => __( 'Column height', 'news-element' ),
                'type' =>  Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 500,
                        'step' => 1,
                    ]
                ],
                'size_units' => [ 'px'],
                'selectors' => [
                    '{{WRAPPER}} .inr' => 'height: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'gitsp',
            [
                'label' => __( 'Grid spacing', 'news-element' ),
                'type' =>  Controls_Manager::SLIDER,
                'selectors' => [
                    '{{WRAPPER}} .khbtaxlist3 >article' => 'padding: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .khbtaxlist3' => 'margin-right: -{{SIZE}}{{UNIT}};margin-left: -{{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'cntbg',
                'label' =>   esc_html__( 'Background', 'news-element' ),
                'types' => [ 'none', 'classic','gradient' ],
                'selector' => '{{WRAPPER}} .bgtax-2:after',
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'section_ttl',
            [
                'label' =>   esc_html__('Title', 'news-element'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'tclr',
            [
                'label' => __( 'Color', 'news-element' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .title' => 'color: {{VALUE}};',
                ]
            ]
        );

        $this->add_responsive_control(
            'fntsz',
            [
                'label' => __( 'Icon font size', 'news-element' ),
                'type' =>  Controls_Manager::SLIDER,
                'selectors' => [
                    '{{WRAPPER}} .title .khbicon' => 'font-size:{{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'fndfz',
            [
                'label' => __( 'Icon right spacing', 'news-element' ),
                'type' =>  Controls_Manager::SLIDER,
                'selectors' => [
                    '{{WRAPPER}} .title .khbicon' => 'padding-right:{{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'ttyp',
                'label' => __('Typography', 'news-element'),
                'selector' => '{{WRAPPER}} .title',
            ]
        );

        $this->add_responsive_control(
            'lrtpd',
            [
                'label' => __( 'Left right padding', 'news-element' ),
                'type' =>  Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 500,
                        'step' => 1,
                    ]
                ],
                'size_units' => [ 'px'],
                'selectors' => [
                    '{{WRAPPER}} .title' => 'padding:0px {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'section_style3',
            [
                'label' => __('Counter', 'news-element'),
                'tab' => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'hdcntr!' => 'yes',
                ],
            ]
        );

        $this->add_responsive_control(
            'xrtpd',
            [
                'label' => __( 'Left right padding', 'news-element' ),
                'type' =>  Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 500,
                        'step' => 1,
                    ]
                ],
                'size_units' => [ 'px'],
                'selectors' => [
                    '{{WRAPPER}} .taxnum' => 'padding:0px {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'xrhtpd',
            [
                'label' => __( 'Hover left right padding', 'news-element' ),
                'type' =>  Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 500,
                        'step' => 1,
                    ]
                ],
                'size_units' => [ 'px'],
                'selectors' => [
                    '{{WRAPPER}} article:hover .taxnum' => 'padding:0px {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'cntxt',
            [
                'label' => __( 'Color', 'news-element' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .taxnum' => 'color: {{VALUE}};',
                ]
            ]
        );

        $this->add_control(
            'cnfgtxt',
            [
                'label' => __( 'Background', 'news-element' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .taxnum' => 'background: {{VALUE}} !important;',
                ]
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'hcntyp',
                'label' => __('Typography', 'news-element'),
                'selector' => '{{WRAPPER}} .taxnum',
            ]
        );

        $this->end_controls_section();

    }

    protected function render() {
        $settings = $this->get_settings();
        require dirname(__FILE__) .'/view.php';

    }
}

if ( defined( 'ELEMENTOR_VERSION' ) && version_compare( ELEMENTOR_VERSION, '3.5.0', '>=' ) ) {
    $widgets_manager->register(new \News_Element\Widgets\khobish_taxlyst3());
} else {
    $widgets_manager->register_widget_type(new \News_Element\Widgets\khobish_taxlyst3());
}
