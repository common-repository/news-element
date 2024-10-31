<?php
namespace News_Element\Widgets;
use Elementor;
use Elementor\Plugin;
use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Border;
use Elementor\Group_Control_Background;
use Elementor\Group_Control_Image_Size;
use News_Element\Khobish_Helper;

class newselement_post_background extends Widget_Base{
    public function get_name() {
        return 'post-bg';
    }

    public function get_title() {
        return   esc_html__( 'Thumb Background', 'news-element' );
    }

    public function get_icon() {
        return 'dashicons dashicons-shield-alt';
    }

    public function get_categories() {
        return ['khobish-builder'];
    }

    protected function register_controls() {
        $this->start_controls_section(
            'section_metas',
            [
                'label' =>   esc_html__( 'Content', 'news-element' )
            ]
        );

        $this->add_control(
          'style',
          [
             'label'       =>   esc_html__( 'Style', 'news-element' ),
             'type' => Controls_Manager::SELECT,
             'label_block' => true,
             'default' => 'overlay',
             'options' => [
                'no_overlay'  =>   esc_html__( 'Only Background', 'news-element' ),
                'overlay' =>   esc_html__( 'Post meta overlay', 'news-element' ),
             ],
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
                'condition' => [
                    'style' => 'overlay',
                ],
            ]
        );

        $this->add_control(
            'img_size',
            [
                'label' =>   esc_html__('Image size', 'news-element'),
                'type' => Controls_Manager::SELECT,
                'label_block' => true,
                'options' =>  Khobish_Helper::ae_image_size_choose(),
                'multiple' => false,
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

        $this->end_controls_section();

        $this->start_controls_section(
            'section_overlay',
            [
                'label' =>   esc_html__('Overlay', 'news-element'),
                'tab' => Controls_Manager::TAB_SETTINGS,
                'condition' => [
                    'style' => 'overlay',
                ],
            ]
        );

        $this->add_responsive_control(
            'max-ht',
            [
                'label' =>   esc_html__( 'Height', 'news-element' ),
                'type' =>  Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 1400,
                        'step' => 1,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .khbginr' => 'height: {{SIZE}}{{UNIT}}',
                ],
            ]
        );

        $this->add_responsive_control(
            'cvp',
            [
                'label' =>   esc_html__( 'Content vertical position', 'news-element' ),
                'type' =>  Controls_Manager::SLIDER,
                'selectors' => [
                    '{{WRAPPER}} .overlaymeta' => 'top: {{SIZE}}%',
                ],
            ]
        );

        $this->add_responsive_control(
            'max-wid',
            [
                'label' =>   esc_html__( 'Max wrapper width', 'news-element' ),
                'type' =>  Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 1400,
                        'step' => 1,
                    ],
                ],
                'size_units' => ['px'],
                'selectors' => [
                    '{{WRAPPER}} .overlaymeta' => 'max-width: {{SIZE}}{{UNIT}}',
                ],
            ]
        );

        $this->add_responsive_control(
          'pad',
          [
             'label' =>   esc_html__( 'Padding', 'news-element' ),
             'type' => Controls_Manager::DIMENSIONS,
             'size_units' => [ 'px', '%', 'em' ],
             'selectors' => [
                    '{{WRAPPER}} .bgpostthumb' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
             ],
          ]
        );

