<?php
namespace Providor;

use Providor\DB;

class Helper
{

  function __construct()
  {
    return new Helper();
  }

  public static function arrayToSlicedString($array, $seperator)
  {
      $result = (string)'';
      ob_start();
      foreach(array_keys($array) as $element)
      {
         echo $result.$element.$seperator;
      }
      $output = ob_get_clean();
      $result = rtrim($output, ',');

      return $result;
  }

  public static function getPreparedStatementValues($array)
  {
      $result = (string)'';
      ob_start();
      foreach($array as $element)
      {
         echo $result.':'.$element.',';
      }
      $output = ob_get_clean();
      $result = rtrim($output, ',');

      return $result;
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

  public static function insert($table_name, $request)
  {
      $sqlBuilder = Helper::sqlParamsBuilder($request);
      $sql = "INSERT INTO ".$table_name." (".$sqlBuilder['fields'].") VALUES(".$sqlBuilder['values'].")";
      DB::insert($sql, $sqlBuilder['params']);
  }
}
