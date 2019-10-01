<?php
/**
* @package Turbines
*/

namespace Inc\Base;

use Inc\Api\Data\DataApi;

class Activate
{
    public $dataApi;

    public static function activate(){

        flush_rewrite_rules();

        $dataApi = new DataApi;

        $dataApi->createTable('turbines',"(
            id mediumint(9) NOT NULL AUTO_INCREMENT,
            mime datetime DEFAULT '0000-00-00 00:00:00' NOT NULL,
            name tinytext NOT NULL,
            text text NOT NULL,
            url varchar(55) DEFAULT '' NOT NULL,
            PRIMARY KEY  (id)
        )");

    }
}

?>