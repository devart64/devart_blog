<?php
/**
 * Created by PhpStorm.
 * User: monark
 * Date: 06/07/2017
 * Time: 07:12
 */
namespace App;

class App
{
    public $title = "dév'art";
    private static $_instance;

    public static function getInstance()
    {
        if (null === self::$_instance)
        {
            self::$_instance = new Config();
        }
        return self::$_instance;
    }

}
