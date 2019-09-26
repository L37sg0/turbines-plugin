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

class TurbinePlugin
{
    function __construct(){
        $this->create_post_type();
        //$this->print_stuff();
    }

    private function print_stuff(){
        echo 'test';
    }

    function register() {
        add_action( 'admin_enqueue_scripts', array( $this, 'enqueue' ) );
        // use wp_equeue_scripts for frontend loading
    }

    function activate(){
        //generated a CPT
        $this->custom_post_type();
        // flush rewrite rules
        flush_rewrite_rules();
    }
    function deactivate(){
        // flush rewrite rules
    }

    function uninstall(){
        // delete CPT
        // delete all the plugin data
    }

    function custom_post_type(){
        register_post_type( 'turbine', ['public' => true, 'label' => 'Турбини'] );
    }

    protected function create_post_type(){
        add_action( 'init', array( $this, 'custom_post_type' ) );
    }

    function enqueue() {
        // enqueue all our scripts
        wp_enqueue_style( 'mypluginstyle', plugins_url( 'assets/mystyle.css', __FILE__ ));//, array( '' ), false, 'all' );
        wp_enqueue_script( 'mypluginscript', plugins_url( '/assets/myscript.js', __FILE__ ) );
    }

}

class SecondClass extends TurbinePlugin{
    function register_post_type(){
        $this->create_post_type();
        $this->print_stuff();
    }
}

if ( class_exists( 'TurbinePlugin' ) ) {
    $turbinePlugin = new TurbinePlugin();
    $turbinePlugin->register();
}

$secondClass = new SecondClass();
$secondClass->register_post_type();

// activation
register_activation_hook( __FILE__, array( $turbinePlugin, 'activate') );

// deactivation
register_deactivation_hook( __FILE__, array( $turbinePlugin, 'deactivate' ) );

// uninstall

?>
