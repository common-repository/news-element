<?php
namespace News_Element\Widgets;
use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
use Elementor\Utils;
use News_Element\Khobish_Helper;

if (!defined('ABSPATH'))
    exit; // Exit if accessed directly

class ae_social_buttons extends Widget_Base {

    public function get_name() {
        return 'xl-social';
    }

    public function get_title() {
        return __('Social List', 'news-element');
    }

    public function get_icon() {
        return 'eicon-social-icons';
    }

    public function get_categories() {
        return array('khobish-element');
    }

    protected function register_controls() {

        $this->start_controls_section(
            'section_pricing_table',
            [
                'label' => __('Social items', 'news-element'),
            ]
        );

        $this->add_control(
            'type',
            [
                'label' => __('Show as', 'news-element'),
                'type' => Controls_Manager::CHOOSE,
                'default' => 'list',
                'options' => [

                    'list' => [
                        'title' => __('List', 'news-element'),
                        'icon' => 'eicon-folder',
                    ],
                    'box' => [
                        'title' => __('Box', 'news-element'),
                        'icon' => 'eicon-lightbox',
                    ],
                    'border' => [
                        'title' => __('Border', 'news-element'),
                        'icon' => 'eicon-folder-o',
                    ],
                ],
            ]
        );

        $repeater1 = new \Elementor\Repeater();

        $repeater1->add_control(
            'icon', [
                'label' =>   esc_html__( 'Icon', 'news-element' ),
                'type' => Controls_Manager::ICONS,
				'default'     => [
					'value'   => 'fas fa-chevron-left',
					'library' => 'solid',
				],
            ]
        );

        $repeater1->add_control(
            'sub', [
                'label' =>   esc_html__( 'Subtitle', 'news-element' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
            ]
        );

        $repeater1->add_control(
            'count', [
                'label' =>   esc_html__( 'Count', 'news-element' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
            ]
        );

        $repeater1->add_control(
            'color', [
                'label' =>   esc_html__('Theme', 'news-element'),
                'type' => Controls_Manager::COLOR,
            ]
        );

        $repeater1->add_control(
            'url', [
                'label' =>   esc_html__('Social link url', 'news-element'),
                'type' => Controls_Manager::URL,
                'label_block' => true,
                'placeholder' =>   esc_html__('http://your-link.com', 'news-element'),
            ]
        );

        $this->add_control(
            'lists',
            [
                'type' => Controls_Manager::REPEATER,
                'fields' => $repeater1->get_controls(),
                'prevent_empty' => false,
                'title_field' => '{{{ elementor.helpers.renderIcon( this, icon, {}, "i", "panel" ) || \'<i class="{{ icon }}" aria-hidden="true"></i>\' }}}',
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
            'width',
            [
                'label' =>   esc_html__( 'Column width', 'news-element' ),
                'type' =>  Controls_Manager::NUMBER,
                'default' => '33.33',
                 'selectors' => [
                        '{{WRAPPER}} .xl-social-follow li' => 'flex: 0 0 {{VALUE}}%;-ms-flex: 0 0 {{VALUE}}%;max-width:{{VALUE}}%',
                 ],
            ]
        );

        $this->add_responsive_control(
            'gitsp',
            [
                'label' => __( 'Item spacing', 'news-element' ),
                'type' =>  Controls_Manager::SLIDER,
                'selectors' => [
                    '{{WRAPPER}} .xl-social-follow li' => 'padding: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .xl-social-follow' => 'margin-right: -{{SIZE}}{{UNIT}};margin-left: -{{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'item_pad',
            [
                'label' => __('Padding', 'elementor' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .xl-social-follow a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',

                ],
            ]
        );

        $this->add_control(
            'bdclr',
            [
                'label' =>   esc_html__( 'Border color', 'news-element' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .xl-social-follow a' => 'border:1px solid {{VALUE}};'
                ],
            ]
        );

        $this->add_control(
            'bdchlr',
            [
                'label' =>   esc_html__( 'Hover background', 'news-element' ),
                'type' => Controls_Manager::COLOR,
                'condition' => [
                    'type' => 'border',
                ],
                'selectors' => [
                    '{{WRAPPER}} .xl-social-follow a:hover' => 'background:{{VALUE}};'
                ],
            ]
        );

        $this->end_controls_section();

         $this->start_controls_section(
            'section_style3',
            [
                'label' => __('Icon', 'news-element'),
                'tab' => Controls_Manager::TAB_SETTINGS,
            ]
        );

        $this->add_responsive_control(
            'fsize',
            [
                'label' => __('Font size', 'news-element'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'selectors' => [
                    '{{WRAPPER}} .xl-social-follow i' => 'font-size: {{SIZE}}{{UNIT}};',
                ]
            ]
        );

        $this->add_responsive_control(
            'icowidth',
            [
                'label' => __('Iconbox width and height', 'news-element'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'selectors' => [
                    '{{WRAPPER}} .xl-social-follow i' => 'width: {{SIZE}}{{UNIT}};height: {{SIZE}}{{UNIT}};',
                ],
                'condition'     => [
                    'type!' => 'list',
                ],
            ]
        );

        $this->add_control(
            'icobor',
            [
                'label' => __('Iconbox border radius', 'news-element'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'selectors' => [
                    '{{WRAPPER}} .xl-social-follow i' => 'border-radius: {{SIZE}}{{UNIT}};',
                ],
                'condition'     => [
                    'type!' => 'list',
                ],
            ]
        );

        $this->add_responsive_control(
            'icolineh',
            [
                'label' => __('Iconbox line-height', 'news-element'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'selectors' => [
                    '{{WRAPPER}} .xl-social-follow i' => 'line-height: {{SIZE}}{{UNIT}};',
                ],
                'condition'     => [
                    'type!' => 'list',
                ],
            ]
        );

        $this->add_control(
            'icolor',
            [
                'label' => __( 'Color', 'news-element' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .xl-social-follow i' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_section();

         $this->start_controls_section(
            'section_labels',
            [
                'label' => __('Label', 'news-element'),
                'tab' => Controls_Manager::TAB_SETTINGS,
            ]
        );

        $this->add_responsive_control(
            'leftlmar',
            [
                'label' => __('Wrapper Left margin', 'news-element'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'selectors' => [
                    '{{WRAPPER}} .txt-wrap' => 'margin-left: {{SIZE}}{{UNIT}};',
                ]
            ]
        );

        $this->add_responsive_control(
            'toplmar',
            [
                'label' => __('Label top margin', 'news-element'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'selectors' => [
                    '{{WRAPPER}} .sub' => 'margin-top: -{{SIZE}}{{UNIT}};',
                ]
            ]
        );

        $this->add_control(
            'ccolor',
            [
                'label' => __( 'Count Color', 'news-element' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .count' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'lcolor',
            [
                'label' => __( 'Label Color', 'news-element' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .sub' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'm_typography',
                'selector' => '{{WRAPPER}} .count',
                'label' => __( 'Count Typo', 'news-element' ),
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'c_typography',
                'selector' => '{{WRAPPER}} .sub',
                'label' => __( 'Sub Typo', 'news-element' ),
            ]
        );

        $this->end_controls_section();

    }

    protected function render() {

        $settings = $this->get_settings();
        require dirname(__FILE__) .'/'. sanitize_key($settings['type']) .'.php';
    }

}

if ( defined( 'ELEMENTOR_VERSION' ) && version_compare( ELEMENTOR_VERSION, '3.5.0', '>=' ) ) {
    $widgets_manager->register(new \News_Element\Widgets\ae_social_buttons());
} else {
    $widgets_manager->register_widget_type(new \News_Element\Widgets\ae_social_buttons());
}
