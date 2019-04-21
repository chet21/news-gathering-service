<?php


namespace System;


class ORM extends DB
{
    private $table;
    private $execute_param = [];

    public $query;

    const TODAY =  ' CURDATE()';

    const SORT_ASK =  ' ORDER BY id ASC ';
    const SORT_DESC =  ' ORDER BY id DESC ';
    const LEFT_JOIN =  'LEFT JOIN';
    const RIGHT_JOIN =  'RIGHT JOIN';
    const INNER_JOIN =  'INNER JOIN';

    public function __construct($table)
    {
        $this->table = $table;

        if(is_array($table)){
            $this->SORT_ASK_JOIN = ' ORDER BY '.$table['0'].'.id ASC ';
            $this->SORT_DESC_JOIN = ' ORDER BY '.$table['0'].'.id DESC ';
        }
    }


    public function select($join = null, $corector = '')
    {
        $q = '';

//        if(is_array($data)){
//            foreach ($data as $v){
//                $q .= $v;
//            }
//        }elseif(is_string($data)){
//            $q = $data;
//        }

        if(is_array($this->table)){
            foreach ($this->table as $tb){
                $q .= DB::get_alias($tb).', ';
            }
        }elseif (is_string($this->table)){
            $q .= DB::get_alias($this->table);
        }

        $this->query = 'SELECT '.trim($q, ', ').' FROM ';

        if(!is_array($this->table)){
            $this->query .= $this->table;
        }else{
//            $front_table = array_shift($this->table);
//            $this->query .= $front_table;
            $front_table = $this->table[0];
            $this->query .= $front_table;

            foreach ($this->table as $k => $item){
                if($k >= 1){
                    $this->query .= ' '.$join.' '.$item.' ON '.$front_table.'.id_'.$item.' = '.$item.'.id' ;
                }
            }
        }
    }

    public function insert($param)
    {
        foreach ($param as $k => $item){
            $this->execute_param[':'.$k] = $item;
        }

        if($param == null || !is_array($param)){
            throw new \Exception("Не валідні данні для вставки");
        }

        $p1 = '';
        $p2 = '(';

        foreach ($param as $k => $v){
            $p1 .= $k.', ';
            $p2 .= (is_int($k)) ? ':'.$k.', ' : ''.':'.$k.', ' ;
        }

        $p2 = rtrim($p2, ', ');
        $p2 .= ')';

        $this->query = 'INSERT INTO '.$this->table.' ('.trim($p1, ', ').') VALUES '.$p2;

    }

    public function update($data)
    {
        $q = '';
//        foreach ($data as $items) {
        foreach ($data as $k => $item){
            $q .= $k.' = '.$item.', ';
        }
//        }

        $q ='UPDATE '.$this->table.' SET '.rtrim($q, ', ');
        $this->query .= $q;
    }

    public function delete(){
        $q = 'DELETE FROM '.$this->table.' ';
        $this->query = $q;
    }

    public function where($string)
    {
        if(is_string($string)){
            $this->query .= ' WHERE '. $string;
        }
        elseif(is_array($string)){
            $this->query .= ' WHERE ';
            foreach ($string as $k => $v) {
                $this->query .= " $k = $v";
            }
        }
    }

    public function run($sort = null)
    {
//        if (!$sort == null){
//            $this->query .= $sort;
//        }
        $res = array();
        try{
            $response = self::connection();
            $x = $response->prepare($this->query);
            $x->execute($this->execute_param);
            $res = $x->fetchAll(\PDO::FETCH_ASSOC);
        }
        catch (\Exception $e){
            $e->getMessage();
        }
        return $res;
    }

    public function limit($num = 0)
    {
        $q = ' LIMIT '.$num;
        $this->query .= $q;
    }

    public function sort($metod){

        if(is_array($this->table)){
            if($metod === 'ask'){
                $this->query .= $this->SORT_ASK_JOIN;
            }elseif ($metod === 'desc'){
                $this->query .= $this->SORT_DESC_JOIN;
            }
        }else{
            if($metod == 'ask'){
                $this->query .= ORM::SORT_ASK;
            }elseif ($metod == 'desc'){
                $this->query .= ORM::SORT_DESC;
            }
        }
    }

    public static function lastID()
    {
        $id =  self::connection()->lastInsertId();
        return $id;
    }

    public function wrap_string($string)
    {
        return '\''.$string.'\'';
    }

    public function order_by($param)
    {
        $this->query .= ' ORDER BY '.$param;
    }

}