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


class thepack_post_comment extends Widget_Base{
    public function get_name() {
        return 'khbpcmmnt';
    }

    public function get_title() {
        return   esc_html__( 'Comments', 'news-element' );
    }

    public function get_icon() {
        return 'dashicons dashicons-analytics';
    }

    public function get_categories() {
        return [ 'khobish-builder' ];
    }

    protected function register_controls() {

        $this->start_controls_section(
            'section_info',
            [
                'label' =>   esc_html__('Info', 'news-element'),
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
            'btn_txt',
            [
                'label' => __( 'Load more label', 'news-element' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default' => 'Load More',
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'section_gens',
            [
                'label' =>   esc_html__( 'General', 'news-element' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'com_bg',
            [
                'label' => __( 'Comment background', 'news-element' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .commentlist article' => 'background: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'acom_bg',
            [
                'label' => __( 'Author comment background', 'news-element' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .commentlist .byuser> article' => 'background: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
          'compd',
          [
             'label' =>   esc_html__( 'Comment padding', 'news-element' ),
             'type' => Controls_Manager::DIMENSIONS,
             'size_units' => [ 'em','px'],
             'selectors' => [
                    '{{WRAPPER}} .commentlist article' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
             ],
          ]
        );

        $this->add_control(
            'com_bdr',
            [
                'label' => __( 'Comment border color', 'news-element' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .commentlist article' => 'border-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'com_botsp',
            [
                'label' => __( 'Comment bottom spacing', 'news-element' ),
                'type' =>  Controls_Manager::SLIDER,
                'selectors' => [
                    '{{WRAPPER}} .commentlist article' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                ],

            ]
        );

        $this->add_control(
            'comhidesa',
            [
                'label' => __('Hide says', 'news-element'),
                'type' => Controls_Manager::SWITCHER,
                'selectors' => [
                    '{{WRAPPER}} .comment-meta .says' => 'display: none;',
                ],
            ]
        );

        $this->add_control(
            'comhidcook',
            [
                'label' => __('Hide comment cookie', 'news-element'),
                'type' => Controls_Manager::SWITCHER,
                'selectors' => [
                    '{{WRAPPER}} .comment-form-cookies-consent' => 'display: none;',
                ],
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'section_heading',
            [
                'label' =>   esc_html__( 'Heading', 'news-element' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'lbl_clr',
            [
                'label' =>   esc_html__( 'Color', 'news-element' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .khb-commentwrap .khbcomhead' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'lbl_typ',
                'label' =>   esc_html__( 'Typography', 'news-element' ),
                'selector' => '{{WRAPPER}} .khb-commentwrap .khbcomhead',
            ]
        );

        $this->add_responsive_control(
          'lbl_mr',
          [
             'label' =>   esc_html__( 'Margin', 'news-element' ),
             'type' => Controls_Manager::DIMENSIONS,
             'size_units' => [ 'em','px'],
             'selectors' => [
                    '{{WRAPPER}} .khb-commentwrap .khbcomhead' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
             ],
          ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'section_meta',
            [
                'label' =>   esc_html__( 'Body', 'news-element' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->start_controls_tabs('mcoms');

        $this->start_controls_tab(
            'm0',
            [
                'label' => esc_html__( 'Name', 'news-element' ),
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'nm_typo',
                'label' => __('Typography', 'news-element'),
                'selector' => '{{WRAPPER}} .comment-meta .fn',
            ]
        );

        $this->add_control(
            'nm_clr',
            [
                'label' => __( 'Color', 'news-element' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .comment-meta .fn' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_tab();

        $this->start_controls_tab(
            'm1',
            [
                'label' => esc_html__( 'Thumb', 'news-element' ),
            ]
        );

        $this->add_control(
            'com_thmwid',
            [
                'label' => __( 'Width', 'news-element' ),
                'type' =>  Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 500,
                        'step' => 1,
                    ]
                ],
                'selectors' => [
                    '{{WRAPPER}} .comment-author img' => 'width: {{SIZE}}{{UNIT}};',
                ],

            ]
        );

        $this->add_control(
            'com_thmbrad',
            [
                'label' => __( 'Border radius', 'news-element' ),
                'type' =>  Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 500,
                        'step' => 1,
                    ]
                ],
                'selectors' => [
                    '{{WRAPPER}} .comment-author img' => 'border-radius: {{SIZE}}{{UNIT}};',
                ],

            ]
        );

        $this->add_control(
            'com_thmrsp',
            [
                'label' => __( 'Right spacing', 'news-element' ),
                'type' =>  Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 500,
                        'step' => 1,
                    ]
                ],
                'selectors' => [
                    '{{WRAPPER}} .comment-author img' => 'margin-right: {{SIZE}}{{UNIT}};',
                ],

            ]
        );

        $this->end_controls_tab();

        $this->start_controls_tab(
            'm2',
            [
                'label' => esc_html__( 'Link', 'news-element' ),
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'lynk_typo',
                'label' => __('Typography', 'news-element'),
                'selector' => '{{WRAPPER}} .comment-metadata a',
            ]
        );

        $this->add_control(
            'lynk_clr',
            [
                'label' => __( 'Color', 'news-element' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .comment-metadata a' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_tab();

        $this->start_controls_tab(
            'm3',
            [
                'label' => esc_html__( 'Content', 'news-element' ),
            ]
        );

        $this->add_control(
            'cnt_clr',
            [
                'label' =>   esc_html__( 'Color', 'news-element' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .comment-content p' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'cnt_typ',
                'label' =>   esc_html__( 'Typography', 'news-element' ),
                'selector' => '{{WRAPPER}} .comment-content p',
            ]
        );

        $this->add_responsive_control(
          'cnt_mr',
          [
             'label' =>   esc_html__( 'Margin', 'news-element' ),
             'type' => Controls_Manager::DIMENSIONS,
             'size_units' => [ 'em','px'],
             'selectors' => [
                    '{{WRAPPER}} .comment-content p' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
             ],
          ]
        );

        $this->end_controls_tab();

        $this->start_controls_tab(
            'm4',
            [
                'label' => esc_html__( 'Reply', 'news-element' ),
            ]
        );

        $this->add_control(
            'reply_tsp',
            [
                'label' => __( 'Top spacing', 'news-element' ),
                'type' =>  Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 200,
                        'step' => 1,
                    ]
                ],
                'selectors' => [
                    '{{WRAPPER}} .reply' => 'top: {{SIZE}}{{UNIT}};',
                ],

            ]
        );

        $this->add_control(
            'reply_rsp',
            [
                'label' => __( 'Right spacing', 'news-element' ),
                'type' =>  Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 200,
                        'step' => 1,
                    ]
                ],
                'selectors' => [
                    '{{WRAPPER}} .reply' => 'right: {{SIZE}}{{UNIT}};',
                ],

            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'reply_typo',
                'label' => __('Typography', 'news-element'),
                'selector' => '{{WRAPPER}} .reply a,{{WRAPPER}} .comment-respond a',
            ]
        );

        $this->add_control(
            'reply_clr',
            [
                'label' => __( 'Color', 'news-element' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .reply a' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_tab();

        $this->end_controls_tabs();

        $this->end_controls_section();

        $this->start_controls_section(
            'section_form',
            [
                'label' =>   esc_html__( 'Comment form', 'news-element' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->start_controls_tabs('cfromf');

        $this->start_controls_tab(
            'cm1',
            [
                'label' => esc_html__( 'Form', 'news-element' ),
            ]
        );

        $this->add_responsive_control(
            'fldwid',
            [
                'label' =>   esc_html__( 'Column width', 'news-element' ),
                'type' =>  Controls_Manager::NUMBER,
                 'selectors' => [
                        '{{WRAPPER}} .khbcomment-field' => 'width: {{VALUE}}%;',
                 ],
            ]
        );

        $this->add_control(
            'fldspd',
            [
                'label' => __( 'Column spacing', 'news-element' ),
                'type' =>  Controls_Manager::SLIDER,
                'selectors' => [
                    '{{WRAPPER}} .khbcomment-field' => 'padding-left: {{SIZE}}{{UNIT}};padding-right: {{SIZE}}{{UNIT}};margin-bottom: {{SIZE}}{{UNIT}}',
                    '{{WRAPPER}} .inr' => 'margin-left: -{{SIZE}}{{UNIT}};margin-right:-{{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .comment-form-comment' => 'margin-bottom:{{SIZE}}{{UNIT}};',
                ],

            ]
        );

        $this->add_control(
            'fldbrade',
            [
                'label' => __( 'Border radius', 'news-element' ),
                'type' =>  Controls_Manager::SLIDER,
                'selectors' => [
                    '{{WRAPPER}} .inr input,{{WRAPPER}} .comment-form-comment textarea' => 'border-radius: {{SIZE}}{{UNIT}};',
                ],

            ]
        );

        $this->add_control(
            'fldbdcl',
            [
                'label' =>   esc_html__( 'Border color', 'news-element' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .inr input,{{WRAPPER}} .comment-form-comment textarea' => 'border:1px solid {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'fld_padd',
            [
                'label' =>   esc_html__('Padding', 'news-element'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .inr input,{{WRAPPER}} .comment-form-comment textarea' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'formbg_color',
            [
                'label' =>   esc_html__( 'Background', 'news-element' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .inr input,{{WRAPPER}} .comment-form-comment textarea' => 'background: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'form_color',
            [
                'label' =>   esc_html__( 'Text color', 'news-element' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .inr input,{{WRAPPER}} .comment-form-comment textarea' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'input_typo',
                'label' =>   esc_html__( 'Typography', 'news-element' ),
                'selector' => '{{WRAPPER}} .inr input,{{WRAPPER}} .comment-form-comment textarea',
            ]
        );


        $this->end_controls_tab();

        $this->start_controls_tab(
            'cm2',
            [
                'label' => esc_html__( 'Button', 'news-element' ),
            ]
        );

        $this->add_control(
            'cddwid',
            [
                'label' => __( 'Width', 'news-element' ),
                'type' =>  Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 500,
                        'step' => 1,
                    ]
                ],
                'size_units' => ['px','%'],
                'selectors' => [
                    '{{WRAPPER}} .comment-submit-btn-wrap .submit' => 'width: {{SIZE}}{{UNIT}};',
                ],

            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'ctn_typography',
                'selector' => '{{WRAPPER}} .comment-submit-btn-wrap .submit',
            ]
        );

        $this->add_control(
            'ctn_color',
            [
                'label' => __( 'Button color', 'news-element' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .comment-submit-btn-wrap .submit' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'ctn_colorbg',
            [
                'label' => __( 'Button background', 'news-element' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .comment-submit-btn-wrap .submit' => 'background: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'ctn_color-h',
            [
                'label' => __( 'Button color hover', 'news-element' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .comment-submit-btn-wrap .submit:hover' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'ctn_colorbgh',
            [
                'label' => __( 'Button background hover', 'news-element' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .comment-submit-btn-wrap .submit:hover' => 'background: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'ctn_bcol',
            [
                'label' => __( 'Button border color', 'news-element' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .comment-submit-btn-wrap .submit' => 'border-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'ctn_bcolh',
            [
                'label' => __( 'Button border hover', 'news-element' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .comment-submit-btn-wrap .submit:hover' => 'border-color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'cbtnwidth',
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
                    '{{WRAPPER}} .comment-submit-btn-wrap .submit' => 'border-width: {{SIZE}}{{UNIT}};border-style:solid',
                ],

            ]
        );

        $this->add_control(
            'cbtnradius',
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
                    '{{WRAPPER}} .comment-submit-btn-wrap .submit' => 'border-radius: {{SIZE}}{{UNIT}};',
                ],

            ]
        );

        $this->add_responsive_control(
            'cbtn-pad',
            [
                'label' => __('Button padding', 'news-element'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .comment-submit-btn-wrap .submit' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ]
            ]
        );

        $this->add_responsive_control(
            'cbtn-mgr',
            [
                'label' => __('Button margin', 'news-element'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .comment-submit-btn-wrap .submit' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ]
            ]
        );

        $this->end_controls_tab();

        $this->end_controls_tabs();

        $this->end_controls_section();

        $this->start_controls_section(
            'section_button',
            [
                'label' =>   esc_html__( 'Button', 'news-element' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'cbtn-paddings',
            [
                'label' =>   esc_html__('Padding', 'news-element'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} #commentform input.submit' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'cbtn-width',
            [
                'label' =>   esc_html__( 'Button width max', 'news-element' ),
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
                    '{{WRAPPER}} #commentform input.submit' => 'max-width: {{SIZE}}{{UNIT}};width: 100%;',
                ],

            ]
        );

        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'cbtn_border',
                'label' =>   esc_html__( 'Border','news-element' ),
                'selector' => '{{WRAPPER}} #commentform input.submit',
            ]
        );

        $this->add_control(
            'cbtnbg_color',
            [
                'label' =>   esc_html__( 'Background', 'news-element' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} #commentform input.submit' => 'background: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'cbtn_color',
            [
                'label' =>   esc_html__( 'Color', 'news-element' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} #commentform input.submit' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'cbtnbg_colorh',
            [
                'label' =>   esc_html__( 'Hover Background', 'news-element' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} #commentform input.submit:hover' => 'background: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'cbtn_colorh',
            [
                'label' =>   esc_html__( 'Hover Color', 'news-element' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} #commentform input.submit:hover' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'cbtn_typ',
                'label' =>   esc_html__( 'Typography', 'news-element' ),
                'selector' => '{{WRAPPER}} #commentform input.submit',
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
    $widgets_manager->register(new \News_Element\Widgets\thepack_post_comment());
} else {
    $widgets_manager->register_widget_type(new \News_Element\Widgets\thepack_post_comment());
}
