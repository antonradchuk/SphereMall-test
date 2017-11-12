<?php
/**
 * Created by PhpStorm.
 * User: Anton
 * Date: 12.11.17
 * Time: 15:57
 */

namespace Library;


abstract class Router
{
    public static function redirect($to)
    {
        header("Location: {$to}");
    }
}