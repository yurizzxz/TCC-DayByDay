<?php
session_start();

if (!isset($_SESSION['idUsuario'])) {
    header('Location: login.php');
    exit();
}

$conn = mysqli_connect('127.0.0.1', 'root', '', 'tcc');
if ($conn->connect_error) {
    die("Erro de conexão: " . $conn->connect_error);
}

$id_usuario = $_SESSION['idUsuario'];
$categoria_id = isset($_POST['categoria_id']) ? $_POST['categoria_id'] : '';

// Definir a consulta SQL base
$sql = "SELECT * FROM nota WHERE id_usuario = '$id_usuario'";

// Se um categoria_id foi especificado, adicionar à cláusula WHERE
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
        echo "<p class='card-text textmuted'>" . $row['conteudo'] . "</p>";

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
        // Dropdown para selecionar categoria existente
        echo "<form method='post' action='atribuir_nota.php'>";
        echo "<input type='hidden' name='nota_id' value='" . $row['id'] . "'>";
        echo "<select name='id_categoria'>";

        // Consulta para obter todas as categorias do usuário
        $sql_categorias = "SELECT id, nome FROM categoria WHERE id_usuario = '$id_usuario'";
        $result_categorias = $conn->query($sql_categorias);

        // Adicionar opções de categorias ao dropdown
        if ($result_categorias->num_rows > 0) {
            while ($categoria = $result_categorias->fetch_assoc()) {
                echo "<option value='" . $categoria['id'] . "'>" . $categoria['nome'] . "</option>";
            }
        } else {
            echo "<option value=''>Nenhuma categoria encontrada</option>";
        }

        echo "</select>";
        echo "<button type='submit' class='btn mini-menu-action'>Adicionar a Categoria</button>";
        echo "</form>";             
        echo "</div>";
        echo "</div>";
        echo "</div>";
        echo "</div>";
        echo "</div>";
    }
} else {
    echo "Nenhuma nota encontrada   ";
}

$conn->close();
?>
