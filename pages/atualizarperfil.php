<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include_once 'conexao.php';

    $id_usuario = $_SESSION['idUsuario'];
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $new_password = $_POST['new_password'];
    $confirm_password = $_POST['confirm_password'];

    if ($new_password !== $confirm_password) {
        $_SESSION['message_error'] = 'As senhas não coincidem.';
        header('Location: perfil.php');
        exit();
    }

    $upload_dir = 'uploads/';
    $file_path = '';

    if (isset($_FILES['profile_pic']) && $_FILES['profile_pic']['error'] === UPLOAD_ERR_OK) {
        $arquivo = $_FILES['profile_pic'];
        $arquivoNovo = explode('.', $arquivo['name']);
        $extensao = strtolower(end($arquivoNovo));

        $allowed_extensions = ['jpg', 'jpeg', 'png', 'webp'];
        if (!in_array($extensao, $allowed_extensions)) {
            $_SESSION['message_error'] = 'Apenas imagens JPG, JPEG, PNG e WEBP são permitidas.';
            header('Location: perfil.php');
            exit();
        }

        $file_path = $upload_dir . basename($arquivo['name']);
        
        if (!move_uploaded_file($arquivo['tmp_name'], $file_path)) {
            $_SESSION['message_error'] = 'Erro ao fazer upload do arquivo.';
            header('Location: perfil.php');
            exit();
        }
    }

    if ($file_path) {
        $sql_update = "UPDATE usuarios SET nome=?, email=?, profile_pic_url=? WHERE id=?";
    } else {
        $sql_update = "UPDATE usuarios SET nome=?, email=? WHERE id=?";
    }

    if ($stmt = $conn->prepare($sql_update)) {
        if ($file_path) {
            $stmt->bind_param('sssi', $nome, $email, $file_path, $id_usuario);
        } else {
            $stmt->bind_param('ssi', $nome, $email, $id_usuario);
        }

        if ($stmt->execute()) {
            $_SESSION['message_success'] = 'Perfil atualizado com sucesso. <a href="index.php?p=notas">Voltar à página inicial</a>';
        } else {
            $_SESSION['message_error'] = 'Erro ao atualizar o perfil: ' . $stmt->error;
        }
        $stmt->close();
    } else {
        $_SESSION['message_error'] = 'Erro ao preparar a consulta.';
    }

    $conn->close();
} else {
    $_SESSION['message_error'] = 'Requisição inválida.';
}

header('Location: perfil.php');
exit();
?>
