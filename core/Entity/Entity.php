<?php

/**
 * Created by PhpStorm.
 * User: monark
 * Date: 08/07/2017
 * Time: 08:47
 */
namespace Core\Entity;
class Entity
{
    public function __get($key)
    {
        $method = 'get' . ucfirst($key);
        $this->$key = $this->$method();
        return $this->$key;
    }
}