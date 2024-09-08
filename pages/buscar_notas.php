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
        echo "<div class='card mb-3 mt-3' id='card-layout-note'>";
        echo "<div class='row'>";
        echo "<div class='col-sm-1'>";
        echo "<div class='color-bar' style='background-color: " . $row['cor'] . "'></div>";
        echo "</div>";
        echo "<div class='col-sm-6' id='content-card-note'>";
        echo "<div class='card-body' style='margin-top: 7px'>";
        echo "<h5 class='card-title fw-bold fs-4'>" . $row['titulo'] . "</h5>";
        echo "<p class='card-text'  style='font-size: 18px'>" . $row['subtitulo'] . "</p>";
        $content = $row['conteudo'];

        $limit = 70;

        if (strlen($content) > $limit) {
            $truncated = substr($content, 0, $limit) . '...';
        } else {
            $truncated = $content;
        }

        echo "<p class='card-text textmuted'>" . ($truncated) . "</p>";

        echo "</div>";
        echo "</div>";
        // menu no canto extremo direito
        echo "<div class='col-sm-5 d-flex justify-content-end' id='trespontos' style='margin-top: 20px'>";
        echo "<div class='mini-menu'>";
        echo "<input type='checkbox' id='toggle-" . $row['id'] . "'>";
        echo "<label for='toggle-" . $row['id'] . "'><ion-icon name='ellipsis-vertical-outline'></ion-icon></label>";
        echo "<div class='menu'>";
        // botão de edição
        echo "<form method='get' action='editar_nota.php'>";
        echo "<input type='hidden' name='nota_id' value='" . $row['id'] . "'>";
        echo "<button type='submit' class='btn mini-menu-action'>Editar</button>";
        echo "</form>";
        // botão de excluir
        echo "<form method='post' action='excluir_nota.php'>";
        echo "<input type='hidden' name='nota_id' value='" . $row['id'] . "'>";
        echo "<button type='submit' class='btn mini-menu-action'>Excluir</button>";
        echo "</form>";
        // atribuiçao
        // categoria existente
        echo "<form method='post' action='atribuir_nota.php'>";
        echo "<button type='submit' class='btn mini-menu-action'>Adicionar a Categoria</button>";
        echo "<input class='category-option' type='hidden' name='nota_id' value='" . $row['id'] . "'>";

        echo "<select class='select-categoria' name='id_categoria'>";

        $sql_categorias = "SELECT id, nome FROM categoria WHERE id_usuario = '$id_usuario'";
        $result_categorias = $conn->query($sql_categorias);

        if ($result_categorias->num_rows > 0) {
            while ($categoria = $result_categorias->fetch_assoc()) {
                echo "<option class='category-option' value='" . $categoria['id'] . "'>" . $categoria['nome'] . "</option>";
            }
        } else {
            echo "<option value='all'>Criar Categoria +</option>";
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
    echo "<p class='text-else'>Nenhuma nota encontrada</p>";
}

$mensagem = isset($_SESSION['mensagem']) ? $_SESSION['mensagem'] : '';
unset($_SESSION['mensagem']);

$conn->close();
?>
