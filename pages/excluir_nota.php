<?php
session_start();

if (!isset($_SESSION['idUsuario'])) {
    header('Location: login.php');
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['nota_id'])) {
    $id_usuario = $_SESSION['idUsuario'];
    $nota_id = $_POST['nota_id'];

    $conn = mysqli_connect('#', 'root', '', 'tcc');
    if ($conn->connect_error) {
        die("Erro de conexão: " . $conn->connect_error);
    }

    $sql = "DELETE FROM nota WHERE id_usuario = '$id_usuario' AND id = '$nota_id'";
    if ($conn->query($sql) === TRUE) {
        $_SESSION['mensagem'] = "Nota excluída com sucesso!";
        header('Location: index.php?p=notas');
    } else {
        $_SESSION['mensagem'] = "Erro ao excluir a nota";
        header('Location: index.php?p=notas');
    }

    $conn->close();
} else {
    header('Location: index.php?p=notas');
}
?>
