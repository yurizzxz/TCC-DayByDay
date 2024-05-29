<?php
session_start();

// Verifica se o usuário está logado
if (!isset($_SESSION['idUsuario'])) {
    // Se o usuário não estiver logado, redirecione para a página de login
    header('Location: login.php');
    exit();
}

// Conexão com o banco de dados
$conn = mysqli_connect('127.0.0.1', 'root', '', 'tcc');
if ($conn->connect_error) {
    die("Erro de conexão: " . $conn->connect_error);
}

// Recupera o ID do usuário da sessão
$id_usuario = $_SESSION['idUsuario'];

// Recupera os dados do formulário
$titulo = $_POST['txttitulo'];
$subtitulo = $_POST['txtsubtitulo'];
$conteudo = $_POST['txtconteudo'];
$cor = $_POST['cor_selecionada']; // Recupera a cor selecionada

// Insere a nota no banco de dados
$sql = "INSERT INTO nota (id_usuario, titulo, subtitulo, conteudo, cor) VALUES ('$id_usuario', '$titulo', '$subtitulo', '$conteudo', '$cor')";
if ($conn->query($sql) === TRUE) {
    echo "Nota criada com sucesso!";
    header('Location: index.php?p=notas'); // Redireciona para a página de notas
} else {
    echo "Erro ao criar a nota: " . $conn->error;
}

$conn->close();
?>
