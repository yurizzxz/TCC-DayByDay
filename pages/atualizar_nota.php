<?php
session_start();

// Verifica se o usuário está logado
if (!isset($_SESSION['idUsuario'])) {
    header('Location: login.php');
    exit();
}

// Verifica se os dados do formulário foram enviados
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['nota_id'])) {
    // Obtém o ID do usuário da sessão
    $id_usuario = $_SESSION['idUsuario'];

    // Obtém os dados do formulário
    $nota_id = $_POST['nota_id'];
    $titulo = $_POST['txttitulo'];
    $subtitulo = $_POST['txtsubtitulo'];
    $conteudo = $_POST['txtconteudo'];
    $cor = $_POST['cor_selecionada'];

    // Conexão com o banco de dados
    $conn = mysqli_connect('127.0.0.1', 'root', '', 'tcc');
    if ($conn->connect_error) {
        die("Erro de conexão: " . $conn->connect_error);
    }

    // Verifica se a nota pertence ao usuário logado
    $sql_check = "SELECT * FROM nota WHERE id_usuario = '$id_usuario' AND id = '$nota_id'";
    $result_check = $conn->query($sql_check);

    if ($result_check->num_rows == 1) {
        // Atualiza os detalhes da nota no banco de dados
        $sql_update = "UPDATE nota SET titulo = '$titulo', subtitulo = '$subtitulo', conteudo = '$conteudo', cor = '$cor' WHERE id = '$nota_id'";
        if ($conn->query($sql_update) === TRUE) {
            echo "Nota atualizada com sucesso!";
            header('Location: index.php?p=notas');
        } else {
            echo "Erro ao atualizar a nota: " . $conn->error;
        }
    } else {
        echo "Nota não encontrada.";
    }

    $conn->close();
} else {
    header('Location: index.php?p=notas');
}
?>
