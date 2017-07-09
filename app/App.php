<?php
/**
 * Created by PhpStorm.
 * User: monark
 * Date: 06/07/2017
 * Time: 07:12
 */
use Core\Database\MysqlDatabase;
use Core\Config;
class App
{
    public $title = "dév'art";
    private $db_instance;
    private static $_instance;

    public static function getInstance()
    {
        if (null === self::$_instance)
        {
            self::$_instance = new App();
        }
        return self::$_instance;
    }

    public static function load()
    {
        session_start();
        require ROOT . '/app/Autoloader.php';
        App\Autoloader::register();
        require ROOT . '/core/Autoloader.php';
        Core\Autoloader::register();
    }

    public function getTable($name)
    {
        $class_name = '\\App\\Table\\' . ucfirst($name) . 'Table';
        return new $class_name($this->getDb());
    }

    public function getDb()
    {
        $config = Config::getInstance(ROOT . '/config/config.php');
        if (null === $this->db_instance)
        {
            $this->db_instance = new MysqlDatabase(
                $config->get('db_name'),
                $config->get('db_user'),
                $config->get('db_pass'),
                $config->get('db_host')
            );
        }
        return $this->db_instance;
    }

    public function forbidden()
    {
        header('HTTP/1.0 403 Forbidden');
        
    }

    public function  notFound()
    {
        header('HTTP /1.0 404 Not Found');
        
    }
}
