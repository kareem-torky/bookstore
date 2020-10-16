<?php 

namespace App\Models;
use Core\Db;

class OrderItem
{
    public static function connectTable()
    {
        return Db::getInstance()->table("order_items");
    }
}