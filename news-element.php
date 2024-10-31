<?php
namespace News_Element;
if ( ! defined( 'ABSPATH' ) ) { exit; }
class News_Element_Plugin
{

    public function __construct()
    {
        // Add New Elementor Categories
        add_action( 'elementor/init', array( $this, 'add_elementor_category' ), 999 );
        // Register Widget Scripts
        add_action( 'elementor/frontend/after_enqueue_scripts', array( $this, 'register_widget_scripts' ) );
        // Register Widget Styles
        add_action( 'elementor/frontend/after_enqueue_styles', array( $this, 'register_widget_styles' ) );
        // Register New Widgets

	    if ( defined( 'ELEMENTOR_VERSION' ) ) {
		    if ( version_compare( ELEMENTOR_VERSION, '3.5.0', '>=' ) ) {
			    add_action( 'elementor/controls/register', array( $this, 'register_new_controls' ) );
			    add_action('elementor/widgets/register', array($this, 'register_widgets'));
		    } else {
			    add_action( 'elementor/controls/controls_registered', array( $this, 'register_new_controls' ) );
			    add_action('elementor/widgets/widgets_registered', array($this, 'register_widgets'));
		    }
	    }
                
        //icons
        add_action('elementor/editor/after_enqueue_scripts', array($this, 'thepack_builder_styles'));
        add_action( 'elementor/editor/after_enqueue_scripts', array( $this, 'elementor_editor_scripts' ) );
        add_action( 'template_redirect', array( $this, 'template_preview' ), 9 );
        add_action( 'wp_body_open', array( $this, 'inject_header_markup' ) );
        add_filter('elementor/icons_manager/additional_tabs', array($this, 'icons_tabs'));
        
    }

    public function icons_tabs($tabs = [])
    {
        $tabs['themify-icons'] = [
            'name' => 'themify-icons',
            'label' => esc_html__('Themify', 'thepack'),
            'labelIcon' => 'ti-wand',
            'prefix' => 'ti-',
            'displayPrefix' => 'tivo',
            'url' => plugins_url( 'assets/iconfont/themify-icons/themify-icons.css', __FILE__ ),
            'fetchJson' => plugins_url( 'assets/iconfont/themify-icons/fonts/themify-icons.json', __FILE__ ),
            'ver' => '3.0.1',
        ];

        return $tabs;
    }

    public function inject_header_markup() {
        //echo '<div class="ne-page-loader-wrap"><div class="loader"></div></div>';
    }

    public function template_preview() {

        $instance = \Elementor\Plugin::$instance->templates_manager->get_source( 'local' );
        remove_action( 'template_redirect', [ $instance, 'block_template_frontend' ] );

    }
    
    public function register_new_controls( $controls_manager ) {

        require_once plugin_dir_path( __FILE__ ) . 'includes/query-control.php';
    }

    // Add New Categories to Elementor
    public function add_elementor_category(){

        \Elementor\Plugin::instance()->elements_manager->add_category( 'khobish-element', array(
            'title' => __( 'News Element', 'news-element' ),
        ), 1 );

        \Elementor\Plugin::instance()->elements_manager->add_category( 'khobish-builder', array(
            'title' => __( 'Theme Builder', 'news-element' ),
        ), 1 );

    }

    // Register Widget Scripts
    public function register_widget_scripts()
    { 
		wp_enqueue_script( 'khobish_inito', NEWS_ELM_URL.'assets/js/inito.js', array( 'jquery','masonry' ), true, 1, 'all' );
        wp_enqueue_script('xlmag-mainlib', NEWS_ELM_URL.'assets/js/main-lib.js', array('jquery'), '', true);
        wp_enqueue_script('xlmag-slick', NEWS_ELM_URL.'assets/js/slick.js', array('jquery'), '', true);
        wp_enqueue_script('velocity', NEWS_ELM_URL.'assets/js/velocity.js', array('jquery'), '', true);
        wp_enqueue_script( 'khobish-main', NEWS_ELM_URL.'assets/js/kc-engine.js', array( 'jquery','masonry' ), true, 1, 'all' );

        // Localize the script with new data
        $script_array = array(
            'ajaxurl' => admin_url('admin-ajax.php'),
            'nonce' => wp_create_nonce('ajax-nonce'),
        );
        wp_localize_script( 'khobish-main', 'newselement', $script_array );

    }

    // Register Widget Styles
    public function register_widget_styles(){

		wp_enqueue_style( 'news_element', NEWS_ELM_URL.'assets/css/style.css' );
        wp_enqueue_style( 'news_element_lib', NEWS_ELM_URL.'assets/css/ash-frontend.css' );
        wp_enqueue_style( 'slick', NEWS_ELM_URL.'assets/css/slick.css' );
        wp_enqueue_style( 'khobish-animate', NEWS_ELM_URL.'assets/css/animate.css' );
        wp_enqueue_style( 'dashicons' );
    }

    public function elementor_editor_scripts() {

        wp_enqueue_script('tp-backend-editor', NEWS_ELM_URL.'assets/js/elementor-editor.min.js', array('jquery'), '', true);
    } 

    public function thepack_builder_styles(){

        wp_enqueue_style( 'khb-editor', NEWS_ELM_URL.'assets/css/khb-editor.css' );
    }

    // Register New Widgets
    public function register_widgets($widgets_manager){
         
        $widgets = [];
        foreach ( glob( NEWS_ELM_PATH . '/widgets/block/*' ) as $file ) {
            $widgets[] = substr( $file, strrpos( $file, '/' ) + 1 );
        }
        
        $active_widgets = $widgets;
        if ( is_array( $active_widgets ) ) {
            foreach ( $active_widgets as $key => $value ) {
                if ( ! empty( $value ) ) {
                    require_once NEWS_ELM_PATH . '/widgets/block/' . $value . '/index.php';
                }
            }
        }
        //require_once plugin_dir_path( __FILE__ ) . 'widgets/block/demo-homelink/index.php';

    }

}