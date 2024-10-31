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

class khobish_trending6 extends Widget_Base {

	public function get_name() { 
		return 'khobtrend6';
	}

	public function get_title() {
		return __( 'Trending 6', 'khobish' );
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
                'label' => __('Post meta', 'news-element'),
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
                'label' => __('General', 'news-element'),
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
        
        $this->start_controls_tabs('gtab');

        $this->start_controls_tab(
            'g1',
            [
                'label' => esc_html__( 'Big', 'xltab' ),               
            ]
        );


        $this->add_responsive_control(
            'bglsp',
            [
                'label' => __( 'Left spacing', 'news-element' ),
                'type' =>  Controls_Manager::SLIDER,                              
                'selectors' => [
                    '{{WRAPPER}} .khb-big-block .excerpt-wrap' => 'padding-left: {{SIZE}}{{UNIT}};',
                ],                
            ]
        );

        $this->add_responsive_control(
            'bgtsp',
            [
                'label' => __( 'Top spacing', 'news-element' ),
                'type' =>  Controls_Manager::SLIDER,                              
                'selectors' => [
                    '{{WRAPPER}} .khb-big-block .excerpt-wrap' => 'padding-top: {{SIZE}}{{UNIT}};',
                ],                
            ]
        );        

        $this->add_responsive_control(
            'bgttsp',
            [
                'label' => __( 'Bottom spacing', 'news-element' ),
                'type' =>  Controls_Manager::SLIDER,                              
                'selectors' => [
                    '{{WRAPPER}} .khb-big-block' => 'padding-bottom: {{SIZE}}{{UNIT}};margin-bottom: {{SIZE}}{{UNIT}};',
                ],                
            ]
        ); 

        $this->add_control(
            'bgbgt',
            [
                'label' => __( 'Border color', 'news-element' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .khb-big-block' => 'border-bottom-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'thmht',
            [
                'label' => __( 'Thumb height', 'news-element' ),
                'type' =>  Controls_Manager::SLIDER, 
                'range' => [
                    'px' => [
                        'max' => 1000,
                    ]
                ],                                             
                'selectors' => [
                    '{{WRAPPER}} .ft-thumbwrap img' => 'height: {{SIZE}}{{UNIT}};',
                ],                
            ]
        );

        $this->end_controls_tab();

        $this->start_controls_tab(
            'g2',
            [
                'label' => esc_html__( 'Small', 'xltab' ),                
            ]
        );

        $this->add_responsive_control(
            'smbsp',
            [
                'label' => __( 'Bottom padding', 'news-element' ),
                'type' =>  Controls_Manager::SLIDER,                              
                'selectors' => [
                    '{{WRAPPER}} .khb-small-block:not(:last-child)' => 'padding-bottom: {{SIZE}}{{UNIT}};',
                ],                
            ]
        ); 

        $this->end_controls_tab();

        $this->end_controls_tabs();  

        
        $this->end_controls_section();

        $this->start_controls_section(
            'section_cntr',
            [
                'label' => __('Counter', 'webangon'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->start_controls_tabs('tcounter');

        $this->start_controls_tab(
            'ct1',
            [
                'label' => esc_html__( 'Big', 'xltab' ),               
            ]
        );

        $this->add_responsive_control(
            'bgtfsp',
            [
                'label' => __( 'Top position', 'news-element' ),
                'type' =>  Controls_Manager::SLIDER,                              
                'size_units' => [ 'px','%'],
                'selectors' => [
                    '{{WRAPPER}} .khb-big-block .khbnumber' => 'top: {{SIZE}}{{UNIT}};',
                ],                
            ]
        );

        $this->add_control(
            'wfbg',
            [
                'label' => __( 'Background', 'news-element' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .khb-big-block .khbnumber' => 'background: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'wfclr',
            [
                'label' => __( 'Color', 'news-element' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .khb-big-block .khbnumber' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'wfy',
            [
                'label' => __( 'Heigth and width', 'news-element' ),
                'type' =>  Controls_Manager::SLIDER,
                'selectors' => [
                    '{{WRAPPER}} .khb-big-block .khbnumber' => 'width: {{SIZE}}{{UNIT}};height: {{SIZE}}{{UNIT}};',
                ],                
            ]
        );

        $this->add_responsive_control(
            'wbgt',
            [
                'label' => __( 'Border radius', 'news-element' ),
                'type' =>  Controls_Manager::SLIDER,
                'selectors' => [
                    '{{WRAPPER}} .khb-big-block .khbnumber' => 'border-radius: {{SIZE}}{{UNIT}};',
                ],                 
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'srltypo',
                'label' => __('Typography', 'webangon'),
                'selector' => '{{WRAPPER}} .khb-big-block .khbnumber',
            ]
        );

        $this->end_controls_tab();

        $this->start_controls_tab(
            'ct2',
            [
                'label' => esc_html__( 'Small', 'xltab' ),                
            ]
        );

        $this->add_responsive_control(
            'bgtssp',
            [
                'label' => __( 'Top position', 'news-element' ),
                'type' =>  Controls_Manager::SLIDER,                              
                'size_units' => [ 'px','%'],
                'selectors' => [
                    '{{WRAPPER}} .khb-small-block .khbnumber' => 'top: {{SIZE}}{{UNIT}};',
                ],                
            ]
        );

        $this->add_control(
            'wf2bg',
            [
                'label' => __( 'Background', 'news-element' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .khb-small-block .khbnumber' => 'background: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'wf2clr',
            [
                'label' => __( 'Color', 'news-element' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .khb-small-block .khbnumber' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'wf2y',
            [
                'label' => __( 'Heigth and width', 'news-element' ),
                'type' =>  Controls_Manager::SLIDER,
                'selectors' => [
                    '{{WRAPPER}} .khb-small-block .khbnumber' => 'width: {{SIZE}}{{UNIT}};height: {{SIZE}}{{UNIT}};',
                ],                
            ]
        );

        $this->add_responsive_control(
            'wb2gt',
            [
                'label' => __( 'Border radius', 'news-element' ),
                'type' =>  Controls_Manager::SLIDER,
                'selectors' => [
                    '{{WRAPPER}} .khb-small-block .khbnumber' => 'border-radius: {{SIZE}}{{UNIT}};',
                ],                 
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'srl2typo',
                'label' => __('Typography', 'webangon'),
                'selector' => '{{WRAPPER}} .khb-small-block .khbnumber',
            ]
        );

        $this->end_controls_tab();

        $this->end_controls_tabs();  

        $this->end_controls_section();

        $this->start_controls_section(
            'section_title',
            [
                'label' => __('Post title', 'webangon'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->start_controls_tabs('ptitle');

        $this->start_controls_tab(
            'pt1',
            [
                'label' => esc_html__( 'Big', 'xltab' ),               
            ]
        );

        $this->add_responsive_control(
            'pt1mr',
            [
                'label' => __('Margin', 'webangon'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .khb-big-block .entry_title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ]
            ]
        );

        $this->add_control(
            'pt1c',
            [
                'label' => __( 'Color', 'news-element' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .khb-big-block .entry_title a' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'pt1ty',
                'label' => __('Typography', 'webangon'),
                'selector' => '{{WRAPPER}} .khb-big-block .entry_title',
            ]
        );

        $this->end_controls_tab();

        $this->start_controls_tab(
            'pt2',
            [
                'label' => esc_html__( 'Small', 'xltab' ),                
            ]
        );

        $this->add_responsive_control(
            'pt2mr',
            [
                'label' => __('Margin', 'webangon'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .khb-small-block .entry_title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ]
            ]
        );

        $this->add_control(
            'pt2c',
            [
                'label' => __( 'Color', 'news-element' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .khb-small-block .entry_title a' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'pt2ty',
                'label' => __('Typography', 'webangon'),
                'selector' => '{{WRAPPER}} .khb-small-block .entry_title',
            ]
        );

        $this->end_controls_tab();

        $this->end_controls_tabs();  

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
                'label' => __('Typography', 'webangon'),
                'selector' => '{{WRAPPER}} .leffect-1',
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
                'selector' => '{{WRAPPER}} .khboverlaythumb .cat-bg',
            ]
        );

        $this->add_responsive_control(
            'tax_pad',
            [
                'label' => __('Padding', 'webangon'),
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
		
	}
	
	protected function render() {

		$settings = $this->get_settings();
        require dirname(__FILE__) .'/view.php';		
	}

}

if ( defined( 'ELEMENTOR_VERSION' ) && version_compare( ELEMENTOR_VERSION, '3.5.0', '>=' ) ) {
    $widgets_manager->register(new \News_Element\Widgets\khobish_trending6());
} else {
    $widgets_manager->register_widget_type(new \News_Element\Widgets\khobish_trending6());
}
