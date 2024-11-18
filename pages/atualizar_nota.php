<?php
session_start();
include_once 'conexao.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['nota_id'])) {
    $nota_id = $_POST['nota_id'];
    $titulo = $_POST['txttitulo'];
    $subtitulo = $_POST['txtsubtitulo'];
    $conteudo = $_POST['txtconteudo'];
    $cor = $_POST['txtcor'];
    $categoria_id = $_POST['id_categoria']; // Adiciona categoria

    // Variável para armazenar o nome do arquivo
    $arquivoNome = null;

    // Verifica se um arquivo foi enviado
    if (isset($_FILES['arquivo']) && $_FILES['arquivo']['error'] === UPLOAD_ERR_OK) {
        $arquivoTempPath = $_FILES['arquivo']['tmp_name'];
        $arquivoNome = basename($_FILES['arquivo']['name']);
        $uploadDir = '../pages/uploads/'; // Diretório onde os arquivos serão armazenados
        $uploadFilePath = $uploadDir . $arquivoNome;

        // Move o arquivo para o diretório de upload
        if (!move_uploaded_file($arquivoTempPath, $uploadFilePath)) {
            $_SESSION['mensagem'] = 'Erro ao mover o arquivo para o diretório de uploads.';
            header('location:index.php?p=notas');
            exit();
        }
    } else {
        // Se não houver um arquivo enviado, mantém o arquivo atual
        // Faz uma consulta para pegar o arquivo atual
        $stmt = $conn->prepare('SELECT arquivo FROM nota WHERE id = ?');
        $stmt->bind_param('i', $nota_id);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();
        $arquivoNome = $row['arquivo']; // Mantém o arquivo existente se nenhum novo for enviado
        $stmt->close();
    }

    // Protege contra SQL Injection
    $stmt = $conn->prepare('UPDATE nota SET titulo=?, subtitulo=?, conteudo=?, cor=?, arquivo=?, id_categoria=? WHERE id=?');

    // Bind dos parâmetros, incluindo o nome do arquivo e categoria
    $stmt->bind_param('sssssii', $titulo, $subtitulo, $conteudo, $cor, $arquivoNome, $categoria_id, $nota_id);

    if ($stmt->execute()) {
        $_SESSION['mensagem'] = 'Edição feita com sucesso!';
        header('location:index.php?p=notas');
        exit();
    } else {
        $_SESSION['mensagem'] = 'Erro ao editar nota! ' . $stmt->error;
        header('location:index.php?p=notas');
        exit();
    }

    $stmt->close();
    $conn->close();
} else {
    header('Location: index.php?p=notas');
}
?>
