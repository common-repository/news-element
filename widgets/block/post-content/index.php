<?php

namespace News_Element\Widgets;
use Elementor;
use Elementor\Plugin;
use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Border;
use News_Element\Khobish_Helper;
use WP_Query;

class news_ele_post_content extends Widget_Base{
    public function get_name() {
        return 'khbthmpstcont';
    }

    public function get_title() {
        return   esc_html__( 'Content', 'news-element' );
    }

    public function get_icon() {
        return 'dashicons dashicons-chart-pie';
    }

    public function get_categories() {
        return ['khobish-builder'];
    }

    protected function register_controls() {

        $this->start_controls_section(
            'section_general_style',
            [
                'label' =>   esc_html__( 'General', 'news-element' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

         $this->add_control(
            'prev_id',
            [
                'label' => __('Preview Post', 'news-element'),
                'type' => Controls_Manager::SELECT2,
                'options' => Khobish_Helper::khobish_drop_posts('post'),
                'multiple' => false,
                'label_block' => true,
            ]
        );

        $this->add_control(
            'color',
            [
                'label' =>   esc_html__( 'Content Color', 'news-element' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .content-builder' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'content_align',
            [
                'label' =>   esc_html__( 'Content Align', 'news-element' ),
                'type' => Controls_Manager::CHOOSE,
                'options' => [
                    'left' => [
                        'title' =>   esc_html__( 'Left', 'news-element' ),
                        'icon' => 'eicon-text-align-left',
                    ],
                    'center' => [
                        'title' =>   esc_html__( 'Center', 'news-element' ),
                        'icon' => 'eicon-text-align-center',
                    ],
                    'right' => [
                        'title' =>   esc_html__( 'Right', 'news-element' ),
                        'icon' => 'eicon-text-align-right',
                    ],
                    'justify' => [
                        'title' =>   esc_html__('Justified', 'news-element'),
                        'icon' => 'eicon-text-align-justify',
                    ],
                ],
                'default' => 'left',
                'selectors' => [
                    '{{WRAPPER}} .content-builder' => 'text-align: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'dropcap',
            [
                'label' => __( 'Dropcap', 'news-element' ),
                'type' => Controls_Manager::SWITCHER,
            ]
        );

/*         $this->add_control(
            'postgal',
            [
                'label' => __( 'Post gallery', 'news-element' ),
                'type' => Controls_Manager::SWITCHER,
            ]
        );

        $this->add_control(
            'postrel',
            [
                'label' => __( 'Related post', 'news-element' ),
                'type' => Controls_Manager::SWITCHER,
            ]
        );

        $this->add_control(
            'posreview',
            [
                'label' => __( 'Review', 'news-element' ),
                'type' => Controls_Manager::SWITCHER,
            ]
        ); */

        $this->add_control(
            'floatshare',
            [
                'label' => __( 'Floating share', 'news-element' ),
                'type' => Controls_Manager::SWITCHER,
            ]
        );

        $this->end_controls_section();

/*         $this->start_controls_section(
            'section_postreview',
            [
                'label' =>   esc_html__('Review', 'news-element'),
                'tab' => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'posreview' => 'yes',
                ],
            ]
        );

        $this->add_control(
            'revproic', [
                'label' =>   esc_html__( 'Pro icon', 'news-element' ),
                'type' => Controls_Manager::ICON,
                'label_block' => true,
            ]
        );

        $this->add_control(
            'revconic', [
                'label' =>   esc_html__( 'Con icon', 'news-element' ),
                'type' => Controls_Manager::ICON,
                'label_block' => true,
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'section_postrel',
            [
                'label' =>   esc_html__('Related post', 'news-element'),
                'tab' => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'postrel' => 'yes',
                ],
            ]
        );

        $this->add_control(
            'related_label', [
                'label' =>   esc_html__( 'Label', 'news-element' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default'=> 'See Also',
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
            'relhidethmb',
            [
                'label' => __( 'Show thumb', 'news-element' ),
                'type' => Controls_Manager::SWITCHER,
            ]
        );

        $this->add_control(
            'imgf',
            [
                'label' => __('Thumb size', 'news-element'),
                'type' => Controls_Manager::SELECT,
                'label_block' => true,
                'options' =>  Khobish_Helper::ae_image_size_choose(),
                'multiple' => false,
                'condition' => [
                    'relhidethmb!' => 'yes',
                ],
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'section_postgal',
            [
                'label' =>   esc_html__('Gallery', 'news-element'),
                'tab' => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'postgal' => 'yes',
                ],
            ]
        );

        $this->add_control(
            'galins',
            [
                'label' => __( 'After', 'news-element' ),
                'type' =>  Controls_Manager::SLIDER,
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
            'imgth',
            [
                'label' => __('Thumb image size', 'news-element'),
                'type' => Controls_Manager::SELECT,
                'label_block' => true,
                'options' =>  Khobish_Helper::ae_image_size_choose(),
                'multiple' => false,
            ]
        );

        $this->add_control(
            'galauto',
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
            'galspeed',
            [
                'label' => __( 'Autoplay Speed', 'news-element' ),
                'type' =>  Controls_Manager::SLIDER,
                'default' => [
                    'size' => 3500,
                ],
                'condition' => [
                    'galauto' => 'yes',
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
            'galitems',
            [
                'label' => __( 'Items', 'news-element' ),
                'type' =>  Controls_Manager::SLIDER,
                'default' => [
                    'size' => 4,
                ],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 10,
                        'step' => 1,
                    ],
                ],
                'size_units' => [ 'px'],
            ]
        );

        $this->add_control(
            'galitemstab',
            [
                'label' => __( 'Items Tablet', 'news-element' ),
                'type' =>  Controls_Manager::SLIDER,
                'default' => [
                    'size' => 3,
                ],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 10,
                        'step' => 1,
                    ],
                ],
                'size_units' => [ 'px'],
            ]
        );

        $this->end_controls_section(); */

        $this->start_controls_section(
            'section_heading',
            [
                'label' =>   esc_html__( 'Heading', 'news-element' ),
                'tab' => Controls_Manager::TAB_SETTINGS,
            ]
        );

        $this->add_control(
            'h1',
            [
                'label' =>   esc_html__( 'H1', 'news-element' ),
                'type' => Controls_Manager::RAW_HTML,
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'h1ty',
                'label' =>   esc_html__( 'Typography', 'news-element' ),
                'selector' => '{{WRAPPER}} h1',
            ]
        );

        $this->add_responsive_control(
            'h1-m',
            [
                'label' =>   esc_html__('Margin', 'news-element'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em'],
                'selectors' => [
                    '{{WRAPPER}} h1' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ]
            ]
        );


        $this->add_control(
            'h2',
            [
                'label' =>   esc_html__( 'H2', 'news-element' ),
                'type' => Controls_Manager::RAW_HTML,
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'h2ty',
                'label' =>   esc_html__( 'Typography', 'news-element' ),
                'selector' => '{{WRAPPER}} h2',
            ]
        );

        $this->add_responsive_control(
            'h2-m',
            [
                'label' =>   esc_html__('Margin', 'news-element'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em'],
                'selectors' => [
                    '{{WRAPPER}} h2' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ]
            ]
        );


        $this->add_control(
            'h3',
            [
                'label' =>   esc_html__( 'H3', 'news-element' ),
                'type' => Controls_Manager::RAW_HTML,
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'h3ty',
                'label' =>   esc_html__( 'Typography', 'news-element' ),
                'selector' => '{{WRAPPER}} h3',
            ]
        );

        $this->add_responsive_control(
            'h3-m',
            [
                'label' =>   esc_html__('Margin', 'news-element'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em'],
                'selectors' => [
                    '{{WRAPPER}} h3' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ]
            ]
        );


        $this->add_control(
            'h4',
            [
                'label' =>   esc_html__( 'H4', 'news-element' ),
                'type' => Controls_Manager::RAW_HTML,
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'h4ty',
                'label' =>   esc_html__( 'Typography', 'news-element' ),
                'selector' => '{{WRAPPER}} h4',
            ]
        );

        $this->add_responsive_control(
            'h4-m',
            [
                'label' =>   esc_html__('Margin', 'news-element'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em'],
                'selectors' => [
                    '{{WRAPPER}} h4' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ]
            ]
        );


        $this->add_control(
            'h5',
            [
                'label' =>   esc_html__( 'H5', 'news-element' ),
                'type' => Controls_Manager::RAW_HTML,
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'h5ty',
                'label' =>   esc_html__( 'Typography', 'news-element' ),
                'selector' => '{{WRAPPER}} h5',
            ]
        );

        $this->add_responsive_control(
            'h5-m',
            [
                'label' =>   esc_html__('Margin', 'news-element'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em'],
                'selectors' => [
                    '{{WRAPPER}} h5' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ]
            ]
        );

        $this->add_control(
            'h6',
            [
                'label' =>   esc_html__( 'H6', 'news-element' ),
                'type' => Controls_Manager::RAW_HTML,
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'h6ty',
                'label' =>   esc_html__( 'Typography', 'news-element' ),
                'selector' => '{{WRAPPER}} h6',
            ]
        );

        $this->add_responsive_control(
            'h6-m',
            [
                'label' =>   esc_html__('Margin', 'news-element'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em'],
                'selectors' => [
                    '{{WRAPPER}} h6' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ]
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'section_pgraf',
            [
                'label' =>   esc_html__('Paragraph', 'news-element'),
                'tab' => Controls_Manager::TAB_SETTINGS,
            ]
        );

        $this->add_control(
            'pklr',
            [
                'label' => __( 'Color', 'news-element' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .content-builder p' => 'color:{{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'pty',
                'label' =>   esc_html__( 'Typography', 'news-element' ),
                'selector' => '{{WRAPPER}} .content-builder p',
            ]
        );

        $this->add_responsive_control(
            'p-mr',
            [
                'label' =>   esc_html__('Margin', 'news-element'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .content-builder p' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ]
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'section_img',
            [
                'label' =>   esc_html__('Image', 'news-element'),
                'tab' => Controls_Manager::TAB_SETTINGS,
            ]
        );

        $this->start_controls_tabs('maling');

        $this->start_controls_tab(
            'img1',
            [
                'label' => esc_html__( 'Left', 'news-element' ),
            ]
        );

        $this->add_responsive_control(
            'img1-mr',
            [
                'label' =>   esc_html__('Margin', 'news-element'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .content-builder .wp-block-image .alignleft' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ]
            ]
        );

        $this->end_controls_tab();

        $this->start_controls_tab(
            'img2',
            [
                'label' => esc_html__( 'Center', 'news-element' ),
            ]
        );

        $this->add_responsive_control(
            'img2-mr',
            [
                'label' =>   esc_html__('Margin', 'news-element'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .content-builder .wp-block-image .aligncenter' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ]
            ]
        );

        $this->end_controls_tab();

        $this->start_controls_tab(
            'img3',
            [
                'label' => esc_html__( 'Right', 'news-element' ),
            ]
        );

        $this->add_responsive_control(
            'img3-mr',
            [
                'label' =>   esc_html__('Margin', 'news-element'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .content-builder .wp-block-image .alignright' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ]
            ]
        );

        $this->end_controls_tab();

        $this->end_controls_tabs();

        $this->end_controls_section(); 

        $this->start_controls_section(
            'section_bloquot',
            [
                'label' =>   esc_html__('Blockquote', 'news-element'),
                'tab' => Controls_Manager::TAB_SETTINGS,
            ]
        );

        $this->add_control(
            'qtbg',
            [
                'label' => __( 'Background', 'news-element' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .content-builder .wp-block-quote' => 'background:{{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
          'qtmar',
          [
             'label' =>   esc_html__( 'Margin', 'news-element' ),
             'type' => Controls_Manager::DIMENSIONS,
             'size_units' => [ 'px', '%', 'em' ],
             'selectors' => [
                    '{{WRAPPER}} .content-builder .wp-block-quote' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
             ],
          ]
        );

        $this->add_responsive_control(
          'qtpd',
          [
             'label' =>   esc_html__( 'Padding', 'news-element' ),
             'type' => Controls_Manager::DIMENSIONS,
             'size_units' => [ 'px', '%', 'em' ],
             'selectors' => [
                    '{{WRAPPER}} .content-builder .wp-block-quote' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
             ],
          ]
        );

        $this->add_responsive_control(
          'qtipos',
          [
             'label' =>   esc_html__( 'Quote position', 'news-element' ),
             'type' => Controls_Manager::DIMENSIONS,
             'allowed_dimensions'=> ['top', 'left'],
             'size_units' => [ 'px', '%', 'em' ],
             'selectors' => [
                    '{{WRAPPER}} .content-builder .wp-block-quote p:before' => 'top: {{TOP}}{{UNIT}};left:{{LEFT}}{{UNIT}};',
             ],
          ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'qttyp',
                'label' =>   esc_html__( 'Title typo', 'news-element' ),
                'selector' => '{{WRAPPER}} .content-builder .wp-block-quote p',
            ]
        );

        $this->add_responsive_control(
          'qttmr',
          [
             'label' =>   esc_html__( 'Title margin', 'news-element' ),
             'type' => Controls_Manager::DIMENSIONS,
             'size_units' => [ 'px', '%', 'em' ],
             'selectors' => [
                    '{{WRAPPER}} .content-builder .wp-block-quote p' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
             ],
          ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'qtcity',
                'label' =>   esc_html__( 'Cite typo', 'news-element' ),
                'selector' => '{{WRAPPER}} .content-builder .wp-block-quote cite',
            ]
        );

        $this->end_controls_section();

/*         $this->start_controls_section(
            'section_pggal',
            [
                'label' =>   esc_html__('Gallery', 'news-element'),
                'tab' => Controls_Manager::TAB_SETTINGS,
                'condition' => [
                    'postgal' => 'yes',
                ],
            ]
        );

        $this->add_control(
            'pgbg',
            [
                'label' => __( 'Background', 'news-element' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .content-builder .khbpostgallaerysync' => 'background: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'pgpad',
            [
                'label' => __('Padding', 'news-element'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .content-builder .khbpostgallaerysync' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ]
            ]
        );

        $this->add_responsive_control(
            'pgthmvsy',
            [
                'label' => __( 'Thumb spacing', 'news-element' ),
                'type' =>  Controls_Manager::SLIDER,
                'selectors' => [
                    '{{WRAPPER}} .khbpostsync' => 'padding-top: calc(2*{{SIZE}}{{UNIT}});',
                    '{{WRAPPER}} .khbpostsync .slick-list' => 'margin:0px -{{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .khbpostsync .slick-slide>div' => 'padding:0px {{SIZE}}{{UNIT}};',
                ],

            ]
        );

        $this->add_responsive_control(
            'arclr',
            [
                'label' => __('Arrow Color', 'news-element'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .khbpostgallaerysync .khbprnx' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'arbg',
            [
                'label' => __('Arrow Background', 'news-element'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .khbpostgallaerysync .khbprnx' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'arclrh',
            [
                'label' => __('Arrow Hover color', 'news-element'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .khbpostgallaerysync .khbprnx:hover' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'arbgh',
            [
                'label' => __('Arrow Hover background', 'news-element'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .khbpostgallaerysync .khbprnx:hover' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'arbdr_r',
            [
                'label' => __( 'Arrow Border radius', 'news-element' ),
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
                    '{{WRAPPER}} .khbpostgallaerysync .khbprnx' => 'border-radius: {{SIZE}}{{UNIT}};',
                ],

            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'section_inrelatd',
            [
                'label' =>   esc_html__('Related post', 'news-element'),
                'tab' => Controls_Manager::TAB_SETTINGS,
                'condition' => [
                    'postrel' => 'yes',
                ],
            ]
        );

        $this->add_control(
            'relbg',
            [
                'label' => __( 'Background', 'news-element' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .khbinlinerelated,{{WRAPPER}} .khbrelatedhead' => 'background:{{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'relbordf',
            [
                'label' => __( 'Border color', 'news-element' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .khbinlinerelated,{{WRAPPER}} .khbrelatedhead' => 'border-color:{{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'relpad',
            [
                'label' => __('Padding', 'news-element'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .khbinlinerelated' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ]
            ]
        );

        $this->add_responsive_control(
            'relmr',
            [
                'label' => __('Margin', 'news-element'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .khbinlinerelated' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ]
            ]
        );

        $this->add_responsive_control(
            'relthmwd',
            [
                'label' => __( 'Thumb width', 'news-element' ),
                'type' =>  Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 300,
                        'step' => 1,
                    ]
                ],
                'size_units' => [ 'px'],
                'selectors' => [
                    '{{WRAPPER}} .khbinlinerelated .ft-thumbwrap' => 'width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'relthmrsp',
            [
                'label' => __( 'Thumb right spacing', 'news-element' ),
                'type' =>  Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 300,
                        'step' => 1,
                    ]
                ],
                'size_units' => [ 'px'],
                'selectors' => [
                    '{{WRAPPER}} .khbinlinerelated .ft-thumbwrap' => 'margin-right: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->start_controls_tabs('reltab');

        $this->start_controls_tab(
            'rel3',
            [
                'label' => esc_html__( 'Label', 'news-element' ),
            ]
        );

        $this->add_responsive_control(
            'relbvp',
            [
                'label' => __( 'Vertical position', 'news-element' ),
                'type' =>  Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'min' => -60,
                        'max' => 60,
                        'step' => 1,
                    ]
                ],
                'size_units' => [ 'px'],
                'selectors' => [
                    '{{WRAPPER}} .khbinlinerelated .khbrelatedhead' => 'top: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'relbtpad',
            [
                'label' => __('Padding', 'news-element'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .khbinlinerelated .khbrelatedhead' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ]
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'relbty',
                'label' => __('Typography', 'news-element'),
                'selector' => '{{WRAPPER}} .khbinlinerelated .khbrelatedhead',
            ]
        );

        $this->add_control(
            'relbcolr',
            [
                'label' => __( 'Color', 'news-element' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .khbinlinerelated .khbrelatedhead' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_tab();

        $this->start_controls_tab(
            'rel1',
            [
                'label' => esc_html__( 'Title', 'news-element' ),
            ]
        );

        $this->add_responsive_control(
            'retitmar',
            [
                'label' => __('Margin', 'news-element'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .khbinlinerelated .entry_title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ]
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'reltityp',
                'label' => __('Typography', 'news-element'),
                'selector' => '{{WRAPPER}} .khbinlinerelated .entry_title',
            ]
        );

        $this->add_control(
            'relticolr',
            [
                'label' => __( 'Color', 'news-element' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .khbinlinerelated .entry_title a' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_tab();

        $this->start_controls_tab(
            'rel2',
            [
                'label' => esc_html__( 'Meta', 'news-element' ),
            ]
        );

        $this->add_responsive_control(
            'remesps',
            [
                'label' => __('Spacer spacing', 'news-element'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .khbinlinerelated .meta-space' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ]
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'relmetyp',
                'label' => __('Typography', 'news-element'),
                'selector' => '{{WRAPPER}} .khbinlinerelated .leffect-1',
            ]
        );

        $this->add_control(
            'relmecolr',
            [
                'label' => __( 'Color', 'news-element' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .khbinlinerelated .leffect-1' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'relmecolrl',
            [
                'label' => __( 'Link color', 'news-element' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .khbinlinerelated .leffect-1 a' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_tab();

        $this->end_controls_tabs();

        $this->end_controls_section();

        $this->start_controls_section(
            'section_reviewd',
            [
                'label' =>   esc_html__('Review', 'news-element'),
                'tab' => Controls_Manager::TAB_SETTINGS,
                'condition' => [
                    'posreview' => 'yes',
                ],
            ]
        );

        $this->add_responsive_control(
            'revmrg',
            [
                'label' =>   esc_html__('Margin', 'news-element'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .khb-review-wrap' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ]
            ]
        );

        $this->add_responsive_control(
            'revbdwid',
            [
                'label' => __( 'Border width', 'news-element' ),
                'type' =>  Controls_Manager::SLIDER,
                'selectors' => [
                    '{{WRAPPER}} .khb-review-wrap .khb-review-pro-cons,{{WRAPPER}} .khb-review-wrap .khb-rating-wrap' => 'border-width:{{SIZE}}{{UNIT}};',
                ],

            ]
        );

        $this->add_control(
            'revbdclr',
            [
                'label' =>   esc_html__( 'Border color', 'news-element' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .khb-review-wrap .khb-review-pro-cons,{{WRAPPER}} .khb-review-wrap .khb-rating-wrap' => 'border-color:{{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->start_controls_tabs('revtabg');

        $this->start_controls_tab(
            'rm4',
            [
                'label' => esc_html__( 'Label', 'news-element' ),
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'revtityu',
                'label' =>   esc_html__( 'Typography', 'news-element' ),
                'selector' => '{{WRAPPER}} .khb-review-wrap .review-head',
            ]
        );

        $this->add_control(
            'revticlr',
            [
                'label' =>   esc_html__( 'Color', 'news-element' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .khb-review-wrap .review-head' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'revtimarf',
            [
                'label' => __('Margin', 'news-element'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .khb-review-wrap .review-head' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ]
            ]
        );

        $this->end_controls_tab();

        $this->start_controls_tab(
            'rm1',
            [
                'label' => esc_html__( 'Summary', 'news-element' ),
            ]
        );

        $this->add_control(
            'revsunbg',
            [
                'label' => __( 'Rating background', 'news-element' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .khb-review-wrap .review-total' => 'background: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'revsunclr',
            [
                'label' => __( 'Rating color', 'news-element' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .khb-review-wrap .review-total' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'revsumpd',
            [
                'label' => __('Rating padding', 'news-element'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .khb-review-wrap .review-total' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ]
            ]
        );

        $this->add_responsive_control(
            'revsummr',
            [
                'label' => __('Rating margin', 'news-element'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .khb-review-wrap .review-total' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ]
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'revsumty',
                'label' =>   esc_html__( 'Rating typography', 'news-element' ),
                'selector' => '{{WRAPPER}} .khb-review-wrap .review-total',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'revsumtqy',
                'label' =>   esc_html__( 'Summary typography', 'news-element' ),
                'selector' => '{{WRAPPER}} .khb-review-wrap .review-desc',
            ]
        );

        $this->add_responsive_control(
            'revsumclrt',
            [
                'label' => __('Summary Color', 'news-element'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .khb-review-wrap .review-desc' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_tab();

        $this->start_controls_tab(
            'rm2',
            [
                'label' => esc_html__( 'Pro-Cons', 'news-element' ),
            ]
        );

        $this->add_responsive_control(
            'revwidr',
            [
                'label' =>   esc_html__( 'Column width', 'news-element' ),
                'type' =>  Controls_Manager::NUMBER,
                 'selectors' => [
                        '{{WRAPPER}} .khb-review-pro-cons .inr>div' => 'width: {{VALUE}}%;',
                 ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'revty',
                'label' =>   esc_html__( 'Typography', 'news-element' ),
                'selector' => '{{WRAPPER}} .khb-review-pro-cons li',
            ]
        );

        $this->add_control(
            'revclr',
            [
                'label' =>   esc_html__( 'Color', 'news-element' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .khb-review-pro-cons li' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'revbsp',
            [
                'label' => __( 'Bottom spacing', 'news-element' ),
                'type' =>  Controls_Manager::SLIDER,
                'selectors' => [
                    '{{WRAPPER}} .khb-review-pro-cons li:not(:last-of-type)' => 'margin-bottom:{{SIZE}}{{UNIT}};',
                ],

            ]
        );

        $this->add_control(
            'reviclr',
            [
                'label' =>   esc_html__( 'Icon color', 'news-element' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .khb-review-pro-cons li i' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_tab();

        $this->start_controls_tab(
            'rm3',
            [
                'label' => esc_html__( 'Rating', 'news-element' ),
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'repcty',
                'label' =>   esc_html__( 'Typography', 'news-element' ),
                'selector' => '{{WRAPPER}} .khb-review-wrap-title,{{WRAPPER}} .khb-review-percent',
            ]
        );

        $this->add_control(
            'repcclr',
            [
                'label' =>   esc_html__( 'Color', 'news-element' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .khb-rating-wrap .khb-review-wrap-title,{{WRAPPER}} .khb-review-percent' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'repcpl',
            [
                'label' =>   esc_html__( 'Primary color', 'news-element' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .khb-review-wrap-bar:before' => 'background: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'repcps',
            [
                'label' =>   esc_html__( 'Secondary color', 'news-element' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .khb-review-wrap-bar' => 'background: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'repcpht',
            [
                'label' => __( 'Bar height', 'news-element' ),
                'type' =>  Controls_Manager::SLIDER,
                'selectors' => [
                    '{{WRAPPER}} .khb-review-wrap-bar:before,{{WRAPPER}} .khb-review-wrap-bar' => 'height: {{SIZE}}{{UNIT}};',
                ],

            ]
        );

        $this->add_responsive_control(
            'revpcbtmk',
            [
                'label' => __( 'Bottom spacing', 'news-element' ),
                'type' =>  Controls_Manager::SLIDER,
                'selectors' => [
                    '{{WRAPPER}} .khb-rating-inr' =>'margin-bottom:{{SIZE}}{{UNIT}};',
                ],

            ]
        );

        $this->end_controls_tab();

        $this->end_controls_tabs();

        $this->end_controls_section(); */

        $this->start_controls_section(
            'section_floatshare',
            [
                'label' =>   esc_html__('Floating share', 'news-element'),
                'tab' => Controls_Manager::TAB_SETTINGS,
                'condition' => [
                    'floatshare' => 'yes',
                ],
            ]
        );

        $this->add_responsive_control(
            'fltwdh',
            [
                'label' => __( 'Width & height', 'news-element' ),
                'type' =>  Controls_Manager::SLIDER,
                'selectors' => [
                    '{{WRAPPER}} .sidebar a' => 'width:{{SIZE}}{{UNIT}};height:{{SIZE}}{{UNIT}};',
                ],

            ]
        );

        $this->add_responsive_control(
            'fltfs',
            [
                'label' => __( 'Font size', 'news-element' ),
                'type' =>  Controls_Manager::SLIDER,
                'selectors' => [
                    '{{WRAPPER}} .sidebar a' => 'font-size:{{SIZE}}{{UNIT}};',
                ],

            ]
        );

        $this->add_responsive_control(
            'fltns',
            [
                'label' => __('Position', 'news-element'),
                'type' => Controls_Manager::DIMENSIONS,
                'allowed_dimensions'=> ['top','left'],
                'size_units' => ['px', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .content-builder .sidebar-top' => 'top: {{TOP}}{{UNIT}},left:-{{LEFT}}{{UNIT}};',
                ]
            ]
        );

        $this->add_responsive_control(
            'fltfts',
            [
                'label' => __( 'Floating top position', 'news-element' ),
                'type' =>  Controls_Manager::SLIDER,
                'selectors' => [
                    '{{WRAPPER}} .content-builder .sidebar-fixed' => 'top:{{SIZE}}{{UNIT}};',
                ],

            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'section_dcaps',
            [
                'label' =>   esc_html__('Dropcap', 'news-element'),
                'tab' => Controls_Manager::TAB_SETTINGS,
                'condition' => [
                    'dropcap' => 'yes',
                ],
            ]
        );

        $this->add_responsive_control(
          'dmar',
          [
             'label' =>   esc_html__( 'Margin', 'news-element' ),
             'type' => Controls_Manager::DIMENSIONS,
             'size_units' => [ 'px', '%', 'em' ],
             'selectors' => [
                    '{{WRAPPER}} .content-builder>p:first-child:first-letter' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
             ],
          ]
        );

        $this->add_responsive_control(
          'dmpd',
          [
             'label' =>   esc_html__( 'Padding', 'news-element' ),
             'type' => Controls_Manager::DIMENSIONS,
             'size_units' => [ 'px', '%', 'em' ],
             'selectors' => [
                    '{{WRAPPER}} .content-builder>p:first-child:first-letter' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
             ],
          ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'drpty',
                'label' =>   esc_html__( 'Typography', 'news-element' ),
                'selector' => '{{WRAPPER}} .content-builder>p:first-child:first-letter',
            ]
        );

        $this->add_control(
            'drpklr',
            [
                'label' =>   esc_html__( 'Color', 'news-element' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .content-builder>p:first-child:first-letter' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'drppd',
            [
                'label' =>   esc_html__( 'Background', 'news-element' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .content-builder>p:first-child:first-letter' => 'background: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'drpbdr',
                'label' =>   esc_html__( 'Border', 'news-element' ),
                'selector' => '{{WRAPPER}} .content-builder>p:first-child:first-letter',
            ]
        );

        $this->end_controls_section();

    }

    protected function render( ) {
        $settings = $this->get_settings();
        require dirname(__FILE__) .'/view.php';
    }

}

if ( defined( 'ELEMENTOR_VERSION' ) && version_compare( ELEMENTOR_VERSION, '3.5.0', '>=' ) ) {
    $widgets_manager->register(new \News_Element\Widgets\news_ele_post_content());
} else {
    $widgets_manager->register_widget_type(new \News_Element\Widgets\news_ele_post_content());
}
