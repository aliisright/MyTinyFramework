<?php
namespace Models;
use controllers\providor;

class Model
{
    public static function create()
    {
        $sqlBuilder = Helper::insert($request);
    }

    public function getClassName()
    {
        return (substr(get_class($this), strrpos(get_class($this), '\\') + 1));
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
