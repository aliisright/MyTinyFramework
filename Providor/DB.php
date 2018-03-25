<?php
namespace Providor;
use PDO;

class DB
{
    function __construct()
    {
      return new DB();
    }

    public static function connection()
    {
      require 'config/db-conf.php';

      try{
        $pdo = new PDO("mysql:host=$host:$port;dbname=$dbName;charset=$charset", $username, $password, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
      } catch (Exception $e){
        die('Erreur: ' . $e->getMessage());
      }
      return $pdo;
    }

    public static function insert($table_name, $request)
    {
        $sqlBuilder = DB::sqlParamsBuilder($request);
        $sql = "INSERT INTO ".$table_name." (".$sqlBuilder['fields'].") VALUES(".$sqlBuilder['values'].")";
        DB::reqExecute($sql, $sqlBuilder['params']);
    }

    public static function reqExecute($sql, $params)
    {
        $pdo = DB::connection();

        $statement = $pdo->prepare($sql);
        foreach ($params as $key => &$value) {
          $statement->bindParam($key, $value);
        }
        $statement->execute();
    }

    private static function sqlParamsBuilder($request)
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

}
