<?php
require 'connection_db.php';
  //Executa Querys(Comandos no banco)
  function DBQuery($query) {
    $link = DBConnect();
    $result = @mysqli_query($link, $query) or die(mysqli_error($link));

    DBClose($link);
    return $result;
  }

  //Grava Registros
  function DBCreate($table, array $dados) {

    $dados = DBEscape($dados);

    $fields = implode(', ', array_keys($dados));
    $values = "'".implode("', '", $dados)."'";

    $query = "INSERT INTO {$table} ( {$fields} ) VALUES ( {$values} )";

    return DBQuery($query);
  }

  //Ler Registros
  function DBRead($table, $params = null, $fields = '*'){
    $params = ($params) ? " {$params}" : null;

    $query = "SELECT {$fields} FROM {$table}{$params}";
    $result = DBQuery($query);

    if(!mysqli_num_rows($result))
      return false;
    else {
      while ($res = mysqli_fetch_assoc($result)){
        $data[] = $res;
      };
    }
    return $data;
  }

  // function para inserri sql query manualmnete
  function DBQuerySingle($sql){
      
    $result = DBQuery($sql);

    if(!mysqli_num_rows($result))
      return false;
    else {
      while ($res = mysqli_fetch_assoc($result)){
        $data[] = $res;
      };
    }
    return $data;
  }

  //Alterar Registros
  function DBUpdate($table, array $data, $where=null) {
    $where = ($where) ? " WHERE {$where}" : null;

    foreach ($data as $key => $value) {
        $fields[] = "{$key} = '{$value}'";
    }

    $fields = implode(", ", $fields);

    $query = "UPDATE $table SET {$fields}{$where}";

    return DBQuery($query);
  }

  //Deletar Registros
  function DBDelete($table, $where = null) {
    $where = ($where) ? " WHERE {$where}" : null;

    $query = "DELETE FROM {$table}{$where}";
    var_dump($query);
    return DBQuery($query);
  }
 ?>
