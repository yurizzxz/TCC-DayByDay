<?php
session_start(); // Inicia a sessão

// Conexão com o banco de dados
$conn = mysqli_connect('127.0.0.1', 'root', '', 'tcc');
if ($conn->connect_error) {
    die("Erro de conexão: " . $conn->connect_error);
}

// Recupera os dados do formulário
$nome = $_POST['txtnome'];
$email = $_POST['txtemail'];
$senha = password_hash($_POST['txtsenha'], PASSWORD_DEFAULT); // Criptografa a senha

// Verifica se o e-mail já está sendo utilizado por outro usuário
$sql_check_email = "SELECT * FROM usuarios WHERE email='$email'";
$result_check_email = $conn->query($sql_check_email);
if ($result_check_email->num_rows > 0) {
    echo "O e-mail fornecido já está cadastrado. Por favor, escolha outro e-mail.";
} else {
    // Insere os dados na tabela de usuários
    $sql_insert_usuario = "INSERT INTO usuarios (nome, email, senha) VALUES ('$nome', '$email', '$senha')";
    if ($conn->query($sql_insert_usuario) === TRUE) {
        echo "Usuário cadastrado com sucesso!";
        header('location: login.php'); // Redireciona para a página de login
    } else {
        echo "Erro ao cadastrar o usuário: " . $conn->error;
    }
}

$conn->close();
?>
