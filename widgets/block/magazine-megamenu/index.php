<?php
namespace News_Element\Widgets;
use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Border;
use Elementor\utils;
use News_Element\Khobish_Helper;

if (!defined('ABSPATH'))
    exit; // Exit if accessed directly


class xlmega_tmpl extends Widget_Base {

    public function get_name() {
        return 'xlmega_tmpl';
    }

    public function get_title() {
        return   esc_html__('Template 1', 'thepack');
    }

    public function get_icon() {
        return 'dashicons dashicons-editor-paragraph';
    }

    public function get_categories() {
        return [ 'xlmega_menu' ];
    }

    protected function register_controls() {

        $this->start_controls_section(
            'lbl_query',
            [
                'label' => __( 'Query', 'khobish' ),
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
                'label' => __('Post per page', 'ashelement'),
                'type' => Controls_Manager::SLIDER,
            ]
        );

        $this->add_control(
            'pagination',
            [
                'label' => __( 'Pagination', 'ashelement' ),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    '' => 'No Pagination',
                    'load_more' => 'Load More',
                    'prev_next' => 'Prev next',
                ],
            ]
        );

        $this->add_control(
            'filtr',
            [
                'label' =>   esc_html__('Hide Filter', 'thepack'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' =>   esc_html__('Yes', 'thepack'),
                'label_off' =>   esc_html__('No', 'thepack'),
                'selectors' => [
                    '{{WRAPPER}} .kb-filter-bar' => 'display: none;',
                ],
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'section_f',
            [
                'label' => __('Post Metas', 'ashelement'),
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
            'imgf',
            [
                'label' => __('Image size', 'ashelement'),
                'type' => Controls_Manager::SELECT,
                'label_block' => true,
                'options' =>  Khobish_Helper::ae_image_size_choose(),
                'multiple' => false,
            ]
        );

        $this->add_control(
            'excerptf',
            [
                'label' => __( 'Excerpt length', 'webangon' ),
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

        $this->end_controls_section();

        $this->start_controls_section(
            'section_general',
            [
                'label' => __('General', 'ashelement'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'hidecat_overlay',
            [
                'label' => __( 'Hide overlay category', 'your-plugin' ),
                'type' => Controls_Manager::SWITCHER,
                'selectors' => [
                    '{{WRAPPER}} .khboverlaythumb' => 'display: none;',
                ],
            ]
        );

        $this->add_responsive_control(
            'gwdfd',
            [
                'label' =>   esc_html__( 'Column width', 'thepack' ),
                'type' =>  Controls_Manager::NUMBER,
                'default' => '25',
                 'selectors' => [
                        '{{WRAPPER}} .khobish-ajax-wrap >div[class^="fw-col-md"]' => 'width: {{VALUE}}%;',
                 ],
            ]
        );

        $this->add_responsive_control(
            'spce',
            [
                'label' => __( 'Column spacing', 'ashelement' ),
                'type' =>  Controls_Manager::SLIDER,
                'selectors' => [
                    '{{WRAPPER}} .khobish-ajax-wrap >div[class^="fw-col-md"]' => 'padding-left: {{SIZE}}{{UNIT}};padding-right: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .khobish-ajax-wrap' => 'margin-left: -{{SIZE}}{{UNIT}};margin-right: -{{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'grpdy',
            [
                'label' => __('Wrapper padding', 'webangon'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .xldmega-menu-1' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ]
            ]
        );

        $this->add_control(
            'align',
            [
                'label' =>   esc_html__('Alignment', 'thepack'),
                'type' => Controls_Manager::CHOOSE,
                'options' => [
                    'left' => [
                        'title' =>   esc_html__('Left', 'thepack'),
                        'icon' => 'fa fa-align-left',
                    ],
                    'center' => [
                        'title' =>   esc_html__('Center', 'thepack'),
                        'icon' => 'fa fa-align-center',
                    ],
                    'right' => [
                        'title' =>   esc_html__('Right', 'thepack'),
                        'icon' => 'fa fa-align-right',
                    ]
                ],
                'selectors' => [
                    '{{WRAPPER}} .excerpt-wrap' => 'text-align: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'rai_pad',
            [
                'label' => __('Content padding', 'webangon'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .excerpt-wrap' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ]
            ]
        );

        $this->add_control(
            'fxcbg',
            [
                'label' => __( 'Content background', 'ashelement' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .excerpt-wrap' => 'background: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'raised',
            [
                'label' => __( 'Raised content', 'your-plugin' ),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => __( 'Yes', 'your-plugin' ),
                'label_off' => __( 'No', 'your-plugin' ),
            ]
        );

        $this->add_control(
            'centercnt',
            [
                'label' => __( 'Center Content', 'your-plugin' ),
                'type' => Controls_Manager::SWITCHER,
                'selectors' => [
                    '{{WRAPPER}} .excerpt-wrap' => 'margin: 0px auto;',
                ],
            ]
        );

        $this->add_responsive_control(
            'raised_width',
            [
                'label' => __( 'Raised content width', 'ashelement' ),
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
                    '{{WRAPPER}} .excerpt-wrap' => 'width: {{SIZE}}%;',
                ],

            ]
        );

        $this->add_responsive_control(
            'raised_top',
            [
                'label' => __( 'Raised top margin', 'ashelement' ),
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
                    '{{WRAPPER}} .excerpt-wrap' => 'margin-top: -{{SIZE}}{{UNIT}};',
                ],

            ]
        );

        $this->add_responsive_control(
            'thmht',
            [
                'label' => __( 'Thumbnail height', 'ashelement' ),
                'type' =>  Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 1000,
                        'step' => 1,
                    ],

                ],
                'selectors' => [
                    '{{WRAPPER}} .ft-thumbwrap img' => 'height: {{SIZE}}px;',
                ],

            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'section_header4',
            [
                'label' => __('Filter', 'webangon'),
                'tab' => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'filtr!' => 'yes',
                ],
            ]
        );


        $this->start_controls_tabs('dd');

        $this->start_controls_tab(
            'd1',
            [
                'label' => esc_html__( 'Wrapper', 'xltab' ),
            ]
        );

        $this->add_control(
            'fltbrdr',
            [
                'label' => __( 'Bordered', 'your-plugin' ),
                'type' => Controls_Manager::SWITCHER,
            ]
        );

        $this->add_control(
            'hydflt',
            [
                'label' => __( 'Hide filter', 'your-plugin' ),
                'type' => Controls_Manager::SWITCHER,
                'selectors' => [
                    '{{WRAPPER}} .kb-filter-bar' => 'display: none;',
                    '{{WRAPPER}} .xl-mega-menu.haskhborder .xldmega-menu-1' => 'border-left-width: 1px;',
                ],
            ]
        );

        $this->add_control(
            'fltbdklr',
            [
                'label' => __( 'Border color', 'ashelement' ),
                'type' => Controls_Manager::COLOR,
                'condition' => [
                    'fltbrdr' => 'yes',
                ],
                'selectors' => [
                    '{{WRAPPER}} .haskhborder .kb-filter-bar,{{WRAPPER}} .haskhborder .xldmega-menu-1,{{WRAPPER}} .haskhborder .kb_subcats_list a.active' => 'border-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'fltwid',
            [
                'label' => __( 'Width', 'ashelement' ),
                'type' =>  Controls_Manager::SLIDER,
                'selectors' => [
                    '{{WRAPPER}} .kb-filter-bar' => 'width: {{SIZE}}%;',
                ],

            ]
        );

        $this->add_control(
            'fbgs',
            [
                'label' => __( 'Background', 'ashelement' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .kb-filter-bar' => 'background: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'fb_pad',
            [
                'label' => __('Padding', 'webangon'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .kb-filter-bar' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ]
            ]
        );

        $this->end_controls_tab();

        $this->start_controls_tab(
            'd2',
            [
                'label' => esc_html__( 'Links', 'xltab' ),
            ]
        );

        $this->add_control(
            'ldrc',
            [
                'label' => __( 'Loader theme', 'ashelement' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .loader' => 'border-right: 3px solid {{VALUE}};border-top: 3px solid {{VALUE}};border-bottom: 3px solid {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'fltclr',
            [
                'label' => __( 'Color', 'ashelement' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .kb_subcats_list a' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'fltbg',
            [
                'label' => __( 'Background', 'ashelement' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .kb_subcats_list a' => 'background: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'fltbgh',
            [
                'label' => __( 'Hover color', 'ashelement' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .kb_subcats_list a:hover,{{WRAPPER}} .kb_subcats_list a.active' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'fltbgkh',
            [
                'label' => __( 'Hover background', 'ashelement' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .kb_subcats_list a:hover,{{WRAPPER}} .kb_subcats_list a.active' => 'background: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'lheader_typography',
                'label' => __('Typography', 'webangon'),
                'selector' => '{{WRAPPER}} .rightpart a',
            ]
        );

        $this->add_responsive_control(
            'xcdpt',
            [
                'label' => __('Padding', 'webangon'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .kb_subcats_list a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ]
            ]
        );

        $this->end_controls_tab();

        $this->end_controls_tabs();

        $this->end_controls_section();

        $this->start_controls_section(
            'section_title',
            [
                'label' => __('Title', 'webangon'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_responsive_control(
            'lclamp',
            [
                'label' => __( 'Line clamp', 'news-element' ),
                'type' =>  Controls_Manager::SLIDER,
                'selectors' => [
                    '{{WRAPPER}} .entry_title' => '-webkit-line-clamp: {{SIZE}};',
                ],

            ]
        );

        $this->add_control(
            'sh_clr',
            [
                'label' => __( 'Color', 'ashelement' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .entry_title a' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'stclr',
            [
                'label' => __( 'Color hover', 'ashelement' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .entry_title:hover a' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'stmr',
            [
                'label' => __('Margin', 'webangon'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .entry_title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ]
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'sttl',
                'label' => __('Typography', 'webangon'),
                'selector' => '{{WRAPPER}} .entry_title',
            ]
        );


        $this->end_controls_section();

        $this->start_controls_section(
            'section_bmeta',
            [
                'label' => __('Meta', 'webangon'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_responsive_control(
            'mtaspce',
            [
                'label' => __('Meta spacer', 'webangon'),
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
                'label' => __( 'Meta color', 'ashelement' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .leffect-1' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'mtm_colora',
            [
                'label' => __( 'Meta link color', 'ashelement' ),
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
                'label' => __('Typography', 'webangon'),
                'selector' => '{{WRAPPER}} .leffect-1',
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'section_fblock',
            [
                'label' => __('Excerpt', 'webangon'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'fexcert_typography',
                'label' => __('Excerpt typography', 'webangon'),
                'selector' => '{{WRAPPER}} .entry_excerpt',
            ]
        );

        $this->add_control(
            'excrtf_color',
            [
                'label' => __( 'Excerpt color', 'ashelement' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .entry_excerpt' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'fexcerpt_pad',
            [
                'label' => __('Excerpt padding', 'webangon'),
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
                'label' => __('Thumb overlay category', 'webangon'),
                'tab' => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'hidecat_overlay!' => 'yes',
                ],
            ]
        );

        $this->add_responsive_control(
            'bgr_cat',
            [
                'label' => __('Position', 'webangon'),
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
                'selector' => '{{WRAPPER}} .khboverlaythumb',
            ]
        );

        $this->add_responsive_control(
            'tax_pad',
            [
                'label' => __('Padding', 'webangon'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .khboverlaythumb .catbg-wrap .cat-bg' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ]
            ]
        );

        $this->add_control(
            'tax_color',
            [
                'label' => __( 'Color', 'ashelement' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .khboverlaythumb .catbg-wrap .cat-bg' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'tax_bgcolor',
            [
                'label' => __( 'Background', 'ashelement' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .khboverlaythumb .catbg-wrap .cat-bg' => 'background: {{VALUE}} !important;',
                ],
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'section_readmore',
            [
                'label' => __('Read more', 'ashelement'),
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
                'label' => __( 'Button color', 'ashelement' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .btn-more' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'btn_colorbg',
            [
                'label' => __( 'Button background', 'ashelement' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .btn-more' => 'background: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'btn_color-h',
            [
                'label' => __( 'Button color hover', 'ashelement' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .btn-more:hover' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'btn_colorbgh',
            [
                'label' => __( 'Button background hover', 'ashelement' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .btn-more:hover' => 'background: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'btn_bcol',
            [
                'label' => __( 'Button border color', 'ashelement' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .btn-more' => 'border-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'btn_bcolh',
            [
                'label' => __( 'Button border hover', 'ashelement' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .btn-more:hover' => 'border-color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'bbtnwidth',
            [
                'label' => __( 'Border width', 'ashelement' ),
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
                'label' => __( 'Border radisu', 'ashelement' ),
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
                'label' => __('Button padding', 'webangon'),
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
                'label' => __('Pagination', 'webangon'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'load_more_w',
            [
                'label' => __( 'Button width', 'news-element' ),
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
            'prevnxtsp',
            [
                'label' => __( 'Prev next spacing', 'news-element' ),
                'type' =>  Controls_Manager::SLIDER,
                'condition' => [
                    'pagination' => 'prev_next',
                ],
                'selectors' => [
                    '{{WRAPPER}} .khobish_pagination > div' => 'padding:0px {{SIZE}}{{UNIT}};',
                ],

            ]
        );

        $this->add_responsive_control(
            'prevnxtspso',
            [
                'label' => __( 'Prev next width', 'news-element' ),
                'type' =>  Controls_Manager::SLIDER,
                'condition' => [
                    'pagination' => 'prev_next',
                ],
                'selectors' => [
                    '{{WRAPPER}} .khobish_pagination .prev,{{WRAPPER}} .khobish_pagination .next' => 'width:{{SIZE}}{{UNIT}};height:{{SIZE}}{{UNIT}};',
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
                    ],
                    'justify' => [
                        'title' => __('Justified', 'news-element'),
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
                'label' => __('Margin', 'news-element'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .khobish_pagination' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ]
            ]
        );

        $this->add_responsive_control(
            'btn_pad',
            [
                'label' => __('Padding', 'news-element'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .khobish_pagination a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ]
            ]
        );

        $this->add_control(
            'btn_colorr',
            [
                'label' => __('Button color', 'news-element'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .khobish_pagination a' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'btn_bg',
            [
                'label' => __('Button backgroundcolor', 'news-element'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .khobish_pagination a' => 'background: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'btn-border_color',
            [
                'label' => __( 'Border color', 'news-element' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .khobish_pagination a' => 'border-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'btn_colorh',
            [
                'label' => __('Hover Button color', 'news-element'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .khobish_pagination a:hover' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'btn_bgh',
            [
                'label' => __('Hover Button background color', 'news-element'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .khobish_pagination a:hover' => 'background: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'btn-border_colorh',
            [
                'label' => __( 'Hover Border color', 'news-element' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .khobish_pagination a:hover' => 'border-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'btn-border-radius',
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
                    '{{WRAPPER}} .khobish_pagination a' => 'border-radius: {{SIZE}}{{UNIT}};',
                ],

            ]
        );

        $this->add_control(
            'btn-border-width',
            [
                'label' => __( 'Border width', 'news-element' ),
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
                    '{{WRAPPER}} .khobish_pagination a' => 'border-width: {{SIZE}}{{UNIT}};border-style:solid;',
                ],

            ]
        );

        $this->add_control(
            'pgisepclr',
            [
                'label' => __('Vertical line color', 'news-element'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .mz_prev:before,{{WRAPPER}} .mz_next:after,{{WRAPPER}} .load-more .mz_next:before' => 'background: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'pgisepspac',
            [
                'label' => __( 'Vertical line spacing', 'news-element' ),
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
    $widgets_manager->register(new \News_Element\Widgets\xlmega_tmpl());
} else {
    $widgets_manager->register_widget_type(new \News_Element\Widgets\xlmega_tmpl());
}

