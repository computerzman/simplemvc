<?php
namespace BATRAHOSTMVC\Lib\Database;
/**
 * Description of pdodatabasehandler

 * @author Mohamed Hassan Elmetwaly
 * 25-03-2017
 * mhe.developer@gmail.com
 */


class PDODatabaseHandler extends DatabaseHandler
{
    private static $_instance;
    private static $_handler;
    
    private function __construct() {
        self::init();
    }
    //public function __call($name, $arguments) {}

   public function __call($name, $arguments) {
       if(method_exists($this, $name))
       {
           $this->$name($arguments);
       } else {
           trigger_error('Sorry no method '. $name. ' has been found');
       }
       
   }    
    
    protected static function init(){
        try{
           
           
            PDODatabaseHandler::$_handler = new \PDO(
                    'mysql:host='.DATABASE_HOST_NAME.';dbname='.DATABASE_DB_NAME,DATABASE_USER_NAME,
                    DATABASE_PASSW0RD);

// var_dump(self::$_handler);
            //self::$_handler = new pdo("mysql:host=localhost; dbname=test", 'root', 'rootbootroot');
           // return self::$_handler;
            //echo "econnected";
        } catch (\PDOException $e)
        {
            echo $e->getMessage( ) ." | ". $e->getCode( ) ;
          
        }
      //  return self::$_handler;
        
    }
    
    /*
    public static function call_init(){
        return self::init();
    }
    */
    
    public static function getInstance() {
        if(self::$_instance === null){
            self::$_instance = new self();
        }
        self::$_handler->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION); // i added this in 15-05-2017 to debug pdo errors , i can comment it in any time
        return self::$_handler;
    
    }
    

}
