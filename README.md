Tables naming:

Providor:
  AppProvidor:

  DB:
    connection()
    insert($sql, $params)

  Helper:
    arrayToSlicedString($array, $seperator)
    getPreparedStatementValues($array)
    sqlParamsBuilder($request)
    insert($table_name, $request)

Parent Classes:

  Model:
    save($request)
    getClassName()
    getTableName()
    getTableNameStaticCall()
    id()
    field($fieldName)

  Controller:
