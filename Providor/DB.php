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

    public static function insert($sql, $params)
    {
        $pdo = DB::connection();

        $statement = $pdo->prepare($sql);
        foreach ($params as $key => &$value) {
          $statement->bindParam($key, $value);
        }
        $statement->execute();
    }

}
