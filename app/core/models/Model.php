<?php

namespace ShopApp\Models;

use ShopApp\Exceptions\DbExeption;

class Model
{
    static private $ins_model = null;
    public $ins_db;

    private function __construct()
    {
        try{
            $this->ins_db = new \mysqli('localhost', 'vodolserge', 'admin', 'phpshop');

            if ($this->ins_db->connect_errno) {
                throw new DbExeption("Не удалось подключиться к MySQL: " . $this->ins_db->connect_error);
            }
        } catch (DbExeption $e) {
            exit($e->getMessage());
        };

        $this->ins_db->query("SET NAMES 'UTF8'");
    }

    static public function getConnect( ) {
        return self::$ins_model = (!self::$ins_model instanceof self) ? new self : self::$ins_model ;
    }
}