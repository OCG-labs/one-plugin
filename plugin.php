<?php
 /**
 * Plugin Name: One Plugin
 * Plugin URI: http://ocgcreative.com
 * Description: A plugin to integrate One Theme's module system
 * Version: 1.0
 * Author: OCG Creative - Bryan Haskin
 * Author URI: http://ocgcreative.com
 * License: MIT
 */

// Blocking direct access to plugin
defined('ABSPATH') or die("No script kiddies please!");
define('ONE_PLUGIN_DIR', plugin_dir_path( __FILE__ ));

require_once ONE_PLUGIN_DIR . '/lib/modules/loader.php'; // Loader

$masterControl = oneTheme\MasterControl::getInstance();
