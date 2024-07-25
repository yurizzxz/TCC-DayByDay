<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_SESSION['idUsuario'])) {
    $id_usuario = $_SESSION['idUsuario'];
    $nome_categoria = $_POST['nome_categoria'] ?? ''; // Use operador de coalescência nula para garantir que haja um valor padrão
    $cor_escolhida = $_POST['cor_escolhida'] ?? ''; // Use operador de coalescência nula para garantir que haja um valor padrão

    $conn = mysqli_connect('127.0.0.1', 'root', '', 'tcc');
    if ($conn->connect_error) {
        die('Erro de conexão: ' . $conn->connect_error);
    }

    if ($_POST['action'] === 'edit') {
        $id_categoria = $_POST['id_categoria'] ?? 0;

        $stmt = $conn->prepare('UPDATE categoria SET nome = ?, cor = ? WHERE id = ? AND id_usuario = ?');
        $stmt->bind_param('ssii', $nome_categoria, $cor_escolhida, $id_categoria, $id_usuario);

        if ($stmt->execute()) {
            $_SESSION['mensagem'] = 'Categoria atualizada com sucesso.';
            header('Location: index.php?p=notas');
        } else {
            $_SESSION['mensagem'] = 'Erro ao atualizar a categoria: ' . $stmt->error;
            header('Location: index.php?p=editar_categoria&id=' . $id_categoria);
        }

        $stmt->close();
    } elseif ($_POST['action'] === 'delete') {
        $id_categoria = $_POST['id_categoria'] ?? 0;

        $stmt = $conn->prepare('DELETE FROM categoria WHERE id = ? AND id_usuario = ?');
        $stmt->bind_param('ii', $id_categoria, $id_usuario);

        if ($stmt->execute()) {
            $_SESSION['mensagem'] = 'Categoria excluída com sucesso.';
            header('Location: index.php?p=notas');
        } else {
            $_SESSION['mensagem'] = 'Erro ao excluir a categoria: ' . $stmt->error;
            header('Location: index.php?p=editar_categoria&id=' . $id_categoria);
        }

        $stmt->close();
    }

    $conn->close();
} else {
    header('Location: login.php');
    exit();
}
?>
