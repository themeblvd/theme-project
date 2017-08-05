<?php
/**
 * Plugin Name: Theme Project
 * Description: Register a new theme directory at /wp-content/theme-project/dist/
 * Version: 1.0.0
 * Author: Theme Blvd
 * Author URI: http://themeblvd.com
 * License: GPL2
 *
 * NOTES
 *
 * WP Site should be located at:
 * /Users/{user}/Sites/wordpress/th emes/{name}
 *
 * Resulting in a site URL via Valet of:
 * http://wordpress.dev/themes/{name}
 *
 * Theme npm project folder should be located at:
 * /wp-content/{name}-project/
 *
 * And exectuable WP theme should be at:
 * /wp-content/{name}-project/dist/{name}
 *
 * @package Theme Project
 */

/**
 * Initiate plugin.
 */
function theme_project_init() {

	$file = __FILE__;

	$path_bits = explode( '/', $file );

	$template = '';

	foreach ( $path_bits as $key => $val ) {
		if ( 'themes' === $val ) {
			$template = $path_bits[ $key + 1 ];
			break;
		}
	}

	$path = explode( 'plugins', $file );
	$path = $path[0] . $template . '-project/dist/';

	register_theme_directory( $path );

}

/**
 * Run Plugin.
 */
theme_project_init();
