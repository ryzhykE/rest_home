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
           echo  \Response::ClientError(404, "No resource with id: " . $data[0] );
        }
        else
        {
            $results = \Response::typeData($result,$type);
            return $results;
            echo \Response::ServerSuccess(200, "OK");
        }
    }

    public function postOrder()
    {
        $status = $_POST['status'];
        $id = $_POST['id_user'];
        $result = \Models\Orders::addOrder($status,$id);
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