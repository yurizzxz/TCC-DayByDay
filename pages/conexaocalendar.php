<?php

$host = "localhost";
$user = "root";
$pass = "";
$dbname = "tcc";
$port = 3307;

try {

    $conne = new PDO("mysql:host=$host;dbname=" . $dbname, $user, $pass);
    //echo "Conexão com banco de dados realizado com sucesso.";
 } catch (PDOException $err) {
    die("Erro: Conexão com banco de dados não realizado com sucesso. Erro gerado " . $err->getMessage());
}