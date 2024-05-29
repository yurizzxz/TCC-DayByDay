<?php
session_start(); // Inicia a sessão

$conn = mysqli_connect('127.0.0.1', 'root', '', 'tcc');
if ($conn->connect_error) {
    die("Erro de conexão: " . $conn->connect_error);
}

$email = $_POST['txtemail'];
$senha = $_POST['txtsenha'];

// consulta o bd para verificar se o usuário existe
$sql = "SELECT * FROM usuarios WHERE email='$email'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    if (password_verify($senha, $row['senha'])) {
        // Armazena o nome do usuário na sessão
        $_SESSION['nomeUsuario'] = $row['nome'];
        $_SESSION['emailUsuario'] = $row['email'];
        echo "Login bem-sucedido! Bem-vindo, " . $row['nome'] . " " . $row['email'];
        header('location:index.php');
    } else {
        echo "Senha incorreta!";
    }
} else {
    echo "Usuário não encontrado!";
}

$conn->close();
?>