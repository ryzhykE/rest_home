<?php

require_once 'autoloader.php';
require_once 'config.php';

try
{
    $res = new RestServer();
    $res->run();
}
catch(Exception $e)
{
    echo Response::serverError( 500, $e->getMessage());
}







   



