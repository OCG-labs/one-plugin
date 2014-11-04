<?php
/**
 * Module Loader
 * @package Wordpress
 * @subpackage one-plugin
 * @since 1.0
 * @author Matthew Hansen
 */

require_once ONE_PLUGIN_DIR . '/lib/modules/core/module.php';

if ( !function_exists( 'op_include_modules' ) ) :
/*
 * Use 'RecursiveDirectoryIterator' if PHP Version >= 5.2.11
 */
function op_include_modules() {
  // Include all modules from the plugin
  $modules_path = new RecursiveDirectoryIterator( ONE_PLUGIN_DIR . '/lib/modules/' );
  $recIterator  = new RecursiveIteratorIterator( $modules_path );
  $regex        = new RegexIterator( $recIterator, '/\/module.php$/i' );

  foreach( $regex as $item ) {
    require_once $item->getPathname();
  }
}
endif;

if ( !function_exists( 'op_include_modules_fallback' ) ) :
/*
 * Fallback to 'glob' if PHP Version < 5.2.11
 */
function op_include_modules_fallback() {
  // Include all modules from the plugin
  foreach( glob( ONE_PLUGIN_DIR . '/lib/modules/*/module.php' ) as $module ) {
    require_once $module;
  }
}
endif;


// PHP version control
$phpversion = phpversion();
if ( version_compare( $phpversion, '5.2.11', '<' ) ) :
  op_include_modules();
else :
  op_include_modules_fallback();
endif;
