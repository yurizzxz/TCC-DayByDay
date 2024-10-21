<?php
session_start();

if (!isset($_SESSION['idUsuario'])) {
    header('Location: login.php');
    exit();
}

include_once 'conexao.php';

$id_usuario = $_SESSION['idUsuario'];
$categoria_id = isset($_POST['categoria_id']) ? $_POST['categoria_id'] : '';

$sql = "SELECT * FROM nota WHERE id_usuario = '$id_usuario'";

if (!empty($categoria_id) && $categoria_id != 'todas') {
    $sql .= " AND id_categoria = '$categoria_id'";
}

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<div class='card mb-3 mt-3' id='card-layout-note'> ";
        echo "<form method='get' action='editar_nota.php'>";
        echo "<input type='hidden' name='nota_id' value='" . htmlspecialchars($row['id']) . "'>";
        echo "<button type='button' class='btn btn-transparent position-absolute top-0 end-0 m-2' 
        data-bs-toggle='modal' data-bs-target='#updateNoteModal'
        data-id='" . htmlspecialchars($row['id']) . "' 
        data-title='" . htmlspecialchars($row['titulo']) . "' 
        data-subtitle='" . htmlspecialchars($row['subtitulo']) . "' 
        data-content='" . htmlspecialchars($row['conteudo']) . "' 
        data-color='" . htmlspecialchars($row['cor']) . "'></button>";
        echo "</form>";
        echo "<div class='row'>";
        echo "<div class='col-sm-1'>";
        echo "<div class='color-bar' style='background-color: " . htmlspecialchars($row['cor']) . "'></div>";
        echo "</div>";
        echo "<div class='col-sm-6' id='content-card-note'>";
        echo "<div class='card-body' style='margin-top: 7px'>";
        echo "<h5 class='card-title fw-bold fs-4'>" . htmlspecialchars($row['titulo']) . "</h5>";
        echo "<p class='card-text' style='font-size: 18px'>" . htmlspecialchars($row['subtitulo']) . "</p>";

        $content = $row['conteudo'];
        $limit = 70;

        if (strlen($content) > $limit) {
            $truncated = substr($content, 0, $limit) . '...';
        } else {
            $truncated = $content;
        }

        echo "<p class='card-text textmuted'>" . htmlspecialchars($truncated) . "</p>";

        echo "</div>";
        echo "</div>";
        echo "<div class='col-sm-5 d-flex justify-content-end' id='trespontos' style='margin-top: 20px'>";
        echo "<div class='mini-menu'>";
        echo "<input type='checkbox' id='toggle-" . htmlspecialchars($row['id']) . "'>";
        echo "<label for='toggle-" . htmlspecialchars($row['id']) . "'><ion-icon name='ellipsis-vertical-outline'></ion-icon></label>";
        echo "<div class='menu'>";
        echo "<form class='d-none' method='get' action='editar_nota.php'>";
        echo "<input type='hidden' name='nota_id' value='" . htmlspecialchars($row['id']) . "'>";
        echo "<button type='button' class='btn mini-menu-action edit' 
            data-id='" . htmlspecialchars($row['id']) . "' 
            data-title='" . htmlspecialchars($row['titulo']) . "' 
            data-subtitle='" . htmlspecialchars($row['subtitulo']) . "' 
            data-content='" . htmlspecialchars($row['conteudo']) . "' 
            data-color='" . htmlspecialchars($row['cor']) . "'>Editar</button>";
        echo "</form>";

        echo "<form method='post' action='excluir_nota.php'>";
        echo "<input type='hidden' name='nota_id' value='" . htmlspecialchars($row['id']) . "'>";
        echo "<button type='submit' class='btn mini-menu-action'>Excluir</button>";
        echo "</form>";

        echo "<form method='post' action='atribuir_nota.php'>";
        echo "<button type='submit' class='btn mini-menu-action'>Adicionar a Categoria</button>";
        echo "<input type='hidden' name='nota_id' value='" . htmlspecialchars($row['id']) . "'>";
        echo "<select class='select-categoria' name='id_categoria'>";

        $sql_categorias = "SELECT id, nome FROM categoria WHERE id_usuario = '$id_usuario'";
        $result_categorias = $conn->query($sql_categorias);

        if ($result_categorias->num_rows > 0) {
            while ($categoria = $result_categorias->fetch_assoc()) {
                echo "<option class='category-option' value='" . htmlspecialchars($categoria['id']) . "'>" . htmlspecialchars($categoria['nome']) . "</option>";
            }
        } else {
            echo "<option value=''>Não há categorias</option>";
        }

        echo "</select>";
        echo "</form>";             
        echo "</div>";
        echo "</div>";
        echo "</div>";
        echo "</div>";
        echo "</div>";
    }
} else {
    echo "<div class='mt-2 no-note'>Nenhuma nota encontrada.</div>";
}

$mensagem = isset($_SESSION['mensagem']) ? $_SESSION['mensagem'] : '';
unset($_SESSION['mensagem']);

$conn->close();
?>
