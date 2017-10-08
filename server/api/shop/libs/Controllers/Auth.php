<?php

namespace Controllers;

class Auth extends \Validator
{
    public $valid;

    public function __construct()
    {
        $this->valid = new \Validator();
    }

    public function getAuth($data = false,$type = false)
    {
        if (isset($_COOKIE['id']) && isset($_COOKIE['hash']))
        {
            $id = $_COOKIE['id'];
            $result = \Models\Users::checkUsers($id);
            if ($result["hash"] === $_COOKIE['hash'])
            {
                echo \Response::ServerSuccess(200, "OK");
            }
            else
            {
                setcookie("id", "0", time()-3600*24*30*12, '/');
                setcookie("hash", "0", time()-3600*24*30*12, '/');
            }
        }
    }

    public function postAuth($data = false,$type = false)
    {
        if($this->valid->loginValid($_POST['login']) == false)
        {
            echo \Response::ClientError(401, "login must contain between 2-20 characters");

        }
        else if($this->valid->passwordValid($_POST['password']) == false)
        {
            echo \Response::ClientError(401, "no valid password, min 8 characters");
        }
        else
        {
            $login = $_POST['login'];
            $password = $_POST['password'];
            $result = \Models\Users::authUser($login,$password);
            if(false === $result)
            {
                echo \Response::ClientError(401, "User with such login already exists ");
            }
            else
            {
               echo \Response::ServerSuccess(200, "OK");
            }
        }
    }

    public function putAuth($data=false)
    {
        $result = \Models\Users::loginUser($data[0]);
        if($result)
        {
           // echo \Response::ClientError(200, "OK");
        }

        if(md5(md5($data[1])) === $result["password"] )
            {
                $result = \Models\Users::setHash($result["id"]);
                return $result;
            }
        else
        {
            echo \Response::ClientError(401, "Wrong password");
        }
    }

    public function deleteAuth()
    {
        $result = \Models\Users::logoutUser();
        if(false === $result)
        {
            echo \Response::ClientError(400, "Something wrong");
        }
        else
        {
            echo \Response::ServerSuccess(200, "OK");
        }

    }


}