<?php

/*
 * Plugin Name: WW GDPR Cookie Bar Plugin
 * Plugin URI: https://www.techstream.agency/
 * Description: Simple GDPR Cookie Compliance plugin. Built as other plugins are useless.
 * Version: 1.0
 * Author: Val Wroblewski
 * Licence: GPL2
 */

if(!defined('ABSPATH')) {
	exit;
}

// GLOBAL OPTIONS VARIABLES
$wwgcbar_options = get_option('wwgcbar_settings');

// ADMIN PAGE
if(is_admin()) {
	require_once(plugin_dir_path(__FILE__) . '/includes/ww-gdpr-plugin-admin.php');
}

// FRONT END
require_once(plugin_dir_path(__FILE__) . '/includes/ww-gdpr-plugin-front.php'); 





