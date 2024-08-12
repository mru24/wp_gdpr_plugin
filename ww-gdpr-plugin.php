<?php

/*
 * Plugin Name: WW GDPR Cookie Bar Plugin
 * Plugin URI: https://www.techstream.agency/
 * Description: Simple GDPR Cookie Compliance plugin. Built as other plugins are useless.
 * Version: 1.5
 * Author: Val Wroblewski
 * Licence: GPL2
 */

if(!defined('ABSPATH')) {
	exit;
}


// GLOBAL OPTIONS VARIABLES
$wwgcbar_options = get_option('wwgcbar_settings');
$pluginFile = plugin_basename( __FILE__ );
$pluginName = "ww_gdpr_plugin";

// ADMIN PAGE
if(is_admin()) {
	require_once(plugin_dir_path(__FILE__).'/includes/ww-gdpr-plugin-admin.php');
}
// FRONT END
require_once(plugin_dir_path(__FILE__).'/includes/ww-gdpr-plugin-front.php');

function wwgcbar_activate() {
	error_log('PLUGIN ACTIVATED');
};
register_activation_hook( __FILE__, 'wwgcbar_activate' );

function wwgcbar_deactivate() {
	error_log('PLUGIN deACTIVATED');
	// delete_option( 'wwgcbar_settings' );
};
register_deactivation_hook( __FILE__, 'wwgcbar_deactivate' );


