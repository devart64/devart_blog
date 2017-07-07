<?php
namespace Core\Table;

use Core\Database\Database;
class Table
{
    protected $table;
    protected $db;

    public function __construct(Database $db)
    {
        $this->db = $db;
        if (null === $this->table)
        {
            $parts = explode('\\', get_class($this));
            $class_name = end($parts);
            $this->table = strtolower(str_replace('Table', '', $class_name));
        }
    }

    public function all()
    {
        return $this->db->query('SELECT * FROM articles');
    }
}
