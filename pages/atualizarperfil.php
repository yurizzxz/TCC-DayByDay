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

    if ($new_password !== $confirm_password) {
        $_SESSION['message_error'] = 'As senhas não são iguais.';
        header('Location: index.php?p=perfil');
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
            header('Location: index.php?p=perfil');
            exit();
        }

        $file_path = $upload_dir . basename($arquivo['name']);

        if (!move_uploaded_file($arquivo['tmp_name'], $file_path)) {
            $_SESSION['message_error'] = 'Erro ao fazer upload da imagem.';
            header('Location: index.php?p=perfil');
            exit();
        }
    }

    $sql_update = $file_path ? "UPDATE usuarios SET nome=?, email=?, profile_pic_url=?, senha=? WHERE id=?" : "UPDATE usuarios SET nome=?, email=?, senha=? WHERE id=?";
    $stmt = $conn->prepare($sql_update);

    if ($file_path) {
        $hashed_new_password = password_hash($new_password, PASSWORD_DEFAULT);
        $stmt->bind_param('ssssi', $nome, $email, $file_path, $hashed_new_password, $id_usuario);
    } else {
        $hashed_new_password = password_hash($new_password, PASSWORD_DEFAULT);
        $stmt->bind_param('sssi', $nome, $email, $hashed_new_password, $id_usuario);
    }

    if ($stmt->execute()) {
        $_SESSION['nomeUsuario'] = $nome;
        $_SESSION['emailUsuario'] = $email;
        $_SESSION['profilePicUrl'] = $file_path;

        $_SESSION['message_success'] = 'Perfil atualizado com sucesso.';
    } else {
        $_SESSION['message_error'] = 'Erro ao atualizar o perfil: ' . $stmt->error;
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
?>
