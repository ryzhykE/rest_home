<?php

namespace Models;


class Orders extends Models
{
    public static $table = 'orders';
    public $id;
    public $id_car;
    public $id_user;
    public $status;

    public static function orders()
    {
        
    }

    /**
     *  if (empty($param['id']))
    {
    return false;
    }
    $id_user = $this->pdo->quote($param['id']);
    $sql = "SELECT cars.id, cars.brand, cars.model, cars.price, orders.status".
    " FROM orders, cars WHERE orders.id_car=cars.id AND orders.id_user=".$id_user;
    $sth = $this->pdo->prepare($sql);
    $result = $sth->execute();
    if (false === $result)
    {
    throw new PDOException(ERR_QUERY);
    }
    $data = $sth->fetchAll(PDO::FETCH_ASSOC);
    if (empty($data))
    {
    throw new PDOException(ERR_SEARCH);
    }
    return $data;
     */
    /**

    public static function findByid($id)
    {
        $db = DB::getInstance();
        $data = $db->query(
            'SELECT * FROM ' . static::$table . ' WHERE id=:id',
            [':id' => $id]
        );
        return $data[0] ?? false;
    }
     * */
}