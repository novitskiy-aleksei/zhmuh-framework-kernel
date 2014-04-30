<?php

/**
 * PHP session wrapper
 *
 * Class Session
 */
class Session {
    public static function set($key, $value){
        $_SESSION[$key] = $value;
    }

    public static function get($key, $default = null)
    {
        return isset($_SESSION[$key]) ? $_SESSION[$key] : $default;
    }

    public static function remove($key)
    {
        unset($_SESSION[$key]);
    }

    public static function setFlash($message)
    {
        return $_SESSION['flash'] = $message;
    }

    public static function getFlash()
    {
        $f = false;
        if (isset($_SESSION['flash'])){
            $f = $_SESSION['flash'];
            unset($_SESSION['flash']);
        }
        return $f;
    }
} 