<?php

namespace lib;

use mysql_xdevapi\Result;

use PDO;

class Db
{
    protected $db;

    public function __construct()
    {
        $config = require 'Router/db.php';
       $this->db = new PDO('mysql:host='.$config['host'].';dbname='.$config['dbname'].'',$config['user'],$config['password']);
    }

    /**
     * @param $sql
     */
    public function query($sql,$params = [])
    {
            $stmt = $this->db->prepare($sql);
            if(!empty($params))
            {
                foreach ($params as $key =>$val)
                {
                    $stmt->bindValue(':'.$key,$val);
                }
            }
            $stmt->execute();
            return $stmt;


    }

    public  function row($sql,$params = [])
        {
            $result = $this->query($sql,$params);
            return $result->fetchAll(PDO::FETCH_ASSOC);
        }

    public function column($sql,$params = [])
    {
        $result = $this->query($sql,$params);
        return $result->fetchColumn();
    }


}