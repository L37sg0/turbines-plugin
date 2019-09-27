<?php
/**
* @package Turbines
*/

namespace Inc\Admin;

class AdminPages
{
    //public static $plugin;

    function __construct(){
        //$plugin = plugin_basename( __FILE__ );
        add_action( 'admin_enqueue_scripts', array( $this, 'enqueue' ) );
        add_action( 'admin_menu', array( $this, 'add_admin_pages' ) );
        add_filter( "plugin_action_links_" . PLUGIN, array( $this, 'settings_link' ) );
    }
    function enqueue() {
        // enqueue all our scripts
        wp_enqueue_style( 'mypluginstyle', PLUGIN_URL . 'assets/mystyle.css' );//, array( '' ), false, 'all' );
        wp_enqueue_script( 'mypluginscript', PLUGIN_URL . 'assets/myscript.js' );
    }
    public function add_admin_pages(){
        add_menu_page( 'Turbine Plugin', 'Турбини', 'manage_options', 'turbines_plugin', array( $this, 'admin_index' ), 'dashicons-hammer', '80' );
    }
    public function settings_link( $links ){
        // add custom settings link
        $settings_link = '<a href="admin.php?page=turbines_plugin">Настройки</a>';
        array_push( $links, $settings_link );
        return $links;
    }
    public function admin_index(){
        // require template
        require_once PLUGIN_PATH . 'templates/admin.php';
    }
}

?>