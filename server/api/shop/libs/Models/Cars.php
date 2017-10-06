<?php

namespace Models;

class Cars extends Models
{
    public static $table = 'cars';
    public $id;
    public $brand;
    public $model;
    public $year;
    public $engine;
    public $color;
    public $price;
    public $maxSpeed;

}