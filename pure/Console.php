<?php

define('DS', DIRECTORY_SEPARATOR);
define('ROOT_PATH', dirname(__DIR__));
define('CONFIG_PATH', ROOT_PATH . DS . 'config');
define('PURE_PATH', ROOT_PATH . DS . 'pure');

session_start();

require_once PURE_PATH . DS . 'Autoloader.php';
Autoloader::register();

$request = new pure\lib_console\console_req();
$dispatcher = new pure\lib_console\console_dispatcher($request);
$dispatcher->dispatch();