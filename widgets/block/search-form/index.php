<?php
namespace News_Element\Widgets;
use Elementor;
use Elementor\Plugin;
use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Scheme_Color;
use Elementor\Group_Control_Typography;
use Elementor\Scheme_Typography;
use Elementor\Group_Control_Border;
use News_Element\Khobish_Helper;
 
class khobish_searchwidget extends Widget_Base{
    public function get_name() {
        return 'khbsearch';
    }

    public function get_title() {
        return   esc_html__( 'Search Form', 'news-element' );
    }

    public function get_icon() {
        return 'dashicons dashicons-dismiss';
    }

    public function get_categories() {
        return [ 'khobish-builder' ];
    }

    protected function register_controls() {
        $this->start_controls_section(
            'section_layout_settings',
            [
                'label' =>   esc_html__( 'Search form', 'news-element' )
            ]
        );

        $this->add_control(
            'placeholder',
            [
                'type' => Controls_Manager::TEXT,
                'label' =>   esc_html__('Placeholder', 'news-element'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'tmpl',
            [
                'label' =>   esc_html__('Template', 'news-element'),
                'type' => Controls_Manager::CHOOSE,
                'options' => [
                    'no_button' => [
                        'title' =>   esc_html__('No button', 'news-element'),
                        'icon' => 'fa fa-folder',
                    ],
                    'ikn_button' => [
                        'title' =>   esc_html__('Icon button', 'news-element'),
                        'icon' => 'fa fa-folder-o',
                    ],
                    'txt_button' => [
                        'title' =>   esc_html__('Text button', 'news-element'),
                        'icon' => 'fa fa-folder-open',
                    ],

                ], 
                'default' => 'no_button',               
            ]
        );

        $this->add_control(
            'btn_txt',
            [
                'type' => Controls_Manager::TEXT,
                'label' =>   esc_html__('Button text', 'news-element'),
                'label_block' => true,
                'condition' => [
                    'tmpl' => 'txt_button',
                ],                
            ]
        );

        $this->add_control(
            'btn_ikn',
            [
                'type' => Controls_Manager::ICONS,
                'label' =>   esc_html__('Button icon', 'news-element'),
                'label_block' => true,
                'condition' => [
                    'tmpl' => 'ikn_button',
                ],                
            ]
        );
        $this->end_controls_section();

        $this->start_controls_section(
            'section-general-style',
            [
                'label' =>   esc_html__( 'General', 'news-element' ),
                'tab' => Controls_Manager::TAB_STYLE
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'title_typo',
                'label' =>   esc_html__( 'Typography', 'news-element' ),
                'selector' => '{{WRAPPER}} .search-field',
            ]
        );
        $this->add_control(
            'padding',
            [
                'label' =>   esc_html__( 'Padding', 'news-element' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', 'em', '%' ],
                'selectors' => [
                    '{{WRAPPER}} .search-field' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
 
        $this->add_control(
            'border-width',
            [
                'label' =>   esc_html__( 'Border width', 'news-element' ),
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
                    '{{WRAPPER}} .search-field' => 'border-width: {{SIZE}}{{UNIT}};border-style:solid;',
                ],

            ]
        ); 

        $this->add_responsive_control(
            'border-radius',
            [
                'label' =>   esc_html__('Border radius', 'news-element'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%' ],
                'selectors' => [
                    '{{WRAPPER}} .search-field' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'border_color',
            [
                'label' =>   esc_html__( 'Border color', 'news-element' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .search-field' => 'border:1px solid {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'txt_color',
            [
                'label' =>   esc_html__( 'Input color', 'news-element' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .search-field,{{WRAPPER}} .buildersearch-form:after' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'bg_color',
            [
                'label' =>   esc_html__( 'Input background', 'news-element' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .search-field' => 'background: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'section_btnikn',
            [
                'label' =>   esc_html__('Icon Button', 'news-element'),
                'tab' => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'tmpl!' => 'no_button',
                ],                 
            ]
        );

        $this->add_control(
            'iknwid',
            [
                'label' =>   esc_html__( 'Width', 'news-element' ),
                'type' =>  Controls_Manager::SLIDER,
                'selectors' => [
                    '{{WRAPPER}} .search-submit' => 'width: {{SIZE}}px;',
                ],

            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'btn_typo',
                'label' =>   esc_html__( 'Typography', 'news-element' ),
                'selector' => '{{WRAPPER}} .search-submit',
            ]
        );

        $this->add_control(
            'btm_color',
            [
                'label' =>   esc_html__( 'Color', 'news-element' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .search-submit' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'btm_bgcolor',
            [
                'label' =>   esc_html__( 'Background', 'news-element' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .search-submit' => 'background: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'sborder_color',
            [
                'label' =>   esc_html__( 'Border color', 'news-element' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .search-submit' => 'border-color:{{VALUE}};border-style:solid',
                ],
            ]
        );

        $this->add_control(
            'iknbrwid',
            [
                'label' =>   esc_html__( 'Border width', 'news-element' ),
                'type' =>  Controls_Manager::SLIDER,
                'selectors' => [
                    '{{WRAPPER}} .search-submit' => 'border-width: {{SIZE}}px;',
                ],

            ]
        );

        $this->add_responsive_control(
            'iknbdr',
            [
                'label' =>   esc_html__('Border radius', 'news-element'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%' ],
                'selectors' => [
                    '{{WRAPPER}} .search-submit' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
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
    $widgets_manager->register(new \News_Element\Widgets\khobish_searchwidget());
} else {
    $widgets_manager->register_widget_type(new \News_Element\Widgets\khobish_searchwidget());
}
