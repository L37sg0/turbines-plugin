<?php
/**
* @package Turbines
*/

namespace Inc;

class Deactivate
{
    public static function deactivate(){
        flush_rewrite_rules();
    }// handling plugin deactivation
}

?>