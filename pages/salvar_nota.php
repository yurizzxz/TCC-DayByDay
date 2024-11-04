<?php
session_start();

if (!isset($_SESSION['idUsuario'])) {
    header('Location: login.php');
    exit();
}

include_once 'conexao.php';

$id_usuario = $_SESSION['idUsuario'];
$titulo = $_POST['txttitulo'];
$subtitulo = $_POST['txtsubtitulo'];
$conteudo = $_POST['txtconteudo'];
$cor = $_POST['cor_selecionada'];
$id_categoria = $_POST['id_categoria'];

$sql = "INSERT INTO nota (id_usuario, titulo, subtitulo, conteudo, cor, id_categoria) VALUES ('$id_usuario', '$titulo', '$subtitulo', '$conteudo', '$cor', '$id_categoria')";

if ($conn->query($sql) === TRUE) {
    $_SESSION['mensagem'] = "Nota criada com sucesso!";
    header('Location: index.php?p=notas');
    exit();
} else {
    $_SESSION['mensagem'] = "Erro ao criar a nota: " . $conn->error;
    header('Location: index.php?p=notas');
    exit();
}

$conn->close();
?>
