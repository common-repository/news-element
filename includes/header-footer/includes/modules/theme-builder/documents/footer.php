<?php
namespace ThePackKitThemeBuilder\Modules\ThemeBuilder\Documents;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

class Footer extends Header_Footer_Base {

	public static function get_properties() {
		$properties = parent::get_properties();

		$properties['location'] = 'footer';

		return $properties;
	}

	public static function get_type() {
		return 'footer';
	}

	public static function get_title() {
		return __( 'Footer', 'news-element' );
	}

	protected static function get_site_editor_icon() {
		return 'eicon-footer';
	}

	protected static function get_site_editor_tooltip_data() {
		return [
			'title' => __( 'What is a Footer Template?', 'news-element' ),
			'content' => __( 'The footer template allows you to easily design and edit custom WordPress footers without the limits of your theme’s footer design constraints', 'news-element' ),
			'tip' => __( 'You can create multiple footers, and assign each to different areas of your site.', 'news-element' ),
			'docs' => 'https://trk.elementor.com/app-theme-builder-footer',
			'video_url' => 'https://www.youtube.com/embed/xa8DoR4tQrY',
		];
	}
}
