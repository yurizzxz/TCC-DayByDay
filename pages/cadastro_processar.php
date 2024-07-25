<?php
session_start();

$conn = mysqli_connect('127.0.0.1', 'root', '', 'tcc');
if ($conn->connect_error) {
    die("Erro de conexão: " . $conn->connect_error);
}

$nome = $_POST['txtnome'];
$email = $_POST['txtemail'];
$senha = password_hash($_POST['txtsenha'], PASSWORD_DEFAULT); // Criptografa a senha

$sql_check_email = "SELECT * FROM usuarios WHERE email='$email'";
$result_check_email = $conn->query($sql_check_email);
if ($result_check_email->num_rows > 0) {
    echo "O e-mail fornecido já está cadastrado. Por favor, escolha outro e-mail.";
} else {
    $sql_insert_usuario = "INSERT INTO usuarios (nome, email, senha) VALUES ('$nome', '$email', '$senha')";
    if ($conn->query($sql_insert_usuario) === TRUE) {
        echo "Usuário cadastrado com sucesso!";
        header('location: login.php'); 
    } else {
        echo "Erro ao cadastrar o usuário: " . $conn->error;
        header('location: login.php'); 
    }
}

$conn->close();
?>
