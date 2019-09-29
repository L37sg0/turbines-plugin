<?php
/**
* @package Turbines
*/
/*
Plugin Name: Турбини
Plugin URI: http://github.com/l37sg0/turbines-plugin
Description: Machine planing wordpress plugin fo windparks
Version: 1.0.0
Author: Petar Ivanov
Author URI: http://github.com/l37sg0
License: GPLv2 or later
*/

// If this file is called firectly, abort!!!
defined( 'ABSPATH' ) or die( 'Permission Denied !' );

// Require once the Composer Autoload
if ( file_exists( dirname( __FILE__ ) . '/vendor/autoload.php' ) ){

    require_once dirname( __FILE__ ) . '/vendor/autoload.php';

}

/**
 * The code that runs durring plugin activation
 */
function activate_turbines_plugin(){
    Inc\Base\Activate::activate();
}
register_activation_hook( __FILE__, 'activate_turbines_plugin' );

/**
 * The code that runs during plugin deactivation
 */
function deactivate_turbines_plugin(){
    Inc\Base\Deactivate::deactivate();
}
register_deactivation_hook( __FILE__, 'deactivate_turbines_plugin' );


if( class_exists( 'Inc\\Init' ) ){

    Inc\Init::register_services();

}

?>
