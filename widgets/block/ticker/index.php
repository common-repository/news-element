<?php
namespace News_Element\Widgets;
use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Background;
use Elementor\Utils;
use News_Element\Khobish_Helper;
use News_Element\Widgets\Group_Query;

if (!defined('ABSPATH'))
    exit; // Exit if accessed directly

class khobish_ticker extends Widget_Base {

    public function get_name() {
        return 'ae_ticker';
    }

    public function get_title() {
        return __('Ticker', 'news-element');
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
                'label' => __('Heading', 'news-element'),
            ]
        );

        $this->add_control(
            'heading',
            [
                'label' => __('Heading', 'news-element'),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default' => 'NEWSFLASH',
            ]
        );

        $this->add_control( 
            'head_icon',
            [
                'label' => __('Icon', 'news-element'),
                'type' => Controls_Manager::ICONS,
				'default'     => [
					'value'   => 'fas fa-chevron-left',
					'library' => 'solid',
				],                
            ]
        );

        $this->end_controls_section();

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

        $this->end_controls_section();

        $this->start_controls_section(
            'section_style',
            [
                'label' => __('General', 'news-element'),
                'tab' => Controls_Manager::TAB_SETTINGS,
            ]
        );
        $this->add_responsive_control(
            'height',
            [
                'label' => __('Wrapper height', 'news-element'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'default' => [
                    'size' => 45,
                ],
                'range' => [
                    'px' => [
                        'max' => 500,
                        'min' => 1,
                        'step' => 1,
                    ],
                ],

                'selectors' => [
                    '{{WRAPPER}} .trending-now,{{WRAPPER}} .slick-slide' => 'height: {{SIZE}}{{UNIT}};',
                ]
            ]
        );

        $this->add_control(
            'gbg',
            [
                'label' => __( 'Background', 'news-element' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .trending-now' => 'background: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'bdclr',
            [
                'label' => __( 'Border color', 'news-element' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .trending-now,{{WRAPPER}} .prnx' => 'border-color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_section();

         $this->start_controls_section(
            'section_style3',
            [
                'label' => __('Label', 'news-element'),
                'tab' => Controls_Manager::TAB_SETTINGS,
            ]
        );

        $this->add_control(
            'lblg',
            [
                'label' => __( 'Padding', 'news-element' ),
                'type' =>  Controls_Manager::SLIDER,
                'selectors' => [
                    '{{WRAPPER}} .trending-now-label' => 'padding:0px {{SIZE}}{{UNIT}};',

                ],                
            ]
        );

        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'exbgt',
                'label' =>   esc_html__( 'Background', 'elementor' ),
                'types' => [ 'none', 'classic','gradient' ],
                'selector' => '{{WRAPPER}} .trending-now-label',
            ]
        );

        $this->add_control(
            'lcolor',
            [
                'label' => __( 'Color', 'news-element' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .trending-now-label' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'label_typo',
                'selector' => '{{WRAPPER}} .trending-now-label',
                'label' => __( 'Typography', 'news-element' ),
            ]
        );

        $this->add_control(
            'lbfs',
            [
                'label' => __( 'Icon size', 'news-element' ),
                'type' =>  Controls_Manager::SLIDER,
                'selectors' => [
                    '{{WRAPPER}} .trending-now-label i' => 'font-size:{{SIZE}}{{UNIT}};',

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

        $this->add_control(
            'rspn',
            [
                'label' => __( 'Right spacing', 'news-element' ),
                'type' =>  Controls_Manager::SLIDER,
                'selectors' => [
                    '{{WRAPPER}} .entry_title' => 'padding-right: {{SIZE}}{{UNIT}};',
                ],

            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'section_bmeta',
            [
                'label' => __('Post Meta', 'news-element'),
                'tab' => Controls_Manager::TAB_SETTINGS,
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
            'section_carousel',
            [
                'label' => __('Carousel', 'news-element'),
                'tab' => Controls_Manager::TAB_SETTINGS,
            ]
        );

        $this->add_responsive_control(
            'spacing',
            [
                'label' => __( 'Spacing', 'news-element' ),
                'type' =>  Controls_Manager::SLIDER,
                'selectors' => [
                    '{{WRAPPER}} .slick-slide' => 'margin:0px {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .slick-list' => 'margin:0px -{{SIZE}}{{UNIT}};',
                ],                
            ]
        );

        $this->add_control(
            'items',
            [
                'label' => __( 'Items desktop', 'news-element' ),
                'type' =>  Controls_Manager::SLIDER,
                'default' => [
                    'size' => 4,
                ],
                'range' => [
                    'px' => [
                        'min' => 1,
                        'max' => 10,
                        'step' => .5,
                    ],
                ],
                'size_units' => [ 'px'],
            ]
        );

        $this->add_control(
            'items_tab',
            [
                'label' => __( 'Items tablet', 'news-element' ),
                'type' =>  Controls_Manager::SLIDER,
                'default' => [
                    'size' => 1,
                ],
                'range' => [
                    'px' => [
                        'min' => 1,
                        'max' => 10,
                        'step' => .5,
                    ],
                ],
                'size_units' => [ 'px'],
            ]
        );

        $this->add_control(
            'arrow',
            [
                'label' => __('Arrow', 'news-element'),
                'type' => Controls_Manager::SWITCHER,
                'return_value' => 'yes',
                'default' => 'no',
            ]
        );

        $this->add_control(
            'vertical',
            [
                'label' => __('Vertical', 'news-element'),
                'type' => Controls_Manager::SWITCHER,
                'return_value' => 'yes',
                'default' => 'no',
            ]
        );

        $this->add_control(
            'var_width',
            [
                'label' => __('Variable width', 'news-element'),
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
                'return_value' => 'yes',
                'default' => 'no',
            ]
        );

        $this->add_control(
            'transition',
            [
                'label' => __('Transition', 'news-element'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => __('Fade', 'news-element'),
                'label_off' => __('Slide', 'news-element'),
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


        $this->end_controls_section();

        $this->start_controls_section(
            'section_carousel_cust',
            [
                'label' => __('Arrow', 'news-element'),
                'tab' => Controls_Manager::TAB_SETTINGS,
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
            'arrow_wd',
            [
                'label' => __( 'Width', 'news-element' ),
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
                    '{{WRAPPER}} .prnx' => 'width: {{SIZE}}{{UNIT}};',
                ],

            ]
        );

        $this->add_control(
            'arrow_ht',
            [
                'label' => __( 'Height', 'news-element' ),
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
                    '{{WRAPPER}} .prnx' => 'height: {{SIZE}}{{UNIT}};',
                ],

            ]
        );

        $this->add_control(
            'arspu',
            [
                'label' => __( 'Arrow spacing', 'news-element' ),
                'type' =>  Controls_Manager::SLIDER,
                'selectors' => [
                    '{{WRAPPER}} .newsticker-prev.prnx' => 'margin-right: {{SIZE}}{{UNIT}};',
                ],

            ]
        );

        $this->add_control(
            'arrow_lh',
            [
                'label' => __( 'Line height', 'news-element' ),
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
                    '{{WRAPPER}} .prnx' => 'line-height: {{SIZE}}{{UNIT}};',
                ],

            ]
        );

        $this->add_control(
            'arfs',
            [
                'label' => __( 'Font size', 'news-element' ),
                'type' =>  Controls_Manager::SLIDER,
                'selectors' => [
                    '{{WRAPPER}} .prnx' => 'font-size: {{SIZE}}{{UNIT}};',
                ],

            ]
        );

        $this->add_control(
            'abg',
            [
                'label' => __( 'Background', 'news-element' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .prnx' => 'background: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'afbg',
            [
                'label' => __( 'Hover ackground', 'news-element' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .prnx:hover' => 'background: {{VALUE}};',
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
    $widgets_manager->register(new \News_Element\Widgets\khobish_ticker());
} else {
    $widgets_manager->register_widget_type(new \News_Element\Widgets\khobish_ticker());
}
