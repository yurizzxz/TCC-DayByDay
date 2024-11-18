<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!isset($_SESSION['authenticated']) || !$_SESSION['authenticated']) {
        $_SESSION['message_error'] = 'Sessão não iniciada';
        header('Location: index.php?p=perfil');
        exit();
    }

    include_once 'conexao.php';

    $id_usuario = $_SESSION['idUsuario'];
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $new_password = $_POST['new_password'];
    $confirm_password = $_POST['confirm_password'];
    $profile_pic_url = $_POST['profile_pic_url']; // Nova URL da foto de perfil

    // Verifica se as novas senhas coincidem
    if ($new_password !== $confirm_password) {
        $_SESSION['message_error'] = 'As senhas não são iguais.';
        header('Location: index.php?p=perfil');
        exit();
    }

    // Atualiza a senha se a nova senha não estiver vazia
    if (!empty($new_password)) {
        $hashed_new_password = password_hash($new_password, PASSWORD_DEFAULT);
        $sql_update = "UPDATE usuarios SET nome=?, email=?, senha=?, profile_pic_url=? WHERE id=?";
        $stmt = $conn->prepare($sql_update);
        $stmt->bind_param('ssssi', $nome, $email, $hashed_new_password, $profile_pic_url, $id_usuario);
    } else {
        // Atualiza apenas o nome, email e a foto de perfil se a nova senha não for fornecida
        $sql_update = "UPDATE usuarios SET nome=?, email=?, profile_pic_url=? WHERE id=?";
        $stmt = $conn->prepare($sql_update);
        $stmt->bind_param('sssi', $nome, $email, $profile_pic_url, $id_usuario);
    }

    // Executa a atualização
    if ($stmt->execute()) {
        $_SESSION['nomeUsuario'] = $nome;
        $_SESSION['emailUsuario'] = $email;
        $_SESSION['mensagem'] = 'Perfil atualizado com sucesso.';
        // Atualiza também a URL da foto de perfil na sessão, se necessário
        $_SESSION['profilePicUrl'] = $profile_pic_url;
    } else {
        $_SESSION['mensagem'] = 'Erro ao atualizar o perfil: ' . $stmt->error;
    }

    $stmt->close();
    $conn->close();

    header('Location: index.php?p=perfil');
    exit();
} else {
    $_SESSION['message_error'] = 'Requisição inválida.';
    header('Location: index.php?p=perfil');
    exit();
}
