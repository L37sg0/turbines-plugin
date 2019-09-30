<?php
/**
* @package Turbines
*/

namespace Inc\Api\Callbacks;

use Inc\Base\BaseController;

class AdminCallbacks extends BaseController
{

    public function adminDashboard(){

        return require_once( "$this->plugin_path/templates/admin.php" );
    
    }

    public function adminCPT(){

        return require_once( "$this->plugin_path/templates/cpt.php" );
    
    }

    public function adminTaxonomy(){

        return require_once( "$this->plugin_path/templates/taxonomy.php" );
    
    }
    
    public function adminWidget(){

        return require_once( "$this->plugin_path/templates/widget.php" );
    
    }

    public function turbinesOptionGroup( $input ){

        return $input;

    }

    public function turbinesAdminSection(){

        echo 'Check this beautiful section!';

    }

    public function turbinesTextExample(){

        $value = esc_attr( get_option( 'text_example' ) );
        echo '<input type="text" class="regular-text" name="text_example" value="' . $value . '"placeholder="Write Something Here!">';

    }

    public function turbinesTurbineName(){

        $value = esc_attr( get_option( 'turbine_name' ) );
        echo '<input type="text" class="regular-text" name="turbine_name" value="' . $value . '"placeholder="Write Turbine Name">';


    }

}
