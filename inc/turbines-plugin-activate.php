<?php
/**
* @package Turbines
*/

class TurbinePluginActivate
{
    public static function activate(){
        //echo 'test';// generates error
        flush_rewrite_rules();
    }
}

?>