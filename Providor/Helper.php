<?php
namespace Providor;

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

  public static function sqlBuilder($request_type, $table_name, $request)
  {
      $fields = implode(',', array_keys($request));
      $values = Helper::getPreparedStatementValues(array_keys($request));

      $params = [];
      foreach($request as $key => $value) {
        $params[':'.$key] = $value;
      }

      $sql = "INSERT INTO ".$table_name." (".$fields.") VALUES(".$values.")";
  }
}
