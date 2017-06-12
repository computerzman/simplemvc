<?php
namespace BATRAHOSTMVC;
use BATRAHOSTMVC\LIB\FrontController;
use BATRAHOSTMVC\LIB\Language;
use BATRAHOSTMVC\LIB\Template;


if(!defined('DS'))
{
    define('DS', DIRECTORY_SEPARATOR);
}
require_once '..' . DS . 'app' . DS.'config'.DS . 'config.php';
require_once APP_PATH.DS.'lib'.DS.'autoload.php';
$template_parts = require_once '..' . DS . 'app' . DS.'config'.DS . 'templateconfig.php';

session_start();
if(!isset($_SESSION['lang'])) {
    $_SESSION['lang'] = APP_DEFAULT_LANGUAGE;
}
$template = new Template($template_parts);
$language = new Language();
$language->load('template.common'); // add by @ME to load common language file for all pages
$frontController = new LIB\FrontController($template, $language);
$frontController->dispatch();
// . DS .'..'