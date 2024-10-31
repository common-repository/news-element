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

if ( ! defined( 'ABSPATH' ) ) { exit; }

class khobish_trending4 extends Widget_Base {

	public function get_name() {
		return 'khobtrend4';
	}

	public function get_title() {
		return __( 'Trending 4', 'khobish' );
	}

	public function get_icon() {
		return 'eicon-post-list';
	}

	public function get_categories() {
		return ['khobish-element'];
	}

	protected function register_controls() {
		
		$this->start_controls_section(
			'lbl_query',
			[
				'label' => __( 'Query', 'khobish' ),
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
                'label' => __('Post meta', 'ashelement'),
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
            'meta',
            [
                'type' => Controls_Manager::REPEATER,
                'fields' => $r1->get_controls(),
                'prevent_empty' => false,
                'title_field' => '{{{ meta }}}',
            ]
        );

        $this->add_control(
            'img_size',
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
                'label' => __('General', 'ashelement'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'altbg',
            [
                'label' => __( 'Alternate background', 'your-plugin' ),
                'type' => Controls_Manager::SWITCHER,  
                'return_value' => 'altbg',              
            ]
        );

        $this->add_responsive_control(
            'clwid',
            [
                'label' => __( 'Column width', 'ashelement' ),
                'type' =>  Controls_Manager::NUMBER,                 
                'selectors' => [
                    '{{WRAPPER}} .khbtrendinginr' => 'width: {{SIZE}}%;',
                ],
            ]
        );

        $this->add_responsive_control(
            'colht',
            [
                'label' => __( 'Height', 'ashelement' ),
                'type' =>  Controls_Manager::SLIDER,
                'range' => [
                    'px' => [

                        'max' => 1000,
                        'step' => 1,
                    ]
                ],
                'size_units' => [ 'px'],
                'selectors' => [
                    '{{WRAPPER}} .ft-thumbwrap' => 'height: {{SIZE}}{{UNIT}};',
                ],                 
            ]
        );

        $this->add_responsive_control(
            'gbrd',
            [
                'label' => __( 'Border radius', 'ashelement' ),
                'type' =>  Controls_Manager::SLIDER,
                'selectors' => [
                    '{{WRAPPER}} .ft-thumbwrap' => 'border-radius: {{SIZE}}{{UNIT}};',
                ],                 
            ]
        );

        $this->add_responsive_control(
            'gitsp',
            [
                'label' => __( 'Column padding', 'ashelement' ),
                'type' =>  Controls_Manager::SLIDER,
                'selectors' => [ 
                    
                    '{{WRAPPER}} .khbtrending4' => 'margin-right: -{{SIZE}}{{UNIT}};margin-left: -{{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .khbtrending4 >div[class^="khbtrendinginr"]' => 'padding-left: {{SIZE}}{{UNIT}};padding-right: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'gpad',
            [
                'label' => __('Padding', 'elementor' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .excerpt-wrap' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
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
                    ],
                    'justify' => [
                        'title' =>   esc_html__('Justified', 'thepack'),
                        'icon' => 'fa fa-align-justify',
                    ],
                ],
                'default' => 'center',
                'selectors' => [
                    '{{WRAPPER}} .excerpt-wrap' => 'text-align: {{VALUE}};',
                ],                 
            ]
        );

        $this->add_control(
            'btmr',
            [
                'label' => __( 'Bottom margin', 'ashelement' ),
                'type' =>  Controls_Manager::SLIDER,
                'selectors' => [
                    '{{WRAPPER}} .khbtrendinginr:not(last-child)' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                ],

            ]
        );

        $this->add_control(
            'priclr',
            [
                'label' => __( 'Background color', 'ashelement' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .ft-thumbwrap a:after' => 'background: {{VALUE}};',
                    '{{WRAPPER}} .inr:hover .entry_title a,{{WRAPPER}} .inr:hover .leffect-1,{{WRAPPER}} .inr:hover .leffect-1 a' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .altbg .khbodd .inr .entry_title a,{{WRAPPER}} .altbg .khbodd .inr .leffect-1,{{WRAPPER}} .altbg .khbodd .inr .leffect-1 a' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'sexclr',
            [
                'label' => __( 'Hover background color', 'ashelement' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .inr:hover .ft-thumbwrap a:after' => 'background: {{VALUE}};',
                    '{{WRAPPER}} .altbg .khbodd .inr .ft-thumbwrap a:after' => 'background: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'evdso',
            [
                'label' => __( 'Odd top spacing', 'ashelement' ),
                'type' =>  Controls_Manager::SLIDER,
                'selectors' => [
                    '{{WRAPPER}} .khbodd' => 'top: {{SIZE}}{{UNIT}};',
                ],                 
            ]
        );

        $this->add_control(
            'gbdck',
            [
                'label' => __( 'Border color', 'ashelement' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .ft-thumbwrap' => 'border-color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'section_serial',
            [
                'label' => __('Counter', 'webangon'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_responsive_control(
            'wfy',
            [
                'label' => __( 'Heigth and width', 'ashelement' ),
                'type' =>  Controls_Manager::SLIDER,
                'range' => [
                    'px' => [

                        'max' => 500,
                        'step' => 1,
                    ]
                ],
                'size_units' => [ 'px'],
                'selectors' => [
                    '{{WRAPPER}} .khbnumber' => 'width: {{SIZE}}{{UNIT}};height: {{SIZE}}{{UNIT}};',
                ],                
            ]
        );

        $this->add_responsive_control(
            'wbgt',
            [
                'label' => __( 'Border radius', 'ashelement' ),
                'type' =>  Controls_Manager::SLIDER,
                'range' => [
                    'px' => [

                        'max' => 500,
                        'step' => 1,
                    ]
                ],
                'size_units' => [ 'px'],
                'selectors' => [
                    '{{WRAPPER}} .khbnumber' => 'border-radius: {{SIZE}}{{UNIT}};',
                ],                 
            ]
        );

        $this->add_responsive_control(
            'wdbgt',
            [
                'label' => __( 'Border width', 'ashelement' ),
                'type' =>  Controls_Manager::SLIDER,
                'selectors' => [
                    '{{WRAPPER}} .khbnumber' => 'border-width: {{SIZE}}{{UNIT}};border-style:solid;',
                ],                 
            ]
        );

        $this->add_control(
            'srlclr',
            [
                'label' => __( 'Primary color', 'ashelement' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .khbnumber' => 'color: {{VALUE}};border-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'rtlclr',
            [
                'label' => __( 'Secondary color', 'ashelement' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [ 
                    '{{WRAPPER}} .inr:hover .khbnumber' => 'color: {{VALUE}};border-color: {{VALUE}};',
                    '{{WRAPPER}} .altbg .khbodd .inr .khbnumber' => 'color: {{VALUE}};border-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'srltypo',
                'label' => __('Typography', 'webangon'),
                'selector' => '{{WRAPPER}} .khbnumber',
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'section_ptyy',
            [
                'label' => __('Post title', 'webangon'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_responsive_control(
            'title_margin',
            [
                'label' => __('Margin', 'webangon'),
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
                'label' => __( 'Color', 'ashelement' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .entry_title a' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'title_typo',
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
            'metsspt',
            [
                'label' => __('Meta spacing', 'webangon'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .meta-space' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ]
            ]
        );

        $this->add_control(
            'btm_color',
            [
                'label' => __( 'Meta color', 'ashelement' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .leffect-1' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'btm_colora',
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
                'name' => 'btm_typo',
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
		
	}
	
	protected function render() {

		$settings = $this->get_settings();
        require dirname(__FILE__) .'/view.php';		
	}

}

if ( defined( 'ELEMENTOR_VERSION' ) && version_compare( ELEMENTOR_VERSION, '3.5.0', '>=' ) ) {
    $widgets_manager->register(new \News_Element\Widgets\khobish_trending4());
} else {
    $widgets_manager->register_widget_type(new \News_Element\Widgets\khobish_trending4());
}
