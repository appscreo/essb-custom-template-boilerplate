<?php

/*
 * Plugin Name: Easy Social Share Buttons for WordPress - Custom Template Boilerplate
 * Description: Example plugin showing how you can create and register your own templates in Easy Social Share Buttons for WordPress
 * Plugin URI: http://codecanyon.net/item/easy-social-share-buttons-for-wordpress/6394476?ref=appscreo
 * Version: 1.0
 * Author: CreoApps
 * Author URI: http://codecanyon.net/user/appscreo/portfolio?ref=appscreo
 */


add_filter('essb4_templates', 'essb_mytemplate_initialze');
add_filter('essb4_templates_class', 'essb_mytemplate_class', 10, 2);
add_action('plugins_loaded', 'essb_mytemplate_initialize_styles', 999);
add_action ('admin_enqueue_scripts', 'essb_mytemplate_initialize_styles_admin', 999 );

function essb_mytemplate_initialze($templates) {
	$templates['1001'] = 'My Custom Template';
	
	return $templates;
}

function essb_mytemplate_class($class, $template_id) {
	if ($template_id == '1001') {
		$class = 'mycustom-template';
	}
	
	return $class;
}

function essb_mytemplate_initialize_styles() {
	
	if (function_exists('essb_resource_builder')) {
		essb_resource_builder()->add_static_resource(plugins_url () . '/' . basename ( dirname ( __FILE__ ) ) . '/assets/essb-template.css', 'essb-template-1001-mytemplate', 'css');
	}
	
}

function essb_mytemplate_initialize_styles_admin() {
	wp_register_style ( 'essb-template-1001-mytemplate-admin', plugins_url () . '/' . basename ( dirname ( __FILE__ ) ) . '/assets/essb-template.css');
	wp_enqueue_style ( 'essb-template-1001-mytemplate-admin' );
}