<?php

namespace Models;

class Users extends Models
{
    public static $table = 'users';
    public $id;
    public $login;
    public $password;
    public $token;

    public static function authUser($login,$pass)
    {
        $pass = md5(md5(trim($pass)));
        $sql = "INSERT INTO  " . static::$table ." ( login, password)
                VALUES ( '$login', '$pass')";
        $db = DB::getInstance();
        $result = $db->execute($sql);
        return $result;
    }
    public static function loginUser($login)
    {
        $db = DB::getInstance();
        $data = $db->query(
            'SELECT * FROM ' . static::$table . ' WHERE login=:login',
            [':login' => $login]
        );
        return $data[0] ?? false;
    }

    public static function setHash($id)
    {
        $hash = md5(self::generateCode(10));
        $db = DB::getInstance();
        $sql = "UPDATE " . static::$table . " SET hash = '$hash' WHERE id = '$id' ";
        $result = $db->execute($sql);
        setcookie("id", $id, time()+60*60*24*30, '/');
        setcookie("hash", $hash, time()+60*60*24*30, '/');
        return true;
    }

    public static function logoutUser()
    {
        if (isset($_COOKIE['id']) && isset($_COOKIE['hash']))
        {
            setcookie("id", "0", time()-3600*24*30*12, '/');
            setcookie("hash", "0", time()-3600*24*30*12, '/');
            return true;
        }
        return false;
    }
    public function checkUsers($id)
    {
            $db = DB::getInstance();
            $data = $db->query(
                'SELECT hash FROM ' . static::$table . ' WHERE id=:id',
                [':id' => $id]
            );
        return $data[0] ?? false;
    }

    function generateCode($length = 6)
    {
        $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHI JKLMNOPRQSTUVWXYZ0123456789";
        $code = "";
        $clen = strlen($chars) - 1;
        while (strlen($code) < $length)
        {
            $code .= $chars[mt_rand(0,$clen)];
        }
        return $code;
    }

}