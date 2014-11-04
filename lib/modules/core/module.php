<?php
/**
 * Load all the settings for plugin
 * @package Wordpress
 * @subpackage one-plugin
 * @since 1.0
 * @author Matthew Hansen & Bryan Haskin
 */


define( 'PARENTPATH', ONE_PLUGIN_DIR );
define( 'TEMPPATH', ONE_PLUGIN_DIR );
define( 'PIMAGES', PARENTPATH . '/images' );
define( 'IMAGES' , TEMPPATH . '/images' );

require_once ONE_PLUGIN_DIR . '/lib/module.class.php';

if( !function_exists( 'slugify' ) ) :
    function slugify($str, $replace=array(), $delimiter='-') {
    	if( !empty($replace) ) {
    		$str = str_replace((array)$replace, ' ', $str);
    	}

    	$clean = iconv('UTF-8', 'ASCII//TRANSLIT', $str);
    	$clean = preg_replace("/[^a-zA-Z0-9\/_|+ -]/", '', $clean);
    	$clean = strtolower(trim($clean, '-'));
    	$clean = preg_replace("/[\/_|+ -]+/", $delimiter, $clean);

    	return $clean;
    }
endif;
