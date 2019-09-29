<?php
/**
* @package Turbines
*/

namespace Inc\Pages;

use \Inc\Base\BaseController;
use \Inc\Api\SettingsApi;

class Admin extends BaseController
{
    public function __construct(){
        $this->settings = new SettingsApi();
        $this->pages = array(
            array('page_title'=>'Turbine Plugin',
                  'menu_title'=>'Турбини',
                  'capability'=>'manage_options',
                  'menu_slug' =>'turbines_plugin',
                  'callback'  => function(){echo '<h1>Plugin</h1>';},//array( $this, 'admin_index' ),
                  'icon_url'  =>'dashicons-hammer',
                  'position'  => 80
            ),
            array('page_title'=>'Plugin',
                  'menu_title'=>'bla',
                  'capability'=>'manage_options',
                  'menu_slug' =>'tbla_plugin',
                  'callback'  => array( $this, 'admin_index' ),
                  'icon_url'  =>'dashicons-store',
                  'position'  => 8
            ),
        );
    }

    public function register(){        
        //add_action( 'admin_menu', array( $this, 'add_admin_pages' ) );
        $this->settings->addPages( $this->pages )->register();
    }

    /**function add_admin_pages(){
        add_menu_page( 'Turbine Plugin', 'Турбини', 'manage_options', 'turbines_plugin', array( $this, 'admin_index' ), 'dashicons-hammer', '80' );
    }*/
    function admin_index(){
        // require template
        require_once $this->plugin_path . 'templates/admin.php';
    }
}

?>