<?php
session_start();



if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_SESSION['idUsuario'])) {
    $id_usuario = $_SESSION['idUsuario'];
    $nome_categoria = $_POST['nome_categoria'];
    $cor_escolhida = $_POST['cor_escolhida']; // Certifique-se de que 'cor_escolhida' é o nome correto do input
    
    $conn = mysqli_connect('127.0.0.1', 'root', '', 'tcc');
    if ($conn->connect_error) {
        die("Erro de conexão: " . $conn->connect_error);
    }

    // Preparar a declaração SQL para inserir a nova categoria
    $stmt = $conn->prepare("INSERT INTO categoria (nome, id_usuario, cor) VALUES (?, ?, ?)");
    $stmt->bind_param("sis", $nome_categoria, $id_usuario, $cor_escolhida);

    if ($stmt->execute()) {
        header('Location: index.php?p=notas');
        echo "Categoria criada com sucesso.";
    } else {
        echo "Erro ao criar categoria: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
} else {
    header('Location: login.php');
    exit();
}

?>