<?php
session_start();

if (!isset($_SESSION['idUsuario'])) {
    header('Location: login.php');
    exit();
}

include_once 'conexao.php';

$id_usuario = $_SESSION['idUsuario'];
$categoria_id = isset($_POST['categoria_id']) ? $_POST['categoria_id'] : '';

$sql = "SELECT id, titulo, subtitulo, conteudo, cor, arquivo FROM nota WHERE id_usuario = '$id_usuario'";

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
        data-user-id='" . htmlspecialchars($id_usuario) . "'
        data-title='" . htmlspecialchars($row['titulo']) . "' 
        data-subtitle='" . htmlspecialchars($row['subtitulo']) . "' 
        data-content='" . htmlspecialchars($row['conteudo']) . "' 
        data-color='" . htmlspecialchars($row['cor']) . "' 
        data-file='" . htmlspecialchars($row['arquivo']) . "'>
        </button>";
        // Adicionando data-file
        echo "</form>";
        echo "<div class='row'>";

        // Exibe a cor da nota
        echo "<div class='col-sm-1'>";
        echo "<div class='color-bar' style='background-color: " . htmlspecialchars($row['cor']) . "'></div>";
        echo "</div>";

        // Exibe o conteúdo da nota
        echo "<div class='col-sm-6' id='content-card-note'>";
        echo "<div class='card-body' style='margin-top: 7px'>";
        echo "<h5 class='card-title fw-bold fs-4'>" . htmlspecialchars($row['titulo']) . "</h5>";
        echo "<p class='card-text' style='font-size: 18px'>" . htmlspecialchars($row['subtitulo']) . "</p>";

        $content = $row['conteudo'];
        $limit = 70;
        $truncated = strlen($content) > $limit ? substr($content, 0, $limit) . '...' : $content;

        echo "<p class='card-text textmuted'>" . htmlspecialchars($truncated) . "</p>";

        // Exibe o arquivo se existir
        if (!empty($row['arquivo'])) {
            echo "<p class='card-text'><a href='/uploads/" . htmlspecialchars($row['arquivo']) . "' style='color: var(--purple);'>" . htmlspecialchars($row['arquivo']) . "</a></p>";
        }

        echo "</div>"; // Fechando card-body
        echo "</div>"; // Fechando col-sm-6
        echo "<div class='col-sm-5 d-flex justify-content-end' id='trespontos' style='margin-top: 20px'>";
        echo "<form method='post' action='excluir_nota.php'>";
        echo "<div class='mini-menu'>";
        echo "<input type='hidden' name='nota_id' value='" . htmlspecialchars($row['id']) . "'>";
        echo "<button type='submit' class='btn' style='border: none; background: transparent; cursor: pointer;'>"; // Botão para submeter o formulário
        echo "<ion-icon name='trash-outline' style='color: var(--purple); font-size: 30px;' class='three-dots-icon'></ion-icon>"; // Ícone da lixeira
        echo "</button>";
        echo "</div>"; // Fechando mini-menu
        echo "</form>";
        echo "</div>"; // Fechando col-sm-5

        echo "</div>"; // Fechando row
        echo "</div>"; // Fechando card
    }
} else {
    echo "<div class='mt-2 no-note'>Nenhuma nota encontrada.</div>";
}


$mensagem = isset($_SESSION['mensagem']) ? $_SESSION['mensagem'] : '';
unset($_SESSION['mensagem']);

$conn->close();
?>