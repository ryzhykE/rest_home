<?php

namespace Controllers;


class Order
{

    public function getOrder($data = false,$type = false)
    {
        $id = $data[0];
        $result = \Models\Orders::orders($id);
        if(false === $result)
        {
           return  \Response::ClientError(404, "No resource with id: " . $data[0] );
        }
        else
        {
            $results = \Response::typeData($result,$type);
            echo $results;
            //return \Response::ServerSuccess(200, "OK");
        }
    }

    public function postOrder()
    {
        $car = $_POST['id_car'];
        $id = $_POST['id_user'];
        $result = \Models\Orders::addOrder($car,$id);
        return $result;
        echo \Response::ServerSuccess(200, "OK");
    }

    public function putOrder($data)
    {
        $status = $data[0];
        $id = $data[1];
        $result = \Models\Orders::changeStatusOrder($status,$id);
        return true;
    }

}