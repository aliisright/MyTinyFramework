<?php
namespace Providor;
use Providor\DB;

class QueryBuilder extends DB
{
    protected $db;
    protected $pdo;
    protected $statement;
    protected $query;
    protected $params;

    function __construct($db = null)
    {
        $this->db = new DB();
        $this->pdo = $this->db->pdo;
        $this->statement = $this->db->statement;
        $this->query = $this->db->query;
        $this->params = $this->db->params;
    }

    //For the static call from select / all ...
    public function select($table_name, $selected_fields = null)
    {
        if(isset($selected_fields)) {
          $fields = implode(',', $selected_fields);
        } else {
          $fields = '*';
        }
        $this->query = "SELECT $fields FROM $table_name";
        return $this;
    }

    public function where($field_name, $operator, $value)
    {
        if(preg_match('/WHERE/', $this->query)) {
            $query = $this->query." AND $field_name $operator :$field_name";
        } else {
            $query = $this->query." WHERE $field_name $operator :$field_name";
        }

        $this->query = $query;
        $this->params[$field_name] = $value;
        return $this;
    }

    public function insert($table_name, $request)
    {
        $sqlBuilder = QueryBuilder::sqlParamsBuilder($request);
        $sql = "INSERT INTO ".$table_name." (".$sqlBuilder['fields'].") VALUES(".$sqlBuilder['values'].")";
        $this->reqExecute($sql, $sqlBuilder['params']);
    }
}
