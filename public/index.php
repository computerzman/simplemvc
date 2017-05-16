<?php
namespace BATRAHOSTMVC;
use BATRAHOSTMVC\LIB\FrontController;
if(!defined('DS'))
{
    define('DS', DIRECTORY_SEPARATOR);
}
require_once '..'.DS.'app'.DS.'config.php';
require_once APP_PATH.DS.'lib'.DS.'autoload.php';
session_start();
$frontController = new LIB\FrontController();
echo '<pre>';
$frontController->dispatch();
echo '</pre>';
//echo "Welcom in MVC";
/*
$url = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
list($controller, $action, $params) = explode('/', trim($url, '/'),3);
$params = explode('/', $params);
echo '<pre>';
var_dump($controller, $action,$params);
echo '</pre>';
*/