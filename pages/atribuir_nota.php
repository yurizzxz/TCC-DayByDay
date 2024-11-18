<?php
session_start();

if (!isset($_SESSION['idUsuario'])) {
    header('Location: login.php');
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['nota_id']) && isset($_POST['id_categoria'])) {
    $id_usuario = $_SESSION['idUsuario'];
    $nota_id = $_POST['nota_id'];
    $id_categoria = $_POST['id_categoria'];

    include_once 'conexao.php';

    $sql_verifica = "SELECT id FROM categoria WHERE id = '$id_categoria' AND id_usuario = '$id_usuario'";
    $result_verifica = $conn->query($sql_verifica);

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nota_id = $_POST['nota_id'];
        $id_categoria = $_POST['id_categoria'];
        
        $sql_verifica = "SELECT * FROM categoria WHERE id = '$id_categoria' AND id_usuario = '$id_usuario'";
        $result_verifica = $conn->query($sql_verifica);
    
        if ($result_verifica->num_rows > 0) {
            $sql_associar = "UPDATE nota SET id_categoria = '$id_categoria' WHERE id = '$nota_id'";
            if ($conn->query($sql_associar) === TRUE) {
                $_SESSION['mensagem'] = "Nota atribuida com sucesso";
            } 
        } 
        
        header('Location: index.php?p=notas');
        exit;
    }

    $conn->close();
} else {
    echo "Parâmetros inválidos.";
}
?>
