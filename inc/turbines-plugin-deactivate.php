<?php
/**
* @package Turbines
*/

class TurbinePluginDeactivate
{
    public static function deactivate(){
        flush_rewrite_rules();
    }// handling plugin deactivation
}

?>