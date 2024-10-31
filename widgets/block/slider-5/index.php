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

class khobish_slider_5 extends Widget_Base {

    public function get_name() {
        return 'khb_slydr5';
    }

    public function get_title() {
        return __('Slider 5', 'news-element');
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
        $this->add_control(
            'style', [
                'label' => __('Template', 'news-element'),
                'type' => Controls_Manager::CHOOSE,
                'options' => [
                    'style_one' => [
                        'title' => __('Alternate', 'news-element'),
                        'icon' => ' eicon-document-file',
                    ],
                    'style_two' => [
                        'title' => __('Bottom content', 'news-element'),
                        'icon' => 'eicon-image-rollover',
                    ],
                    'style_three' => [
                        'title' => __('Top content', 'news-element'),
                        'icon' => 'eicon-image-rollover',
                    ]
                ],
                'default' => 'style_one'
            ]
        );

        $this->add_control(
            'hmovely',
            [
                'label' => __( 'Hide media overlay', 'news-element' ),
                'type' => Controls_Manager::SWITCHER,
                'selectors' => [
                    '{{WRAPPER}} .khbmedia' => 'display: none;',
                ],
            ]
        );

        $this->add_control(
            'hidethmbov',
            [
                'label' => __( 'Hide thumb overlay category', 'news-element' ),
                'type' => Controls_Manager::SWITCHER,
                'selectors' => [
                    '{{WRAPPER}} .ft-thumbwrap .catbg-wrap' => 'display: none;',
                ],
            ]
        );

        $this->add_control(
            'fullwidthy',
            [
                'label' => __( 'Box wrapper', 'news-element' ),
                'type' => Controls_Manager::SWITCHER,
                'selectors' => [
                    '{{WRAPPER}} .swiper' => 'overflow: hidden;',
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
                        'max' => 1000,
                    ]
                ],
                'size_units' => ['px','%'],
                'selectors' => [
                    '{{WRAPPER}} .ft-thumbwrap img' => 'height: {{SIZE}}{{UNIT}};',
                ],

            ]
        );

