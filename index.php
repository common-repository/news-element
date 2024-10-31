<?php
/**
 * Plugin Name: News Element
 * Plugin URI:  http://webangon.com
 * Description: Elementor blog & magazine addon.
 * Version:     1.0.6
 * Author:      Ashraf
 * Author URI:  http://webangon.com
 * Text Domain: news-element
 * License:     GPL-2.0+
 * License URI: http://www.gnu.org/licenses/gpl-2.0.txt
 * Domain Path: /languages
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) { exit; }

if ( ! defined( 'NEWS_ELM_URL' ) ) {
    define( 'NEWS_ELM_URL', plugins_url( '/', __FILE__ ) );
}

if ( ! defined( 'NEWS_ELM_PATH' ) ) {
    define( 'NEWS_ELM_PATH', plugin_dir_path( __FILE__ ) );
}

define( 'NEWS_ELM_ROOT_FILE', __FILE__ );

if ( ! class_exists( 'News_Element_Core' ) )
{

	class News_Element_Core {

		private static $instance;

		public static function instance() {

			if ( ! isset( self::$instance ) && ! ( self::$instance instanceof News_Element_Core ) ) {

				self::$instance = new News_Element_Core;
				self::$instance->includes();

			}

			return self::$instance;
		}

		// Disable class cloning
		public function __clone()
		{

			// Cloning instances of the class is forbidden
			_doing_it_wrong( __FUNCTION__, esc_html__( 'Cheatin&#8217; huh?', 'news-element' ));

		}


		// Disable unserializing the class.
		public function __wakeup()
		{

			// Unserializing instances of the class is forbidden.
			_doing_it_wrong( __FUNCTION__, esc_html__( 'Cheatin&#8217; huh?', 'news-element' ));

		}


		public function __construct()
		{

			$this->init_hooks();

		}

		// Includes
		public function includes()
		{

			// for ajax
			add_action( 'wp_ajax_nopriv_khobish_filter_tax', 'khobish_filter_tax' );
			add_action( 'wp_ajax_khobish_filter_tax', 'khobish_filter_tax' );

			// for ajax videolist
			add_action( 'wp_ajax_nopriv_xl_vid_playlist', 'xl_vid_playlist' );
			add_action( 'wp_ajax_xl_vid_playlist', 'xl_vid_playlist' );

			require_once( __DIR__ . '/news-element.php' );
			require_once( __DIR__ . '/includes/helper.php' );
			require_once( __DIR__ . '/includes/ajax_posts.php' );
			require_once( __DIR__ . '/includes/header-footer/index.php' );
			//require_once( __DIR__ . '/admin/codestar-framework/codestar-framework.php' );
			require_once( __DIR__ . '/includes/dynamic-styles.php' );
			//require_once( __DIR__ . '/admin/config/option-panel.php' );
			//require_once( __DIR__ . '/admin/config/taxonomy-meta.php' );
			//require_once( __DIR__ . '/admin/config/menu-meta.php' );
			require_once( __DIR__ . '/admin/lib/index.php' );
			//require_once( __DIR__ . '/includes/xlmega_walker.php' );
			//require_once( __DIR__ . '/admin/config/helper.php' );
			require_once( __DIR__ . '/admin/inc/dash.php' );
			require_once( __DIR__ . '/includes/ext/sticky.php' );
			//require_once( __DIR__ . '/includes/ext/document.php' );
			require_once( __DIR__ . '/includes/ext/global.php' );

		}

		private function init_hooks()
		{

			add_action( 'init', [ $this, 'translation' ] );
			add_action( 'plugins_loaded', [ $this, 'init' ] );
			add_action( 'admin_init', array( $this, 'installed_active_elementor' ), 10 );
			add_action( 'admin_notices', array( $this, 'check_memory_limit' ));
			add_action( 'plugin_action_links_'. plugin_basename( __FILE__ ), array( $this, 'add_plugin_link' ), 10 );
		}

		public function check_memory_limit(){
			if ( WP_MEMORY_LIMIT > 512){
				return;
			}
			$class = 'notice notice-warning is-dismissible';
			$message = __( 'If you see elementor editor loading please consider increasing php memory limit', 'news-element' );	
			printf( '<div class="%1$s"><p>%2$s</p></div>', esc_attr( $class ), esc_html( $message ) );
		}

		public function add_plugin_link( $links ) {

			$links = array_merge( $links,array(
				'<a href="' . esc_url( admin_url( 'admin.php?page=newselement_demo' ) ) . '">' . __( 'Starter Sites', 'news-element' ) . '</a>',
				'<a target="_blank" href="https://webangon.com/contact/">' . __( 'Plugin support', 'news-element' ) . '</a>'
			) );

			return $links;

		} 

		public function installed_active_elementor() {

			if ( is_admin() && current_user_can( 'activate_plugins' ) && ! did_action( 'elementor/loaded' ) ) {
				add_action( 'admin_notices', array( $this, 'elementor_inactive_not_present' ), 10 );

				deactivate_plugins( 'news-element/index.php' );

				if ( isset( $_GET['activate'] ) ) {
					unset( $_GET['activate'] );
				}

			}
		}

		public function elementor_inactive_not_present() {

			$class   = 'notice notice-error';
			$plugin  = 'elementor/elementor.php';
			$message = sprintf( __( 'The %1$sNews Element%2$s plugin requires %1$sElementor%2$s plugin installed & activated.', 'news-element' ), '<strong>', '</strong>' );

			if ( file_exists( WP_PLUGIN_DIR . '/elementor/elementor.php' ) ) {

				$action_url   = wp_nonce_url( 'plugins.php?action=activate&amp;plugin=' . $plugin . '&amp;plugin_status=all&amp;paged=1&amp;s', 'activate-plugin_' . $plugin );
				$button_label = __( 'Activate Elementor', 'news-element' );

			} else {

				$action_url   = wp_nonce_url( self_admin_url( 'update.php?action=install-plugin&plugin=elementor' ), 'install-plugin_elementor' );
				$button_label = __( 'Install Elementor', 'news-element' );
			}

			$button = '<p><a href="' . esc_url( $action_url ) . '" class="button-primary">' . esc_html( $button_label ) . '</a></p><p></p>';

			printf( '<div class="%1$s"><p>%2$s</p>%3$s</div>', esc_attr( $class ), wp_kses_post( $message ), wp_kses_post( $button ) );


		}

		public function init()
		{

			// Check if Elementor installed and actived
			if ( ! did_action( 'elementor/loaded' ) ) {
				add_action( 'admin_notices', [ $this, 'admin_notice_missing_main_plugin' ] );
				return;
			}
			// Khobish Classes
			new \News_Element\News_Element_Plugin();
		}


		// Warning when the site doesn't have Elementor installed or activated.
		public function admin_notice_missing_main_plugin()
		{
			$message = sprintf(
				/* translators: 1: Khobish 2: Elementor */
				esc_html__( '"%1$s" requires "%2$s" to be installed and activated.', 'news-element' ),
				'<strong>' . esc_html__( 'News Element', 'news-element' ) . '</strong>',
				'<strong>' . esc_html__( 'Elementor', 'news-element' ) . '</strong>'
			);
			printf( '<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message );

		}

		// Load text domain
		public function translation()
		{	
			
			load_plugin_textdomain( 'news-element', false, dirname( plugin_basename( __FILE__ ) ) . '/languages' );
            add_theme_support('automatic-feed-links');
            add_theme_support('title-tag');
            add_theme_support('post-thumbnails');
            add_theme_support('wp-block-styles');
            add_theme_support('align-wide');
            add_theme_support('html5', [
                'search-form',
                'comment-form',
                'comment-list',
                'gallery',
                'caption',
            ]);

            register_nav_menus([
                'primary' => esc_attr__('Primary', 'news-element'),
            ]);

		}

	}

}


if ( ! function_exists( 'News_Element_Core' ) )
{
	// Returns instanse of the plugin class.
	function Khobish_load()
	{
		return News_Element_Core::instance();
	}

	Khobish_load();
}

