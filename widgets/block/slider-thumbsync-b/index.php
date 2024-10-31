<?php
namespace News_Element\Widgets;
use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Background;
use Elementor\Group_Control_Border;
use Elementor\Utils;
use News_Element\Khobish_Helper;
use News_Element\Widgets\Group_Query;

if (!defined('ABSPATH'))
    exit;

class xldvthumbsync2 extends Widget_Base {

    public function get_name() {
        return 'khbthumbsyn2';
    }

    public function get_title() {
        return __('Thumb Sync 2', 'news-element');
    }

    public function get_icon() {
        return 'eicon-posts-group';
    }

    public function get_categories() {
        return ['khobish-element'];
    }

    protected function register_controls() {

        $this->start_controls_section(
            'section_posts_carousel',
            [
                'label' => __('Query', 'news-element'),
            ]
        );

        $this->add_group_control(
            Group_Query::get_type(),
            [
                'name' => 'query',
            ]
        );

        $this->add_control(
            'post_perpage',
            [
                'label' => __('Post per page', 'news-element'),
                'type' => Controls_Manager::SLIDER,
                'default' => [
                    'unit' => 'px',
                    'size' => 5,
                ],                
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'section_mainc',
            [
                'label' => __('Metas', 'news-element'),
            ]
        );

        $this->start_controls_tabs('mtabu');

        $this->start_controls_tab(
            'm1',
            [
                'label' => esc_html__( 'Main', 'news-element' ),
            ]
        );

        $r1 = new \Elementor\Repeater();
        $r1->add_control(
            'meta', [
                'label' =>   esc_html__( 'Post meta', 'news-element' ),
                'type' => Controls_Manager::SELECT2,
                'label_block' => true,
                'multiple' => false,
                'options' =>  Khobish_Helper::magnews_meta_fields(),
            ]
        );

        $this->add_control(
            'metas',
            [
                'type' => Controls_Manager::REPEATER,
                'fields' => $r1->get_controls(),
                'prevent_empty' => false,
                'title_field' => '{{{ meta }}}',
            ]
        );

        $this->add_control(
            'img_size',
            [
                'label' => __('Image size', 'news-element'),
                'type' => Controls_Manager::SELECT,
                'label_block' => true,
                'options' =>  Khobish_Helper::ae_image_size_choose(),
                'multiple' => false,
            ]
        );

        $this->add_control(
            'excerpt',
            [
                'label' => __( 'Excerpt length', 'news-element' ),
                'type' =>  Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 300,
                        'step' => 1,
                    ],
                ],

            ]
        );
        $this->end_controls_tab();

        $this->start_controls_tab(
            'm2',
            [
                'label' => esc_html__( 'Thumb', 'news-element' ),
            ]
        );

        $this->add_control(
            'img_sizer',
            [
                'label' => __('Image size', 'news-element'),
                'type' => Controls_Manager::SELECT,
                'label_block' => true,
                'options' =>  Khobish_Helper::ae_image_size_choose(),
                'multiple' => false,
            ]
        );

        $this->end_controls_tab();

        $this->end_controls_tabs();

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

        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'gbg',
                'label' =>   esc_html__( 'Background', 'elementor' ),
                'types' => [ 'none', 'classic','gradient' ],
                'selector' => '{{WRAPPER}} .slide-bg:after',
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
        $this->add_responsive_control(
            'cdpos',
            [
                'label' => __('Content vertical position', 'news-element'),
                'type' => Controls_Manager::SLIDER,
                'selectors' => [
                    '{{WRAPPER}} .thumb-overlay-center' => 'top: {{SIZE}}%;',
                ]
            ]
        );

        $this->add_control(
            'mtxali',
            [
                'label' =>   esc_html__('Text alignment', 'news-element'),
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
                    '{{WRAPPER}} .firstblock .thumb-content' => 'text-align: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'cntmwd',
            [
                'label' => __('Max content width', 'news-element'),
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
                    '{{WRAPPER}} .firstblock .inr' => 'max-width: {{SIZE}}{{UNIT}};',
                ]
            ]
        );

