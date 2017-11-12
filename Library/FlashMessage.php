<?php
/**
 * Created by PhpStorm.
 * User: Anton
 * Date: 12.11.17
 * Time: 15:48
 */

namespace Library;


class FlashMessage
{

    public static function set($key , $value)
    {
        $_SESSION[$key] = $value;
    }

    public static function has($key)
    {
        return isset($_SESSION[$key]);
    }

    public static function get($key)
    {
        if (self::has($key)) {
            return $_SESSION[$key];
        }
        return null;
    }

    public static function remove($key)
    {
        unset($_SESSION[$key]);
    }

    public static function setFlash($message)
    {
        self::set('flash', $message);
    }

    public static function getFlash()
    {
        $message = self::get('flash');
        self::remove('flash');
        return $message;
    }
}