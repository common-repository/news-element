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
    exit; // Exit if accessed directly

class khobish_slider_4 extends Widget_Base {

    public function get_name() {
        return 'khb_slydr4';
    }

    public function get_title() {
        return __('Slider 4', 'news-element');
    }

    public function get_icon() {
        return 'eicon-posts-group';
    }

    public function get_categories() {
        return array('khobish-element');
    }

    protected function register_controls() {

        $this->start_controls_section(
            'section_flabel',
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

        $this->add_control(
            'f_m',
            [
                'label' => __( 'Post meta', 'news-element' ),
                'type' => Controls_Manager::RAW_HTML,
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
            'excerptf',
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

        $this->add_control(
            'imgf',
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
            'section_style',
            [
                'label' => __('General', 'news-element'),
                'tab' => Controls_Manager::TAB_SETTINGS,
            ]
        );

        $this->start_controls_tabs('xxf');

        $this->start_controls_tab(
            'ms1',
            [
                'label' => esc_html__( 'Wrapper', 'news-element' ),
            ]
        );
        $this->add_control(
            'cs_align',
            [
                'label' => __('Alignment', 'news-element'),
                'type' => Controls_Manager::CHOOSE,
                'options' => [
                    'left' => [
                        'title' => __('Left', 'news-element'),
                        'icon' => 'eicon-text-align-left',
                    ],
                    'center' => [
                        'title' => __('Center', 'news-element'),
                        'icon' => 'eicon-text-align-center',
                    ],
                    'right' => [
                        'title' => __('Right', 'news-element'),
                        'icon' => 'eicon-text-align-right',
                    ]
                ],
                'default' => 'center',
                'selectors' => [
                    '{{WRAPPER}} .excerpt-wrap' => 'text-align: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'ghty',
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
                    '{{WRAPPER}} .swiper-slide >div' => 'height: {{SIZE}}{{UNIT}};',
                ]
            ]
        );

        $this->add_responsive_control(
            'cntmwd',
            [
                'label' => __('Max wrapper width', 'news-element'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'range' => [
                    'px' => [
                        'max' => 1500,
                        'min' => 1,
                        'step' => 1,
                    ],
                ],

                'selectors' => [
                    '{{WRAPPER}} .excerpt-wrap' => 'max-width: {{SIZE}}{{UNIT}};',
                ]
            ]
        );

        $this->add_responsive_control(
            'cntvp',
            [
                'label' => __('Content vertical position', 'news-element'),
                'type' => Controls_Manager::SLIDER,
                'selectors' => [
                    '{{WRAPPER}} .excerpt-wrap' => 'top: {{SIZE}}%;',
                ]
            ]
        );

        $this->add_control(
            'hx1',
            [
                'label' => __( 'Overlay background', 'plugin-name' ),
                'type' => Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'dgbg',
                'label' =>   esc_html__( 'Color', 'news-element' ),
                'types' => [ 'none', 'classic','gradient' ],
                'selector' => '{{WRAPPER}} .inrwrapper:after',
            ]
        );

        $this->end_controls_tab();

        $this->start_controls_tab(
            'ms2',
            [
                'label' => esc_html__( 'Content', 'news-element' ),
            ]
        );

        $this->add_responsive_control(
            'cntmwed',
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
                    '{{WRAPPER}} .inrexcerpt' => 'max-width: {{SIZE}}{{UNIT}};',
                ]
            ]
        );

        $this->add_control(
            'cvs_align',
            [
                'label' => __('Alignment', 'news-element'),
                'type' => Controls_Manager::CHOOSE,
                'options' => [
                    'left' => [
                        'title' => __('Left', 'news-element'),
                        'icon' => 'eicon-text-align-left',
                    ],
                    'center' => [
                        'title' => __('Center', 'news-element'),
                        'icon' => 'eicon-text-align-center',
                    ],
                    'right' => [
                        'title' => __('Right', 'news-element'),
                        'icon' => 'eicon-text-align-right',
                    ]
                ],
                'default' => 'left',
                'selectors' => [
                    '{{WRAPPER}} .inrexcerpt' => 'text-align: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
          'cntpad',
          [
             'label' =>   esc_html__( 'Padding', 'news-element' ),
             'type' => Controls_Manager::DIMENSIONS,
             'size_units' => [ 'em','px'],
             'selectors' => [
                    '{{WRAPPER}} .inrexcerpt' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
             ],
          ]
        );

        $this->add_control(
            'gbg',
            [
                'label' =>   esc_html__('Background', 'news-element'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .inrexcerpt' => 'background: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'bordered',
            [
                'label' => __( 'Bordered', 'news-element' ),
                'type' => Controls_Manager::SWITCHER,
                'return_value' => 'has_bordered',
            ]
        );

        $this->add_control(
            'bordered_wid',
            [
                'label' => __( 'Border width', 'news-element' ),
                'type' =>  Controls_Manager::SLIDER,
                'size_units' => ['px','%'],
                'condition' => [
                    'bordered' => 'has_bordered',
                ],
                'selectors' => [
                    '{{WRAPPER}} .inrexcerpt:before,{{WRAPPER}} .inrexcerpt:after' => 'width: {{SIZE}}{{UNIT}};',
                ],

            ]
        );

        $this->add_control(
            'bordered_sp',
            [
                'label' => __( 'Border spacing', 'news-element' ),
                'type' =>  Controls_Manager::SLIDER,
                'condition' => [
                    'bordered' => 'has_bordered',
                ],
                'selectors' => [
                    '{{WRAPPER}} .inrexcerpt:before' => 'top: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .inrexcerpt:after' => 'bottom: {{SIZE}}{{UNIT}};',
                ],

            ]
        );

        $this->add_responsive_control(
            'bordered_col',
            [
                'label' => __('Border color', 'news-element'),
                'type' => Controls_Manager::COLOR,
                'condition' => [
                    'bordered' => 'has_bordered',
                ],
                'selectors' => [
                    '{{WRAPPER}} .inrexcerpt:before,{{WRAPPER}} .inrexcerpt:after' => 'border-color: {{VALUE}};',
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

        $this->add_responsive_control(
          't-mr',
          [
             'label' =>   esc_html__( 'Margin', 'news-element' ),
             'type' => Controls_Manager::DIMENSIONS,
             'size_units' => [ 'em','px'],

             'selectors' => [
                    '{{WRAPPER}} .entry_title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
             ],
          ]
        );

        $this->add_control(
            'tcolor',
            [
                'label' => __( 'Color', 'news-element' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .entry_title a' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'thcolor',
            [
                'label' => __( 'Hover Color', 'news-element' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .entry_title:hover a' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 't_typo',
                'selector' => '{{WRAPPER}} .entry_title',
                'label' => __( 'Typography', 'news-element' ),
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'section_taxo',
            [
                'label' => __('Category Background', 'news-element'),
                'tab' => Controls_Manager::TAB_SETTINGS,
            ]
        );

        $this->add_responsive_control(
            'bgcat_pad',
            [
                'label' => __('Padding', 'news-element'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .cat-bg' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ]
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'bgcat_typo',
                'label' => __('Typography', 'news-element'),
                'selector' => '{{WRAPPER}} .cat-bg',
            ]
        );

        $this->add_control(
            'bgcat_color',
            [
                'label' => __( 'Color', 'news-element' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .cat-bg' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'bgcat_bagrnd',
            [
                'label' => __( 'Background', 'news-element' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .cat-bg' => 'background: {{VALUE}} !important;',
                ],
            ]
        );

        $this->add_control(
            'hbgcat_color',
            [
                'label' => __( 'Hover Color', 'news-element' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .cat-bg:hover' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'hbgcat_bagrnd',
            [
                'label' => __( 'Hover Background', 'news-element' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .cat-bg:hover' => 'background: {{VALUE}} !important;',
                ],
            ]
        );

        $this->add_control(
            'catvp',
            [
                'label' => __( 'Vertical position', 'news-element' ),
                'type' =>  Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'min' => -200,
                        'max' => 200,
                        'step' => 1,
                    ]
                ],
                'size_units' => [ 'px'],
                'selectors' => [
                    '{{WRAPPER}} .catbg-wrap' => 'top: {{SIZE}}{{UNIT}};position: relative;',
                ],

            ]
        );

        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'bgcatbdr',
                'label' =>   esc_html__( 'Border', 'news-element' ),
                'selector' => '{{WRAPPER}} .cat-bg',
            ]
        );

        $this->end_controls_section();

         $this->start_controls_section(
            'section_meta',
            [
                'label' => __('Post meta', 'news-element'),
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
            'mcolor',
            [
                'label' => __( 'Color', 'news-element' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .leffect-1' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'mlcolor',
            [
                'label' => __( 'Link Color', 'news-element' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .leffect-1 a' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'mlhcolor',
            [
                'label' => __( 'Hover Color', 'news-element' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .leffect-1:hover a' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'mt_typo',
                'selector' => '{{WRAPPER}} .leffect-1',
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
            'bbtnwidth',
            [
                'label' => __( 'Border width', 'news-element' ),
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
                    '{{WRAPPER}} .btn-more' => 'border-width: {{SIZE}}{{UNIT}};border-style:solid',
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


        $this->end_controls_section();

        $this->start_controls_section(
            'section_carousel',
            [
                'label' => __('Carousel', 'news-element'),
                'tab' => Controls_Manager::TAB_SETTINGS,
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
            'dot',
            [
                'label' => __('Dot', 'news-element'),
                'type' => Controls_Manager::SWITCHER,
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
            'transition',
            [
                'label' => __('Transition', 'news-element'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => __('Fade', 'news-element'),
                'label_off' => __('Slide', 'news-element'),
                'return_value' => 'fade',
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

        $this->end_controls_section();

        $this->start_controls_section(
            'section_owl_dot',
            [
                'label' => __('Dots', 'news-element'),
                'tab' => Controls_Manager::TAB_SETTINGS,
                'condition' => [
                    'dot' => 'yes',
                ],
            ]
        );

        $this->add_responsive_control(
            'dtvp',
            [
                'label' => __( 'Vertical position', 'news-element' ),
                'type' =>  Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'min' => -100,
                        'max' => 100,
                        'step' => 1,
                    ],

                ],
                'size_units' => [ 'px'],
                'selectors' => [
                    '{{WRAPPER}} .swiper-pagination' => 'bottom: {{SIZE}}{{UNIT}};',
                ],

            ]
        );

        $this->add_control(
            'dotbg',
            [
                'label' =>   esc_html__( 'Background', 'news-element' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .swiper-pagination-bullet' => 'background: {{VALUE}};'
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
            'arwh',
            [
                'label' =>   esc_html__( 'Width and height', 'news-element' ),
                'type' =>  Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 500,
                        'step' => 1,
                    ],

                ],
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
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 500,
                        'step' => 1,
                    ],

                ],
                'selectors' => [
                    '{{WRAPPER}} .khbprnx' => 'border-radius: {{SIZE}}px;',
                ],

            ]
        );

        $this->add_control(
            'arbg',
            [
                'label' =>   esc_html__( 'Background', 'news-element' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .khbprnx' => 'background: {{VALUE}};'
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
    $widgets_manager->register(new \News_Element\Widgets\khobish_slider_4());
} else {
    $widgets_manager->register_widget_type(new \News_Element\Widgets\khobish_slider_4());
}
