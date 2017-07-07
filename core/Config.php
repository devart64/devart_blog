<?php
/**
 * Created by PhpStorm.
 * User: monark
 * Date: 07/07/2017
 * Time: 11:32
 */

namespace Core;

class Config
{
    private $settings =[];
    private static $_instance;



    public static function getInstance($file)
    {
        if (null === self::$_instance)
        {
            self::$_instance = new Config($file);
        }
        return self::$_instance;
    }

    public function __construct($file)
    {
        $this->settings = require($file);
    }

    public function get($key)
    {
        if (!isset($this->settings[$key]))
        {
            return null;
        }
        return $this->settings[$key];
    }
}
