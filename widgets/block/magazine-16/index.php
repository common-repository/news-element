<?php
namespace News_Element\Widgets;
use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Background;
use Elementor\Utils;
use News_Element\Khobish_Helper;

if ( ! defined( 'ABSPATH' ) ) { exit; }

class khobish_mag16 extends Widget_Base {

	public function get_name() {
		return 'khbmag16';
	}

	public function get_title() {
		return __( 'Magazine 16', 'news-element' );
	}

	public function get_icon() {
		return 'eicon-post-list';
	}

	public function get_categories() {
		return [ 'khobish-element' ];
	}

	protected function register_controls() {

		$this->start_controls_section(
			'lbl_query',
			[
				'label' => __( 'Query', 'news-element' ),
			]
		);

        $this->add_control(
			'post_type',
			[
				'label'       => esc_html__( 'Post type', 'thepack' ),
				'type'        => Controls_Manager::SELECT2,
				'options'     => Khobish_Helper::post_type(),
				'multiple'    => false,
				'label_block' => true,
			]
		);

        $this->add_control(
			'taxonomy',
			[
				'label'       => esc_html__( 'Category', 'thepack' ),
				'type'        => Controls_Manager::SELECT2,
				'options'     => Khobish_Helper::thepaack_drop_taxolist(),
				'multiple'    => false,
				'label_block' => true,
			]
		);

        $r = new \Elementor\Repeater();
        $r->add_control(
            'meta', [
                'label' =>   esc_html__( 'Category', 'thepack' ),
                'type' => Controls_Manager::SELECT2,
                'label_block' => true,
                'multiple' => false,
                'options' =>  Khobish_Helper::thepack_drop_cat(),
            ]
        );

        $this->add_control(
            'terms',
            [
                'type' => Controls_Manager::REPEATER,
                'label' => 'Category terms',
                'fields' => $r->get_controls(),
                'prevent_empty' => false,
                'title_field' => '{{{ meta }}}',
            ]
        );

        $this->add_control(
            'post_perpage',
            [
                'label' => __('Post per page', 'news-element'),
                'type' => Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'max' => 20,
                    ],
                ],
            ]
        );

        $this->add_control(
            'pagination',
            [
                'label' => __( 'Pagination', 'news-element' ),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    '' => 'No Pagination',
                    'load_more' => 'Load More',
                    'prev_next' => 'Prev next',
                ],
            ]
        );

        $this->add_control(
            'offset',
            [
                'label' => __('Offset', 'news-element'),
                'type' => Controls_Manager::SLIDER,
            ]
        );

        $this->add_control(
            'order',
            [
                'label' => __( 'Order', 'news-element' ),
                'type' => Controls_Manager::SELECT,
                'default' => 'ASC',
                'options' => [
                    'ASC' => 'ASC',
                    'DESC' => 'DESC',
                ],
            ]
        );

        $this->add_control(
            'order_by',
            [
                'label' => __('Order by', 'news-element'),
                'type' => Controls_Manager::SELECT2,
                'options' => Khobish_Helper::khobish_order_by(),
                'default' => 'ID',
                'multiple' => false,
                'label_block' => true,
            ]
        );

        $this->add_control(
            'filtr',
            [
                'label' =>   esc_html__('Hide Filter', 'news-element'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' =>   esc_html__('Yes', 'news-element'),
                'label_off' =>   esc_html__('No', 'news-element'),
                'selectors' => [
                    '{{WRAPPER}} .kb-filter-bar' => 'display: none;',
                ],
            ]
        );

		$this->end_controls_section();

        $this->start_controls_section(
            'section_h',
            [
                'label' => __('Header Filter', 'news-element'),
                'condition' => [
                    'filtr!' => 'yes',
                ],
            ]
        );

        $this->add_control(
            'hlabel',
            [
                'label' => __('Label', 'news-element'),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default' => 'Latest',

            ]
        );

        $this->add_control(
            'hmore',
            [
                'label' => __('More link label', 'news-element'),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default' => 'More',

            ]
        );

        $this->add_control(
            'hall',
            [
                'label' => __('All list label', 'news-element'),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default' => 'All',

            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'section_f',
            [
                'label' => __('Post Metas', 'news-element'),
            ]
        );

        $this->start_controls_tabs('mtabu');

        $this->start_controls_tab(
            'm1',
            [
                'label' => esc_html__( 'Full', 'news-element' ),
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
            'metaf',
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

        $this->end_controls_tab();

        $this->start_controls_tab(
            'm2',
            [
                'label' => esc_html__( 'Thumb', 'news-element' ),
            ]
        );

        $r1r = new \Elementor\Repeater();
        $r1r->add_control(
            'meta', [
                'label' =>   esc_html__( 'Post meta', 'news-element' ),
                'type' => Controls_Manager::SELECT2,
                'label_block' => true,
                'multiple' => false,
                'options' =>  Khobish_Helper::magnews_meta_fields(),
            ]
        );

        $this->add_control(
            'metar',
            [
                'type' => Controls_Manager::REPEATER,
                'fields' => $r1r->get_controls(),
                'prevent_empty' => false,
                'title_field' => '{{{ meta }}}',
            ]
        );

        $this->add_control(
            'excerptr',
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
            'imgr',
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
            'section_general',
            [
                'label' => __('General', 'news-element'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'tmpl', [
                'label' => __('Template', 'news-element'),
                'type' => Controls_Manager::CHOOSE,
                'options' => [
                    'style_one' => [
                        'title' => __('One', 'news-element'),
                        'icon' => ' eicon-document-file',
                    ],
                    'style_two' => [
                        'title' => __('Two', 'news-element'),
                        'icon' => 'eicon-image-rollover',
                    ]
                ],
                'default' => 'style_one'
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
            'hidecat_overlay',
            [
                'label' => __( 'Hide overlay category', 'news-element' ),
                'type' => Controls_Manager::SWITCHER,
                'selectors' => [
                    '{{WRAPPER}} .khboverlaythumb' => 'display: none;',
                ],
            ]
        );

        $this->add_responsive_control(
            'spce',
            [
                'label' => __( 'Column spacing', 'news-element' ),
                'type' =>  Controls_Manager::SLIDER,
                'selectors' => [
                    '{{WRAPPER}} .first >div[class^="fw-col-md"]' => 'padding-left: {{SIZE}}{{UNIT}};padding-right: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .first' => 'margin-left: -{{SIZE}}{{UNIT}};margin-right: -{{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'imgbrad',
            [
                'label' => __( 'Image border radius', 'news-element' ),
                'type' =>  Controls_Manager::SLIDER,
                'selectors' => [
                    '{{WRAPPER}} .ft-thumbwrap' => 'border-radius: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'overlay_color',
                'label' =>   esc_html__( 'Color', 'news-element' ),
                'types' => [ 'none', 'classic','gradient' ],
                'selector' => '{{WRAPPER}} .inrwrp::before',
                'condition' => [
                    'tmpl' => 'style_two',
                ],
            ]
        );

        $this->start_controls_tabs('xtra');

        $this->start_controls_tab(
            'x1',
            [
                'label' => esc_html__( 'Thumb', 'news-element' ),
            ]
        );

        $this->add_responsive_control(
            'sthmht',
            [
                'label' => __( 'Height', 'news-element' ),
                'type' =>  Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 800,
                        'step' => 1,
                    ],

                ],
                'selectors' => [
                    '{{WRAPPER}} .style_one .smtitle .ft-thumbwrap img' => 'height: {{SIZE}}px;',
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
                    '{{WRAPPER}} .bgtitle .excerpt-wrap' => 'text-align: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'rai_pad',
            [
                'label' => __('Content padding', 'news-element'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .bgtitle .excerpt-wrap' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ]
            ]
        );

        $this->add_control(
            'fxcbg',
            [
                'label' => __( 'Content background', 'news-element' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .bgtitle .excerpt-wrap' => 'background: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'raised',
            [
                'label' => __( 'Raised content', 'news-element' ),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => __( 'Yes', 'news-element' ),
                'label_off' => __( 'No', 'news-element' ),
            ]
        );

        $this->add_control(
            'centercnt',
            [
                'label' => __( 'Center Content', 'news-element' ),
                'type' => Controls_Manager::SWITCHER,
                'selectors' => [
                    '{{WRAPPER}} .bgtitle .excerpt-wrap' => 'margin: 0px auto;',
                ],
            ]
        );

        $this->add_responsive_control(
            'raised_width',
            [
                'label' => __( 'Raised content width', 'news-element' ),
                'type' =>  Controls_Manager::SLIDER,
                'range' => [
                    '%' => [
                        'min' => 0,
                        'max' => 100,
                        'step' => 1,
                    ],

                ],
                'size_units' => [ '%'],
                'condition' => [
                    'raised' => 'yes',
                ],
                'selectors' => [
                    '{{WRAPPER}} .bgtitle .excerpt-wrap' => 'width: {{SIZE}}%;',
                ],

            ]
        );

        $this->add_responsive_control(
            'raised_top',
            [
                'label' => __( 'Raised top margin', 'news-element' ),
                'type' =>  Controls_Manager::SLIDER,
                'range' => [
                    '%' => [
                        'min' => 0,
                        'max' => 100,
                        'step' => 1,
                    ],

                ],
                'condition' => [
                    'raised' => 'yes',
                ],
                'size_units' => [ '%'],
                'selectors' => [
                    '{{WRAPPER}} .bgtitle .excerpt-wrap' => 'margin-top: -{{SIZE}}{{UNIT}};',
                ],

            ]
        );

        $this->end_controls_tab();

        $this->start_controls_tab(
            'x2',
            [
                'label' => esc_html__( 'Full', 'news-element' ),
            ]
        );

        $this->add_control(
            'drn',
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
                    '{{WRAPPER}} .smtitle .excerpt-wrap' => 'text-align: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'xxcd1',
            [
                'label' => __( 'Height', 'news-element' ),
                'type' =>  Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 800,
                        'step' => 1,
                    ],

                ],
                'selectors' => [
                    '{{WRAPPER}} .style_one .bgtitle .ft-thumbwrap img' => 'height: {{SIZE}}px;',
                ],

            ]
        );

        $this->add_responsive_control(
            'sedad',
            [
                'label' => __('Content padding', 'news-element'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .smtitle .excerpt-wrap' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ]
            ]
        );

        $this->add_responsive_control(
            'sbtmrgn',
            [
                'label' => __( 'Bottom margin', 'news-element' ),
                'type' =>  Controls_Manager::SLIDER,
                'selectors' => [
                    '{{WRAPPER}} .smtitle .post-item' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'xxcbg',
            [
                'label' => __( 'Content background', 'news-element' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .smtitle .excerpt-wrap' => 'background: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'sraisd',
            [
                'label' => __( 'Raised content', 'news-element' ),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => __( 'Yes', 'news-element' ),
                'label_off' => __( 'No', 'news-element' ),
                'condition' => [
                    'tmpl' => 'style_one',
                ],
            ]
        );

        $this->add_control(
            'cft',
            [
                'label' => __( 'Center Content', 'news-element' ),
                'type' => Controls_Manager::SWITCHER,
                'selectors' => [
                    '{{WRAPPER}} .smtitle .excerpt-wrap' => 'margin: 0px auto;',
                ],
                'condition' => [
                    'tmpl' => 'style_one',
                ],
            ]
        );

        $this->add_responsive_control(
            'drfd_width',
            [
                'label' => __( 'Raised content width', 'news-element' ),
                'type' =>  Controls_Manager::SLIDER,
                'range' => [
                    '%' => [
                        'min' => 0,
                        'max' => 100,
                        'step' => 1,
                    ],

                ],
                'size_units' => [ '%'],
                'condition' => [
                    'sraisd' => 'yes',
                ],
                'selectors' => [
                    '{{WRAPPER}} .smtitle .excerpt-wrap' => 'width: {{SIZE}}%;',
                ],

            ]
        );

        $this->add_responsive_control(
            'dr_top',
            [
                'label' => __( 'Raised top margin', 'news-element' ),
                'type' =>  Controls_Manager::SLIDER,
                'range' => [
                    '%' => [
                        'min' => 0,
                        'max' => 100,
                        'step' => 1,
                    ],

                ],
                'condition' => [
                    'sraisd' => 'yes',
                ],
                'size_units' => [ '%'],
                'selectors' => [
                    '{{WRAPPER}} .smtitle .excerpt-wrap' => 'margin-top: -{{SIZE}}{{UNIT}};',
                ],

            ]
        );

        $this->add_responsive_control(
            'frwidr',
            [
                'label' => __( 'Thumb width', 'news-element' ),
                'type' =>  Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 1000,
                        'step' => 1,
                    ],

                ],
                'size_units' => ['px','%'],
                'condition' => [
                    'tmpl' => 'style_two',
                ],
                'selectors' => [
                    '{{WRAPPER}} .style_two .smtitle .ft-thumbwrap' => 'width: {{SIZE}}{{UNIT}};',
                ],

            ]
        );

        $this->end_controls_tab();

        $this->end_controls_tabs();

        $this->end_controls_section();

        $this->start_controls_section(
            'section_header4',
            [
                'label' => __('Filter', 'news-element'),
                'tab' => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'filtr!' => 'yes',
                ],
            ]
        );

        $this->add_responsive_control(
            'header_botmar',
            [
                'label' => __( 'Wrapper bottom margin', 'news-element' ),
                'type' =>  Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 60,
                        'step' => 1,
                    ]
                ],
                'size_units' => [ 'px'],
                'selectors' => [
                    '{{WRAPPER}} .kb-filter-bar' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'header_botpad',
            [
                'label' => __( 'Wrapper bottom padding', 'news-element' ),
                'type' =>  Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 60,
                        'step' => 1,
                    ]
                ],
                'size_units' => [ 'px'],
                'selectors' => [
                    '{{WRAPPER}} .kb-filter-bar' => 'padding-bottom: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'filter_pos',
            [
                'label' => __( 'Filter top position', 'news-element' ),
                'type' =>  Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 30,
                        'step' => 1,
                    ]
                ],
                'size_units' => [ 'px'],
                'selectors' => [
                    '{{WRAPPER}} .rightpart' => 'top: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_control(
            'header_color',
            [
                'label' => __( 'Title color', 'news-element' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .leftpart' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .rightpart a:hover,{{WRAPPER}} .rightpart a.active' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .style-one .leftpart:after' => 'background: {{VALUE}};',
                    '{{WRAPPER}} .loader' => 'border-right: 3px solid {{VALUE}};border-top: 3px solid {{VALUE}};border-bottom: 3px solid {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'header_colorh',
            [
                'label' => __( 'Title link color', 'news-element' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .rightpart a,{{WRAPPER}} .rightpart' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'header_typography',
                'label' => __('Label Typography', 'news-element'),
                'selector' => '{{WRAPPER}} .leftpart h3',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'lheader_typography',
                'label' => __('Link Typography', 'news-element'),
                'selector' => '{{WRAPPER}} .rightpart a,{{WRAPPER}} .rightpart',
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'section_title',
            [
                'label' => __('Title', 'news-element'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->start_controls_tabs('ttl');

        $this->start_controls_tab(
            'x3',
            [
                'label' => esc_html__( 'Full', 'news-element' ),
            ]
        );

        $this->add_responsive_control(
            'fclmp',    
            [
                'label' => __( 'Line clamp', 'news-element' ),
                'type' =>  Controls_Manager::SLIDER,
                'selectors' => [
                    '{{WRAPPER}} .bgtitle .entry_title' => '-webkit-line-clamp: {{SIZE}};',
                ],

            ]
        );

        $this->add_control(
            'sh_clr',
            [
                'label' => __( 'Color', 'news-element' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .bgtitle .entry_title a' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'stclr',
            [
                'label' => __( 'Color hover', 'news-element' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .bgtitle .entry_title:hover a' => 'color: {{VALUE}};',
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
                    '{{WRAPPER}} .bgtitle .entry_title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ]
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'sttl',
                'label' => __('Typography', 'news-element'),
                'selector' => '{{WRAPPER}} .bgtitle .entry_title',
            ]
        );


        $this->end_controls_tab();

        $this->start_controls_tab(
            'x4',
            [
                'label' => esc_html__( 'Thumb', 'news-element' ),
            ]
        );

        $this->add_responsive_control(
            'lclamp',
            [
                'label' => __( 'Line clamp', 'news-element' ),
                'type' =>  Controls_Manager::SLIDER,
                'selectors' => [
                    '{{WRAPPER}} .smtitle .entry_title' => '-webkit-line-clamp: {{SIZE}};',
                ],
            ]
        );

        $this->add_control(
            'th_clr',
            [
                'label' => __( 'Color', 'news-element' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .smtitle .entry_title a' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'ftclr',
            [
                'label' => __( 'Color hover', 'news-element' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .smtitle .entry_title:hover a' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'ftmr',
            [
                'label' => __('Margin', 'news-element'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .smtitle .entry_title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ]
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'ftttl',
                'label' => __('Typography', 'news-element'),
                'selector' => '{{WRAPPER}} .smtitle .entry_title',
            ]
        );

        $this->end_controls_tab();

        $this->end_controls_tabs();

        $this->end_controls_section();

        $this->start_controls_section(
            'section_bmeta',
            [
                'label' => __('Meta', 'news-element'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_responsive_control(
            'mtaspce',
            [
                'label' => __('Meta spacer', 'news-element'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .meta-space' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ]
            ]
        );

        $this->add_control(
            'mtm_color',
            [
                'label' => __( 'Meta color', 'news-element' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .leffect-1' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'mtm_colora',
            [
                'label' => __( 'Meta link color', 'news-element' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .leffect-1 a' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'mtm_typo',
                'label' => __('Typography', 'news-element'),
                'selector' => '{{WRAPPER}} .leffect-1',
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'section_fblock',
            [
                'label' => __('Excerpt', 'news-element'),
                'tab' => Controls_Manager::TAB_STYLE,
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
            'section_bgcatr',
            [
                'label' => __('Thumb overlay category', 'news-element'),
                'tab' => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'hidecat_overlay!' => 'yes',
                ],
            ]
        );

        $this->add_responsive_control(
            'bgr_cat',
            [
                'label' => __('Position', 'news-element'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'allowed_dimensions' => [ 'top', 'left'],
                'selectors' => [
                    '{{WRAPPER}} .khboverlaythumb' => 'top: {{TOP}}{{UNIT}};left:{{LEFT}}{{UNIT}};',
                ]
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'tax_typography',
                'selector' => '{{WRAPPER}} .khboverlaythumb .cat-bg',
            ]
        );

        $this->add_responsive_control(
            'tax_pad',
            [
                'label' => __('Padding', 'news-element'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .khboverlaythumb .cat-bg' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ]
            ]
        );

        $this->add_control(
            'tax_color',
            [
                'label' => __( 'Color', 'news-element' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .khboverlaythumb .cat-bg' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'tax_bgcolor',
            [
                'label' => __( 'Background', 'news-element' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .khboverlaythumb .cat-bg' => 'background: {{VALUE}} !important;',
                ],
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'section_readmore',
            [
                'label' => __('Read more', 'news-element'),
                'tab' => Controls_Manager::TAB_STYLE,
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
            'section_button',
            [
                'label' => __('Pagination', 'news-element'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_responsive_control(
            'pnxt_w',
            [
                'label' => __( 'Prev next height & width', 'ashelement' ),
                'type' =>  Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 1000,
                        'step' => 1,
                    ],

                ],
                'condition' => [
                    'pagination' => 'prev_next',
                ],
                'size_units' => [ 'px','%'],
                'selectors' => [
                    '{{WRAPPER}} .khobish_pagination .prev,{{WRAPPER}} .khobish_pagination .next' => 'width: {{SIZE}}{{UNIT}};height: {{SIZE}}{{UNIT}};',
                ],

            ]
        );

        $this->add_responsive_control(
            'pnspcingt',
            [
                'label' => __( 'Prev next inner spacing', 'ashelement' ),
                'type' =>  Controls_Manager::SLIDER,
                'condition' => [
                    'pagination' => 'prev_next',
                ],
                'selectors' => [
                    '{{WRAPPER}} .khobish_pagination .mz_prev,{{WRAPPER}} .khobish_pagination .mz_next' => 'padding:0px {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'load_more_w',
            [
                'label' => __( 'Button width', 'ashelement' ),
                'type' =>  Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 1000,
                        'step' => 1,
                    ],

                ],
                'condition' => [
                    'pagination' => 'load_more',
                ],
                'size_units' => [ 'px','%'],
                'selectors' => [
                    '{{WRAPPER}} .load-more .mz_next' => 'width: {{SIZE}}{{UNIT}};',
                ],

            ]
        );

        $this->add_responsive_control(
            'load_more_h',
            [
                'label' => __( 'Button height', 'ashelement' ),
                'type' =>  Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 500,
                        'step' => 1,
                    ],

                ],
                'condition' => [
                    'pagination' => 'load_more',
                ],
                'size_units' => [ 'px','%'],
                'selectors' => [
                    '{{WRAPPER}} .khobish_pagination.load-more a' => 'height: {{SIZE}}{{UNIT}};',
                ],

            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'btn_typographyy',
                'selector' => '{{WRAPPER}} .khobish_pagination',
            ]
        );

        $this->add_control(
            'align_btn',
            [
                'label' => __('Alignment', 'webangon'),
                'type' => Controls_Manager::CHOOSE,
                'options' => [
                    'left' => [
                        'title' => __('Left', 'webangon'),
                        'icon' => 'eicon-text-align-left',
                    ],
                    'center' => [
                        'title' => __('Center', 'webangon'),
                        'icon' => 'eicon-text-align-center',
                    ],
                    'right' => [
                        'title' => __('Right', 'webangon'),
                        'icon' => 'eicon-text-align-right',
                    ],
                    'justify' => [
                        'title' => __('Justified', 'webangon'),
                        'icon' => 'eicon-text-align-justify',
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .khobish_pagination' => 'text-align: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'btn_margin',
            [
                'label' => __('Margin', 'webangon'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .khobish_pagination' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ]
            ]
        );

        $this->add_control(
            'btn_colorr',
            [
                'label' => __('Color', 'webangon'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .khobish_pagination a' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'btn_bg',
            [
                'label' => __('Backgroundcolor', 'webangon'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .khobish_pagination a' => 'background: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'btn-border_color',
            [
                'label' => __( 'Border color', 'ashelement' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .khobish_pagination a' => 'border-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'btn_colorh',
            [
                'label' => __('Hover color', 'webangon'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .khobish_pagination a:hover' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'btn_bgh',
            [
                'label' => __('Hover background color', 'webangon'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .khobish_pagination a:hover' => 'background: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'btn-border_colorh',
            [
                'label' => __( 'Hover Border color', 'ashelement' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .khobish_pagination a:hover' => 'border-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'btn-border-radius',
            [
                'label' => __( 'Border radius', 'ashelement' ),
                'type' =>  Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 200,
                        'step' => 1,
                    ],

                ],
                'size_units' => [ 'px'],
                'selectors' => [
                    '{{WRAPPER}} .khobish_pagination a' => 'border-radius: {{SIZE}}{{UNIT}};',
                ],

            ]
        );

        $this->add_responsive_control(
            'pgisepclr',
            [
                'label' => __('Vertical line color', 'webangon'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .mz_prev:before,{{WRAPPER}} .mz_next:after,{{WRAPPER}} .load-more .mz_next:before' => 'background: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'pgisepspac',
            [
                'label' => __( 'Vertical line spacing', 'ashelement' ),
                'type' =>  Controls_Manager::SLIDER,
                'selectors' => [
                    '{{WRAPPER}} .mz_next:after' => 'margin-left: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .load-more .mz_next:before' => 'margin-right: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .mz_prev:before' => 'margin-right: {{SIZE}}{{UNIT}};',
                ],

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
    $widgets_manager->register(new \News_Element\Widgets\khobish_mag16());
} else {
    $widgets_manager->register_widget_type(new \News_Element\Widgets\khobish_mag16());
}
