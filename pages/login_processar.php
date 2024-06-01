<?php
session_start(); 

$conn = mysqli_connect('127.0.0.1', 'root', '', 'tcc');
if ($conn->connect_error) {
    die("Erro de conexão: " . $conn->connect_error);
}

$email = $_POST['txtemail'];
$senha = $_POST['txtsenha'];


$sql = "SELECT id, nome, email, senha FROM usuarios WHERE email='$email'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    if (password_verify($senha, $row['senha'])) {
     
        $_SESSION['idUsuario'] = $row['id'];
        $_SESSION['nomeUsuario'] = $row['nome'];
        $_SESSION['emailUsuario'] = $row['email'];
        echo "Login bem-sucedido! Bem-vindo, " . $row['nome'] . " " . $row['email'];
        header('location:index.php?p=notas'); 
    } else {
        echo "Senha incorreta!";
    }
} else {
    echo "Usuário não encontrado!";
}

$conn->close();
?>
