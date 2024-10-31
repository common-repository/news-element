<?php
namespace News_Element\Widgets;
use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Box_Shadow;
use Elementor\Utils;
use News_Element\Khobish_Helper;
use News_Element\Widgets\Group_Query;

if (!defined('ABSPATH'))
    exit;

class khobish_herogrid16 extends Widget_Base {

    public function get_name() {
        return 'ae_hgrid16';
    }

    public function get_title() {
        return __('Hero 16', 'news-element');
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

        $this->end_controls_section();

        $this->start_controls_section(
            'section_first',
            [
                'label' => __('Meta Builder', 'news-element'),
            ]
        );

        $this->start_controls_tabs('dfd');

        $this->start_controls_tab(
            'x1',
            [
                'label' => esc_html__( 'First', 'news-element' ),
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
            'fmeta',
            [
                'type' => Controls_Manager::REPEATER,
                'fields' => $r1->get_controls(),
                'prevent_empty' => false,
                'title_field' => '{{{ meta }}}',
            ]
        );

        $this->add_control(
            'fimg',
            [
                'label' => __('Image size', 'news-element'),
                'type' => Controls_Manager::SELECT,
                'label_block' => true,
                'options' =>  Khobish_Helper::ae_image_size_choose(),
                'multiple' => false,
            ]
        );

        $this->add_control(
            'fex',
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
            'x2',
            [
                'label' => esc_html__( 'Second', 'news-element' ),
            ]
        );

        $r1s = new \Elementor\Repeater();
        $r1s->add_control(
            'meta', [
                'label' =>   esc_html__( 'Post meta', 'news-element' ),
                'type' => Controls_Manager::SELECT2,
                'label_block' => true,
                'multiple' => false,
                'options' =>  Khobish_Helper::magnews_meta_fields(),
            ]
        );

        $this->add_control(
            'smeta',
            [
                'type' => Controls_Manager::REPEATER,
                'fields' => $r1s->get_controls(),
                'prevent_empty' => false,
                'title_field' => '{{{ meta }}}',
            ]
        );

        $this->add_control(
            'simg',
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
            'section_gnrl',
            [
                'label' => __('General', 'news-element'),
                'tab' => Controls_Manager::TAB_SETTINGS,
            ]
        );

        $this->add_control(
            'tmpl',
            [
                'label' => __('Template', 'news-element'),
                'type' => Controls_Manager::CHOOSE,
                'options' => [
                    'style_one' => [
                        'title' => __('One', 'news-element'),
                        'icon' => 'eicon-text-align-left',
                    ],
                    'style_two' => [
                        'title' => __('Two', 'news-element'),
                        'icon' => 'eicon-text-align-center',
                    ],
                    'style_three' => [
                        'title' => __('Three', 'news-element'),
                        'icon' => 'eicon-text-align-right',
                    ]
                ],
                'default' => 'style_one',
            ]
        );

        $this->add_control(
            'hidecat_overlay',
            [
                'label' => __( 'Hide overlay category', 'news-element' ),
                'type' => Controls_Manager::SWITCHER,
                'selectors' => [
                    '{{WRAPPER}} .ft-thumbwrap .catbg-wrap' => 'display: none;',
                ],
            ]
        );

        $this->add_control(
            'hidemedia_overlay',
            [
                'label' => __( 'Hide media overlay', 'news-element' ),
                'type' => Controls_Manager::SWITCHER,
                'selectors' => [
                    '{{WRAPPER}} .khbicon' => 'display: none;',
                ],
            ]
        );

        $this->add_responsive_control(
            'gitsp',
            [
                'label' => __( 'Item spacing', 'news-element' ),
                'type' =>  Controls_Manager::SLIDER,
                'selectors' => [
                    '{{WRAPPER}} .khobishhero16 >div[class^="fw-col-md"]' => 'padding-left: {{SIZE}}{{UNIT}};padding-right: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .khobishhero16' => 'margin-right: -{{SIZE}}{{UNIT}};margin-left: -{{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'thbdr',
            [
                'label' => __( 'Thumbnail border radius', 'news-element' ),
                'type' =>  Controls_Manager::SLIDER,
                'selectors' => [
                    '{{WRAPPER}} .ft-thumbwrap' => 'border-radius:{{SIZE}}{{UNIT}};',
                ],

            ]
        );

        $this->start_controls_tabs('frw');

        $this->start_controls_tab(
            'd3',
            [
                'label' => esc_html__( 'Big', 'news-element' ),
            ]
        );

        $this->add_responsive_control(
            'fhrty',
            [
                'label' => __( 'Height', 'news-element' ),
                'type' =>  Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 1000,
                        'step' => 1,
                    ],

                ],
                'selectors' => [
                    '{{WRAPPER}} .firstblock .ft-thumbwrap' => 'height: {{SIZE}}{{UNIT}};',
                ],

            ]
        );

        $this->add_responsive_control(
            'bgtry',
            [
                'label' => __('Content padding', 'news-element'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .firstblock .excerpt-wrap' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ]
            ]
        );

        $this->add_control(
            'bgbgr',
            [
                'label' => __( 'Background', 'news-element' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .firstblock .excerpt-wrap' => 'background: {{VALUE}};',
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
                    '{{WRAPPER}} .firstblock .excerpt-wrap' => 'margin: 0px auto;',
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
                    '{{WRAPPER}} .firstblock .excerpt-wrap' => 'width: {{SIZE}}%;',
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
                    '{{WRAPPER}} .firstblock .excerpt-wrap' => 'margin-top: -{{SIZE}}{{UNIT}};',
                ],

            ]
        );

        $this->end_controls_tab();

        $this->start_controls_tab(
            'd4',
            [
                'label' => esc_html__('Small', 'news-element'),
            ]
        );

        $this->add_responsive_control(
            'rretry',
            [
                'label' => __('Content padding', 'news-element'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .secondblock .excerpt-wrap' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ]
            ]
        );

        $this->add_control(
            'rbgr',
            [
                'label' => __( 'Background', 'news-element' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .secondblock .excerpt-wrap' => 'background: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'rsed',
            [
                'label' => __( 'Raised content', 'news-element' ),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => __( 'Yes', 'news-element' ),
                'label_off' => __( 'No', 'news-element' ),
            ]
        );

        $this->add_control(
            'rrcnt',
            [
                'label' => __( 'Center Content', 'news-element' ),
                'type' => Controls_Manager::SWITCHER,
                'selectors' => [
                    '{{WRAPPER}} .secondblock .excerpt-wrap' => 'margin: 0px auto;',
                ],
            ]
        );

        $this->add_responsive_control(
            'red_width',
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
                    'rsed' => 'yes',
                ],
                'selectors' => [
                    '{{WRAPPER}} .secondblock .excerpt-wrap' => 'width: {{SIZE}}%;',
                ],

            ]
        );

        $this->add_responsive_control(
            'red_top',
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
                    'rsed' => 'yes',
                ],
                'size_units' => [ '%'],
                'selectors' => [
                    '{{WRAPPER}} .secondblock .excerpt-wrap' => 'margin-top: -{{SIZE}}{{UNIT}};',
                ],

            ]
        );

        $this->add_responsive_control(
            'mbbt',
            [
                'label' => __( 'Bottom margin', 'news-element' ),
                'type' =>  Controls_Manager::SLIDER,
                'selectors' => [
                    '{{WRAPPER}} .post-item.secondblock' => 'margin-bottom:{{SIZE}}{{UNIT}};',
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

        $this->start_controls_tabs('title');

        $this->start_controls_tab(
            'tmain',
            [
                'label' => esc_html__( 'BIG GRID', 'news-element' ),
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

        $this->end_controls_tab();

        $this->start_controls_tab(
            'wer',
            [
                'label' => esc_html__( 'Small', 'news-element' ),
            ]
        );

        $this->add_control(
            'qclr',
            [
                'label' => __( 'Color', 'news-element' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .secondblock .entry_title a' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'qeclr',
            [
                'label' => __( 'Hover color', 'news-element' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .secondblock .entry_title:hover a' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
          'q2-mr',
          [
             'label' =>   esc_html__( 'Margin', 'news-element' ),
             'type' => Controls_Manager::DIMENSIONS,
             'size_units' => [ 'em','px'],
             'selectors' => [
                    '{{WRAPPER}} .secondblock .entry_title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
             ],
          ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'qetypo',
                'selector' => '{{WRAPPER}} .secondblock .entry_title',
                'label' => __( 'Typography', 'news-element' ),
            ]
        );

        $this->end_controls_tab();

        $this->end_controls_tabs();

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
            'tax_bgclr',
            [
                'label' => __( 'Background', 'news-element' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .catbg-wrap .cat-bg' => 'background: {{VALUE}} !important;',
                ],
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'section_taxgo',
            [
                'label' => __('Thumb overlay category', 'news-element'),
                'tab' => Controls_Manager::TAB_SETTINGS,
                'condition' => [
                    'hidecat_overlay!' => 'yes',
                ],
            ]
        );

        $this->add_responsive_control(
            'bg_cat',
            [
                'label' => __('Position big grid', 'news-element'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'allowed_dimensions' => [ 'top', 'left'],
                'selectors' => [
                    '{{WRAPPER}} .firstblock .ft-thumbwrap .catbg-wrap' => 'top: {{TOP}}{{UNIT}};left:{{LEFT}}{{UNIT}};position:absolute;',
                ]
            ]
        );

        $this->add_responsive_control(
            'bgs_cat',
            [
                'label' => __('Position small grid', 'news-element'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'allowed_dimensions' => [ 'top', 'left'],
                'selectors' => [
                    '{{WRAPPER}} .secondblock .ft-thumbwrap .catbg-wrap' => 'top: {{TOP}}{{UNIT}};left:{{LEFT}}{{UNIT}};position:absolute;',
                ]
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
                'name' => 'bgcat_typography',
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
            'pm1clr',
            [
                'label' => __( 'Color', 'news-element' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .leffect-1' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'pm1lclr',
            [
                'label' => __( 'Link Color', 'news-element' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .leffect-1 a' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'pm1hclr',
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
                'name' => 'pm1typ',
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
        $this->add_responsive_control(
          'gt-mr',
          [
             'label' =>   esc_html__( 'Margin', 'news-element' ),
             'type' => Controls_Manager::DIMENSIONS,
             'size_units' => [ 'em','px'],

             'selectors' => [
                    '{{WRAPPER}} .entry_excerpt' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
             ],
          ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'exc_typo',
                'label' => __('Typography', 'news-element'),
                'selector' => '{{WRAPPER}} .entry_excerpt',
            ]
        );

        $this->add_control(
            'exc_clr',
            [
                'label' => __( 'Color', 'news-element' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .entry_excerpt' => 'color: {{VALUE}};',
                ],
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

    }

    protected function render() {

        $settings = $this->get_settings();
        require dirname(__FILE__) .'/view.php';

    }

    protected function content_template() {
    }

}

if ( defined( 'ELEMENTOR_VERSION' ) && version_compare( ELEMENTOR_VERSION, '3.5.0', '>=' ) ) {
    $widgets_manager->register(new \News_Element\Widgets\khobish_herogrid16());
} else {
    $widgets_manager->register_widget_type(new \News_Element\Widgets\khobish_herogrid16());
}
