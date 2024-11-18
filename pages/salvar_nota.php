<?php
session_start();

if (!isset($_SESSION['idUsuario'])) {
    header('Location: login.php');
    exit();
}

include_once 'conexao.php';

$id_usuario = $_SESSION['idUsuario'];
$titulo = $_POST['txttitulo'];
$subtitulo = $_POST['txtsubtitulo'];
$conteudo = $_POST['txtconteudo'];
$cor = $_POST['cor_selecionada'];
$id_categoria = $_POST['id_categoria']; 

$arquivo = null; 

if (isset($_FILES['arquivo']) && $_FILES['arquivo']['error'] === UPLOAD_ERR_OK) {
    $diretorioDestino = __DIR__ . '/uploads/'; 
    
    $arquivoNome = basename($_FILES['arquivo']['name']);
    
    $caminhoArquivo = $diretorioDestino . $arquivoNome;

    if (!is_dir($diretorioDestino)) {
        mkdir($diretorioDestino, 0755, true);
    }

    if (move_uploaded_file($_FILES['arquivo']['tmp_name'], $caminhoArquivo)) {
    } else {
        $_SESSION['mensagem'] = "Erro ao enviar o arquivo.";
        header('Location: index.php?p=notas');
        exit();
    }
}

if (isset($_POST['nota_id'])) {
    $nota_id = $_POST['nota_id'];

    if ($arquivo) {
        $sql = "UPDATE nota SET titulo=?, subtitulo=?, conteudo=?, cor=?, arquivo=?, id_categoria=? WHERE id=?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('ssssssi', $titulo, $subtitulo, $conteudo, $cor, $arquivo, $id_categoria, $nota_id);
    } else {
        $sql = "UPDATE nota SET titulo=?, subtitulo=?, conteudo=?, cor=?, id_categoria=? WHERE id=?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('sssssi', $titulo, $subtitulo, $conteudo, $cor, $id_categoria, $nota_id);
    }
} else {
    $sql = "INSERT INTO nota (id_usuario, titulo, subtitulo, conteudo, cor, arquivo, id_categoria) 
            VALUES (?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    if ($arquivo) {
        $stmt->bind_param('isssssi', $id_usuario, $titulo, $subtitulo, $conteudo, $cor, $arquivo, $id_categoria);
    } else {
        $stmt->bind_param('isssssi', $id_usuario, $titulo, $subtitulo, $conteudo, $cor, $arquivo, $id_categoria);
    }
}

if ($stmt->execute()) {
    $_SESSION['mensagem'] = "Nota salva com sucesso!";
    header('Location: index.php?p=notas');
    exit();
} else {
    $_SESSION['mensagem'] = "Erro ao salvar a nota: " . $stmt->error;
    header('Location: index.php?p=notas');
    exit();
}

$stmt->close();
$conn->close();
?>
