<?php

namespace Models;

class Models
{

    public static function findAll()
    {
        $db = DB::getInstance();
        $data = $db->query(
            'SELECT * FROM ' . static::$table,
            [],
            static::class
        );
        return $data;
    }

    public static function findByid($id)
    {
        $db = DB::getInstance();
        $data = $db->query(
            'SELECT * FROM ' . static::$table . ' WHERE id=:id',
            [':id' => $id]
        );
        return $data[0] ?? false;
    }

    public static function orders($id)
    {
        $db = DB::getInstance();
        $data = $db->query(
            'SELECT cars.id, cars.brand, cars.model, cars.year, cars.engine, cars.color, cars.price, orders.status
             FROM ' . static::$table . ' , cars WHERE orders.id_car=cars.id AND orders.id_user=:id',
            [':id' => $id]
        );
        return $data[0] ?? false;

    }

    public static function addOrder($id_car,$id_user,$status)
    {
        $sql = "INSERT INTO  " . static::$table ." ( id_car, id_user, status)
                VALUES ( '$id_car', '$id_user', '$status')";
        $db = DB::getInstance();
        $result = $db->execute($sql);
        return $result;
    }

    public static function changeStatusOrder($status,$id)
    {
        $db = DB::getInstance();
        $sql = "UPDATE " . static::$table . " SET status = '$status' WHERE id = '$id' ";
        $result = $db->execute($sql);
        return $result;

    }


}