<?php

function insert($table, $data) {
    $fields = implode(', ', array_keys($data));
    $placeholders = ':' . implode(', :', array_keys($data));
    $sql = sprintf("INSERT INTO %s (%s) VALUES (%s)", $table, $fields, $placeholders);
    return $sql;
}

$table_name = "mi_tabla";
$data = array(
    "campo1" => "valor1",
    "campo2" => "valor2",
    "campo3" => "valor3"
);

$insert_statement = insert($table_name, $data);

echo $insert_statement;

?>
