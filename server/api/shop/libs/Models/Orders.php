<?php

namespace Models;


class Orders extends Models
{
    public static $table = 'orders';
    public $id;
    public $id_car;
    public $id_user;
    public $status;

}