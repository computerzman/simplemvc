<?php
namespace BATRAHOSTMVC\Models;
use BATRAHOSTMVC\Lib\Database\DatabaseHandler;
//echo DATABASE_DB_NAME;
/**
 * Description of abstractmodel
 * @author Mohamed Hassn Elmetwaly (25-03-2017)
 * mhe.developer@gmail.com
 */
class AbstractModel 
{
    const DATA_TYPE_BOOL = \PDO::PARAM_BOOL;
    const DATA_TYPE_STR = \PDO::PARAM_STR;
    const DATA_TYPE_INT = \PDO::PARAM_INT;
    const DATA_TYPE_DECIMAL = 4;
    const DATA_TYPE_DATE = 5;
    /*
    public static function viewTableSchema()
    {
        return static::$tableSchema;
    }
     * 
     */
    // we make path by reference 
    private function prepareValues(\PDOStatement &$stmt)
    {
          foreach (static::$tableSchema as $columnName => $type)
        {
            if($type == 4)
            {
                $sanitizedValue = filter_var($this->$columnName, FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
                $stmt->bindValue(":{$columnName}", $sanitizedValue);
            }
            else
            {
                $stmt->bindValue(":{$columnName}", $this->$columnName,  $type);
            }
            
        }      
    }

        private static function buildNameParametersSQL()
    {
        $nameParams = '';
        //$columnName (Column Name) => $type (Column datatype)
        foreach (static::$tableSchema as $columnName => $type)
        {
            $nameParams .= $columnName. ' = :'.$columnName. ', ';
        }
        return trim($nameParams, ', ');
    }
    
    private static function create()
    {
        //global $connection;
 
        $sql = 'INSERT INTO '. static::$tableName . ' SET '. self::buildNameParametersSQL();
        $stmt = DatabaseHandler::factory()->prepare($sql);
        $this->prepareValues($stmt);
        return $stmt->execute(); // true of false
    }

    private static function update()
    {
       // global $connection; 
        $sql = 'UPDATE '. static::$tableName . ' SET '. self::buildNameParametersSQL(). ' WHERE '. static::$primaryKey .' = '.$this->{static::$primaryKey};
      //  $stmt = $connection->prepare($sql);
        //$stmt = DatabaseHandler::factory()->prepare($sql);
        $stmt = DatabaseHandler::factory()->prepare($sql);
        $this->prepareValues($stmt);
        return $stmt->execute(); // true of false
    }
    
    public function save()
    {
        return $this->{static::$primaryKey} === null ? $this->create() : $this->update();
    }

    public static function delete()
    {
      //  global $connection; 
        $sql = 'DELETE FROM '. static::$tableName . ' WHERE '. static::$primaryKey .' = '.$this->{static::$primaryKey};
       // $stmt = $connection->prepare($sql);
        $stmt = DatabaseHandler::factory()->prepare($sql);
        return $stmt->execute(); // true of false
    }
    
    public static function getAll()
    {
       // global $connection; 
        $sql = 'SELECT * FROM '. static::$tableName;
        //$stmt = $connection->prepare($sql);
      //  var_dump(get_class_methods(DatabaseHandler::factory()));
        $stmt = DatabaseHandler::factory()->prepare($sql);
        //return $connection->execute() === true ? $stmt->fetchAll(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, 'Employee', array('name', 'age', 'address', 'tax', 'salary')) : false;
        //using fetchAll with this paramaters return values as OBJECT Of class which returned by get_called_calss() which called this method
        $stmt->execute();
        $result = $stmt->fetchAll(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, get_called_class(), array_keys(static::$tableSchema));
        return is_array($result) && !empty($result) === true ? $result : false;
    }

    public static function getByPk($pk)
    {
        //global $connection; 
        $sql = 'SELECT * FROM '. static::$tableName. ' WHERE '. static::$primaryKey .' = '.$pk;
        //$stmt = $connection->prepare($sql);
        //$stmt = DatabaseHandler::factory()->prepare($sql);
        $stmt = DatabaseHandler::factory()->prepare($sql);
        //return $connection->execute() === true ? $stmt->fetchAll(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, 'Employee', array('name', 'age', 'address', 'tax', 'salary')) : false;
        //using fetchAll with this paramaters return values as OBJECT Of class which returned by get_called_calss() which called this method
        if($connection->execute() === true)
        {
            $obj = $stmt->fetchAll(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, get_called_class(), array_keys(static::$tableSchema));
            return array_shift($obj);
        }
        return false;
    }
    
    public static function get($sql, $options = array())
    {
        /*
         * example:
         * $emps = Employee::get(
         * 'SELECT name, age FROM employees WHERE age = :age',
         * array(
         * 'age' => array(Employee::DATA_TYPE_INT, 34)
         * )
         * )
         * var_dump($emps)
         */
        
        //global $connection;
        //$stmt = $connection->prepare($sql);
        $stmt = DatabaseHandler::factory()->prepare($sql);
        if(!empty($options))
        {
         foreach ($options as $columnName => $type)
        {
            //$type[0] = datatype, $type[1] = columname
            if($type[0] == 4)
            {
                $sanitizedValue = filter_var($type[1], FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
                $stmt->bindValue(":{$columnName}", $sanitizedValue);
            }
            else
            {
                $stmt->bindValue(":{$columnName}", $type[1], $type[0]);
            }
            
        }            
        }
        $stmt->execute();
                $result = $stmt->fetchAll(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, get_called_class(), array_keys(static::$tableSchema));
                return is_array($result) && !empty($result) === true ? $result : false;
        /*        
        if(method_exists(get_called_class(), '__construct')){
        $result = $stmt->fetchAll(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, get_called_class(), array_keys(static::$tableSchema));
        //return is_array($result) && !empty($result) === true ? $result : false;
        } else {
        $result =$stmt->fetchAll(\PDO::FETCH_CLASS, get_called_class());    
        }
        if((is_array($result) && !empty($result))){
            $generator = function() use ($result){};
            return $generator;
        }
        return false;
         
         */
              
    }
}