        $this->add_control(
            'maincnrt',
            [
                'label' => __('Center content', 'news-element'),
                'type' => Controls_Manager::SWITCHER,
                 'selectors' => [
                        '{{WRAPPER}} .firstblock .inr' => 'margin:0px auto;',
                 ],
            ]
        );

        $this->add_responsive_control(
            'cntpyd',
            [
                'label' => __('Content padding', 'news-element'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .firstblock .inr' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ]
            ]
        );

        $this->add_control(
            'cntbgd',
            [
                'label' => __( 'Content background', 'news-element' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .firstblock .inr' => 'background: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_tab();

        $this->start_controls_tab(
            'g2',
            [
                'label' => esc_html__( 'Sync', 'news-element' ),
            ]
        );

        $this->add_control(
            'mdiret',
            [
                'label' =>   esc_html__('Hide media icons', 'news-element'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' =>   esc_html__('Yes', 'news-element'),
                'label_off' =>   esc_html__('No', 'news-element'),
                'selectors' => [
                    '{{WRAPPER}} .khbmedia' => 'display: none;',
                ],
            ]
        );

        $this->add_control(
            'syncne',
            [
                'label' => __( 'Wrapper max width', 'news-element' ),
                'type' =>  Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 1500,
                        'step' => 1,
                    ]
                ],
                'size_units' => [ 'px'],
                'selectors' => [
                    '{{WRAPPER}} .secondblock' => 'max-width: {{SIZE}}{{UNIT}};margin:0px auto;',
                ],

            ]
        );

        $this->add_control(
            'tmbtsp',
            [
                'label' => __( 'Top spacing', 'news-element' ),
                'type' =>  Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'min' => -1000,
                        'max' => 1000,
                        'step' => 1,
                    ]
                ],
                'size_units' => [ 'px'],
                'selectors' => [
                    '{{WRAPPER}} .secondblock' => 'margin-top: {{SIZE}}{{UNIT}};',
                ],

            ]
        );

        $this->add_responsive_control(
            'synwpd',
            [
                'label' => __('Wrapper padding', 'news-element'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .secondblock' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ]
            ]
        );

        $this->add_control(
            'synwrbg',
            [
                'label' => __( 'Wrapper background', 'news-element' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .secondblock' => 'background: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'syncsph',
            [
                'label' => __( 'Item spacing', 'news-element' ),
                'type' =>  Controls_Manager::SLIDER,
                'selectors' => [
                    '{{WRAPPER}} .secondblock .slick-slide>div' => 'padding:0px {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .secondblock .slick-list' => 'margin:0px -{{SIZE}}{{UNIT}};',
                ],

            ]
        );

        $this->add_control(
            'synctde',
            [
                'label' => __( 'Active color', 'news-element' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .secondblock .slick-current .slider__item:after' => 'background: {{VALUE}};',
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
                    '{{WRAPPER}} .firstblock .entry_title a' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'f1tcfolor',
            [
                'label' => __( 'Hover color', 'news-element' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .firstblock .entry_title:hover a' => 'color: {{VALUE}};',
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
                    '{{WRAPPER}} .firstblock .entry_title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
             ],
          ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'tmtypo',
                'selector' => '{{WRAPPER}} .firstblock .entry_title',
                'label' => __( 'Typography', 'news-element' ),
            ]
        );

        $this->end_controls_section();


        $this->start_controls_section(
            'section_metd',
            [
                'label' => __('Meta', 'news-element'),
                'tab' => Controls_Manager::TAB_SETTINGS,
            ]
        );

        $this->add_responsive_control(
            'metsspt',
            [
                'label' => __('Meta spacing', 'news-element'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .meta-space' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ]
            ]
        );

        $this->add_control(
            'mtaclrl',
            [
                'label' => __( 'Color', 'news-element' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .firstblock .leffect-1' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'mtaclr',
            [
                'label' => __( 'Link color', 'news-element' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .firstblock .leffect-1 a' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'mta1ty',
                'label' => __('Typography', 'news-element'),
                'selector' => '{{WRAPPER}} .firstblock .leffect-1',
            ]
        );
        
        $this->end_controls_section();

        $this->start_controls_section(
            'section_taxo',
            [
                'label' => __('Category background', 'news-element'),
                'tab' => Controls_Manager::TAB_SETTINGS,
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'tax_typography',
                'selector' => '{{WRAPPER}} .cat-bg',
            ]
        );

        $this->add_responsive_control(
            'tax_pad',
            [
                'label' => __('Padding', 'news-element'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .cat-bg' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ]
            ]
        );

        $this->add_control(
            'tax_color',
            [
                'label' => __( 'Color', 'news-element' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .cat-bg' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'tax_bgcolor',
            [
                'label' => __( 'Background', 'news-element' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .cat-bg' => 'background: {{VALUE}} !important;',
                ],
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'section_numg',
            [
                'label' => __('Counter', 'news-element'),
                'tab' => Controls_Manager::TAB_SETTINGS,
                'condition' => [
                    'style' => 'style_two',
                ],
            ]
        );

        $this->add_control(
            'cwdth',
            [
                'label' => __( 'Width & height', 'news-element' ),
                'type' =>  Controls_Manager::SLIDER,
                'selectors' => [
                    '{{WRAPPER}} .secondblock .counter' => 'width: {{SIZE}}{{UNIT}};height: {{SIZE}}{{UNIT}};',
                ],

            ]
        );

        $this->add_control(
            'cbde',
            [
                'label' => __( 'Border width', 'news-element' ),
                'type' =>  Controls_Manager::SLIDER,
                'selectors' => [
                    '{{WRAPPER}} .secondblock .counter' => 'border-width: {{SIZE}}{{UNIT}};border-style:solid;',
                ],

            ]
        );

        $this->add_control(
            'cbrde',
            [
                'label' => __( 'Border radius', 'news-element' ),
                'type' =>  Controls_Manager::SLIDER,
                'selectors' => [
                    '{{WRAPPER}} .secondblock .counter' => 'border-radius: {{SIZE}}{{UNIT}};',
                ],

            ]
        );

        $this->add_control(
            'pthec',
            [
                'label' => __('Main color', 'news-element'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .secondblock .counter' => 'color: {{VALUE}};border-color: {{VALUE}};',
                    '{{WRAPPER}} .secondblock .slick-current .counter' => 'background: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'sthec',
            [
                'label' => __('Secondary color', 'news-element'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .secondblock .slick-current .counter' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'cntypo',
                'selector' => '{{WRAPPER}} .counter',
                'label' => __( 'Typography', 'news-element' ),
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'section_fblock',
            [
                'label' => __('Excerpt', 'news-element'),
                'tab' => Controls_Manager::TAB_SETTINGS,
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'fexcert_typography',
                'label' => __('Excerpt typography', 'news-element'),
                'selector' => '{{WRAPPER}} .entry_excerpt',
            ]
        );

        $this->add_control(
            'excrtf_color',
            [
                'label' => __( 'Excerpt color', 'news-element' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .entry_excerpt' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'fexcerpt_pad',
            [
                'label' => __('Excerpt padding', 'news-element'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .entry_excerpt' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ]
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'section_readmore',
            [
                'label' => __('Read more', 'news-element'),
                'tab' => Controls_Manager::TAB_SETTINGS,
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'btn_typography',
                'selector' => '{{WRAPPER}} .btn-more',
            ]
        );

        $this->add_control(
            'btn_color',
            [
                'label' => __( 'Button color', 'news-element' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .btn-more' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'btn_colorbg',
            [
                'label' => __( 'Button background', 'news-element' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .btn-more' => 'background: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'btn_color-h',
            [
                'label' => __( 'Button color hover', 'news-element' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .btn-more:hover' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'btn_colorbgh',
            [
                'label' => __( 'Button background hover', 'news-element' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .btn-more:hover' => 'background: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'btn_bcol',
            [
                'label' => __( 'Button border color', 'news-element' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .btn-more' => 'border-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'btn_bcolh',
            [
                'label' => __( 'Button border hover', 'news-element' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .btn-more:hover' => 'border-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'bbtnradius',
            [
                'label' => __( 'Border radius', 'news-element' ),
                'type' =>  Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 200,
                        'step' => 1,
                    ]
                ],
                'size_units' => [ 'px'],
                'selectors' => [
                    '{{WRAPPER}} .btn-more' => 'border-radius: {{SIZE}}{{UNIT}};',
                ],

            ]
        );

        $this->add_responsive_control(
            'btn-pad',
            [
                'label' => __('Button padding', 'news-element'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .btn-more' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ]
            ]
        );

        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'rmbdr',
                'label' =>   esc_html__( 'Border', 'news-element' ),
                'selector' => '{{WRAPPER}} .btn-more',
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
            'center',
            [
                'label' => __('Centermode', 'news-element'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => __('Yes', 'news-element'),
                'label_off' => __('No', 'news-element'),
                'return_value' => 'yes',
                'default' => 'no',
            ]
        );

        $this->add_control(
            'arrow',
            [
                'label' => __('Arrow', 'news-element'),
                'type' => Controls_Manager::SWITCHER,
            ]
        );

        $this->add_control(
            'fade',
            [
                'label' => __('Fade transition', 'news-element'),
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

        $this->add_control(
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

        $this->add_control(
            'item_tab',
            [
                'label' => __('Items tablet', 'news-element'),
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

        $this->add_control(
            'item_mob',
            [
                'label' => __('Items mobile', 'news-element'),
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

        $this->start_controls_section(
            'section_owl_arw',
            [
                'label' => __('Arrow', 'news-element'),
                'tab' => Controls_Manager::TAB_SETTINGS,
                'condition' => [
                    'arrow' => 'yes',
                ],
            ]
        );

        $this->add_control(
			'picon', [
				'type'        => Controls_Manager::ICONS,
				'label'       => esc_html__( 'Prev icon', 'thepack' ),
				'label_block' => true,
				'default'     => [
					'value'   => 'fas fa-chevron-left',
					'library' => 'solid',
				],
			]
		);

		$this->add_control(
			'nicon', [
				'type'        => Controls_Manager::ICONS,
				'label'       => esc_html__( 'Next icon', 'thepack' ),
				'label_block' => true,
				'default'     => [
					'value'   => 'fas fa-chevron-right',
					'library' => 'solid',
				],
			]
		);

        $this->add_responsive_control(
            'arfs',
            [
                'label' =>   esc_html__( 'Font size', 'news-element' ),
                'type' =>  Controls_Manager::SLIDER,
                'selectors' => [
                    '{{WRAPPER}} .khbprnx' => 'font-size: {{SIZE}}px;',
                ],

            ]
        );

        $this->add_responsive_control(
            'arwh',
            [
                'label' =>   esc_html__( 'Width and height', 'news-element' ),
                'type' =>  Controls_Manager::SLIDER,
                'selectors' => [
                    '{{WRAPPER}} .khbprnx' => 'width: {{SIZE}}px;height: {{SIZE}}px;',
                ],

            ]
        );

        $this->add_responsive_control(
            'arbrad',
            [
                'label' =>   esc_html__( 'Border radius', 'news-element' ),
                'type' =>  Controls_Manager::SLIDER,
                'selectors' => [
                    '{{WRAPPER}} .khbprnx' => 'border-radius: {{SIZE}}px;',
                ],

            ]
        );

        $this->add_control(
            'arclr',
            [
                'label' =>   esc_html__( 'Color', 'news-element' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .khbprnx' => 'color: {{VALUE}};'
                ],
            ]
        );

        $this->add_control(
            'arrbg',
            [
                'label' =>   esc_html__( 'Background', 'news-element' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .khbprnx' => 'background: {{VALUE}};'
                ],
            ]
        );

        $this->add_control(
            'hvbgar',
            [
                'label' =>   esc_html__( 'Hover background', 'news-element' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .khbprnx:hover' => 'background:{{VALUE}};'
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
    $widgets_manager->register(new \News_Element\Widgets\xldvthumbsync2());
} else {
    $widgets_manager->register_widget_type(new \News_Element\Widgets\xldvthumbsync2());
}
