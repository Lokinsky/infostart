<?php
namespace App\Models;
use App\Database;
class Model{
    /**
     * Базовый клас моделей, 
     * который предоставляет минимальный набор общих инструментов
     */
    protected $table;
    protected $db;
    public function __construct($data=[]) {
        require($_SERVER['DOCUMENT_ROOT']. "/database/db.php");
        $this->db = $db;
        //print_r($data);
    }

    public function db()
    {
        return $this->db;
    }

    protected function validate($data = [],$callback)
    {
        /**
         * Базовый валидатор базового класса Model
         */
        foreach ($data as $key => $value) {
            if(strlen($value) > $this->length[$key])
                die('ERROR 1: Max length for '.$key.' is: '.$this->length[$key]);
        }
        return $callback($data);
    }
}

?>