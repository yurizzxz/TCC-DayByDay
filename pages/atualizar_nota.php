<?php
session_start();
include_once 'conexao.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['nota_id'])) {
    $nota_id = $_POST['nota_id'];
    $titulo = $_POST['txttitulo'];
    $subtitulo = $_POST['txtsubtitulo'];
    $conteudo = $_POST['txtconteudo'];
    $cor = $_POST['txtcor'];
    $categoria_id = $_POST['id_categoria'];


    $stmt = $conn->prepare('UPDATE nota SET titulo=?, subtitulo=?, conteudo=?, cor=?, id_categoria=? WHERE id=?');
    $stmt->bind_param('ssssii', $titulo, $subtitulo, $conteudo, $cor, $categoria_id, $nota_id);

    if ($stmt->execute()) {
        $_SESSION['mensagem'] = 'Edição feita com sucesso!';
        header('location:index.php?p=notas');
        exit();
    } else {
        $_SESSION['mensagem'] = 'Erro ao editar nota! ' . $stmt->error;
        header('location:index.php?p=notas');
        exit();
    }

    $stmt->close();
    $conn->close();
} else {
    header('Location: index.php?p=notas');
}
?>
