<?php
/**
 * Created by PhpStorm.
 * User: moi
 * Date: 19/11/2017
 * Time: 11:13
 */


define('DS', DIRECTORY_SEPARATOR);
define('ROOT_PATH', dirname(dirname(__DIR__)));
define('SRC_PATH', ROOT_PATH . DS . 'src');
define('APP_PATH', SRC_PATH . DS . 'app');
define('LIB_PATH', ROOT_PATH . DS . 'library');
define('VENDOR_PATH', ROOT_PATH . DS . 'vendor');
define('CONFIG_PATH', ROOT_PATH . DS . 'config');

session_start();

//loading the autoloader
require LIB_PATH . DS . 'autoloader.php';
autoloader::register();

$request = new \library\request();

$router = new \library\Router($request);
$router->route();

$dispatcher = new \library\Dispatcher($request);
$dispatcher->dispatch();