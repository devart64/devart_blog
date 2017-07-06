<?php
/**
 * Created by PhpStorm.
 * User: monark
 * Date: 06/07/2017
 * Time: 08:25
 */

namespace App\Table;

use App\App;
class Table
{

    protected static $table;

    protected  static function getTable()
    {
        if (static::$table === null)
        {
            $class_name = explode('\\', get_called_class());
            static::$table = strtolower(end($class_name)) . 's';

        }
        return static::$table;
    }

    public  function all()
    {
        return App::getDb()->query("
            SELECT *
            FROM ". static::getTable() ."
        ", get_called_class());
    }

    public function __get($key)
    {
        $method = 'get' . ucfirst($key);
        $this->$key = $this->$method();
        return $this->$key;
    }

}
