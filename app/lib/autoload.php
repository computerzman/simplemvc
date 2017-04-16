<?php
namespace BATRAHOSTMVC\LIB;

/*
 * Applcation Constants
 */
/*
define('DS', DIRECTORY_SEPARATOR);
define('APP_PATH', dirname(realpath(__FILE__)).DS.'..');

define('PS', PATH_SEPARATOR);
define('CONTROLLER_PATH', APP_PATH.DS.'controllers');
define('MODEL_PATH', APP_PATH.DS.'models');
//echo CONTROLLER_PATH;
$path = get_include_path().PS.CONTROLLER_PATH.PS.MODEL_PATH;
set_include_path($path);
 
 */
class Autoload
{
    public static function autoload($classname)
    {
      /* in Explanation */
      $classname = str_replace('BATRAHOSTMVC', '',$classname);
      $classname = str_replace('\\', '/', $classname);
      $classname = $classname.'.php';
      $classname = strtolower($classname);
        if(file_exists(APP_PATH.$classname))
        {
             require_once APP_PATH.$classname;
        }
     /*   
     $class = str_replace('\\', '/', $classname);
     $classFile = APP_PATH.DIRECTORY_SEPARATOR.strtolower($class).'.php';
     if(file_exists($classFile))
        {
             require $classFile;
        }
        else
        {
            return;
        }
      
      */
    }
}
spl_autoload_register(__NAMESPACE__.'\Autoload::autoload');
