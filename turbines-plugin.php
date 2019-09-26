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

if ( !class_exists( 'TurbinePlugin' ) ) {

    class TurbinePlugin
    {
        public $plugin;

        function __construct(){
            $this->plugin = plugin_basename( __FILE__ );
        }

        function register() {
            add_action( 'admin_enqueue_scripts', array( $this, 'enqueue' ) );
            add_action( 'admin_menu', array( $this, 'add_admin_pages' ) );
            add_filter( "plugin_action_links_$this->plugin", array( $this, 'settings_link' ) );
            //$this->create_post_type();
            // use wp_equeue_scripts for frontend loading
            //echo $this->plugin;
        }

        public function settings_link( $links ){
            // add custom settings link
            $settings_link = '<a href="admin.php?page=turbines_plugin">Настройки</a>';
            array_push( $links, $settings_link );
            return $links;
        }

        public function add_admin_pages(){
            add_menu_page( 'Turbine Plugin', 'Турбини', 'manage_options', 'turbines_plugin', array( $this, 'admin_index' ), 'dashicons-hammer', '110' );
        }

        public function admin_index(){
            // require template
            require_once plugin_dir_path( __FILE__ ).'templates/admin.php';
        }

        function activate(){
            require_once plugin_dir_path( __FILE__ ).'inc/turbines-plugin-activate.php';
            TurbinePluginActivate::activate();
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

    $turbinePlugin = new TurbinePlugin();
    $turbinePlugin->register();
    //TurbinePlugin::register();- used in static call outside of class without initializing an class instance



    // activation
    //require_once plugin_dir_path( __FILE__ ).'inc/turbines-plugin-activate.php';
    register_activation_hook( __FILE__, array( $turbinePlugin, 'activate') );

    // deactivation
    require_once plugin_dir_path( __FILE__ ).'inc/turbines-plugin-deactivate.php';
    register_deactivation_hook( __FILE__, array( 'TurbinePluginDeactivate', 'deactivate' ) );

    // uninstall
}
?>