        $this->add_control(
            'b1',
            [
                'label' => __( 'Content', 'plugin-name' ),
                'type' => Controls_Manager::HEADING,
                'separator' => 'after',
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
          'cntpad',
          [
             'label' =>   esc_html__( 'Padding', 'news-element' ),
             'type' => Controls_Manager::DIMENSIONS,
             'size_units' => [ 'em','px'],
             'selectors' => [
                    '{{WRAPPER}} .excerpt-wrap' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
             ],
          ]
        );

        $this->add_control(
            'cntbg',
            [
                'label' => __( 'Background', 'news-element' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .excerpt-wrap' => 'background: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_section();

         $this->start_controls_section(
            'section_titles',
            [
                'label' => __('Title', 'news-element'),
                'tab' => Controls_Manager::TAB_SETTINGS,
            ]
        );

        $this->add_control(
            'lclamp',
            [
                'label' => __( 'Line clamp', 'news-element' ),
                'type' =>  Controls_Manager::SLIDER,
                'selectors' => [
                    '{{WRAPPER}} .entry_title' => '-webkit-line-clamp: {{SIZE}};',
                ],

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
            'section_tnhb',
            [
                'label' => __('Thumb category', 'news-element'),
                'tab' => Controls_Manager::TAB_SETTINGS,
                'condition' => [
                    'hidethmbov!' => 'yes',
                ],
            ]
        );

        $this->add_responsive_control(
            'bgcat_pad',
            [
                'label' => __('Padding', 'news-element'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .ft-thumbwrap .cat-bg' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ]
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'bgcat_typo',
                'label' => __('Typography', 'news-element'),
                'selector' => '{{WRAPPER}} .ft-thumbwrap .cat-bg',
            ]
        );

        $this->add_control(
            'bgcat_color',
            [
                'label' => __( 'Color', 'news-element' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .ft-thumbwrap .cat-bg' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'bgcat_bagrnd',
            [
                'label' => __( 'Background', 'news-element' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .ft-thumbwrap .cat-bg' => 'background: {{VALUE}} !important;',
                ],
            ]
        );

        $this->add_control(
            'hbgcat_color',
            [
                'label' => __( 'Hover Color', 'news-element' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .ft-thumbwrap .cat-bg:hover' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'hbgcat_bagrnd',
            [
                'label' => __( 'Hover Background', 'news-element' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .ft-thumbwrap .cat-bg:hover' => 'background: {{VALUE}} !important;',
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
                        'min' => -1000,
                        'max' => 1000,
                        'step' => 1,
                    ]
                ],
                'size_units' => ['px','%'],
                'selectors' => [
                    '{{WRAPPER}} .ft-thumbwrap.even .catbg-wrap' => 'bottom: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .ft-thumbwrap.odd .catbg-wrap' => 'top: {{SIZE}}{{UNIT}};',
                ],

            ]
        );

        $this->add_control(
            'cathp',
            [
                'label' => __( 'Horizontal position', 'news-element' ),
                'type' =>  Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'min' => -1000,
                        'max' => 1000,
                        'step' => 1,
                    ]
                ],
                'size_units' => ['px','%'],
                'selectors' => [
                    '{{WRAPPER}} .ft-thumbwrap .catbg-wrap' => 'left: {{SIZE}}{{UNIT}};',
                ],

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
            'mspd',
            [
                'label' => __('Inter meta spacing', 'elementor' ),
                'type' => Controls_Manager::DIMENSIONS,
                'selectors' => [
                    '{{WRAPPER}} .meta-space' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
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
            'section_carousel',
            [
                'label' => __('Carousel', 'news-element'),
                'tab' => Controls_Manager::TAB_SETTINGS,
            ]
        );

        $this->add_control(
            'item',
            [
                'label' => __( 'Item per slide', 'news-element' ),
                'type' =>  Controls_Manager::SLIDER,
                'default' => [
                    'size' => 3,
                ],
                'range' => [
                    'px' => [
                        'min' => 1,
                        'max' => 10,
                        'step' => 1,
                    ],
                ],
                'size_units' => [ 'px'],
            ]
        );

        $this->add_control(
            'item_tab',
            [
                'label' => __( 'Item per slide tablet', 'news-element' ),
                'type' =>  Controls_Manager::SLIDER,
                'default' => [
                    'size' => 2,
                ],
                'range' => [
                    'px' => [
                        'min' => 1,
                        'max' => 5,
                        'step' => 1,
                    ],
                ],
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
            'dots',
            [
                'label' => __('Dots', 'news-element'),
                'type' => Controls_Manager::SWITCHER,
            ]
        );

        $this->add_control(
            'center',
            [
                'label' => __('Center mode', 'news-element'),
                'type' => Controls_Manager::SWITCHER,
                'return_value' => 'yes',
                'default' => 'no',
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
            'margin',
            [
                'label' => __( 'Margin', 'news-element' ),
                'type' =>  Controls_Manager::SLIDER,
                'default' => [
                    'size' => 10,
                ],

            ]
        );


        $this->end_controls_section();

        $this->start_controls_section(
            'section_arrow',
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

        $this->add_control(
            'arclr',
            [
                'label' => __('Color', 'news-element'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .khbprnx' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'arbg',
            [
                'label' => __('Background', 'news-element'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .khbprnx' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'arclrh',
            [
                'label' => __('Hover color', 'news-element'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .khbprnx:hover' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'arbgh',
            [
                'label' => __('Hover background', 'news-element'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .khbprnx:hover' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'arbdr_r',
            [
                'label' => __( 'Border radius', 'news-element' ),
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
                    '{{WRAPPER}} .khbprnx' => 'border-radius: {{SIZE}}{{UNIT}};',
                ],

            ]
        );

        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'arbdr',
                'label' =>   esc_html__( 'Border', 'news-element' ),
                'selector' => '{{WRAPPER}} .khbprnx',
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'section_dot',
            [
                'label' => __('Dot', 'news-element'),
                'tab' => Controls_Manager::TAB_SETTINGS,
                'condition' => [
                    'dots' => 'yes',
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
                        'min' => -500,
                        'max' => 500,
                        'step' => 1,
                    ],

                ],
                'size_units' => [ 'px'],
                'selectors' => [
                    '{{WRAPPER}} .swiper-container-horizontal>.swiper-pagination-bullets' => 'bottom: {{SIZE}}{{UNIT}};',
                ],

            ]
        );

        $this->add_responsive_control(
            'dtclr',
            [
                'label' => __('Background', 'news-element'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .swiper-pagination-bullet' => 'background: {{VALUE}};',
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
    $widgets_manager->register(new \News_Element\Widgets\khobish_slider_5());
} else {
    $widgets_manager->register_widget_type(new \News_Element\Widgets\khobish_slider_5());
}
