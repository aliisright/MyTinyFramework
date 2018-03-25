<?php
namespace Providor;
use PDO;

class DB
{
    protected $pdo;
    protected $statement;
    protected $query;
    protected $params;

    function __construct($pdo = null)
    {
        require 'config/db-conf.php';
        $this->pdo = $pdo;

        try{
          $this->pdo = new PDO("mysql:host=$host:$port;dbname=$dbName;charset=$charset", $username, $password, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        } catch (Exception $e){
          die('Erreur: ' . $e->getMessage());
        }
    }


    

    //Fetch
    public function getAll()
    {
        $sql = $this->query;
        $params = $this->params;
        $statement = $this->reqExecute($sql, $params);
        return $statement->fetchAll();
    }

    public function first()
    {
        $sql = $this->query;
        $params = $this->params;
        $statement = $this->reqExecute($sql, $params);
        return $statement->fetch();
    }




    //Build parameters for Insert / Update
    public static function sqlParamsBuilder($request)
    {
        $fields = implode(',', array_keys($request));
        $values = Helper::getPreparedStatementValues(array_keys($request));

        $params = [];
        foreach($request as $key => $value) {
          $params[':'.$key] = $value;
        }

        $array = [
          'fields' => $fields,
          'values' => $values,
          'params' => $params
        ];
        return $array;
    }

    private function reqExecute($sql, $params = null)
    {
        $this->params = $params;
        $statement = $this->pdo->prepare($sql);
        foreach ($this->params as $key => &$value) {
          $statement->bindParam($key, $value);
        }
        $statement->execute();
        var_dump($statement);
        return $statement;
    }
}
