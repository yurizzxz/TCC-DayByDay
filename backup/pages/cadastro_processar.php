<?php

// Conexão com o banco de dados
$conn = mysqli_connect('127.0.0.1', 'root', '', 'tcc');
if ($conn->connect_error) {
    die("Erro de conexão: " . $conn->connect_error);
}

// Recupera os dados do formulário
$nome = $_POST['txtnome'];
$email = $_POST['txtemail']; // Corrigido para 'gmail'
$senha = password_hash($_POST['txtsenha'], PASSWORD_DEFAULT); // Criptografa a senha

// Insere os dados na tabela de usuários
$sql = "INSERT INTO usuarios (nome, email, senha) VALUES ('$nome', '$email', '$senha')";
if ($conn->query($sql) === TRUE) {
    echo "Usuário cadastrado com sucesso!";
    header('location:login.php');
} else {
    echo "Erro ao cadastrar o usuário: " . $conn->error;
}

$conn->close();

