<?php
namespace News_Element\Widgets;
use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
use Elementor\Utils;
use News_Element\Khobish_Helper;
use News_Element\Widgets\Group_Query;

if ( ! defined( 'ABSPATH' ) ) { exit; }

class khobish_countera extends Widget_Base {

	public function get_name() {
		return 'khbcounter-a';
	}

	public function get_title() {
		return __( 'Counter A', 'news-element' );
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

            'style', [
                'type' => Controls_Manager::SELECT,
                'label' => __('Style', 'news-element'),
                'default' => 'style_one',
                'options' => [
                    'style_one' => __('Style 1', 'news-element'),
                    'style_two' => __('Style 2', 'news-element'),
                ],
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
            'section_f',
            [
                'label' => __('First block', 'news-element'),
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

        $this->end_controls_section();

        $this->start_controls_section(
            'section_general',
            [
                'label' => __('General', 'news-element'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_responsive_control(
            'gwid',
            [
                'label' =>   esc_html__( 'Column width', 'news-element' ),
                'type' =>  Controls_Manager::NUMBER,
                'default' => '33.33',
                 'selectors' => [
                        '{{WRAPPER}} .inrwrp' => 'width: {{VALUE}}%;',
                 ],
            ]
        );
 
        $this->add_responsive_control(
            'gclspe',
            [
                'label' => __( 'Column spacing', 'news-element' ),
                'type' =>  Controls_Manager::SLIDER,
                'selectors' => [
                    '{{WRAPPER}} .inrwrp' => 'padding: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .khbcounter-a' => 'margin-left:-{{SIZE}}{{UNIT}};margin-right:-{{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'hpfrmt',
            [
                'label' => __( 'Hide media overlay', 'news-element' ),
                'type' => Controls_Manager::SWITCHER,
                'selectors' => [
                    '{{WRAPPER}} .icon' => 'display: none;',
                ],
            ]
        );

        $this->add_control(
            'bordr',
            [
                'label' => __( 'Enable border', 'news-element' ),
                'type' => Controls_Manager::SWITCHER,
                'return_value' => 'en_border',
            ]
        );

        $this->add_control(
            'bdrclr',
            [
                'label' => __( 'Border color', 'news-element' ),
                'type' => Controls_Manager::COLOR,
                'condition' => [
                    'bordr' => 'en_border',
                ],
                'selectors' => [
                    '{{WRAPPER}} .en_border .post-item' => 'border-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'gmhit',
            [
                'label' => __( 'Thumb height', 'news-element' ),
                'type' =>  Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 1000,
                        'step' => 1,
                    ]
                ],
                'size_units' => ['px'],
                'selectors' => [
                    '{{WRAPPER}} .ft-thumbwrap img' => 'height: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'gmipd',
            [
                'label' => __( 'Inner padding', 'news-element' ),
                'type' =>  Controls_Manager::SLIDER,
                'selectors' => [
                    '{{WRAPPER}} .post-item' => 'padding: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'cntgbg',
            [
                'label' => __( 'Content background', 'news-element' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .excerpt-wrap' => 'background: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'cntpf',
            [
                'label' => __('Content padding', 'news-element'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .excerpt-wrap' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ]
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'section_header4',
            [
                'label' => __('Post meta', 'news-element'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'lcrk',
            [
                'label' => __( 'Color', 'news-element' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .leffect-1' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'clrfa',
            [
                'label' => __( 'Link color', 'news-element' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .leffect-1 a' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'hclrfa',
            [
                'label' => __( 'Hover link color', 'news-element' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .leffect-1 a:hover' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'lheader_typography',
                'label' => __('Link Typography', 'news-element'),
                'selector' => '{{WRAPPER}} .leffect-1',
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'section_counter',
            [
                'label' => __('Counter', 'news-element'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_responsive_control(
            'cntwh',
            [
                'label' => __( 'Width and height', 'news-element' ),
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
                    '{{WRAPPER}} .counter' => 'width: {{SIZE}}{{UNIT}};height: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'cntbg',
            [
                'label' => __( 'Background', 'news-element' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .counter' => 'background: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'cntclr',
            [
                'label' => __( 'Color', 'news-element' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .counter' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'cntty',
                'label' => __('Typography', 'news-element'),
                'selector' => '{{WRAPPER}} .counter',
            ]
        );

        $this->add_control(
            'cntphd',
            [
                'label' => __( 'Position', 'plugin-name' ),
                'type' => Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_responsive_control(
            'cntp',
            [
                'label' => __( 'Top', 'news-element' ),
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
                    '{{WRAPPER}} .counter' => 'top: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'cnlt',
            [
                'label' => __( 'Left', 'news-element' ),
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
                    '{{WRAPPER}} .counter' => 'left: {{SIZE}}{{UNIT}};',
                ],
            ]
        );


        $this->end_controls_section();

        $this->start_controls_section(
            'section_dblock',
            [
                'label' => __('Post title', 'news-element'),
                'tab' => Controls_Manager::TAB_STYLE,
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
        
        $this->add_control(
            'tline',
            [
                'label' =>   esc_html__('Underline', 'news-element'),
                'type' => Controls_Manager::CHOOSE,
                'options' => [
                    'tuline' => [
                        'title' =>   esc_html__('Underline', 'news-element'),
                        'icon' => 'eicon-text-align-left',
                    ],
                    'thuline' => [
                        'title' =>   esc_html__('Hover underline', 'news-element'),
                        'icon' => 'eicon-text-align-center',
                    ],
                    '' => [
                        'title' =>   esc_html__('No underline', 'news-element'),
                        'icon' => 'eicon-text-align-center',
                    ]
                ],
                'default' => 'tuline',
            ]
        );

        $this->add_responsive_control(
            'title_margin',
            [
                'label' => __('Margin', 'news-element'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .entry_title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ]
            ]
        );

        $this->add_control(
            'title_color',
            [
                'label' => __( 'Color', 'news-element' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .entry_title a' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'title_colorh',
            [
                'label' => __( 'Color hover', 'news-element' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .entry_title:hover a' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'title_typo',
                'label' => __('Typography', 'news-element'),
                'selector' => '{{WRAPPER}} .entry_title',
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'section_bmeta',
            [
                'label' => __('Meta', 'news-element'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'btm_color',
            [
                'label' => __( 'Meta color', 'news-element' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .leffect-1' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'btm_colora',
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
                'name' => 'btm_typo',
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

        $this->end_controls_section();

	}

	protected function render() {

		$settings = $this->get_settings();
        require dirname(__FILE__) .'/view.php';
	}

}

if ( defined( 'ELEMENTOR_VERSION' ) && version_compare( ELEMENTOR_VERSION, '3.5.0', '>=' ) ) {
    $widgets_manager->register(new \News_Element\Widgets\khobish_countera());
} else {
    $widgets_manager->register_widget_type(new \News_Element\Widgets\khobish_countera());
}
