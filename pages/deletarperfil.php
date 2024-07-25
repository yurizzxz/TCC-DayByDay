<?php
session_start();

if (!isset($_SESSION['idUsuario'])) {
    header('Location: login.php');
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_usuario = $_SESSION['idUsuario'];

    $conn = mysqli_connect('127.0.0.1', 'root', '', 'tcc');
    if ($conn->connect_error) {
        die("Erro de conexão: " . $conn->connect_error);
    }

    // Excluir todas as notas associadas ao usuário
    $sql_delete_notas = "DELETE FROM nota WHERE id_usuario = '$id_usuario'";
    if ($conn->query($sql_delete_notas) === TRUE) {
        // Agora você pode excluir o usuário
        $sql_delete_usuario = "DELETE FROM usuarios WHERE id = '$id_usuario'";
        if ($conn->query($sql_delete_usuario) === TRUE) {
            $_SESSION['message'] = "Conta excluída com sucesso!";
            session_destroy();
            header('Location: login.php');
            exit();
        } else {
            $_SESSION['message'] = "Erro ao excluir a conta de usuário: " . $conn->error;
            header('Location: perfil.php');
            exit();
        }
    } else {
        $_SESSION['message'] = "Erro ao excluir as notas do usuário: " . $conn->error;
        header('Location: perfil.php');
        exit();
    }

    $conn->close();
}
?>
