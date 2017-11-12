<?php
/**
 * Created by PhpStorm.
 * User: Anton
 * Date: 11.11.17
 * Time: 22:47
 */

namespace Library;


abstract class Controller
{
    protected function render($view, array $args = [])
    {
        extract($args);

        $classname = str_replace(['Controller', '\\'], '',static::class);
        $file = VIEW_DIR . $classname . DS . $view .'.php';

        if(!file_exists($file)){
            throw new \Exception('Template {$file} not found');
        }

        ob_start();
        require $file;
        return ob_get_clean();
    }

    public static function renderError($message, $code)
    {
        ob_start();
        require VIEW_DIR . 'error.php';
        return ob_get_clean();
    }

}