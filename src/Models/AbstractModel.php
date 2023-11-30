<?php


namespace App\Models;

use Opis\Database\Database;
use Opis\Database\Connection;
abstract class AbstractModel
{
public $db;
public $table;

    /**
     * AbstractModel constructor.
     * @param $db
     * @param $table
     */
    public function __construct()
    {
        $connection = new Connection(
            'mysql:host=localhost;dbname=1135',
            'admin',
            'admin'
        );

        $this->db = new Database($connection);
        $this->table = '';
    }

    public function getAll()
    {
        return $this->db->from($this->table)
             ->select()
             ->all();
    }

    public function getById($id)
    {
        return $this->db->from($this->table)
            ->where('id')->is($id)
            ->select()
            ->first();
    }

    /**
     * @param string $table
     */
    public function setTable(string $table): void
    {
        $this->table = $table;
    }

}