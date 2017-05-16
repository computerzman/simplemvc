<?php
namespace BATRAHOSTMVC\Models;
//use BATRAHOSTMVC\Models\AbstractModel;
//use BATRAHOSTMVC\Models\AbstractModel;
/**
 * Description of employee
 * @author Mohamed Hassn Elmetwaly (25-03-2017)
 * mhe.developer@gmail.com
 */

class EmployeeModel extends AbstractModel
{
    public $id;
    public $name;
    public $age;
    public $address;
    public $tax;
    public $salary;
    
    public static $db;
    protected static $tableName = 'employees';


    protected static $tableSchema = array(
      'name'        => self::DATA_TYPE_STR,
      'age'        => self::DATA_TYPE_INT,
      'address'        => self::DATA_TYPE_STR,
      'tax'        => self::DATA_TYPE_DECIMAL,
      'salary'        => self::DATA_TYPE_DECIMAL
    );
    protected static $primaryKey = 'id';
    public function __construct(){}

    /*
    public function __construct($name, $age, $address, $tax, $salary) {
        
               
        $this->name = $name;
        $this->age = $age;
        $this->address = $address;
        $this->tax = $tax;
        $this->salary = $salary;
        
        
    }

    */
    public function __get($prop){
        $this->$prop;
    }
    public function getTableName(){
        return self::$tableName;
    }

}
