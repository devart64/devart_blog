<?php
/**
 * Created by PhpStorm.
 * User: monark
 * Date: 08/07/2017
 * Time: 09:07
 */

namespace App\Entity;


use Core\Entity\Entity;

class CategoryEntity extends Entity
{
    public function getUrl()
    {
        return 'index.php?p=posts.category&id=' . $this->id;
    }

}