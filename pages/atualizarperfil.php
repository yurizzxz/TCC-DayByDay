<?php
session_start();

$conn = mysqli_connect('127.0.0.1', 'root', '', 'tcc');
if ($conn->connect_error) {
    die("Erro de conexão: " . $conn->connect_error);
}

$id_usuario = $_SESSION['idUsuario'];
$nome = $_POST['nome'];
$email = $_POST['email'];
$new_password = $_POST['new_password'];
$confirm_password = $_POST['confirm_password'];

// Verificar se as senhas coincidem
if ($new_password !== $confirm_password) {
    $_SESSION['message_error'] = 'As senhas não coincidem.';
    header('Location: perfil.php');
    exit();
}

// Verificar se o email já está cadastrado para outro usuário
$sql_email_check = "SELECT id FROM usuarios WHERE email='$email' AND id != '$id_usuario'";
$result_email_check = $conn->query($sql_email_check);

if ($result_email_check->num_rows > 0) {
    $_SESSION['message_error'] = 'Este email já está cadastrado para outro usuário.';
    header('Location: perfil.php');
    exit();
}

// Verificar se a nova senha é igual à senha antiga
$sql_password_check = "SELECT senha FROM usuarios WHERE id='$id_usuario'";
$result_password_check = $conn->query($sql_password_check);

if ($result_password_check->num_rows == 1) {
    $row_password_check = $result_password_check->fetch_assoc();
    if (password_verify($new_password, $row_password_check['senha'])) {
        $_SESSION['message_error'] = 'A nova senha não pode ser igual à senha antiga.';
        header('Location: perfil.php');
        exit();
    }
}

// Atualizar o perfil do usuário
$hashed_password = password_hash($new_password, PASSWORD_DEFAULT);

$sql_update = "UPDATE usuarios SET nome='$nome', email='$email', senha='$hashed_password' WHERE id='$id_usuario'";

if ($conn->query($sql_update) === TRUE) {
    $_SESSION['message_success'] = 'Perfil atualizado com sucesso.';
} else {
    $_SESSION['message_error'] = 'Erro ao atualizar o perfil: ' . $conn->error;
}

$conn->close();

header('Location: perfil.php');
exit();
?>
