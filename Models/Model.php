<?php
namespace Models;

use Providor\Helper;
use Providor\DB;
use Providor\QueryBuilder;

class Model
{
    //Save instance in the database
    public static function save($request)
    {
        //Getting table name of the calling class
        $table_name = Self::getTableNameStaticCall();
        $db = new QueryBuilder();
        $sqlBuilder = $db->insert($table_name, $request);
    }

    //search by Id and fetch one result
    public static function find($id)
    {
        $table_name = Self::getTableNameStaticCall();
        $db = new QueryBuilder();
        $results = $db->select($table_name)->where('id', '=', $id)->first();
        return $results;
    }

    public static function select($selected_fields = [])
    {
        $table_name = Self::getTableNameStaticCall();
        $db = new QueryBuilder();
        $results = $db->select($table_name, $selected_fields);
        return $results;
    }

    public static function all()
    {
        $table_name = Self::getTableNameStaticCall();
        $db = new QueryBuilder();
        $results = $db->select($table_name)->getAll();
        return $results;
    }

    public static function first()
    {
        $table_name = Self::getTableNameStaticCall();
        $db = new QueryBuilder();
        $results = $db->select($table_name)->first();
        return $results;
    }

    public static function where($field_name, $operator, $value)
    {
        $table_name = Self::getTableNameStaticCall();
        $db = new QueryBuilder();
        $results = $db->select($table_name)->where($field_name, $operator, $value)->getAll();
        return $results;
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
