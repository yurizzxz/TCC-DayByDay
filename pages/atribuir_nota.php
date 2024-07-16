<?php
session_start();

if (!isset($_SESSION['idUsuario'])) {
    header('Location: login.php');
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['nota_id']) && isset($_POST['id_categoria'])) {
    $id_usuario = $_SESSION['idUsuario'];
    $nota_id = $_POST['nota_id'];
    $id_categoria = $_POST['id_categoria'];

    // Conexão com o banco de dados
    include_once 'conexao.php';

    // Verifica se a categoria pertence ao usuário
    $sql_verifica = "SELECT id FROM categoria WHERE id = '$id_categoria' AND id_usuario = '$id_usuario'";
    $result_verifica = $conn->query($sql_verifica);

    if ($result_verifica->num_rows > 0) {
        // Associa a nota à categoria
        $sql_associar = "UPDATE nota SET id_categoria = '$id_categoria' WHERE id = '$nota_id'";
        if ($conn->query($sql_associar) === TRUE) {
            echo "Nota associada à categoria com sucesso!";
        } else {
            echo "Erro ao associar nota à categoria: " . $conn->error;
        }
    } else {
        echo "Categoria não encontrada ou não pertence ao usuário.";
    }

    $conn->close();
} else {
    echo "Parâmetros inválidos.";
}
?>