        $this->add_responsive_control(
            'align',
            [
                'label' =>   esc_html__('Content alignment', 'news-element'),
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
                    '{{WRAPPER}} .overlaymeta' => 'text-align: {{VALUE}};',
                ],

            ]
        );

        $this->add_responsive_control(
            'tralign',
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
                    '{{WRAPPER}} .inr' => 'text-align: {{VALUE}};',
                ],

            ]
        );

        $this->add_control(
          'background-size',
          [
             'label'       =>   esc_html__( 'Background size', 'news-element' ),
             'type' => Controls_Manager::SELECT,
             'options' => [
                'inherit'  =>   esc_html__( 'Inherit', 'news-element' ),
                'contain' =>   esc_html__( 'Contain', 'news-element' ),
                'cover' =>   esc_html__( 'Cover', 'news-element' ),
             ],
             'selectors' => [
                '{{WRAPPER}} .bgpostthumb' => 'background-size: {{VALUE}}',
             ],
          ]
        );

        $this->add_control(
          'background-attach',
          [
             'label'       =>   esc_html__( 'Background attachment', 'news-element' ),
             'type' => Controls_Manager::SELECT,
             'options' => [
                'inherit'  =>   esc_html__( 'Inherit', 'news-element' ),
                'fixed' =>   esc_html__( 'Fixed', 'news-element' ),
             ],
             'selectors' => [
                '{{WRAPPER}} .bgpostthumb' => 'background-attachment: {{VALUE}}',
             ],
          ]
        );

        $this->add_control(
          'background-position',
          [
             'label'       =>   esc_html__( 'Background position', 'news-element' ),
             'type' => Controls_Manager::SELECT,
             'options' => [
                'inherit'  =>   esc_html__( 'Inherit', 'news-element' ),
                'center top' =>   esc_html__( 'Center top', 'news-element' ),
                'center center' =>   esc_html__( 'Center center', 'news-element' ),
                'left center' =>   esc_html__( 'Left center', 'news-element' ),
                'right center' =>   esc_html__( 'Right center', 'news-element' ),
             ],
             'selectors' => [
                '{{WRAPPER}} .bgpostthumb' => 'background-position: {{VALUE}}',
             ],
          ]
        );

        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'overlay_color',
                'label' =>   esc_html__( 'Color', 'news-element' ),
                'types' => [ 'none', 'classic','gradient' ],
                'selector' => '{{WRAPPER}} .bgpostthumb::before',
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'section_title',
            [
                'label' =>   esc_html__('Title', 'news-element'),
                'tab' => Controls_Manager::TAB_SETTINGS,
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'title_typo',
                'selector' => '{{WRAPPER}} .entry_title',
                'label' =>   esc_html__( 'Typography', 'news-element' ),
            ]
        );

        $this->add_control(
          'title-margin',
          [
             'label' =>   esc_html__( 'Margin', 'news-element' ),
             'type' => Controls_Manager::DIMENSIONS,
             'size_units' => [ 'px','em'],
             'selectors' => [
                    '{{WRAPPER}} .entry_title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
             ],
          ]
        );

        $this->add_control(
            'title-color',
            [
                'label' =>   esc_html__( 'Color', 'news-element' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .entry_title' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_section();


        $this->start_controls_section(
            'section_links',
            [
                'label' =>   esc_html__('Meta', 'news-element'),
                'tab' => Controls_Manager::TAB_SETTINGS,
            ]
        );

        $this->add_responsive_control(
            'mtspsp',
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
            'xcolor',
            [
                'label' =>   esc_html__( 'Color', 'news-element' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .leffect-1' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'link-color',
            [
                'label' =>   esc_html__( 'Link color', 'news-element' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .leffect-1 a' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'link-color-h',
            [
                'label' =>   esc_html__( 'Link hover color', 'news-element' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .leffect-1 a:hover' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'mtypo',
                'selector' => '{{WRAPPER}} .leffect-1',
                'label' =>   esc_html__( 'Typography', 'news-element' ),
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'section_bgcats',
            [
                'label' =>   esc_html__('Background category', 'news-element'),
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
                    '{{WRAPPER}} .catbg-wrap .cat-bg' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ]
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'bgcat_typo',
                'label' => __('Typography', 'news-element'),
                'selector' => '{{WRAPPER}} .catbg-wrap .cat-bg',
            ]
        );

        $this->add_control(
            'bgcat_color',
            [
                'label' => __( 'Color', 'news-element' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .catbg-wrap .cat-bg' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'bgcat_bagrnd',
            [
                'label' => __( 'Background', 'news-element' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .catbg-wrap .cat-bg' => 'background: {{VALUE}} !important;',
                ],
            ]
        );

        $this->add_control(
            'hbgcat_color',
            [
                'label' => __( 'Hover Color', 'news-element' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .catbg-wrap .cat-bg:hover' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'hbgcat_bagrnd',
            [
                'label' => __( 'Hover Background', 'news-element' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .catbg-wrap .cat-bg:hover' => 'background: {{VALUE}} !important;',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'bgcatbdr',
                'label' =>   esc_html__( 'Border', 'news-element' ),
                'selector' => '{{WRAPPER}} .catbg-wrap .cat-bg',
            ]
        );

        $this->end_controls_section();
    }

    protected function render( ) {
        $settings = $this->get_settings();
        require dirname(__FILE__) .'/'. sanitize_key($settings['style']) .'.php';
    }
}

if ( defined( 'ELEMENTOR_VERSION' ) && version_compare( ELEMENTOR_VERSION, '3.5.0', '>=' ) ) {
    $widgets_manager->register(new \News_Element\Widgets\newselement_post_background());
} else {
    $widgets_manager->register_widget_type(new \News_Element\Widgets\newselement_post_background());
}
