<?php
/*
Plugin Name: TEDxPV Theme Functions
Plugin URI: https://github.com/matirosero/tedxpv-theme-functions
Description: Custom functions for the TEDxPuraVida website.
Version: 0.1
Author: Mat Rosero
Author URI: https://www.matilderosero.com/
This plugin is released under the GPLv2 license. The images packaged with this plugin are the property of their respective owners, and do not, necessarily, inherit the GPLv2 license.
*/

/**
 * Load plugin textdomain.
 *
 * @since 0.1.0
 */
function tedxf_load_textdomain() {
	load_plugin_textdomain( 'tedxf', false, basename( dirname( __FILE__ ) ) . '/languages' );
}
add_action( 'plugins_loaded', 'tedxf_load_textdomain' );


/**
 * Post types.
 *
 * @since 0.1.0
 */
require_once( dirname( __FILE__ ) . '/includes/cpt/register-cpt.php' );
require_once( dirname( __FILE__ ) . '/includes/cpt/register-tax.php' );


/**
 * Enqueue scripts.
 *
 * @since 0.1.0
 */
require_once( dirname( __FILE__ ) . '/includes/enqueue.php' );


/**
 * Admin tweaks.
 *
 * @since 0.1.0
 */
require_once( dirname( __FILE__ ) . '/includes/admin-tweaks/speaker-columns.php' );
require_once( dirname( __FILE__ ) . '/includes/admin-tweaks/tedxvideo-columns.php' );
require_once( dirname( __FILE__ ) . '/includes/admin-tweaks/bulk-quickedit-functions.php' );
require_once( dirname( __FILE__ ) . '/includes/admin-tweaks/add-cpt-to-menu.php' );
require_once( dirname( __FILE__ ) . '/includes/admin-tweaks/yoast.php' );

// PV2015: lib/cpt-export.php
// require_once( dirname( __FILE__ ) . '/includes/admin-tweaks/cpt-export-filters.php' );

// PV2015: lib/yoast-seo-change-remove-opengraph.php
// require_once( dirname( __FILE__ ) . '/includes/yoast/yoast-seo-change-remove-opengraph.php' );