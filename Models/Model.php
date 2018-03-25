<?php
namespace Models;

use Providor\Helper;
use Providor\DB;

class Model
{
    //Save instance in the database
    public static function save($request)
    {
        //Getting table name of the calling class
        $table_name = Self::getTableNameStaticCall();

        $sqlBuilder = DB::insert($table_name, $request);
    }

    public function all()
    {
      
    }

    //class and table names getters
    public function getClassName()
    {
        return (substr(get_class($this), strrpos(get_class($this), '\\') + 1));
    }

    public static function getClassNameStaticCall()
    {
        return (substr(get_called_class(), strrpos(get_called_class(), '\\') + 1));
    }

    public function getTableName()
    {
        return lcfirst(substr(get_class($this), strrpos(get_class($this), '\\') + 1)).'s';
    }

    public static function getTableNameStaticCall()
    {
        $class_name = get_called_class();
        $instance = new $class_name();
        if(isset($instance->table_name)) {
          //custom table name
          $table_name = $instance->table_name;
        } else {
          //conventional table name
          $table_name = lcfirst(substr(get_called_class(), strrpos(get_called_class(), '\\') + 1)).'s';
        }
        return $table_name;
    }

    public function id()
    {
        return $this->id;
    }

    public function field($fieldName)
    {
        return $this->$fieldName;
    }

}
