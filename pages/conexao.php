<?php

function conectar() {
    $host = 'localhost';
    $dbname = 'tcc';
    $user = 'root';
    $password = '';

    $conexao = new mysqli($host, $user, $password, $dbname);

    if ($conexao->connect_error) {
        die("Erro de conexão: " . $conexao->connect_error);
    }

    return $conexao;
}

// Chamando a função conectar() para obter a conexão com o banco de dados
$conn = conectar();

?>
