<?php
session_start();

$conn = mysqli_connect('#', 'root', '', 'tcc');
if ($conn->connect_error) {
    die(json_encode(["status" => "error", "message" => "Erro de conexão: " . $conn->connect_error]));
}

$email = $_POST['txtemail'];
$senha = $_POST['txtsenha'];

$sql = "SELECT id, nome, email, senha, profile_pic_url FROM usuarios WHERE email='$email'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    if (password_verify($senha, $row['senha'])) {
        $_SESSION['idUsuario'] = $row['id'];
        $_SESSION['nomeUsuario'] = $row['nome'];
        $_SESSION['emailUsuario'] = $row['email'];
        $_SESSION['profilePicUrl'] = !empty($row['profile_pic_url']) ? $row['profile_pic_url'] : '../img/profile/profile_1.png';

        echo json_encode(["status" => "success", "redirect" => "index.php?p=notas"]);
    } else {
        echo json_encode(["status" => "error", "message" => "Senha incorreta!"]);
    }
} else {
    echo json_encode(["status" => "error", "message" => "Usuário não encontrado!"]);
}

$conn->close();
?>