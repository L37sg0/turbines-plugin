<?php
/**
* @package Turbines
*/

namespace Inc\Pages;

use \Inc\Api\SettingsApi;
use \Inc\Base\BaseController;
use \Inc\Api\Callbacks\AdminCallbacks;

class Admin extends BaseController
{

    public $settings;

    public $callbacks;

    public $pages = array();

    public $subpages = array();

    public function register(){        

        $this->settings = new SettingsApi();   
        
        $this->callbacks = new AdminCallbacks();

        $this->setPages();

        $this->setSubpages();

        $this->setSettings();

        $this->setSections();

        $this->setFields();
        
        $this->settings->addPages( $this->pages )->withSubPage( 'Dashboard' )->
        addSubPages( $this->subpages )->register();
    }

    public function setPages(){

        $this->pages = array(
            array('page_title'=>'Turbine Plugin',
                  'menu_title'=>'Турбини',
                  'capability'=>'manage_options',
                  'menu_slug' =>'turbines_plugin',
                  'callback'  => array( $this->callbacks, 'adminDashboard' ),
                  'icon_url'  =>'dashicons-hammer',
                  'position'  => 110
            ),
        );

    }

    public function setSubpages(){

        $this->subpages = array(
            array(
                'parent_slug'=> 'turbines_plugin',
                'page_title' => 'Custom Post Types',
                'menu_title' => 'CPT',
                'capability' => 'manage_options',
                'menu_slug'  => 'turbines_cpt',
                'callback'   => array( $this->callbacks, 'adminCPT' ),
            ),
            array(
                'parent_slug'=> 'turbines_plugin',
                'page_title' => 'Custom Taxonomies',
                'menu_title' => 'Taxonomies',
                'capability' => 'manage_options',
                'menu_slug'  => 'turbines_taxonomies',
                'callback'   => array( $this->callbacks, 'adminTaxonomy' ),
            ),
            array(
                'parent_slug'=> 'turbines_plugin',
                'page_title' => 'Custom Widgets',
                'menu_title' => 'Widgets',
                'capability' => 'manage_options',
                'menu_slug'  => 'turbines_widgets',
                'callback'   => array( $this->callbacks, 'adminWidget' ),
            ),
        );

    }

    public function setSettings(){

        $args = array(
            array(
                'option_group' => 'turbines_options_group',
                'option_name'  => 'text_example',
                'callback'     => array( $this->callbacks, 'turbinesOptionGroup' ),    
            ),
            array(
                'option_group' => 'turbines_options_group',
                'option_name'  => 'turbine_name',
            ),
        );
        
        $this->settings->setSettings( $args );

    }

    public function setSections(){

        $args = array(
            array(
                'id'        => 'turbines_admin_index',
                'title'     => 'Settings',
                'callback'  => array( $this->callbacks, 'turbinesAdminSection' ),
                'page'      => 'turbines_plugin',   
            ),
        );
        
        $this->settings->setSections( $args );

    }

    public function setFields(){

        $args = array(
            array(
                'id'        => 'text_example',
                'title'     => 'Text Example',
                'callback'  => array( $this->callbacks, 'turbinesTextExample' ), 
                'page'      => 'turbines_plugin',
                'section'   => 'turbines_admin_index', 
                'args'      => array(
                    'label_for' =>  'text_example',
                    'class'     =>  'example-class',
                ),  
            ),
            array(
                'id'        => 'turbine_name',
                'title'     => 'Turbine Name',
                'callback'  => array( $this->callbacks, 'turbinesTurbineName' ), 
                'page'      => 'turbines_plugin',
                'section'   => 'turbines_admin_index', 
                'args'      => array(
                    'label_for' =>  'turbine_name',
                    'class'     =>  'example-class',
                ),  
            ),
        );
        
        $this->settings->setFields( $args );

    }

}

?>