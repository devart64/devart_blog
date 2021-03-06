<?php
namespace App;
/**
*Class Autoload
 * @package app
 */
class Autoloader
{
    /**
     * Enregistre notre autoloader
     */
    static function register() {
        spl_autoload_register([__CLASS__, 'autoload']);
    }

    /**
     * Inclue le fichier correspondant à notre class
     * @param $class string Le nom de la class à charger
     */
    static function autoload($class) {
        if (strpos($class, __NAMESPACE__ . '\\') === 0) {
            $class = str_replace(__NAMESPACE__ . '\\', '', $class);
            $class = str_replace('\\', '/', $class);
            require __DIR__ . '/' . $class .'.php';
        }
    }
}