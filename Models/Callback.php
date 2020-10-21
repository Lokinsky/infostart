<?php
namespace App\Models;

class Callback extends Model{
    /**
     * Модель бд для таблицы - @var callbacks
     */
    protected $name;
    protected $emal;
    protected $mob;
    protected $comment;
    protected $createdAt;
    protected $length = [
        'name'=>45,
        'mob'=>45,
        'email'=>45,
        'comment'=>255,
    ];
    public function __construct() {
        parent::__construct();
        $this->table = 'callbacks';
    }
    public function insert($data = [])
    {
        return $this->validate($data,
            function ($data)
            {
                return $this->db->insert($this->table,$data);
            }
        );
    }
    public function select($offset='0',$what = '*',$where = 'id != 0',$order_by = 'id', $as = 'ASC')
    {
        $sql = 'SELECT '.$what.' FROM '.$this->table.' WHERE '.$where.' ORDER BY '.$order_by.' '.$as.' LIMIT 10 OFFSET '.$offset.' ';
        return $this->db->query($sql);
    }
}

?>