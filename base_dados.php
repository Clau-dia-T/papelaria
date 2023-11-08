<?php

$pdo = new PDO("mysql:host=".$base_dados["host"].";dbname=".$base_dados["dbname"].";", $base_dados["user"], $base_dados["password"]);

function selectSQL($sql){
    global $pdo;
    $consulta = $pdo->query($sql);
    $resultado = $consulta->fetchAll(PDO::FETCH_ASSOC);
    return $resultado;
}

function selectSQLUnico($sql){
    global $pdo;
    $consulta = $pdo->query($sql);
    $resultado = $consulta->fetch(PDO::FETCH_ASSOC);
    return $resultado;
}

function iduSQL($sql){
    global $pdo;
    $consulta = $pdo->query($sql);
}


?>