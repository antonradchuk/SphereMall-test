<?php
/**
 * Created by PhpStorm.
 * User: Anton
 * Date: 12.11.17
 * Time: 00:28
 */

namespace Library;


abstract class Config
{
    private static $items = [];

    public static function get($key)
    {
        if(isset(self::$items[$key])){
            return self::$items[$key];
        }

        return null;
    }

    public static function set($key, $value)
    {
        self::$items[$key] = $value;
    }
}