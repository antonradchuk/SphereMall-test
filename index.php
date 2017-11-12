<?php
/**
 * Created by PhpStorm.
 * User: Anton
 * Date: 11.11.17
 * Time: 20:41
 */
error_reporting(E_ALL);
require_once 'vendor/autoload.php';

use Library\Request;
use Library\Controller;
use Library\Config;

const DS   = DIRECTORY_SEPARATOR;
const ROOT = __DIR__ . DS;
const VIEW_DIR = ROOT . 'View' . DS;
const LIB_DIR = ROOT . 'Library' . DS;

spl_autoload_register(function ($className){
    $file = ROOT . str_replace('\\', DS, $className).'.php';

    if(!file_exists($file)){
        throw new \Exception("{$file}  not found", 500);
    }

    require($file);
}
);

try{
    Config::set('db_user', 'remote');
    Config::set('db_pass', 'remote');
    Config::set('db_name', 'test_task');
    Config::set('db_host', '127.0.0.1');

    $request = new Request();
    $route = $request->get('route', 'site/index');
    $route = explode('/', $route);
    $controller = 'Controller\\' . ucfirst($route[0]) . 'Controller';
    $action = $route[1] . 'Action';

    $controller = new $controller();

    if(!method_exists($controller, $action)){
        throw new \Exception('Page not found', 404);
    }

    $content = $controller->$action($request);
}catch (\Exception $e){

    $content = $controller::renderError($e->getMessage(), $e->getCode());
}


require VIEW_DIR . 'layout.php';