<?php

namespace Controllers;

class Cars
{
    public function getCars ($data = false,$type = false)
    {
        if($data[0] == "")
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
        /**
         * if (is_numeric($data[0])) {
        $user = $this->userModel->get($data[0]);
        if( empty( $user ) ) {
        return Response::ClientError(404, "No resource with the id: " . $data[0] . " exists.");
        }
        return Response::JSON( $user );
        } else {
        return Response::ClientError(400, "Bad input");
        }
         */

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