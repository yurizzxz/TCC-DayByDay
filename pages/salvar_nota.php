<?php
session_start();


if (!isset($_SESSION['idUsuario'])) {

    header('Location: login.php');
    exit();
}

$conn = mysqli_connect('127.0.0.1', 'root', '', 'tcc');
if ($conn->connect_error) {
    die("Erro de conexão: " . $conn->connect_error);
}

$id_usuario = $_SESSION['idUsuario'];

$titulo = $_POST['txttitulo'];
$subtitulo = $_POST['txtsubtitulo'];
$conteudo = $_POST['txtconteudo'];
$cor = $_POST['cor_selecionada'];


$sql = "INSERT INTO nota (id_usuario, titulo, subtitulo, conteudo, cor) VALUES ('$id_usuario', '$titulo', '$subtitulo', '$conteudo', '$cor')";
if ($conn->query($sql) === TRUE) {
    $_SESSION['mensagem'] = "Nota criada com sucesso!";
    header('Location: index.php?p=notas');
    exit();
} else {
    $_SESSION['mensagem'] = "Erro ao criar a nota: " . $conn->error;
    header('Location: index.php?p=criar_nota');
    exit();
}

$mensagem = isset($_SESSION['mensagem']) ? $_SESSION['mensagem'] : '';
unset($_SESSION['mensagem']);

echo $mensagem;



$conn->close();
?>
