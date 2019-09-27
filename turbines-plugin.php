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

defined( 'ABSPATH' ) or die( 'Permission Denied !' );

if ( file_exists( dirname( __FILE__ ) . '/vendor/autoload.php' ) ){
    require_once dirname( __FILE__ ) . '/vendor/autoload.php';
}
// Define global plugin paths
define( 'PLUGIN_PATH', plugin_dir_path( __FILE__ ) );
define( 'PLUGIN_URL', plugin_dir_url( __FILE__ ) );
define( 'PLUGIN', plugin_basename( __FILE__ ) );

use Inc\Activate;
use Inc\Deactivate;
use Inc\Admin\AdminPages;

if ( !class_exists( 'TurbinePlugin' ) ) {

    class TurbinePlugin
    {
        

        function __construct(){
            
        }

        function register() {
            new AdminPages();
        }

        function activate(){
            Activate::activate();
        }
        function deactivate(){
            // flush rewrite rules
            Deactivate::deactivate();
        }

        function uninstall(){
            
        }

        function custom_post_type(){
            register_post_type( 'turbine', ['public' => true, 'label' => 'Турбини'] );
        }

        protected function create_post_type(){
            add_action( 'init', array( $this, 'custom_post_type' ) );
        }
        
    }

    $turbinePlugin = new TurbinePlugin();
    $turbinePlugin->register();

    // activation
    register_activation_hook( __FILE__, array( $turbinePlugin, 'activate') );

    // deactivation
    register_deactivation_hook( __FILE__, array( 'TurbinePluginDeactivate', 'deactivate' ) );

    // uninstall
}
?>
