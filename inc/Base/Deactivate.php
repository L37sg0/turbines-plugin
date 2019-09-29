<?php
/**
* @package Turbines
*/

namespace Inc\Base;

class Deactivate
{
    public static function deactivate(){
        flush_rewrite_rules();
    }// handling plugin deactivation
}

?>