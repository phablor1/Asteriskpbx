<?php
namespace App\Session;

class login{
    public static function isLogged(){
        return false;
    }

    public static function requireLogin(){
        if (!self::isLogged()){
            header('location:login.php');
            exit;
        }
    }

    public static function requireLogout(){
        if (self::isLogged()){
            header('location:index.php');
            exit;
        }
    }
}