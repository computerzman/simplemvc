<?php
namespace BATRAHOSTMVC\Lib\Database;
/**
 * Description of DatabaseHandler
 *
 * @author Mohamed Hassan Elmetwaly
 * 25-03-2017
 * mhe.developer@gmail.com
 */
abstract class DatabaseHandler {
    const DATABASE_DRIVER_POD = 1;
    const DATABASE_DRIVER_MYSQLI = 2;
    
    private function __construct() {
        
    }
    abstract protected static function init();
    abstract protected static function getInstance();
    public static function factory()
    {
      //  $driver = DATABASE_CONN_DRIVER;
     //  if($driver == self::DATABASE_DRIVER_POD)
      // {
          return PDODatabaseHandler::getInstance();
     
      // } else if ($driver == self::DATABASE_DRIVER_MYSQLI)
     //  {
      //     return MySQLiDatabaseHandler::getInstance();
      // }       
    }
}
