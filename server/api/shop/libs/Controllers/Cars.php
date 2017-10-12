<?php

namespace Controllers;

class Cars
{
    public function getCars ($data = false,$type = false)
    {
        if($data[1] === null )
        {
            $result = \Models\Cars::findAll();
            $results = \Response::typeData($result,$type);
            print_r( $results);
        }
        else
        {
            $result = \Models\Cars::findByid($data[0]);
            $results = \Response::typeData($result,$type);
            print_r( $results);
        }

    }

    public function postCars ($data = false)
    {
       return false;
    }
    public function putCars($data = false)
    {
        return false;
    }

    public function deleteCars($data = false)
    {
        return false;
    }

}