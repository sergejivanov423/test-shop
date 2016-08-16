<?php

namespace ShopApp\Models;

/**
 * Class Category
 * @package ShopApp\Models
 */
class Category
{
    static public function getCatList() {

        $db =  Model::getConnect();

        $sql = "SELECT id, name FROM category ORDER BY sort_order";

        $res = $db->ins_db->query($sql);

        $row = $res->fetch_all(MYSQLI_ASSOC);

        return $row;
    }
}