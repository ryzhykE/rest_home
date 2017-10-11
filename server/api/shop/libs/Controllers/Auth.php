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
		
        $result = \Models\Users::checkUsers($data[0]);
        echo $result;
    }

    public function postAuth($data = false,$type = false)
    {
        if($this->valid->loginValid($_POST['login']) == false)
        {
			echo "login must contain between 2-20 characters";
           //\Response::ClientError(401, "login must contain between 2-20 characters");

        }
        else if($this->valid->passwordValid($_POST['password']) == false)
        {
            echo "no valid password, min 8 characters";
			//\Response::ClientError(401, "no valid password, min 8 characters");
        }
        else
        {
            $login = $_POST['login'];
            $password = $_POST['password'];
            $result = \Models\Users::authUser($login,$password);
            if(false === $result)
            {
                echo "User with such login already exists ";
				//\Response::ClientError(401, "User with such login already exists ");
            }
            else
            {
				echo "register success";
                //\Response::ServerSuccess(200, "OK");
            }
        }
    }

    public function putAuth($data=false)
    {
		$putParams = json_decode(file_get_contents("php://input"), true);
       // parse_str(file_get_contents("php://input"), $putParams);
		
		if($this->valid->loginValid($putParams['login']) == false)
        {
			echo "login must contain between 2-20 characters";
           //\Response::ClientError(401, "login must contain between 2-20 characters");

        }
        else if($this->valid->passwordValid($putParams['password']) == false)
        {
            echo "no valid password, min 8 characters";
			//\Response::ClientError(401, "no valid password, min 8 characters");
        }
        else
		{
			$result = \Models\Users::loginUser($putParams['login']);

            if($result)
            {
                if(md5(md5($putParams['password'])) === $result["password"] )
                {
                    $result = \Models\Users::setHash($result["id"]);
					echo $result;
                }
                else
                {
                    echo \Response::ClientError(401, "Wrong password");
                }
            }
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