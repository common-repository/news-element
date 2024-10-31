<?php
use Elementor\Plugin;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Box_Shadow;

    class Newselement_Global_Settings extends \Elementor\Core\Kits\Documents\Tabs\Tab_Base {

        public function get_id() {
            return 'newselement-settings';
        }

        public function get_title() {
            return 'Newselement Extra';
        }
 
        public function get_icon() {
            return 'eicon-logo';
        }

        protected function register_tab_controls() {

            $this->start_controls_section(
                'nwse_general',
                [
                    'label' => 'General',
                    'tab' => $this->get_id(),
                ]
            );

            $this->add_control(
                'uline_title',
                [
                    'type' => Controls_Manager::SWITCHER,
                    'label' => esc_html__('Underline Post Title', 'the-pack-addon'),             
                ]
            );

            $this->end_controls_section();


        }
    }

        
    class Newselement_Global_Settings_Init
    {
        public static function init()
        {
            add_action( 'elementor/kit/register_tabs', [__CLASS__, 'register_controls']);
            add_action( 'body_class', [__CLASS__, 'body_cls']);
            add_action( 'wp_enqueue_scripts', [__CLASS__, 'add_script_style']);
        } 

        public static function register_controls( \Elementor\Core\Kits\Documents\Kit $kit ){
            
            $kit->register_tab( 'newselement-settings', Newselement_Global_Settings::class );
        }

        public static function add_script_style(){

        
        }

        public static function body_cls(){

            $classes[] = self::elementor_get_setting( 'uline_title' ) ? 'underline-title' : '';
			return $classes;
        }

        public static function elementor_get_setting( $setting_id ) {

            $return = '';
    
            if ( ! isset( $the_pack_settings['kit_settings'] ) ) {
                if ( Plugin::instance()->preview->is_preview_mode() ) {
                    // get auto save data
                    $kit = \Elementor\Plugin::$instance->documents->get_doc_for_frontend( \Elementor\Plugin::$instance->kits_manager->get_active_id() );
                } else {
                    $kit = \Elementor\Plugin::$instance->documents->get( \Elementor\Plugin::$instance->kits_manager->get_active_id(), true );
                }
                $the_pack_settings['kit_settings'] = $kit->get_settings();
            }
    
            if ( isset( $the_pack_settings['kit_settings'][ $setting_id ] ) ) {
                $return = $the_pack_settings['kit_settings'][ $setting_id ];
            }
    
            return $return;
        }

    }
    Newselement_Global_Settings_Init::init();
?>