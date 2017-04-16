<?php
namespace BATRAHOSTMVC\Lib\Database;
if(!defined('DS'))
{
define('DS', DIRECTORY_SEPARATOR);
}
define('APP_PATH', dirname(realpath(__FILE__)));
define('VIEWS_PATH', APP_PATH.DS.'views'.DS);

defined('DATABASE_HOST_NAME')   ?   null    : define('DATABASE_HOST_NAME', 'localhost');
defined('DATABASE_USER_NAME')   ?   null    : define('DATABASE_USER_NAME', 'root');
defined('DATABASE_PASSW0RD')   ?   null    : define('DATABASE_PASSW0RD', 'rootbootroot');
defined('DATABASE_DB_NAME')   ?   null    : define('DATABASE_DB_NAME', 'test');
defined('DATABASE_PORT_NUMBER')   ?   null    : define('DATABASE_PORT_NUMBER', 3306);
defined('DATABASE_CONN_DRIVER')   ?   null    : define('DATABASE_CONN_DRIVER', 1);
